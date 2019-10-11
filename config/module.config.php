<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return [
    'router' => [
        'routes' => [
            'MelisDemoCmsTwig-pageids' => [
                'type' => 'regex',
                'options' => [
                    'regex' => '.*/MelisDemoCmsTwig/.*/id/(?<idpage>[0-9]+)',
                    'defaults' => [
                        'controller' => 'MelisDemoCmsTwig\Controller\Index',
                        'action' => 'indexsite',
                    ],
                    'spec' => '%idpage',
                ],
            ],
            'MelisDemoCmsTwig-homepage' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        'controller' => 'MelisFront\Controller\Index',
                        'action' => 'index',
                        'renderType' => 'melis_zf2_mvc',
                        'renderMode' => 'front',
                        'preview' => false,
                        'idpage' => 1,
                    ],
                ],
            ],
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'applicationMelisDemoCmsTwig' => [
                'type' => 'Literal',
                'options' => [
                    'route' => 'MelisDemoCmsTwig',
                    'defaults' => [
                        '__NAMESPACE__' => 'MelisDemoCmsTwig\Controller'
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'default' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => '/[:controller[/:action]]',
                            'constraints' => [
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ],
                            'defaults' => [
//
                            ],
                        ],
                    ],
                    'setup' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => '/setup',
                            'defaults' => [
                                'controller' => 'MelisDemoCmsTwig\Controller\MelisSetup',
                                'action' => 'setupForm',
                            ],
                        ],
                    ],
                ],
            ],
            'melis-backoffice' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/melis[/]',
                ],
                'child_routes' => [
                    'application-MelisDemoCmsTwig' => [
                        'type' => 'Literal',
                        'options' => [
                            'route' => 'MelisDemoCmsTwig',
                            'defaults' => [
                                '__NAMESPACE__' => 'MelisDemoCmsTwig\Controller',
                            ],
                        ],
                        'may_terminate' => true,
                        'child_routes' => [
                            'default' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => '/[:controller[/:action]]',
                                    'constraints' => [
                                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ],
                                    'defaults' => [
                                        '__NAMESPACE__' => 'MelisDemoCmsTwig\Controller',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'service_manager' => [
        'abstract_factories' => [
            \Zend\Cache\Service\StorageCacheAbstractServiceFactory::class,
            \Zend\Log\LoggerAbstractServiceFactory::class,
        ],
        'aliases' => [
            'translator' => 'MvcTranslator',
            'MelisPlatformTable' => \MelisDemoCmsTwig\Model\Tables\MelisPlatformTable::class,
        ],
        'factories' => [
            'DemoCmsTwigService' => \MelisDemoCmsTwig\Service\Factory\DemoCmsTwigServiceFactory::class,
            'SetupDemoCmsTwigService' => MelisDemoCmsTwig\Service\Factory\SetupDemoCmsTwigServiceFactory::class,

            'MelisDemoCmsTwig\Model\Tables\MelisPlatformTable' => \MelisDemoCmsTwig\Model\Tables\Factory\MelisPlatformTableFactory::class,
        ],
    ],
    'translator' => [

    ],
    'controllers' => [
        'invokables' => [
            'MelisDemoCmsTwig\Controller\Base' => \MelisDemoCmsTwig\Controller\BaseController::class,
            'MelisDemoCmsTwig\Controller\Home' => \MelisDemoCmsTwig\Controller\HomeController::class,
            'MelisDemoCmsTwig\Controller\News' => \MelisDemoCmsTwig\Controller\NewsController::class,
            'MelisDemoCmsTwig\Controller\Search' => \MelisDemoCmsTwig\Controller\SearchController::class,
            'MelisDemoCmsTwig\Controller\MelisSetupPostDownload' => \MelisDemoCmsTwig\Controller\MelisSetupPostDownloadController::class,
        ],
    ],
    'view_helpers' => [
        'invokables' => [
            'DemoSiteFieldCollection' => \MelisDemoCmsTwig\Form\View\Helper\DemoSiteFieldCollection::class,
            'DemoSiteFieldRow' => \MelisDemoCmsTwig\Form\View\Helper\DemoSiteFieldRow::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'controller_map' => [
            'MelisDemoCmsTwig' => true,
        ],
        'template_map' => [
            // Zend default layout
            'layout/layout' => __DIR__ . '/../view/layout/defaultTwigLayout.twig',
            // Main layout
            'MelisDemoCmsTwig/defaultLayout' => __DIR__ . '/../view/layout/defaultLayout.phtml',
            'MelisDemoCmsTwig/defaultTwigLayout' => __DIR__ . '/../view/layout/defaultTwigLayout.twig',
            'layout/errorLayout' => __DIR__ . '/../view/layout/errorLayout.phtml',
            // Errors layout
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
            // Plugins layout
            'MelisDemoCmsTwig/plugin/menu' => __DIR__ . '/../view/plugins/menu.phtml',
            'MelisDemoCmsTwig/plugin/breadcrumb' => __DIR__ . '/../view/plugins/breadcrumb.phtml',
            'MelisDemoCmsTwig/plugin/contactus' => __DIR__ . '/../view/plugins/contactus.phtml',
            'MelisDemoCmsTwig/plugin/homepage-slider' => __DIR__ . '/../view/plugins/homepage-slider.phtml',
            'MelisDemoCmsTwig/plugin/latest-news' => __DIR__ . '/../view/plugins/latest-news.phtml',
            'MelisDemoCmsTwig/plugin/testimonial-slider' => __DIR__ . '/../view/plugins/testimonial-slider.phtml',
            'MelisDemoCmsTwig/plugin/news-list' => __DIR__ . '/../view/plugins/news-list.phtml',
            'MelisDemoCmsTwig/plugin/list-paginator' => __DIR__ . '/../view/plugins/list-paginator.phtml',
            'MelisDemoCmsTwig/plugin/news-details' => __DIR__ . '/../view/plugins/news-details.phtml',
            'MelisDemoCmsTwig/plugin/aboutus-slider' => __DIR__ . '/../view/plugins/aboutus-slider.phtml',
            'MelisDemoCmsTwig/plugin/search-results' => __DIR__ . '/../view/plugins/search-results.phtml',
            'MelisDemoCmsTwig/plugin/gdpr-banner' => __DIR__ . '/../view/plugins/gdpr-banner.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
