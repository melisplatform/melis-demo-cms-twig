<?php

/**
 * Melis Technology (http://www.melistechnology.com)
 *
 * @copyright Copyright (c) 2019 Melis Technology (http://www.melistechnology.com)
 *
 */

namespace MelisDemoCmsTwig\Listener;

use Laminas\EventManager\EventManagerInterface;
use Laminas\EventManager\ListenerAggregateInterface;

class SetupDemoCmsTwigListener implements ListenerAggregateInterface
{
    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $sharedEvents = $events->getSharedManager();
        
        $callBackHandler = $sharedEvents->attach(
            'MelisInstaller',
            'melis_install_last_process_start',
            function ($e) {
                $sm = $e->getTarget()->getServiceManager();
                $params = $e->getParams();
                $environment = $params['environments'];
                $environmentName = $environment['default_environment']['wildcard']['sdom_env'];

                // DemoCms Service that process the DemoCms pre-defined datas
                $setupSrv = $sm->get('SetupDemoCmsTwigService');
                $setupSrv->setup($environmentName);
            },
            -2000);

        $this->listeners[] = $callBackHandler;
    }

    public function detach(EventManagerInterface $events)
    {
        foreach ($this->listeners as $index => $listener) {
            if ($events->detach($listener)) {
                unset($this->listeners[$index]);
            }
        }
    }
}