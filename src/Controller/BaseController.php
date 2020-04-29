<?php

/**
 * Melis Technology (http://www.melistechnology.com)
 *
 * @copyright Copyright (c) 2019 Melis Technology (http://www.melistechnology.com)
 *
 */

namespace MelisDemoCmsTwig\Controller;

use MelisFront\Controller\MelisSiteActionController;
use MelisFront\Service\MelisSiteConfigService;
use Laminas\Mvc\MvcEvent;
use Laminas\View\Model\ViewModel;

class BaseController extends MelisSiteActionController
{
    public $view = null;
    
    function __construct()
    {
        $this->view = new ViewModel();
    }
    
    public function onDispatch(MvcEvent $event)
    {
        // Getting the Site config "MelisDemoCmsTwig.config.php"
        $sm = $event->getApplication()->getServiceManager();
        $pageId = $this->params()->fromRoute('idpage');

        /** @var MelisSiteConfigService $siteConfigSrv */
        $siteConfigSrv = $sm->get('MelisSiteConfigService');

		/** Generating Site Menu using MelisFrontMenuPlugin Plugin */
	    $menuParameters = array(
	        'template_path' => 'MelisDemoCmsTwig/plugin/menu',
	        'pageIdRootMenu' => $siteConfigSrv->getSiteConfigByKey('homePageId', $pageId),
	    );
        $this->layout()->setVariable('siteMenuParameters', $menuParameters);
		
		/** Generating Page Breadcrumb using MelisFrontBreadcrumbPlugin Plugin */
	    $breadcrumbParameters = array(
	        'template_path' => 'MelisDemoCmsTwig/plugin/breadcrumb',
	        'pageIdRootBreadcrumb' => $pageId,
	    );
        $this->layout()->setVariable('breadcrumbParameters', $breadcrumbParameters);

        return parent::onDispatch($event);
    }
}