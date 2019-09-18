<?php

/**
 * Melis Technology (http://www.melistechnology.com)
 *
 * @copyright Copyright (c) 2015 Melis Technology (http://www.melistechnology.com)
 *
 */

namespace MelisDemoCms\Controller;

use MelisDemoCms\Controller\BaseController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;
class HomeController extends BaseController
{
    public function indexAction()
    {
        /** get the site config */
        $siteConfigSrv = $this->getServiceLocator()->get('MelisSiteConfigService');

        /** Generating Homepage header Slider using MelisCmsSliderShowSliderPlugin Plugin */
        $showSliderParameters = array(
            'template_path' => 'MelisDemoCms/plugin/homepage-slider',
            'id' => 'showSliderHomepage',
            'pageId' => $this->idPage,
            'sliderId' => $siteConfigSrv->getSiteConfigByKey('homepage_header_slider', $this->idPage),
        );
        $this->view->setVariable('homePageSliderParameters', $showSliderParameters);

        /** Generating Homepage Latest News slider using MelisCmsNewsLatestNewsPlugin Plugin */
        $latestNewsParameters = array(
            'template_path' => 'MelisDemoCms/plugin/latest-news',
            'pageIdNews'    => $siteConfigSrv->getSiteConfigByKey('news_details_page_id', $this->idPage),
            'filter' => array(
                'column' => 'cnews_publish_date',
                'order' => 'DESC',
                'date_min' => null,
                'date_max' => null,
                'unpublish_filter' => true,
                'site_id' => $siteConfigSrv->getSiteConfigByKey('site_id', $this->idPage),
                'search' => '',
                'limit' => 6,
            )
        );
        $this->view->setVariable('latestNewsParameters', $latestNewsParameters);

        $menuParameters = array(
            'template_path' => 'MelisDemoCms/plugin/testimonial-slider',
            'pageId' => $this->idPage,
            'pageIdFolder' => $siteConfigSrv->getSiteConfigByKey('testimonial_id', $this->idPage),
            'renderMode' => $this->renderMode,
        );
        $this->view->setVariable('listParameters', $menuParameters);

        /**
         * Displaying a GDPR/Cookie banner using MelisGdprBanner plugin
         * @var \MelisFront\Controller\Plugin\MelisFrontGdprBannerPlugin $gdprBannerPlugin
         */
        $this->view->setVariable('gdprBannerParameters', ['template_path' => 'MelisDemoCms/plugin/gdpr-banner']);

        $this->view->setVariable('idPage', $this->idPage);
        $this->view->setVariable('renderType', $this->renderType);
        $this->view->setVariable('renderMode', $this->renderMode);

        return $this->view;
    }
}
