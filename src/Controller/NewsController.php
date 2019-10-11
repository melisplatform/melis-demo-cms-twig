<?php

/**
 * Melis Technology (http://www.melistechnology.com)
 *
 * @copyright Copyright (c) 2019 Melis Technology (http://www.melistechnology.com)
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
        /** Listing News using MelisCmsNewsListNewsPlugin */
        $siteConfigSrv = $this->getServiceLocator()->get('MelisSiteConfigService');
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

        $this->view->setVariable('listNewsParameters', $listNewsParameters);
        $this->view->setVariable('renderMode', $this->renderMode);
        $this->view->setVariable('idPage', $this->idPage);

        return $this->view;
    }

    /**
     * This method will render the Details of a single News
     *
     * @return \Zend\View\Model\ViewModel
     */
    public function detailsAction()
    {
        $siteConfigSrv = $this->getServiceLocator()->get('MelisSiteConfigService');

        $newsDetails = [
            'id' => 'newsDetails',
            'template_path' => 'MelisDemoCmsTwig/plugin/news-details',
        ];

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

        $this->view->setVariable('newsDetails', $newsDetails);
        $this->view->setVariable('latestNews', $latestNewsParameters);
        $this->view->setVariable('renderMode', $this->renderMode);
        $this->view->setVariable('idPage', $this->idPage);

        return $this->view;
    }
}