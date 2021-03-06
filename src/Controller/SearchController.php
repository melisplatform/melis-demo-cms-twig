<?php

/**
 * Melis Technology (http://www.melistechnology.com)
 *
 * @copyright Copyright (c) 2019 Melis Technology (http://www.melistechnology.com)
 *
 */

namespace MelisDemoCmsTwig\Controller;


use MelisDemoCmsTwig\Controller\BaseController;

class SearchController extends BaseController
{
    public function resultsAction()
    {
        // Getting the Search value from query string and added to the layout variable
        $search = $this->params()->fromQuery('keyword', null);
        $this->layout()->setVariable('search', $search);
        /**
         * Search result using MelisFrontSearchResultsPlugin
         */
        $searchResults = $this->MelisFrontSearchResultsPlugin();
        $searchParameters = array(
            'template_path' => 'MelisDemoCmsTwig/plugin/search-results',
            'pageId' => $this->idPage,
            'siteModuleName' => 'melis-demo-cms-twig',
            'pagination' => array(
                'nbPerPage' => 10,
                'nbPageBeforeAfter' => 3
            ),
        );
        // add generated view to children views for displaying it in the contact view
        $this->view->addChild($searchResults->render($searchParameters), 'searchresults');

        $this->view->setVariable('renderMode', $this->renderMode);
        $this->view->setVariable('idPage', $this->idPage);

        return $this->view;
    }
}