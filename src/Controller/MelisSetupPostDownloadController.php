<?php

/**
 * Melis Technology (http://www.melistechnology.com)
 *
 * @copyright Copyright (c) 2019 Melis Technology (http://www.melistechnology.com)
 *
 */

namespace MelisDemoCmsTwig\Controller;

use MelisCore\MelisSetupInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;
use MelisMarketPlace\Support\MelisMarketPlace as MarketPlace;
use MelisMarketPlace\Support\MelisMarketPlaceCmsTables as Melis;
use MelisMarketPlace\Support\MelisMarketPlaceSiteInstall as Site;

/**
 * @property bool $showOnMarketplacePostSetup
 */
class MelisSetupPostDownloadController extends AbstractActionController implements MelisSetupInterface
{
    /**
     * flag for Marketplace whether to display the setup form or not
     * @var bool $showOnMarketplacePostSetup
     */
    public $showOnMarketplacePostSetup = true;

    protected $formConfigPath = 'MelisDemoCmsTwig/' . Site::DOWNLOAD . '/' . MarketPlace::FORM . '/melis_demo_cms_twig_setup_download_form';

    /**
     * @return \Zend\View\Model\ViewModel
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
        $view->setVariable('siteDemoCmsTwigForm', $form);

        $view->setTerminal(true);

        return $view;
    }

    /**
     * @return \Zend\Form\ElementInterface
     */
    private function getFormSiteDemo()
    {
        /** @var \MelisCore\Service\MelisCoreConfigService $config */
        $config = $this->getServiceLocator()->get('MelisCoreConfig');
        $appConfigForm = $config->getItem($this->formConfigPath);

        $factory = new \Zend\Form\Factory();
        $formElements = $this->getServiceLocator()->get('FormElementManager');
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
     * @return \Zend\View\Model\JsonModel
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
            'siteDemoCmsTwigForm' => 'melis_installer_demo_cms_twig',
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
        $service = $this->getServiceLocator()->get('MelisCoreTool');

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
        $melisMelisCoreConfig = $this->getServiceLocator()->get('MelisCoreConfig');
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
     * @return \Zend\View\Model\JsonModel
     */
    public function submitAction()
    {
        $success = true;
        $message = $this->getTool()->getTranslation('tr_install_setup_message_ok');
        $errors = [];

        return new JsonModel(get_defined_vars());
    }
}
