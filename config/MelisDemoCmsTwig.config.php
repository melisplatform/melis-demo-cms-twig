<?php

return [
    'site' => [
        'MelisDemoCmsTwig' => [
            1 => [
                'en_EN' => [
                    //homepage id
                    'homePageId' => 1,
                    // Submenu limit
                    'sub_menu_limit' => null,
                    // News Page Id
                    'news_menu_page_id' => 2,
                    // News Details Page Id
                    'news_details_page_id' => 3,
                    // Testimonial parent id
                    'testimonial_id' => 6,
                    // Homepage header slider
                    'homepage_header_slider' => 1,
                    // Aboutus slider
                    'aboutus_slider' => '%about_us_slider%',
                    // Search results page
                    'search_result_page_id' => 5,
                ],
            ],
            'allSites' => [
                // General cross site config
                // No page ids here
                /**
                 * Required Modules for installation,
                 * to trigger services that needed to install the Melis Demo CMS Twig
                 * and to avoid deselect from selecting modules during installations.
                 */
                'required_modules' => [
                    'MelisCmsNews',
                    'MelisCmsSlider',
                    'MelisCmsTwig',
                ],
            ],
        ],
    ],
];
