<?php
return [
    'plugins' => [
        'melisfront' => [
            'plugins' => [
                'MelisFrontMenuPlugin' => [
                    'front' => [
                        'template_path' => ['MelisDemoCmsTwig/plugin/menu'],
                    ],
                ],
                'MelisFrontBreadcrumbPlugin' => [
                    'front' => [
                        'template_path' => ['MelisDemoCmsTwig/plugin/breadcrumb'],
                    ],
                ],
                'MelisFrontShowListFromFolderPlugin' => [
                    'front' => [
                        'template_path' => ['MelisDemoCmsTwig/plugin/testimonial-slider'],
                        'files' => [
                            'js' => [
                                '/MelisDemoCmsTwig/js/MelisPlugins/MelisDemoCmsTwig.MelisFrontShowListFromFolderPlugin.init.js',
                            ],
                        ],
                    ],
                ],
//                'MelisFrontSearchResultsPlugin' => [
//                    'front' => [
//                        'template_path' => ['MelisDemoCmsTwig/plugin/search-results'],
//                    ],
//                ],

                'MelisFrontGdprBannerPlugin' => [
                    'front' => [
                        'template_path' => ['MelisDemoCmsTwig/plugin/gdpr-banner'],
                    ],
                ],
            ],
        ],
        'meliscmsnews' => [
            'plugins' => [
                'MelisCmsNewsListNewsPlugin' => [
                    'front' => [
                        'template_path' => ['MelisDemoCmsTwig/plugin/news-list'],
                    ],
                ],
                'MelisCmsNewsShowNewsPlugin' => [
                    'front' => [
                        'template_path' => ['MelisDemoCmsTwig/plugin/news-details'],
                    ],
                ],
                'MelisCmsNewsLatestNewsPlugin' => [
                    'front' => [
                        'template_path' => ['MelisDemoCmsTwig/plugin/latest-news'],
                        'files' => [
                            'js' => [
                                '/MelisDemoCmsTwig/js/MelisPlugins/MelisDemoCmsTwig.MelisCmsNewsLatestNewsPlugin.init.js',
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'meliscmsslider' => [
            'plugins' => [
                'MelisCmsSliderShowSliderPlugin' => [
                    'front' => [
                        'template_path' => [
                            'MelisDemoCmsTwig/plugin/homepage-slider',
                            'MelisDemoCmsTwig/plugin/aboutus-slider',
                        ],
                        'files' => [
                            'js' => [
                                '/MelisDemoCmsTwig/js/MelisPlugins/MelisDemoCmsTwig.MelisCmsSliderShowSliderPlugin.init.js',
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'meliscmsprospects' => [
            'plugins' => [
                'MelisCmsProspectsShowFormPlugin' => [
                    'front' => [
                        'template_path' => ['MelisDemoCmsTwig/plugin/contactus'],
                    ],
                ],
            ],
        ],
    ],
];
