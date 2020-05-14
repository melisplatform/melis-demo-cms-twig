<?php

namespace MelisDemoCmsTwig;

use MelisMarketPlace\Support\MelisMarketPlace as MarketPlace;
use MelisMarketPlace\Support\MelisMarketPlaceCmsTables as Melis;
use MelisMarketPlace\Support\MelisMarketPlaceSiteInstall as Site;

return [
    'plugins' => [
        __NAMESPACE__ => [
            Site::DOWNLOAD => [
                Site::CONFIG => [
                    'id' => 'id_' . __NAMESPACE__,
                    Melis::CMS_TOTAL_PAGE => 10,
                ],
                MarketPlace::FORM => [
                    'melis_demo_cms_twig_setup_download_form' => [
                        'attributes' => [
                            'name' => 'melis_demo_cms_twig_setup_download_form',
                            'id' => 'melis_demo_cms_twig_setup_download_form',
                            'method' => 'POST',
                            'action' => '',
                        ],
                        'hydrator' => \Laminas\Hydrator\ArraySerializable::class,
                        'elements' => [
                            [
                                'spec' => [
                                    'name' => 'scheme',
                                    'type' => \Laminas\Form\Element\Select::class,
                                    'options' => [
                                        'label' => 'tr_site_demo_cms_tool_site_scheme',
                                        'tooltip' => 'tr_site_demo_cms_tool_site_scheme tooltip',
                                        'value_options' => [
                                            'http' => 'http://',
                                            'https' => 'https://',
                                        ],
                                    ],
                                    'attributes' => [
                                        'id' => 'scheme',
                                        'value' => '',
                                        'required' => 'required',
                                        'text-required' => '*',
                                        'class' => 'form-control',

                                    ],
                                ],
                            ],
                            [
                                'spec' => [
                                    'name' => 'domain',
                                    'type' => \Laminas\Form\Element\Text::class,
                                    'options' => [
                                        'label' => 'tr_site_demo_cms_tool_site_domain',
                                        'tooltip' => 'tr_site_demo_cms_tool_site_domain tooltip',
                                    ],
                                    'attributes' => [
                                        'id' => 'domain',
                                        'value' => $_SERVER['HTTP_HOST'],
                                        'required' => 'required',
                                        'placeholder' => 'www.example.com',
                                        'class' => 'form-control',
                                        'text-required' => '*',
                                    ],
                                ],
                            ],
                            [
                                'spec' => [
                                    'name' => 'name',
                                    'type' => \Laminas\Form\Element\Text::class,
                                    'options' => [
                                        'label' => 'tr_site_demo_cms_name',
                                        'tooltip' => 'tr_site_demo_cms_name_tooltip',
                                    ],
                                    'attributes' => [
                                        'id' => 'name',
                                        'value' => 'Melis Demo CMS Twig',
                                        'required' => 'required',
                                        'placeholder' => 'My Site Name',
                                        'class' => 'form-control',
                                        'text-required' => '*',
                                    ],
                                ],
                            ],
                        ], // end elements
                        'input_filter' => [
                            'scheme' => [
                                'name' => 'scheme',
                                'required' => true,
                                'validators' => [
                                    [
                                        'name' => 'InArray',
                                        'options' => [
                                            'haystack' => ['http', 'https'],
                                            'messages' => [
                                                \Laminas\Validator\InArray::NOT_IN_ARRAY => 'tr_site_demo_cms_tool_site_scheme_invalid_selection',
                                            ],
                                        ],
                                    ],
                                    [
                                        'name' => 'NotEmpty',
                                        'options' => [
                                            'messages' => [
                                                \Laminas\Validator\NotEmpty::IS_EMPTY => 'tr_melis_installer_tool_site_scheme_error_empty',
                                            ],
                                        ],
                                    ],
                                ],
                                'filters' => [
                                ],
                            ],
                            'domain' => [
                                'name' => 'domain',
                                'required' => true,
                                'validators' => [
                                    [
                                        'name' => 'StringLength',
                                        'options' => [
                                            'encoding' => 'UTF-8',
                                            'max' => 50,
                                            'messages' => [
                                                \Laminas\Validator\StringLength::TOO_LONG => 'tr_melis_installer_tool_site_domain_error_long',
                                            ],
                                        ],
                                    ],
                                    [
                                        'name' => 'NotEmpty',
                                        'options' => [
                                            'messages' => [
                                                \Laminas\Validator\NotEmpty::IS_EMPTY => 'tr_melis_installer_tool_site_domain_error_empty',
                                            ],
                                        ],
                                    ],
                                ],
                                'filters' => [
                                    ['name' => 'StripTags'],
                                    ['name' => 'StringTrim'],
                                ],
                            ],
                            'name' => [
                                'name' => 'name',
                                'required' => true,
                                'validators' => [
                                    [
                                        'name' => 'StringLength',
                                        'options' => [
                                            'encoding' => 'UTF-8',
                                            'max' => 50,
                                            'messages' => [
                                                \Laminas\Validator\StringLength::TOO_LONG => 'tr_site_demo_cms_tool_site_name_error_long',
                                            ],
                                        ],
                                    ],
                                    [
                                        'name' => 'NotEmpty',
                                        'options' => [
                                            'messages' => [
                                                \Laminas\Validator\NotEmpty::IS_EMPTY => 'tr_melis_installer_tool_site_name_error_empty',
                                            ],
                                        ],
                                    ],
                                ],
                                'filters' => [
                                    ['name' => 'StripTags'],
                                    ['name' => 'StringTrim'],
                                ],
                            ],
                        ], // end input_filter
                    ],
                ],
                Site::DATA => [
                    // this should correspond to the table name
                    // <editor-fold desc="CMS_TEMPLATE">
                    Melis::CMS_TEMPLATE => [
                        [
                            Melis::PRIMARY_KEY => 'tpl_id',
                            'tpl_id' => Melis::CURRENT_TEMPLATE_ID,
                            'tpl_site_id' => Melis::CMS_SITE_ID,
                            'tpl_name' => 'Home',
                            'tpl_type' => 'TWG',
                            'tpl_zf2_website_folder' => __NAMESPACE__,
                            'tpl_zf2_layout' => 'defaultTwigLayout',
                            'tpl_zf2_controller' => 'Home',
                            'tpl_zf2_action' => 'index',
                            'tpl_creation_date' => date('Y-m-d H:i:s'),
                            Site::THEN => [Site::UPDATE_CURRENT_TEMPLATE_ID],
                        ],
                        [
                            Melis::PRIMARY_KEY => 'tpl_id',
                            'tpl_id' => Melis::CURRENT_TEMPLATE_ID,
                            'tpl_site_id' => Melis::CMS_SITE_ID,
                            'tpl_name' => 'News List',
                            'tpl_type' => 'TWG',
                            'tpl_zf2_website_folder' => __NAMESPACE__,
                            'tpl_zf2_layout' => 'defaultTwigLayout',
                            'tpl_zf2_controller' => 'News',
                            'tpl_zf2_action' => 'list',
                            'tpl_creation_date' => date('Y-m-d H:i:s'),
                            Site::THEN => [Site::UPDATE_CURRENT_TEMPLATE_ID],
                        ],
                        [
                            Melis::PRIMARY_KEY => 'tpl_id',
                            'tpl_id' => Melis::CURRENT_TEMPLATE_ID,
                            'tpl_site_id' => Melis::CMS_SITE_ID,
                            'tpl_name' => 'News Details',
                            'tpl_type' => 'TWG',
                            'tpl_zf2_website_folder' => __NAMESPACE__,
                            'tpl_zf2_layout' => 'defaultTwigLayout',
                            'tpl_zf2_controller' => 'News',
                            'tpl_zf2_action' => 'details',
                            'tpl_creation_date' => date('Y-m-d H:i:s'),
                            Site::THEN => [Site::UPDATE_CURRENT_TEMPLATE_ID],
                        ],
                        [
                            Melis::PRIMARY_KEY => 'tpl_id',
                            'tpl_id' => Melis::CURRENT_TEMPLATE_ID,
                            'tpl_site_id' => Melis::CMS_SITE_ID,
                            'tpl_name' => 'Testimonial',
                            'tpl_type' => 'ZF2',
                            'tpl_zf2_website_folder' => __NAMESPACE__,
                            'tpl_zf2_layout' => 'defaultLayout',
                            'tpl_zf2_controller' => 'Testimonial',
                            'tpl_zf2_action' => 'testimonial',
                            'tpl_creation_date' => date('Y-m-d H:i:s'),
                            Site::THEN => [Site::UPDATE_CURRENT_TEMPLATE_ID],
                        ],
//                        [
//                            Melis::PRIMARY_KEY => 'tpl_id',
//                            'tpl_id' => Melis::CURRENT_TEMPLATE_ID,
//                            'tpl_site_id' => Melis::CMS_SITE_ID,
//                            'tpl_name' => 'Search',
//                            'tpl_type' => 'ZF2',
//                            'tpl_zf2_website_folder' => __NAMESPACE__,
//                            'tpl_zf2_layout' => 'defaultLayout',
//                            'tpl_zf2_controller' => 'Search',
//                            'tpl_zf2_action' => 'results',
//                            'tpl_creation_date' => date('Y-m-d H:i:s'),
//                            Site::THEN => [Site::UPDATE_CURRENT_TEMPLATE_ID],
//                        ],
                        [
                            Melis::PRIMARY_KEY => 'tpl_id',
                            'tpl_id' => Melis::CURRENT_TEMPLATE_ID,
                            'tpl_site_id' => Melis::CMS_SITE_ID,
                            'tpl_name' => '404',
                            'tpl_type' => 'TWG',
                            'tpl_zf2_website_folder' => __NAMESPACE__,
                            'tpl_zf2_layout' => 'defaultTwigLayout',
                            'tpl_zf2_controller' => 'Page404',
                            'tpl_zf2_action' => 'index',
                            'tpl_creation_date' => date('Y-m-d H:i:s'),
                            Site::THEN => [Site::UPDATE_CURRENT_TEMPLATE_ID],
                        ],
                    ],
                    // </editor-fold>

                    // <editor-fold desc="CMS_PAGE_TREE">
                    Melis::CMS_PAGE_TREE => [
                        // <HomePage>
                        [
                            // Home Page
                            Melis::PRIMARY_KEY => 'tree_page_id',
                            'tree_page_id' => Melis::CMS_SITE_HOME_PAGE_ID,
                            'tree_father_page_id' => Melis::CMS_SITE_DEFAULT_PARENT_ID,
                            'tree_page_order' => 1,
                            Melis::RELATION => [
                                Melis::CMS_PAGE_PUBLISHED => [
                                    [
                                        Melis::PRIMARY_KEY => 'page_id',
                                        'page_id' => Melis::FOREIGN_KEY,
                                        'page_type' => 'SITE',
                                        'page_status' => '1',
                                        'page_menu' => 'LINK',
                                        'page_name' => 'Melis Demo CMS Twig',
                                        'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Home']],
                                        'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="contactform_001"><![CDATA[Your name *]]></melisTag>   <melisTag id="contactform_002"><![CDATA[Your email address *]]></melisTag>  <melisTag id="contactform_003"><![CDATA[Subject]]></melisTag>   <melisTag id="contactform_004"><![CDATA[Message *]]></melisTag> <melisTag id="contacttext_001"><![CDATA[Get in <strong>touch</strong>]]></melisTag> <melisTag id="contacttext_002"><![CDATA[Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus.]]></melisTag> <melisTag id="contacttext_003"><![CDATA[The <strong>Office</strong>]]></melisTag>   <melisTag id="contacttext_004"><![CDATA[<ul class="list-unstyled">              <li><i class="icon icon-map-marker"></i> <strong>Address:</strong> 1234 Street Name, City Name, United States</li>              <li><i class="icon icon-phone"></i> <strong>Phone:</strong> (123) 456-7890</li>             <li><i class="icon icon-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">mail@example.com</a></li>          </ul>]]></melisTag> <melisTag id="footer_title_1"><![CDATA[Contact US]]></melisTag> <melisTag id="footer_text_1"><![CDATA[<ul><li><div class="contact-icon"><i class="zmdi zmdi-pin-drop"></i></div><div class="contact-text"><p><span>4, rue du Dahomey<br />75011 Paris, France</span><span><br /></span></p></div></li><li><div class="contact-icon"><i class="zmdi zmdi-email-open"></i></div><div class="contact-text"><p><span>contact@melistechnology.com</span></p></div></li><li><div class="contact-icon"><i class="zmdi zmdi-phone-paused"></i></div><div class="contact-text"><p><span>(+33) 972 386 280</span><span><br /></span></p></div></li></ul>]]></melisTag>    <melisTag id="footer_title_2"><![CDATA[menu]]></melisTag>   <melisTag id="footer_text_2"><![CDATA[<ul><li><a href="/">Home</a></li><li><a href="#">News</a></li><li><a href="#">Our designs</a></li><li><a href="#">About us</a></li><li><a href="#">Contact us</a></li></ul>]]></melisTag>  <melisTag id="footer_title_3"><![CDATA[InstaGram]]></melisTag>  <melisTag id="homepage_line_1"><![CDATA[<div class="delivery-service-area ptb-30"><div class="container"><div class="row"><div class="col-md-3 col-sm-6 col-xs-12"><div class="single-service shadow-box text-center"><img src="/MelisDemoCmsTwig/images/icons/live.png" caption="false" data-mce-src="/MelisDemoCmsTwig/images/icons/live.png"><h5>Fashion show live</h5></div></div><div class="col-md-3 col-sm-6 col-xs-12"><div class="single-service shadow-box text-center"><img src="/MelisDemoCmsTwig/images/icons/chat.png" caption="false" data-mce-src="/MelisDemoCmsTwig/images/icons/chat.png"><h5>Chat with a star !</h5></div></div><div class="col-md-3 col-sm-6 col-xs-12"><div class="single-service shadow-box text-center"><img src="/MelisDemoCmsTwig/images/icons/news.png" caption="false" data-mce-src="/MelisDemoCmsTwig/images/icons/news.png"><h5>Last minute news</h5></div></div><div class="col-md-3 col-sm-6 col-xs-12"><div class="single-service shadow-box text-center"><img src="/MelisDemoCmsTwig/images/icons/trending.png" caption="false" data-mce-src="/MelisDemoCmsTwig/images/icons/trending.png"><h5>Ultimate trending</h5></div></div></div></div></div>]]></melisTag>  <melisTag id="homepage_line_2"><![CDATA[<div class="blog-area pb-70"><div class="container"><div class="row"><div class="col-md-12 col-sm-8 col-xs-12"><div class="single-blog-body"><div class="single-blog sb-2 mb-30"><div class="blog-content"><div class="blog-title"><h5 class="uppercase font-bold"><a href="#" data-mce-href="#">The ultimate trend of 2020<br></a><br data-mce-bogus="1"></h5><div class="blog-text"><p>There are many variations of passages of Lorem Ipsum available, but the majority suffered alteration in some form, by injected humour, or random ised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum. <br><br>generators on the Internet tend to repeat predefined chunks as necessary. There are many variations of passages of Lorem Ipsum available the Internet tend to repeat predefined chunks as necessary. There are many variations of passages of Lorem Ipsum available</p></div></div><div class="blockqot mtb-30"><blockquote><p>There are many variations of passages of Lorem Ipsum available, but majority have suffered alteration in some form, by injected humour. There are many variations of passages of Lorem Ipsum available, but the majorit. There are many variations of passages of Lorem Ipsum available, but the majorit.</p></blockquote></div></div></div></div></div></div></div></div>]]></melisTag>  <melisTag id="homepage_news_title"><![CDATA[News]]></melisTag>  <melisTag id="homepage_testimonial_title"><![CDATA[Testimonial]]></melisTag>    <melisTag id="footer_text_3"><![CDATA[<div class="instagrm"><ul><li><a href="#"><img src="/MelisDemoCmsTwig/images/gallery/01.jpg" alt="" /></a></li><li><a href="#"><img src="/MelisDemoCmsTwig/images/gallery/02.jpg" alt="" /></a></li><li><a href="#"><img src="/MelisDemoCmsTwig/images/gallery/03.jpg" alt="" /></a></li><li><a href="#"><img src="/MelisDemoCmsTwig/images/gallery/04.jpg" alt="" /></a></li><li><a href="#"><img src="/MelisDemoCmsTwig/images/gallery/05.jpg" alt="" /></a></li><li><a href="#"><img src="/MelisDemoCmsTwig/images/gallery/06.jpg" alt="" /></a></li></ul></div>]]></melisTag> <melisTag id="footer_title_4"><![CDATA[Social Network]]></melisTag> <melisTag id="homepage_line_3"><![CDATA[<h5 class="uppercase font-bold"><a href="#" data-mce-href="#">Fashion show OBscuria in PARIS this spring 2020 !</a><br data-mce-bogus="1"></h5><div class="blog-text"><p>There are many variations of passages of Lorem Ipsum available, but the majority suffered alteration in some form, by injected humour, or random ised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum. <br><br>generators on the Internet tend to repeat predefined chunks as necessary. There are many variations of passages of Lorem Ipsum available the Internet tend to repeat predefined chunks as necessary. There are many variations of passages of Lorem Ipsum available</p></div>]]></melisTag>    <melisTag id="homepage_line_4"><![CDATA[<h5 class="uppercase font-bold"><a href="#" data-mce-href="#">The flagship product of 2020</a><br data-mce-bogus="1"></h5><div class="blog-text"><p>There are many variations of passages of Lorem Ipsum available, but the majority suffered alteration in some form, by injected humour, or random ised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum. <br><br>generators on the Internet tend to repeat predefined chunks as necessary. There are many variations of passages of Lorem Ipsum available the Internet tend to repeat predefined chunks as necessary. There are many variations of passages of Lorem Ipsum available</p></div>]]></melisTag>   <melisTag id="homepage_line_3_img"><![CDATA[<img class="img-responsive" src="/MelisDemoCmsTwig/images/news/N01.jpg"/>]]></melisTag> <melisTag id="homepage_line_4_img"><![CDATA[<img class="img-responsive" src="/MelisDemoCmsTwig/images/product/shoes/03/03.jpg" caption="false" data-mce-src="/MelisDemoCmsTwig/images/product/shoes/03/03.jpg">]]></melisTag></document>',
                                    ],
                                ],
                                Melis::CMS_PAGE_LANG => [
                                    [
                                        'plang_page_id' =>  Melis::FOREIGN_KEY,
                                        'plang_lang_id' => 1,
                                        'plang_page_id_initial' =>  Melis::FOREIGN_KEY
                                    ]
                                ],
                                Melis::CMS_PAGE_SEO => [
                                    [
                                        Melis::PRIMARY_KEY => 'pseo_id',
                                        'pseo_id' => Melis::FOREIGN_KEY,
                                        'pseo_meta_title' => 'Home'
                                    ]
                                ],
                                // <NewsDetails>
                                Melis::CMS_PAGE_TREE => [
                                    // <NewsPage>
                                    [
                                        // News Page
                                        Melis::PRIMARY_KEY => 'tree_page_id',
                                        'tree_page_id' => Melis::CURRENT_PAGE_ID,
                                        'tree_father_page_id' => Melis::FOREIGN_KEY,
                                        'tree_page_order' => 1,
                                        Melis::RELATION => [
                                            Melis::CMS_PAGE_PUBLISHED => [
                                                [
                                                    Melis::PRIMARY_KEY => 'page_id',
                                                    'page_id' => Melis::FOREIGN_KEY,
                                                    'page_type' => 'PAGE',
                                                    'page_status' => '1',
                                                    'page_menu' => 'LINK',
                                                    'page_name' => 'News',
                                                    'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'News List']],
                                                    'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="contactform_001"><![CDATA[Your name *]]></melisTag>   <melisTag id="contactform_002"><![CDATA[Your email address *]]></melisTag>  <melisTag id="contactform_003"><![CDATA[Subject]]></melisTag>   <melisTag id="contactform_004"><![CDATA[Message *]]></melisTag> <melisTag id="contacttext_001"><![CDATA[Get in <strong>touch</strong>]]></melisTag> <melisTag id="contacttext_002"><![CDATA[Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus.]]></melisTag> <melisTag id="contacttext_003"><![CDATA[The <strong>Office</strong>]]></melisTag>   <melisTag id="contacttext_004"><![CDATA[<ul class="list-unstyled">              <li><i class="icon icon-map-marker"></i> <strong>Address:</strong> 1234 Street Name, City Name, United States</li>              <li><i class="icon icon-phone"></i> <strong>Phone:</strong> (123) 456-7890</li>             <li><i class="icon icon-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">mail@example.com</a></li>          </ul>]]></melisTag> <melisTag id="footer_title_1"><![CDATA[Contact US]]></melisTag> <melisTag id="footer_text_1"><![CDATA[<ul><li><div class="contact-icon"><i class="zmdi zmdi-pin-drop"></i><br></div><div class="contact-text"><p><span>777/a Seventh Street,</span> <span>Rampura, Bonosri</span></p></div></li><li><div class="contact-icon"><i class="zmdi zmdi-email-open"></i><br></div><div class="contact-text"><p><span><a href="#" data-mce-href="#">company@gmail.com</a></span> <span><a href="#" data-mce-href="#">admin@devitems.com</a></span></p></div></li><li><div class="contact-icon"><i class="zmdi zmdi-phone-paused"></i><br></div><div class="contact-text"><p><span>+11 (019) 25184203</span> <span>+11 (018) 50950555</span></p></div></li></ul>]]></melisTag>  <melisTag id="footer_title_2"><![CDATA[Information]]></melisTag>    <melisTag id="footer_text_2"><![CDATA[<li><a href="#">My Account</a></li>                                                <li><a href="#">Order History</a></li>                                                <li><a href="#">Wishlist</a></li>                                                <li><a href="#">Returnes</a></li>                                                <li><a href="#">Private Policy</a></li>                                                <li><a href="#">Site Map</a></li>]]></melisTag> <melisTag id="footer_title_3"><![CDATA[InstaGram]]></melisTag>  <melisTag id="header_title"><![CDATA[News]]></melisTag> <melisTag id="header_subtitle"><![CDATA[News]]></melisTag>  <melisTag id="header_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/bg/news.jpg" caption="false" height="50" width="240" />]]></melisTag></document>',

                                                ],
                                            ],
                                            Melis::CMS_PAGE_LANG => [
                                                [
                                                    'plang_page_id' =>  Melis::FOREIGN_KEY,
                                                    'plang_lang_id' => 1,
                                                    'plang_page_id_initial' =>  Melis::FOREIGN_KEY
                                                ]
                                            ],
                                            // <NewsDetails>
                                            Melis::CMS_PAGE_TREE => [
                                                [
                                                    Melis::PRIMARY_KEY => 'tree_page_id',
                                                    'tree_page_id' => Melis::CURRENT_PAGE_ID,
                                                    'tree_father_page_id' => Melis::FOREIGN_KEY,
                                                    'tree_page_order' => 1,
                                                    Melis::RELATION => [
                                                        Melis::CMS_PAGE_PUBLISHED => [
                                                            [
                                                                Melis::PRIMARY_KEY => 'page_id',
                                                                'page_id' => Melis::FOREIGN_KEY,
                                                                'page_type' => 'NEWS_DETAIL',
                                                                'page_status' => '1',
                                                                'page_menu' => 'LINK',
                                                                'page_name' => 'News Details',
                                                                'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'News Details']],
                                                                'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="contactform_001"><![CDATA[Your name *]]></melisTag>   <melisTag id="contactform_002"><![CDATA[Your email address *]]></melisTag>  <melisTag id="contactform_003"><![CDATA[Subject]]></melisTag>   <melisTag id="contactform_004"><![CDATA[Message *]]></melisTag> <melisTag id="contacttext_001"><![CDATA[Get in <strong>touch</strong>]]></melisTag> <melisTag id="contacttext_002"><![CDATA[Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus.]]></melisTag> <melisTag id="contacttext_003"><![CDATA[The <strong>Office</strong>]]></melisTag>   <melisTag id="contacttext_004"><![CDATA[<ul class="list-unstyled">              <li><i class="icon icon-map-marker"></i> <strong>Address:</strong> 1234 Street Name, City Name, United States</li>              <li><i class="icon icon-phone"></i> <strong>Phone:</strong> (123) 456-7890</li>             <li><i class="icon icon-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">mail@example.com</a></li>          </ul>]]></melisTag> <melisTag id="footer_title_1"><![CDATA[Contact US]]></melisTag> <melisTag id="footer_text_1"><![CDATA[<ul>                                        <li>                                            <div class="contact-icon">                                               <i class="zmdi zmdi-pin-drop"></i>                                          </div>                                            <div class="contact-text">                                                <p><span>777/a  Seventh Street,</span> <span>Rampura, Bonosri</span></p>                                            </div>                                        </li>                                        <li>                                            <div class="contact-icon"> <i class="zmdi zmdi-email-open"></i> </div>                                            <div class="contact-text">                                                <p><span><a href="#">company@gmail.com</a></span> <span><a href="#">admin@devitems.com</a></span></p>                                            </div>                                        </li>                                        <li>                                            <div class="contact-icon"> <i class="zmdi zmdi-phone-paused"></i> </div>                                            <div class="contact-text">                                                <p><span>+11 (019) 25184203</span> <span>+11 (018) 50950555</span></p>                                            </div>                                        </li>                                    </ul>]]></melisTag>    <melisTag id="footer_title_2"><![CDATA[Information]]></melisTag>    <melisTag id="footer_text_2"><![CDATA[<li><a href="#">My Account</a></li>                                                <li><a href="#">Order History</a></li>                                                <li><a href="#">Wishlist</a></li>                                                <li><a href="#">Returnes</a></li>                                                <li><a href="#">Private Policy</a></li>                                                <li><a href="#">Site Map</a></li>]]></melisTag> <melisTag id="footer_title_3"><![CDATA[InstaGram]]></melisTag>  <melisTag id="header_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/bg/news.jpg" caption="false" height="29" width="229" />]]></melisTag>   <melisTag id="header_title"><![CDATA[News]]></melisTag> <melisTag id="latest_news_title"><![CDATA[Latest news]]></melisTag></document>',

                                                            ],
                                                        ],
                                                        Melis::CMS_PAGE_LANG => [
                                                            [
                                                                'plang_page_id' =>  Melis::FOREIGN_KEY,
                                                                'plang_lang_id' => 1,
                                                                'plang_page_id_initial' =>  Melis::FOREIGN_KEY
                                                            ]
                                                        ],
                                                    ],
                                                    Site::THEN => [Site::UPDATE_CURRENT_PAGE_ID],
                                                ]
                                            ]
                                            // </NewsDetails>
                                        ],
                                        Site::THEN => [Site::UPDATE_CURRENT_PAGE_ID],

                                    ],
                                    // </NewsPage>

                                    // <TraversalPages>
                                    [
                                        Melis::PRIMARY_KEY => 'tree_page_id',
                                        'tree_page_id' => Melis::CURRENT_PAGE_ID,
                                        'tree_father_page_id' => Melis::FOREIGN_KEY,
                                        'tree_page_order' => 2,
                                        Site::THEN => [Site::UPDATE_CURRENT_PAGE_ID],
                                        Melis::RELATION => [
                                            Melis::CMS_PAGE_PUBLISHED => [
                                                [
                                                    Melis::PRIMARY_KEY => 'page_id',
                                                    'page_id' => Melis::FOREIGN_KEY,
                                                    'page_type' => 'FOLDER',
                                                    'page_status' => '1',
                                                    'page_menu' => 'NONE',
                                                    'page_name' => 'Transversal pages',
                                                    'page_tpl_id' => -1,
                                                    'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0"></document>',

                                                ],
                                            ],
                                            Melis::CMS_PAGE_LANG => [
                                                [
                                                    'plang_page_id' =>  Melis::FOREIGN_KEY,
                                                    'plang_lang_id' => 1,
                                                    'plang_page_id_initial' =>  Melis::FOREIGN_KEY
                                                ]
                                            ],
                                            Melis::CMS_PAGE_TREE => [
                                                // <SearchResults>
//                                                [
//                                                    Melis::PRIMARY_KEY => 'tree_page_id',
//                                                    'tree_page_id' => Melis::CURRENT_PAGE_ID,
//                                                    'tree_father_page_id' => Melis::FOREIGN_KEY,
//                                                    'tree_page_order' => 1,
//                                                    Site::THEN => [Site::UPDATE_CURRENT_PAGE_ID],
//                                                    Melis::RELATION => [
//                                                        Melis::CMS_PAGE_PUBLISHED => [
//                                                            [
//                                                                Melis::PRIMARY_KEY => 'page_id',
//                                                                'page_id' => Melis::FOREIGN_KEY,
//                                                                'page_type' => 'PAGE',
//                                                                'page_status' => '1',
//                                                                'page_menu' => 'LINK',
//                                                                'page_name' => 'Search results',
//                                                                'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Search']],
/*                                                                'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="header_image"><![CDATA[<img alt="" src="/MelisDemoCmsTwig/images/bg/search.jpg">]]></melisTag>    <melisTag id="header_title"><![CDATA[Search Results]]></melisTag>   <melisTag id="search_title"><![CDATA[Search Results]]></melisTag>   <melisTag id="footer_title_1"><![CDATA[Contact US]]></melisTag> <melisTag id="footer_text_1"><![CDATA[<ul>                                        <li>                                            <div class="contact-icon">                                               <i class="zmdi zmdi-pin-drop"></i>                                          </div>                                            <div class="contact-text">                                                <p><span>777/a  Seventh Street,</span> <span>Rampura, Bonosri</span></p>                                            </div>                                        </li>                                        <li>                                            <div class="contact-icon"> <i class="zmdi zmdi-email-open"></i> </div>                                            <div class="contact-text">                                                <p><span><a href="#">company@gmail.com</a></span> <span><a href="#">admin@devitems.com</a></span></p>                                            </div>                                        </li>                                        <li>                                            <div class="contact-icon"> <i class="zmdi zmdi-phone-paused"></i> </div>                                            <div class="contact-text">                                                <p><span>+11 (019) 25184203</span> <span>+11 (018) 50950555</span></p>                                            </div>                                        </li>                                    </ul>]]></melisTag>    <melisTag id="footer_title_2"><![CDATA[Information]]></melisTag></document>',*/
//
//                                                            ],
//                                                        ],
//                                                        Melis::CMS_PAGE_LANG => [
//                                                            [
//                                                                'plang_page_id' =>  Melis::FOREIGN_KEY,
//                                                                'plang_lang_id' => 1,
//                                                                'plang_page_id_initial' =>  Melis::FOREIGN_KEY
//                                                            ]
//                                                        ],
//                                                    ]
//                                                ],
                                                // </SearchResults>

                                                // <TraversalPages | Testimonials>
                                                [
                                                    Melis::PRIMARY_KEY => 'tree_page_id',
                                                    'tree_page_id' => Melis::CURRENT_PAGE_ID,
                                                    'tree_father_page_id' => Melis::FOREIGN_KEY,
                                                    'tree_page_order' => 2,
                                                    Site::THEN => [Site::UPDATE_CURRENT_PAGE_ID],
                                                    Melis::RELATION => [
                                                        Melis::CMS_PAGE_PUBLISHED => [
                                                            [
                                                                Melis::PRIMARY_KEY => 'page_id',
                                                                'page_id' => Melis::FOREIGN_KEY,
                                                                'page_type' => 'PAGE',
                                                                'page_status' => '1',
                                                                'page_menu' => 'NONE',
                                                                'page_name' => 'Testimonials',
                                                                'page_tpl_id' => -1,
                                                                'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0"></document>',

                                                            ],
                                                        ],
                                                        Melis::CMS_PAGE_LANG => [
                                                            [
                                                                'plang_page_id' =>  Melis::FOREIGN_KEY,
                                                                'plang_lang_id' => 1,
                                                                'plang_page_id_initial' =>  Melis::FOREIGN_KEY
                                                            ]
                                                        ],
                                                        Melis::CMS_PAGE_TREE => [
                                                            // <TraversalPages | Testimonials 1>
                                                            [
                                                                Melis::PRIMARY_KEY => 'tree_page_id',
                                                                'tree_page_id' => Melis::CURRENT_PAGE_ID,
                                                                'tree_father_page_id' => Melis::FOREIGN_KEY,
                                                                'tree_page_order' => 1,
                                                                Site::THEN => [Site::UPDATE_CURRENT_PAGE_ID],
                                                                Melis::RELATION => [
                                                                    Melis::CMS_PAGE_PUBLISHED => [
                                                                        [
                                                                            Melis::PRIMARY_KEY => 'page_id',
                                                                            'page_id' => Melis::FOREIGN_KEY,
                                                                            'page_type' => 'PAGE',
                                                                            'page_status' => '1',
                                                                            'page_menu' => 'LINK',
                                                                            'page_name' => 'Testimonial 1',
                                                                            'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Testimonial']],
                                                                            'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="footer_title_1"><![CDATA[Contact US]]></melisTag> <melisTag id="footer_text_1"><![CDATA[<ul><li><div class="contact-icon"><i class="zmdi zmdi-pin-drop"></i><br></div><div class="contact-text"><p><span>777/a Seventh Street,</span> <span>Rampura, Bonosri</span></p></div></li><li><div class="contact-icon"><i class="zmdi zmdi-email-open"></i><br></div><div class="contact-text"><p><span><a href="#" data-mce-href="#">company@gmail.com</a></span> <span><a href="#" data-mce-href="#">admin@devitems.com</a></span></p></div></li><li><div class="contact-icon"><i class="zmdi zmdi-phone-paused"></i><br></div><div class="contact-text"><p><span>+11 (019) 25184203</span> <span>+11 (018) 50950555</span></p></div></li></ul>]]></melisTag>  <melisTag id="footer_title_2"><![CDATA[Information]]></melisTag>    <melisTag id="footer_text_2"><![CDATA[<li><a href="#">My Account</a></li>                                                <li><a href="#">Order History</a></li>                                                <li><a href="#">Wishlist</a></li>                                                <li><a href="#">Returnes</a></li>                                                <li><a href="#">Private Policy</a></li>                                                <li><a href="#">Site Map</a></li>]]></melisTag> <melisTag id="footer_title_3"><![CDATA[InstaGram]]></melisTag>  <melisTag id="testimonial_title"><![CDATA[Anita Lendsly]]></melisTag>   <melisTag id="testimonial_subtitle"><![CDATA[Model]]></melisTag>    <melisTag id="testimonial_text"><![CDATA[Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.]]></melisTag>  <melisTag id="testimonial_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/team/testi-03.jpg" alt="" data-mce-src="/MelisDemoCmsTwig/images/team/testi-03.jpg">]]></melisTag> <melisTag id="footer_text_3"><![CDATA[<img src="/MelisDemoCmsTwig/images/team/testi-03.jpg" alt="" />]]></melisTag></document>',

                                                                        ],
                                                                    ],
                                                                    Melis::CMS_PAGE_LANG => [
                                                                        [
                                                                            'plang_page_id' =>  Melis::FOREIGN_KEY,
                                                                            'plang_lang_id' => 1,
                                                                            'plang_page_id_initial' =>  Melis::FOREIGN_KEY
                                                                        ]
                                                                    ],
                                                                ]
                                                            ],
                                                            // <TraversalPages | Testimonials 1>

                                                            // <TraversalPages | Testimonials 2>
                                                            [
                                                                Melis::PRIMARY_KEY => 'tree_page_id',
                                                                'tree_page_id' => Melis::CURRENT_PAGE_ID,
                                                                'tree_father_page_id' => Melis::FOREIGN_KEY,
                                                                'tree_page_order' => 2,
                                                                Site::THEN => [Site::UPDATE_CURRENT_PAGE_ID],
                                                                Melis::RELATION => [
                                                                    Melis::CMS_PAGE_PUBLISHED => [
                                                                        [
                                                                            Melis::PRIMARY_KEY => 'page_id',
                                                                            'page_id' => Melis::FOREIGN_KEY,
                                                                            'page_type' => 'PAGE',
                                                                            'page_status' => '1',
                                                                            'page_menu' => 'LINK',
                                                                            'page_name' => 'Testimonial 2',
                                                                            'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Testimonial']],
                                                                            'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="footer_title_1"><![CDATA[Contact US]]></melisTag> <melisTag id="footer_text_1"><![CDATA[<ul><li><div class="contact-icon"><i class="zmdi zmdi-pin-drop"></i><br></div><div class="contact-text"><p><span>777/a Seventh Street,</span> <span>Rampura, Bonosri</span></p></div></li><li><div class="contact-icon"><i class="zmdi zmdi-email-open"></i><br></div><div class="contact-text"><p><span><a href="#" data-mce-href="#">company@gmail.com</a></span> <span><a href="#" data-mce-href="#">admin@devitems.com</a></span></p></div></li><li><div class="contact-icon"><i class="zmdi zmdi-phone-paused"></i><br></div><div class="contact-text"><p><span>+11 (019) 25184203</span> <span>+11 (018) 50950555</span></p></div></li></ul>]]></melisTag>  <melisTag id="footer_title_2"><![CDATA[Information]]></melisTag>    <melisTag id="footer_text_2"><![CDATA[<li><a href="#">My Account</a></li>                                                <li><a href="#">Order History</a></li>                                                <li><a href="#">Wishlist</a></li>                                                <li><a href="#">Returnes</a></li>                                                <li><a href="#">Private Policy</a></li>                                                <li><a href="#">Site Map</a></li>]]></melisTag> <melisTag id="footer_title_3"><![CDATA[InstaGram]]></melisTag>  <melisTag id="testimonial_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/team/testi-02.jpg" />]]></melisTag>    <melisTag id="testimonial_title"><![CDATA[Brad Wayne]]></melisTag>  <melisTag id="testimonial_subtitle"><![CDATA[Model]]></melisTag>    <melisTag id="testimonial_text"><![CDATA[Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.]]></melisTag></document>',

                                                                        ],
                                                                    ],
                                                                    Melis::CMS_PAGE_LANG => [
                                                                        [
                                                                            'plang_page_id' =>  Melis::FOREIGN_KEY,
                                                                            'plang_lang_id' => 1,
                                                                            'plang_page_id_initial' =>  Melis::FOREIGN_KEY
                                                                        ]
                                                                    ],
                                                                ]
                                                            ],
                                                            // <TraversalPages | Testimonials 2>

                                                            // <TraversalPages | Testimonials 3>
                                                            [
                                                                Melis::PRIMARY_KEY => 'tree_page_id',
                                                                'tree_page_id' => Melis::CURRENT_PAGE_ID,
                                                                'tree_father_page_id' => Melis::FOREIGN_KEY,
                                                                'tree_page_order' => 3,
                                                                Site::THEN => [Site::UPDATE_CURRENT_PAGE_ID],
                                                                Melis::RELATION => [
                                                                    Melis::CMS_PAGE_PUBLISHED => [
                                                                        [
                                                                            Melis::PRIMARY_KEY => 'page_id',
                                                                            'page_id' => Melis::FOREIGN_KEY,
                                                                            'page_type' => 'PAGE',
                                                                            'page_status' => '1',
                                                                            'page_menu' => 'LINK',
                                                                            'page_name' => 'Testimonial 3',
                                                                            'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Testimonial']],
                                                                            'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="footer_title_1"><![CDATA[Contact US]]></melisTag> <melisTag id="footer_text_1"><![CDATA[<ul>                                        <li>                                            <div class="contact-icon">                                               <i class="zmdi zmdi-pin-drop"></i>                                          </div>                                            <div class="contact-text">                                                <p><span>777/a  Seventh Street,</span> <span>Rampura, Bonosri</span></p>                                            </div>                                        </li>                                        <li>                                            <div class="contact-icon"> <i class="zmdi zmdi-email-open"></i> </div>                                            <div class="contact-text">                                                <p><span><a href="#">company@gmail.com</a></span> <span><a href="#">admin@devitems.com</a></span></p>                                            </div>                                        </li>                                        <li>                                            <div class="contact-icon"> <i class="zmdi zmdi-phone-paused"></i> </div>                                            <div class="contact-text">                                                <p><span>+11 (019) 25184203</span> <span>+11 (018) 50950555</span></p>                                            </div>                                        </li>                                    </ul>]]></melisTag>    <melisTag id="footer_title_2"><![CDATA[Information]]></melisTag>    <melisTag id="footer_text_2"><![CDATA[<li><a href="#">My Account</a></li>                                                <li><a href="#">Order History</a></li>                                                <li><a href="#">Wishlist</a></li>                                                <li><a href="#">Returnes</a></li>                                                <li><a href="#">Private Policy</a></li>                                                <li><a href="#">Site Map</a></li>]]></melisTag> <melisTag id="footer_title_3"><![CDATA[InstaGram]]></melisTag>  <melisTag id="testimonial_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/team/testi-01.jpg" />]]></melisTag>    <melisTag id="testimonial_title"><![CDATA[Laureen Parson]]></melisTag>  <melisTag id="testimonial_subtitle"><![CDATA[Designer]]></melisTag> <melisTag id="testimonial_text"><![CDATA[Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.]]></melisTag></document>',

                                                                        ],
                                                                    ],
                                                                    Melis::CMS_PAGE_LANG => [
                                                                        [
                                                                            'plang_page_id' =>  Melis::FOREIGN_KEY,
                                                                            'plang_lang_id' => 1,
                                                                            'plang_page_id_initial' =>  Melis::FOREIGN_KEY
                                                                        ]
                                                                    ],
                                                                ]
                                                            ],
                                                            // <TraversalPages | Testimonials 3>
                                                        ]
                                                    ]
                                                ],
                                                // </TraversalPages>
                                            ]
                                        ]
                                    ],
                                    // </TraversalPages>

                                    // <Page404>
                                    [
                                        // Home Page
                                        Melis::PRIMARY_KEY => 'tree_page_id',
                                        'tree_page_id' => Melis::CURRENT_PAGE_ID,
                                        'tree_father_page_id' => Melis::FOREIGN_KEY,
                                        'tree_page_order' => 3,
                                        Melis::RELATION => [
                                            Melis::CMS_PAGE_PUBLISHED => [
                                                [
                                                    Melis::PRIMARY_KEY => 'page_id',
                                                    'page_id' => Melis::FOREIGN_KEY,
                                                    'page_type' => 'PAGE',
                                                    'page_status' => '1',
                                                    'page_menu' => 'None',
                                                    'page_name' => '404',
                                                    'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => '404']],
                                                    'page_content' => '<?xml version="1.0" encoding="UTF-8"?> <document type="MelisCMS" author="MelisTechnology" version="2.0"> <melisTag id="page-404" plugin_container_id="" type="html"><![CDATA[<div class="page-404-container"> <h1>404</h1> <h4>Sorry, the page you were looking for could not be found.</h4> <p>You can return to our <a href="/">home page</a>.</p> </div>]]></melisTag> </document>', ],
                                            ],
                                            Melis::CMS_PAGE_LANG => [
                                                [
                                                    'plang_page_id' =>  Melis::FOREIGN_KEY,
                                                    'plang_lang_id' => 1,
                                                    'plang_page_id_initial' =>  Melis::FOREIGN_KEY
                                                ]
                                            ]
                                        ],
                                        Site::THEN => [Site::UPDATE_CURRENT_PAGE_ID, Site::TRIGGER_EVENT => ['event_name' => 'melis_marketplace_site_update_page_404', 'params' => ['siteId' => Melis::CMS_SITE_ID, 'pageId' => Melis::CURRENT_PAGE_ID]]],
                                    ],
                                    // </Page404>
                                ]

                            ],
                            Site::THEN => [Site::UPDATE_CURRENT_PAGE_ID, Site::TRIGGER_EVENT => ['event_name' => 'melis_marketplace_site_intall_test', 'params' => ['page' => 'HomePage']]],
                        ],
                        // </HomePage>

                        
                    ],
                    // </editor-fold>

                    // <editor-fold desc="CMS_NEWS">
                    Melis::CMS_NEWS => [
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => '/' . __NAMESPACE__ . '/images/news/N01.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            'cnews_publish_date' => date('Y-m-d h:i:s',strtotime('2019-11-27')),
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'Fashion show Obscuria in PARIS this spring 2020!',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ],
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => '/' . __NAMESPACE__ . '/images/news/N02.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            'cnews_publish_date' =>  date('Y-m-d h:i:s',strtotime('2019-11-27')),
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'Latest youth trends',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => '/' . __NAMESPACE__ . '/images/news/N03.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            'cnews_publish_date' =>  date('Y-m-d h:i:s',strtotime('2019-11-27')),
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => '8 ways to revive old fashion shoes',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => '/' . __NAMESPACE__ . '/images/news/N04.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            'cnews_publish_date' =>  date('Y-m-d h:i:s',strtotime('2019-11-27')),
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'Quizzz : how much do you know about fashion?',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => '/' . __NAMESPACE__ . '/images/news/N05.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            'cnews_publish_date' =>  date('Y-m-d h:i:s',strtotime('2019-10-27')),
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'What type of model are you?',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => '/' . __NAMESPACE__ . '/images/news/N06.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            'cnews_publish_date' => date('Y-m-d h:i:s',strtotime('2019-10-27')),
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'Under the spotlight!',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => '/' . __NAMESPACE__ . '/images/news/N07.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            'cnews_publish_date' => date('Y-m-d h:i:s',strtotime('2019-10-27')),
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'How to get the utmost of your makeup',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => '/' . __NAMESPACE__ . '/images/news/N08.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            'cnews_publish_date' => date('Y-m-d h:i:s',strtotime('2019-10-27')),
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'Discover the most handsome star of the month!',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => '/' . __NAMESPACE__ . '/images/news/N09.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            'cnews_publish_date' => date('Y-m-d h:i:s',strtotime('2019-09-27')),
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'Dark curtains project revealed!',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => '/' . __NAMESPACE__ . '/images/news/N10.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            'cnews_publish_date' => date('Y-m-d h:i:s',strtotime('2019-10-27')),
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'Immerse yourself into fashion with this new event!',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => '/' . __NAMESPACE__ . '/images/news/N11.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            'cnews_publish_date' => date('Y-m-d h:i:s',strtotime('2019-09-27')),
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'Why is Paris the capital city of Fashion?',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => '/' . __NAMESPACE__ . '/images/news/N12.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            'cnews_publish_date' => date('Y-m-d h:i:s',strtotime('2019-09-27')),
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'Gentlemen, time to put on your suits!',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => '/' . __NAMESPACE__ . '/images/news/N13.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            'cnews_publish_date' => date('Y-m-d h:i:s',strtotime('2019-08-27')),
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'Upcoming trends this year',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => '/' . __NAMESPACE__ . '/images/news/N14.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            'cnews_publish_date' => date('Y-m-d h:i:s',strtotime('2019-08-27')),
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'Discover Angela the new fashion model of Melis',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => '/' . __NAMESPACE__ . '/images/news/N15.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            'cnews_publish_date' => date('Y-m-d h:i:s',strtotime('2019-07-27')),
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'Latest designs unveiled',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => '/' . __NAMESPACE__ . '/images/news/N16.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            'cnews_publish_date' => date('Y-m-d h:i:s',strtotime('2019-07-27')),
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'Revelations of the most renowned fashion artist!',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => '/' . __NAMESPACE__ . '/images/news/N17.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            'cnews_publish_date' => date('Y-m-d h:i:s',strtotime('2019-06-27')),
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'XYZ is now hiring models',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => '/' . __NAMESPACE__ . '/images/news/N18.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            'cnews_publish_date' => date('Y-m-d h:i:s',strtotime('2019-06-27')),
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'Fashion and seduction : an art in itself',
                                        'cnews_paragraph1' => 'Paragraph 1, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph2' => 'Paragraph 2, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph3' => 'Paragraph 3, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_paragraph4' => 'Paragraph 4, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                        'cnews_lang_id' => '1',
                                        'cnews_id' => Melis::FOREIGN_KEY,
                                    ]
                                ],
                            ]
                        ],
                    ],
                    // </editor-fold>

                    // <editor-fold desc="CMS_SLIDER">
                    Melis::CMS_SLIDER => [
                        [
                            'mcslide_name' => 'Homepage Header Slider',
                            'mcslide_page_id' => Melis::CMS_SITE_HOME_PAGE_ID,
                            'mcslide_date' => date('Y-m-d H:i:s'),
                            Melis::RELATION => [
                                Melis::CMS_SLIDER_DETAILS => [
                                    [
                                        'mcsdetail_mcslider_id' => Melis::FOREIGN_KEY,
                                        'mcsdetail_status' => 1,
                                        'mcsdetail_title' => 'A brand new feature!',
                                        'mcsdetail_sub1' => 'Twig inside Melis Platform!',
                                        'mcsdetail_sub2' => 'Discover it!',
                                        'mcsdetail_sub3' => '',
                                        'mcsdetail_link' => 'https://github.com/melisplatform/melis-cms-twig#guides',
                                        'mcsdetail_img' => '/' . __NAMESPACE__ . '/images/slider/slider01.jpg',
                                        'mcsdetail_order' => 1,
                                    ],
                                    [
                                        'mcsdetail_mcslider_id' => Melis::FOREIGN_KEY,
                                        'mcsdetail_status' => 1,
                                        'mcsdetail_title' => 'Easy to Learn, Concise, Full Featured',
                                        'mcsdetail_sub1' => 'Why use Twig?',
                                        'mcsdetail_sub2' => 'Check it out!',
                                        'mcsdetail_sub3' => '',
                                        'mcsdetail_link' => 'https://twig.symfony.com/',
                                        'mcsdetail_img' => '/' . __NAMESPACE__ . '/images/slider/slider02.jpg',
                                        'mcsdetail_order' => 2,
                                    ],
                                    [
                                        'mcsdetail_mcslider_id' => Melis::FOREIGN_KEY,
                                        'mcsdetail_status' => 1,
                                        'mcsdetail_title' => 'Best of both worlds!',
                                        'mcsdetail_sub1' => 'Twig or Laminas Framework',
                                        'mcsdetail_sub2' => 'Take a look!',
                                        'mcsdetail_sub3' => '',
                                        'mcsdetail_link' => 'https://github.com/melisplatform/melis-cms-twig#ii-child-template-creation',
                                        'mcsdetail_img' => '/' . __NAMESPACE__ . '/images/slider/slider03.jpg',
                                        'mcsdetail_order' => 3,
                                    ],
                                ]
                            ]
                        ],
                    ],
                    // </editor-fold>

                    // <editor-fold desc="CMS_GDPR_TEXTS">
                    Melis::CMS_GDPR_TEXTS => [
                        [
                            'mcgdpr_text_site_id' => 1,
                            'mcgdpr_text_lang_id' => 1,
                            'mcgdpr_text_value' => 'Our site uses cookies. By continuing to use our site you are agreeing to our Cookie Policy.',
                        ],
                        [
                            'mcgdpr_text_site_id' => 1,
                            'mcgdpr_text_lang_id' => 2,
                            'mcgdpr_text_value' => 'Notre site utilise des cookies. En poursuivant votre navigation sur notre site vous acceptez notre politique de cookies.',
                        ],
                    ],
                    // </editor-fold>
                ],
            ],
        ],
    ],
];
