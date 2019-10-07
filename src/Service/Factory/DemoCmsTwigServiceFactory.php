<?php

/**
 * Melis Technology (http://www.melistechnology.com)
 *
 * @copyright Copyright (c) 2019 Melis Technology (http://www.melistechnology.com)
 *
 */

namespace MelisDemoCmsTwig\Service\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;
use MelisDemoCmsTwig\Service\DemoCmsTwigService;

/**
 * MelisDemoCms Services Factory
 */
class DemoCmsTwigServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sl)
    {
        $demoCmsService = new DemoCmsTwigService();
        $demoCmsService->setServiceLocator($sl);
        return $demoCmsService;
    }
}