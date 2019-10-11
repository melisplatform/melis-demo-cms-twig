<?php

/**
 * Melis Technology (http://www.melistechnology.com)
 *
 * @copyright Copyright (c) 201 Melis Technology (http://www.melistechnology.com)
 *
 */

namespace MelisDemoCmsTwig\Controller;

class NewsController extends BaseController
{
    /**
     * This method will render the list of news
     *
     * @return \Zend\View\Model\ViewModel
     */
    public function listAction()
    {
        /**
         * get the service config
         */
        $siteConfigSrv = $this->getServiceLocator()->get('MelisSiteConfigService');
        /**
         * Listing News using MelisCmsNewsListNewsPlugin
         */
        $listNewsPluginView = $this->MelisCmsNewsListNewsPlugin();
        $listNewsParameters = [
            'template_path' => 'MelisDemoCmsTwig/plugin/news-list',
            'pageId' => $this->idPage,
            'pageIdNews' => $siteConfigSrv->getSiteConfigByKey('news_details_page_id', $this->idPage),
            'pagination' => [
                'nbPerPage' => 6
            ],
            'filter' => [
                'column' => 'cnews_publish_date',
                'order' => 'DESC',
                'unpublish_filter' => true,
                'site_id' => $siteConfigSrv->getSiteConfigByKey('site_id', $this->idPage),
            ],
        ];

        // add generated view to children views for displaying it in the contact view
        $this->view->addChild($listNewsPluginView->render($listNewsParameters), 'listNews');

        $this->view->setVariable('renderMode', $this->renderMode);
        $this->view->setVariable('idPage', $this->idPage);

        return $this->view;
    }

    /**
     * This methos will render the Details of a single News
     *
     * @return \Zend\View\Model\ViewModel
     */
    public function detailsAction()
    {
        /**
         * get the service config
         */
        $siteConfigSrv = $this->getServiceLocator()->get('MelisSiteConfigService');

        $dateMax = date("Y-m-d H:i:s", strtotime("now"));
        $listNewsPluginView = $this->MelisCmsNewsShowNewsPlugin();
        $listNewsParameters = [
            'id' => 'newsDetails',
            'template_path' => 'MelisDemoCmsTwig/plugin/news-details',
        ];
        // add generated view to children views for displaying it in the contact view
        $this->view->addChild($listNewsPluginView->render($listNewsParameters), 'newsDetails');

        /**
         * Generating Homepage Latest News slider using MelisCmsNewsLatestNewsPlugin Plugin
         */
        $latestNewsPluginView = $this->MelisCmsNewsLatestNewsPlugin();
        $latestNewsParameters = [
            'template_path' => 'MelisDemoCmsTwig/plugin/latest-news',
            'pageIdNews' => $siteConfigSrv->getSiteConfigByKey('news_details_page_id', $this->idPage),
            'filter' => [
                'column' => 'cnews_publish_date',
                'order' => 'DESC',
                'limit' => 10,
                'unpublish_filter' => true,
                'date_max' => null,
                'site_id' => $siteConfigSrv->getSiteConfigByKey('site_id', $this->idPage),
            ],
        ];
        // add generated view to children views for displaying it in the contact view
        $this->view->addChild($latestNewsPluginView->render($latestNewsParameters), 'latestNews');

        $this->view->setVariable('renderMode', $this->renderMode);
        $this->view->setVariable('idPage', $this->idPage);

        return $this->view;
    }
}