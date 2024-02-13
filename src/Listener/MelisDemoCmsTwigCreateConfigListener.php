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

class MelisDemoCmsTwigCreateConfigListener implements ListenerAggregateInterface
{
    protected $map = [];
    public $listeners = [];

    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $sharedEvents = $events->getSharedManager();

        $callBackHandler = $sharedEvents->attach(
            '*',
            'melis_marketplace_site_install_results',
            function ($e) {
                $sm = $e->getTarget()->getServiceManager();

                $pages = $this->createMap((array)$e->getParams()['pages']);
                /** @var \MelisAssetManager\Service\MelisModulesService $moduleService */
                $moduleService = $sm->get('MelisAssetManagerModulesService');
                /** @var \MelisMarketPlace\Service\MelisMarketPlaceSiteService $melisMarketPlaceSiteSvc */
                $melisMarketPlaceSiteSvc = $sm->get('MelisMarketPlaceSiteService');
                $path = $moduleService->getModulePath('MelisDemoCmsTwig');

                $siteId = (int)$e->getParams()['site_id'];
                $homePageid = (int)$e->getParams()['site_home_page_id'];

//                $aboutUsPageId = (int)$pages['About us'];

                $melisDemoConfig = file_get_contents($path . '/config/MelisDemoCmsTwig.config.stub');
                $melisDemoConfig = str_replace(
                    [
                        '\'%site_id%\'',
                        '\'%site_home_page_id%\'',
                        '\'%news_page_id%\'',
                        '\'%news_details_id%\'',
                        '\'%testimonial%\'',
//                        '\'%search_results_page_id%\''
                    ],
                    [
                        $siteId,
                        $homePageid,
                        $pages['News'],
                        $pages['News Details'],
                        $pages['Testimonials'],
//                        $pages['Search results']
                    ],
                    $melisDemoConfig
                );

                unlink($path . '/config/MelisDemoCmsTwig.config.php');
                file_put_contents($path . '/config/MelisDemoCmsTwig.config.php', $melisDemoConfig);

            },
            -10000);

        $this->listeners[] = $callBackHandler;

        $callBackHandler = $sharedEvents->attach(
            '*', 'melis_marketplace_site_install_inserted_id',
            function ($e) {


                $param = $e->getParams();

                if (!empty($param['table_name'])) {
                    if ($param['table_name'] == 'melis_cms_slider') {

                        $sm = $e->getTarget()->getServiceManager();
                        $moduleService = $sm->get('MelisAssetManagerModulesService');
                        $path = $moduleService->getModulePath('MelisDemoCmsTwig');

                        $melisDemoConfig = file_get_contents($path . '/config/MelisDemoCmsTwig.config.stub');

                        if (strpos($param['sql'], 'Homepage Header Slider')) {
                            $melisDemoConfig = str_replace('\'%homepage_slider_id%\'', $param['id'], $melisDemoConfig);
                        }

                        if (strpos($param['sql'], 'About us - Our Team')) {
                            $melisDemoConfig = str_replace('\'%about_us_slider%\'', $param['id'], $melisDemoConfig);
                        }

                        file_put_contents($path . '/config/MelisDemoCmsTwig.config.stub', $melisDemoConfig);
                    }
                }
            });

        $callBackHandler = $sharedEvents->attach(
            '*', 'melis_marketplace_site_update_page_404',
            function ($e) {

                $params = $e->getParams();

                /** @var \MelisEngine\Model\Tables\MelisSite404Table $site404 */
                $sm = $e->getTarget()->getServiceManager();
                $site404 = $sm->get('MelisEngineTableSite404');

                $site = $site404->getEntryByField('s404_site_id', $params['params']['siteId'])->current();
                $site404Id = (!empty($site)) ? $site->s404_id : null;
                /**
                 * Save the site 404 page od
                 */
                $siteData = [
                    's404_site_id' => $params['params']['siteId'],
                    's404_page_id' => $params['params']['pageId'],
                ];

                $site404->save($siteData, $site404Id);

                // $logPath = $_SERVER['DOCUMENT_ROOT'] . '/../cache/test.log';
                // file_put_contents($logPath, print_r($params, true) . PHP_EOL . PHP_EOL, FILE_APPEND);
                
            });

        $this->listeners[] = $callBackHandler;
    }

    protected function createMap(array $array)
    {
        if (isset($array['children'])) {
            $this->createMap($array['children']);
        } else {
            foreach ($array as $idx => $data) {
                if ($data['page_name']) {
                    $this->map[$data['page_name']] = $data['page_id'];
                    if (isset($data['children'])) {
                        $this->createMap($data['children']);
                    }
                }
            }
        }

        return $this->map;
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
