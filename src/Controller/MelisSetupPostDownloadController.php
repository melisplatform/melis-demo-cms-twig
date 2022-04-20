<?php

/**
 * Melis Technology (http://www.melistechnology.com)
 *
 * @copyright Copyright (c) 2019 Melis Technology (http://www.melistechnology.com)
 *
 */

namespace MelisDemoCmsTwig\Controller;

use MelisCore\Controller\MelisAbstractActionController;
use MelisCore\MelisSetupInterface;
use Laminas\View\Model\JsonModel;
use Laminas\View\Model\ViewModel;
use Laminas\Session\Container;
use MelisMarketPlace\Support\MelisMarketPlace as MarketPlace;
use MelisMarketPlace\Support\MelisMarketPlaceCmsTables as Melis;
use MelisMarketPlace\Support\MelisMarketPlaceSiteInstall as Site;

/**
 * @property bool $showOnMarketplacePostSetup
 */
class MelisSetupPostDownloadController extends MelisAbstractActionController implements MelisSetupInterface
{
    /**
     * flag for Marketplace whether to display the setup form or not
     * @var bool $showOnMarketplacePostSetup
     */
    public $showOnMarketplacePostSetup = true;

    protected $formConfigPath = 'MelisDemoCmsTwig/' . Site::DOWNLOAD . '/' . MarketPlace::FORM . '/melis_demo_cms_twig_setup_download_form';

    /**
     * @return \Laminas\View\Model\ViewModel
     */
    public function getFormAction()
    {
        $form = $this->getFormSiteDemo();
        $container = new Container('melis_modules_configuration_status');
        $formData = isset($container['formData']) ? (array)$container['formData'] : null;

        if ($formData) {
            $form->setData($formData);
        }

        $view = new ViewModel();
        $view->setVariable('siteDemoCmsForm', $form);

        $view->setTerminal(true);

        return $view;
    }

    /**
     * @return \Laminas\Form\ElementInterface
     */
    private function getFormSiteDemo()
    {
        /** @var \MelisCore\Service\MelisCoreConfigService $config */
        $config = $this->getServiceManager()->get('MelisCoreConfig');
        $appConfigForm = $config->getItem($this->formConfigPath);

        $factory = new \Laminas\Form\Factory();
        $formElements = $this->getServiceManager()->get('FormElementManager');
        $factory->setFormElementManager($formElements);
        $form = $factory->createForm($appConfigForm);

        // default data
        $scheme = 'https';
        $domain = $this->getRequest()->getUri()->getHost();

        $data = [
            'sdom_scheme' => $scheme,
            'sdom_domain' => $domain,
        ];

        $form->setData($data);

        return $form;
    }

    /**
     * @return \Laminas\View\Model\JsonModel
     */
    public function validateFormAction()
    {
        $success = false;
        $message = 'tr_install_setup_message_ko';
        $errors = [];

        $data = $this->getTool()->sanitizeRecursive($this->params()->fromRoute('post', $this->getRequest()->getPost()));

        $form = $this->getFormSiteDemo();
        $form->setData($data);

        if ($form->isValid()) {
            $success = true;
            $message = 'tr_install_setup_message_ok';
        } else {
            $errors = $this->formatErrorMessage($form->getMessages());
        }

        $response = [
            'success' => $success,
            'message' => $this->getTool()->getTranslation($message),
            'errors' => $errors,
            'siteDemoCmsForm' => 'melis_installer_demo_cms_twig',
            'domainForm' => 'melis_installer_domain',
        ];

        return new JsonModel($response);
    }

    /**
     * @return \MelisCore\Service\MelisCoreToolService
     */
    private function getTool()
    {
        /** @var \MelisCore\Service\MelisCoreToolService $service */
        $service = $this->getServiceManager()->get('MelisCoreTool');

        return $service;
    }

    /**
     * @param array $errors
     *
     * @return array
     */
    private function formatErrorMessage($errors = [])
    {
        /** @var \MelisCore\Service\MelisCoreConfigService $melisMelisCoreConfig */
        $melisMelisCoreConfig = $this->getServiceManager()->get('MelisCoreConfig');
        $appConfigForm = $melisMelisCoreConfig->getItem($this->formConfigPath);
        $appConfigForm = $appConfigForm['elements'];

        foreach ($errors as $keyError => $valueError) {
            foreach ($appConfigForm as $keyForm => $valueForm) {
                if ($valueForm['spec']['name'] == $keyError &&
                    !empty($valueForm['spec']['options']['label'])) {
                    $errors[$keyError]['label'] = $valueForm['spec']['options']['label'];
                }
            }
        }

        return $errors;
    }

    /**
     * @return \Laminas\View\Model\JsonModel
     */
    public function submitAction()
    {
        $success = true;
        $message = $this->getTool()->getTranslation('tr_install_setup_message_ok');
        $errors = [];

        $this->saveCmsSiteDomain();

        return new JsonModel(get_defined_vars());
    }

    /**
     * @return \Laminas\View\Model\JsonModel
     */
    private function saveCmsSiteDomain()
    {
        $request = $this->getRequest();
        $uri     = $request->getUri();
        $scheme  = $uri->getScheme();
        $siteDomain = $uri->getHost();

        $container = new \Laminas\Session\Container('melisinstaller');

        // default platform
        $environments       = $container['environments'];
        $defaultEnvironment = !empty($environments) ? $environments['default_environment'] : null;
        $siteCtr            = 1;

        if($defaultEnvironment) {

            /**
             * For multiple environment
             */
            $defaultPlatformData[$siteCtr-1] = array(
                'sdom_site_id' => $siteCtr,
                'sdom_env'     => getenv('MELIS_PLATFORM'),
                'sdom_scheme'  => $scheme,
                'sdom_domain'  => $siteDomain
            );

            $platforms     = isset($environments['new']) ? $environments['new'] : null;
            $platformsData = array();

            if($platforms) {
                foreach($platforms as $platform) {
                    $platformsData[] = array(
                        'sdom_site_id' => $siteCtr,
                        'sdom_env'     => $platform[0]['sdom_env'],
                        'sdom_scheme'  => $platform[0]['sdom_scheme'],
                        'sdom_domain'  => $platform[0]['sdom_domain']
                    );
                }
            }

            $platformsData = array_merge($defaultPlatformData, $platformsData);

            $siteDomainTable = $this->getServiceManager()->get('MelisEngineTableSiteDomain');

            foreach($platformsData as $data) {
                $siteDomainTable->save($data);
            }
        }
    }
}
