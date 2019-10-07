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
use MelisDemoCmsTwig\Service\SetupDemoCmsTwigService;

/**
 * Setup DemoCms Services Factory
 */
class SetupDemoCmsTwigServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sl)
    {
        $setupDemoCmsService = new SetupDemoCmsTwigService();
        $setupDemoCmsService->setServiceLocator($sl);
        return $setupDemoCmsService;
    }
}
