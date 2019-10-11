<?php

/**
 * Melis Technology (http://www.melistechnology.com)
 *
 * @copyright Copyright (c) 2019 Melis Technology (http://www.melistechnology.com)
 *
 */

namespace MelisDemoCmsTwig\Controller;

use MelisDemoCmsTwig\Controller\BaseController;

class TestimonialController extends BaseController
{
    public function testimonialAction()
    {
        $this->view->setVariable('idPage', $this->idPage);
        $this->view->setVariable('renderType', $this->renderType);
        $this->view->setVariable('renderMode', $this->renderMode);

        return $this->view;
    }
}