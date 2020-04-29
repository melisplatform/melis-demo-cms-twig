<?php

/**
 * Melis Technology (http://www.melistechnology.com)
 *
 * @copyright Copyright (c) 2019 Melis Technology (http://www.melistechnology.com)
 *
 */

namespace MelisDemoCmsTwig\Controller;

use MelisDemoCmsTwig\Controller\BaseController;
use Laminas\View\Model\JsonModel;
use Laminas\View\Model\ViewModel;

class HomeController extends BaseController
{
    public function indexAction()
    {
        /** get the site config */
        $siteConfigSrv = $this->getServiceManager()->get('MelisSiteConfigService');

        /** Generating Homepage header Slider using MelisCmsSliderShowSliderPlugin Plugin */
        $showSliderParameters = array(
            'template_path' => 'MelisDemoCmsTwig/plugin/homepage-slider',
            'id' => 'showSliderHomepage',
            'pageId' => $this->idPage,
            'sliderId' => $siteConfigSrv->getSiteConfigByKey('homepage_header_slider', $this->idPage),
        );

        $this->view->setVariable('homePageSliderParameters', $showSliderParameters);

        /** Generating Homepage Latest News slider using MelisCmsNewsLatestNewsPlugin Plugin */
        $latestNewsParameters = array(
            'template_path' => 'MelisDemoCmsTwig/plugin/latest-news',
            'pageIdNews' => $siteConfigSrv->getSiteConfigByKey('news_details_page_id', $this->idPage),
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
            'template_path' => 'MelisDemoCmsTwig/plugin/testimonial-slider',
            'pageId' => $this->idPage,
            'pageIdFolder' => $siteConfigSrv->getSiteConfigByKey('testimonial_id', $this->idPage),
            'renderMode' => $this->renderMode,
        );
        $this->view->setVariable('listParameters', $menuParameters);

        /**
         * Displaying a GDPR/Cookie banner using MelisGdprBanner plugin
         * @var \MelisFront\Controller\Plugin\MelisFrontGdprBannerPlugin $gdprBannerPlugin
         */
        $this->view->setVariable('gdprBannerParameters', ['template_path' => 'MelisDemoCmsTwig/plugin/gdpr-banner']);

        $this->view->setVariable('idPage', $this->idPage);
        $this->view->setVariable('renderType', $this->renderType);
        $this->view->setVariable('renderMode', $this->renderMode);

        return $this->view;
    }
}
