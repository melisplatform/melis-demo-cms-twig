<?php

/**
 * Melis Technology (http://www.melistechnology.com)
 *
 * @copyright Copyright (c) 2019 Melis Technology (http://www.melistechnology.com)
 *
 */

namespace MelisDemoCmsTwig;

use MelisDemoCmsTwig\Listener\SetupDemoCmsTwigListener;
use MelisDemoCmsTwig\Listener\SiteMenuCustomizationListener;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Session\Container;
use Zend\Stdlib\ArrayUtils;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $eventManager->attach(MvcEvent::EVENT_DISPATCH_ERROR, function ($e) {
            $viewModel = $e->getViewModel();
            $viewModel->setTemplate('layout/errorLayout');
        });
        $eventManager->attach(MvcEvent::EVENT_RENDER_ERROR, function ($e) {
            $viewModel = $e->getViewModel();
            $viewModel->setTemplate('layout/errorLayout');
        });

        // Adding Event listener to customize the Site menu from Plugin
        $eventManager->attach(new SiteMenuCustomizationListener());
        // Event listener to Setup MelisDemoCms pre-defined datas
        $eventManager->attach(new SetupDemoCmsTwigListener());

        $eventManager->attach(new \MelisDemoCmsTwig\Listener\MelisDemoCmsTwigCreateConfigListener());

        $this->createTranslations($e);
    }

    public function createTranslations($e)
    {
        $sm = $e->getApplication()->getServiceManager();
        $translator = $sm->get('translator');

        $container = new Container('meliscore');
        $locale = $container['melis-lang-locale'];

        if (!empty($locale)) {

            $translationType = [
                'interface',
            ];

            $translationList = [];
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/../module/MelisModuleConfig/config/translation.list.php')) {
                $translationList = include 'module/MelisModuleConfig/config/translation.list.php';
            }

            foreach ($translationType as $type) {

                $transPath = '';
                $moduleTrans = __NAMESPACE__ . "/$locale.$type.php";

                if (in_array($moduleTrans, $translationList)) {
                    $transPath = "module/MelisModuleConfig/languages/" . $moduleTrans;
                }

                if (empty($transPath)) {

                    // if translation is not found, use melis default translations
                    $defaultLocale = (file_exists(__DIR__ . "/language/$locale.$type.php")) ? $locale : "en_EN";
                    $transPath = __DIR__ . "/../language/$defaultLocale.$type.php";
                }

                $translator->addTranslationFile('phparray', $transPath);
            }
        }
    }

    public function getConfig()
    {
        $config = [];
        $configFiles = [
            include __DIR__ . '/../config/module.config.php',
            include __DIR__ . '/../config/setup/download.config.php',
            include __DIR__ . '/../config/setup/update.config.php',
            include __DIR__ . '/../config/melis.plugins.config.php',
            include __DIR__ . '/../config/MelisDemoCms.configTwig.php',
        ];

        foreach ($configFiles as $file) {
            $config = ArrayUtils::merge($config, $file);
        }

        return $config;
    }

    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ],
            ],
        ];
    }
}
