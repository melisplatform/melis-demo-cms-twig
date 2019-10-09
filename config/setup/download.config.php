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
                        'hydrator' => \Zend\Stdlib\Hydrator\ArraySerializable::class,
                        'elements' => [
                            [
                                'spec' => [
                                    'name' => 'scheme',
                                    'type' => \Zend\Form\Element\Select::class,
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
                                    'type' => \Zend\Form\Element\Text::class,
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
                                    'type' => \Zend\Form\Element\Text::class,
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
                                                \Zend\Validator\InArray::NOT_IN_ARRAY => 'tr_site_demo_cms_tool_site_scheme_invalid_selection',
                                            ],
                                        ],
                                    ],
                                    [
                                        'name' => 'NotEmpty',
                                        'options' => [
                                            'messages' => [
                                                \Zend\Validator\NotEmpty::IS_EMPTY => 'tr_melis_installer_tool_site_scheme_error_empty',
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
                                                \Zend\Validator\StringLength::TOO_LONG => 'tr_melis_installer_tool_site_domain_error_long',
                                            ],
                                        ],
                                    ],
                                    [
                                        'name' => 'NotEmpty',
                                        'options' => [
                                            'messages' => [
                                                \Zend\Validator\NotEmpty::IS_EMPTY => 'tr_melis_installer_tool_site_domain_error_empty',
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
                                                \Zend\Validator\StringLength::TOO_LONG => 'tr_site_demo_cms_tool_site_name_error_long',
                                            ],
                                        ],
                                    ],
                                    [
                                        'name' => 'NotEmpty',
                                        'options' => [
                                            'messages' => [
                                                \Zend\Validator\NotEmpty::IS_EMPTY => 'tr_melis_installer_tool_site_name_error_empty',
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
                            'tpl_type' => 'ZF2',
                            'tpl_zf2_website_folder' => __NAMESPACE__,
                            'tpl_zf2_layout' => 'defaultLayout',
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
                            'tpl_type' => 'ZF2',
                            'tpl_zf2_website_folder' => __NAMESPACE__,
                            'tpl_zf2_layout' => 'defaultLayout',
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
                            'tpl_type' => 'ZF2',
                            'tpl_zf2_website_folder' => __NAMESPACE__,
                            'tpl_zf2_layout' => 'defaultLayout',
                            'tpl_zf2_controller' => 'News',
                            'tpl_zf2_action' => 'details',
                            'tpl_creation_date' => date('Y-m-d H:i:s'),
                            Site::THEN => [Site::UPDATE_CURRENT_TEMPLATE_ID],
                        ],
                        [
                            Melis::PRIMARY_KEY => 'tpl_id',
                            'tpl_id' => Melis::CURRENT_TEMPLATE_ID,
                            'tpl_site_id' => Melis::CMS_SITE_ID,
                            'tpl_name' => 'Content List',
                            'tpl_type' => 'ZF2',
                            'tpl_zf2_website_folder' => __NAMESPACE__,
                            'tpl_zf2_layout' => 'defaultLayout',
                            'tpl_zf2_controller' => 'Content',
                            'tpl_zf2_action' => 'list',
                            'tpl_creation_date' => date('Y-m-d H:i:s'),
                            Site::THEN => [Site::UPDATE_CURRENT_TEMPLATE_ID],
                        ],
                        [
                            Melis::PRIMARY_KEY => 'tpl_id',
                            'tpl_id' => Melis::CURRENT_TEMPLATE_ID,
                            'tpl_site_id' => Melis::CMS_SITE_ID,
                            'tpl_name' => 'Content Details',
                            'tpl_type' => 'ZF2',
                            'tpl_zf2_website_folder' => __NAMESPACE__,
                            'tpl_zf2_layout' => 'defaultLayout',
                            'tpl_zf2_controller' => 'Content',
                            'tpl_zf2_action' => 'details',
                            'tpl_creation_date' => date('Y-m-d H:i:s'),
                            Site::THEN => [Site::UPDATE_CURRENT_TEMPLATE_ID],
                        ],
                        [
                            Melis::PRIMARY_KEY => 'tpl_id',
                            'tpl_id' => Melis::CURRENT_TEMPLATE_ID,
                            'tpl_site_id' => Melis::CMS_SITE_ID,
                            'tpl_name' => 'About',
                            'tpl_type' => 'ZF2',
                            'tpl_zf2_website_folder' => __NAMESPACE__,
                            'tpl_zf2_layout' => 'defaultLayout',
                            'tpl_zf2_controller' => 'About',
                            'tpl_zf2_action' => 'aboutus',
                            'tpl_creation_date' => date('Y-m-d H:i:s'),
                            Site::THEN => [Site::UPDATE_CURRENT_TEMPLATE_ID],
                        ],
                        [
                            Melis::PRIMARY_KEY => 'tpl_id',
                            'tpl_id' => Melis::CURRENT_TEMPLATE_ID,
                            'tpl_site_id' => Melis::CMS_SITE_ID,
                            'tpl_name' => 'Contact',
                            'tpl_type' => 'ZF2',
                            'tpl_zf2_website_folder' => __NAMESPACE__,
                            'tpl_zf2_layout' => 'defaultLayout',
                            'tpl_zf2_controller' => 'Contact',
                            'tpl_zf2_action' => 'contactus',
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
                        [
                            Melis::PRIMARY_KEY => 'tpl_id',
                            'tpl_id' => Melis::CURRENT_TEMPLATE_ID,
                            'tpl_site_id' => Melis::CMS_SITE_ID,
                            'tpl_name' => 'Search',
                            'tpl_type' => 'ZF2',
                            'tpl_zf2_website_folder' => __NAMESPACE__,
                            'tpl_zf2_layout' => 'defaultLayout',
                            'tpl_zf2_controller' => 'Search',
                            'tpl_zf2_action' => 'results',
                            'tpl_creation_date' => date('Y-m-d H:i:s'),
                            Site::THEN => [Site::UPDATE_CURRENT_TEMPLATE_ID],
                        ],
                        [
                            Melis::PRIMARY_KEY => 'tpl_id',
                            'tpl_id' => Melis::CURRENT_TEMPLATE_ID,
                            'tpl_site_id' => Melis::CMS_SITE_ID,
                            'tpl_name' => '404',
                            'tpl_type' => 'ZF2',
                            'tpl_zf2_website_folder' => __NAMESPACE__,
                            'tpl_zf2_layout' => 'defaultLayout',
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
                            'tree_page_id' => Melis::CMS_SITE_ID,
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
                                        'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="contactform_001"><![CDATA[Your name *]]></melisTag>   <melisTag id="contactform_002"><![CDATA[Your email address *]]></melisTag>  <melisTag id="contactform_003"><![CDATA[Subject]]></melisTag>   <melisTag id="contactform_004"><![CDATA[Message *]]></melisTag> <melisTag id="contacttext_001"><![CDATA[Get in <strong>touch</strong>]]></melisTag> <melisTag id="contacttext_002"><![CDATA[Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus.]]></melisTag> <melisTag id="contacttext_003"><![CDATA[The <strong>Office</strong>]]></melisTag>   <melisTag id="contacttext_004"><![CDATA[<ul class="list-unstyled">              <li><i class="icon icon-map-marker"></i> <strong>Address:</strong> 1234 Street Name, City Name, United States</li>              <li><i class="icon icon-phone"></i> <strong>Phone:</strong> (123) 456-7890</li>             <li><i class="icon icon-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">mail@example.com</a></li>          </ul>]]></melisTag> <melisTag id="footer_title_1"><![CDATA[Contact US]]></melisTag> <melisTag id="footer_text_1"><![CDATA[<ul><li><div class="contact-icon"><i class="zmdi zmdi-pin-drop"></i></div><div class="contact-text"><p><span>4, rue du Dahomey<br />75011 Paris, France</span><span><br /></span></p></div></li><li><div class="contact-icon"><i class="zmdi zmdi-email-open"></i></div><div class="contact-text"><p><span>contact@melistechnology.com</span></p></div></li><li><div class="contact-icon"><i class="zmdi zmdi-phone-paused"></i></div><div class="contact-text"><p><span>(+33) 972 386 280</span><span><br /></span></p></div></li></ul>]]></melisTag>    <melisTag id="footer_title_2"><![CDATA[menu]]></melisTag>   <melisTag id="footer_text_2"><![CDATA[<ul><li><a href="/">Home</a></li><li><a href="/home/news/id/2">News</a></li><li><a href="/home/our-designs/id/4">Our designs</a></li><li><a href="/home/about-us/id/29">About us</a></li><li><a href="/home/contact-us/id/30">Contact us</a></li></ul>]]></melisTag>  <melisTag id="footer_title_3"><![CDATA[InstaGram]]></melisTag>  <melisTag id="homepage_line_1"><![CDATA[<div class="delivery-service-area ptb-30"><div class="container"><div class="row"><div class="col-md-3 col-sm-6 col-xs-12"><div class="single-service shadow-box text-center"><img src="/MelisDemoCmsTwig/images/icons/live.png" caption="false" data-mce-src="/MelisDemoCmsTwig/images/icons/live.png"><h5>Fashion show live</h5></div></div><div class="col-md-3 col-sm-6 col-xs-12"><div class="single-service shadow-box text-center"><img src="/MelisDemoCmsTwig/images/icons/chat.png" caption="false" data-mce-src="/MelisDemoCmsTwig/images/icons/chat.png"><h5>Chat with a star !</h5></div></div><div class="col-md-3 col-sm-6 col-xs-12"><div class="single-service shadow-box text-center"><img src="/MelisDemoCmsTwig/images/icons/news.png" caption="false" data-mce-src="/MelisDemoCmsTwig/images/icons/news.png"><h5>Last minute news</h5></div></div><div class="col-md-3 col-sm-6 col-xs-12"><div class="single-service shadow-box text-center"><img src="/MelisDemoCmsTwig/images/icons/trending.png" caption="false" data-mce-src="/MelisDemoCmsTwig/images/icons/trending.png"><h5>Ultimate trending</h5></div></div></div></div></div>]]></melisTag>  <melisTag id="homepage_line_2"><![CDATA[<div class="blog-area pb-70"><div class="container"><div class="row"><div class="col-md-12 col-sm-8 col-xs-12"><div class="single-blog-body"><div class="single-blog sb-2 mb-30"><div class="blog-content"><div class="blog-title"><h5 class="uppercase font-bold"><a href="/melis-demo-cms/our-designs/id/4" data-mce-href="/melis-demo-cms/our-designs/id/4">The ultimate trend of 2017<br></a><br data-mce-bogus="1"></h5><div class="blog-text"><p>There are many variations of passages of Lorem Ipsum available, but the majority suffered alteration in some form, by injected humour, or random ised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum. <br><br>generators on the Internet tend to repeat predefined chunks as necessary. There are many variations of passages of Lorem Ipsum available the Internet tend to repeat predefined chunks as necessary. There are many variations of passages of Lorem Ipsum available</p></div></div><div class="blockqot mtb-30"><blockquote><p>There are many variations of passages of Lorem Ipsum available, but majority have suffered alteration in some form, by injected humour. There are many variations of passages of Lorem Ipsum available, but the majorit. There are many variations of passages of Lorem Ipsum available, but the majorit.</p></blockquote></div></div></div></div></div></div></div></div>]]></melisTag>  <melisTag id="homepage_news_title"><![CDATA[News]]></melisTag>  <melisTag id="homepage_testimonial_title"><![CDATA[Testimonial]]></melisTag>    <melisTag id="footer_text_3"><![CDATA[<div class="instagrm"><ul><li><a href="#"><img src="/MelisDemoCmsTwig/images/gallery/01.jpg" alt="" /></a></li><li><a href="#"><img src="/MelisDemoCmsTwig/images/gallery/02.jpg" alt="" /></a></li><li><a href="#"><img src="/MelisDemoCmsTwig/images/gallery/03.jpg" alt="" /></a></li><li><a href="#"><img src="/MelisDemoCmsTwig/images/gallery/04.jpg" alt="" /></a></li><li><a href="#"><img src="/MelisDemoCmsTwig/images/gallery/05.jpg" alt="" /></a></li><li><a href="#"><img src="/MelisDemoCmsTwig/images/gallery/06.jpg" alt="" /></a></li></ul></div>]]></melisTag> <melisTag id="footer_title_4"><![CDATA[Social Network]]></melisTag> <melisTag id="homepage_line_3"><![CDATA[<h5 class="uppercase font-bold"><a href="/home/news/news-details/id/3?newsId=1" data-mce-href="/home/news/news-details/id/3?newsId=1">Fashion show OBscuria in PARIS this spring 2017 !</a><br data-mce-bogus="1"></h5><div class="blog-text"><p>There are many variations of passages of Lorem Ipsum available, but the majority suffered alteration in some form, by injected humour, or random ised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum. <br><br>generators on the Internet tend to repeat predefined chunks as necessary. There are many variations of passages of Lorem Ipsum available the Internet tend to repeat predefined chunks as necessary. There are many variations of passages of Lorem Ipsum available</p></div>]]></melisTag>    <melisTag id="homepage_line_4"><![CDATA[<h5 class="uppercase font-bold"><a href="/home/our-designs/suits/suit-3/id/14" data-mce-href="/home/our-designs/suits/suit-3/id/14">The flagship product of 2016</a><br data-mce-bogus="1"></h5><div class="blog-text"><p>There are many variations of passages of Lorem Ipsum available, but the majority suffered alteration in some form, by injected humour, or random ised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum. <br><br>generators on the Internet tend to repeat predefined chunks as necessary. There are many variations of passages of Lorem Ipsum available the Internet tend to repeat predefined chunks as necessary. There are many variations of passages of Lorem Ipsum available</p></div>]]></melisTag>   <melisTag id="homepage_line_3_img"><![CDATA[<img class="img-responsive" src="/MelisDemoCmsTwig/images/news/N01.jpg"/>]]></melisTag> <melisTag id="homepage_line_4_img"><![CDATA[<img class="img-responsive" src="/MelisDemoCmsTwig/images/product/shoes/03/03.jpg" caption="false" data-mce-src="/MelisDemoCmsTwig/images/product/shoes/03/03.jpg">]]></melisTag></document>',
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
                                ]
                            ],
                            Site::THEN => [Site::UPDATE_CURRENT_PAGE_ID, Site::TRIGGER_EVENT => ['event_name' => 'melis_marketplace_site_intall_test', 'params' => ['page' => 'HomePage']]],

                        ],
                        // </HomePage>

                        // <NewsPage>
                        [
                            // News Page
                            Melis::PRIMARY_KEY => 'tree_page_id',
                            'tree_page_id' => Melis::CURRENT_PAGE_ID,
                            'tree_father_page_id' => Melis::CMS_SITE_ID,
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
                                                    'page_type' => 'PAGE',
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

                        // <OurDesigns>
                        [
                            Melis::PRIMARY_KEY => 'tree_page_id',
                            'tree_page_id' => Melis::CURRENT_PAGE_ID,
                            'tree_father_page_id' => Melis::CMS_SITE_ID,
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
                                        'page_name' => 'Our designs',
                                        'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Content List']],
                                        'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="content_subtitle"><![CDATA[Our designs]]></melisTag>  <melisTag id="header_title"><![CDATA[Our Designs]]></melisTag>  <melisTag id="content_text_1"><![CDATA[<div class="show-product row"><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/01.jpg" alt="" /></div></div><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat"><a href="/our-designs/pants/id/5">New style pants</a></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div></div>]]></melisTag>    <melisTag id="content_text_2"><![CDATA[<div class="show-product row"><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat"><a href="/our-designs/suits/id/12">men\'s fashion suits</a></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/02.jpg" alt="" /></div></div></div>]]></melisTag>   <melisTag id="content_text_3"><![CDATA[<div class="show-product row"><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/03.jpg" alt="" /></div></div><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat"><a href="/our-designs/shoes/id/17">trending shoes</a></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div></div>]]></melisTag>    <melisTag id="header_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/bg/designs.jpg" caption="false" data-mce-src="/MelisDemoCmsTwig/images/bg/designs.jpg" height="29" width="229">]]></melisTag>   <melisTag id="content_text_4"><![CDATA[<div class="show-product row"><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat"><a href="/our-designs/sunglasses/id/23">Summer sunglasses</a></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/sunglasses/04/02.jpg" caption="false" height=" " width=" " /></div></div></div>]]></melisTag>    <melisTag id="content_text_5"><![CDATA[&nbsp;]]></melisTag> <melisTag id="content_text_6"><![CDATA[]]></melisTag></document>',

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
                                    // <OurDesigns | Pants>
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
                                                    'page_name' => 'Pants',
                                                    'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Content List']],
                                                    'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="header_title"><![CDATA[Our Designs]]></melisTag>  <melisTag id="content_subtitle"><![CDATA[pants]]></melisTag>    <melisTag id="content_text_1"><![CDATA[<div class="show-product row"><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/pants/01/03.jpg" /></div></div><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat"><a href="/our-designs/pants/jaker/id/6">jaker</a></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div></div>]]></melisTag>  <melisTag id="content_text_2"><![CDATA[<div class="show-product row"><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat"><a href="/our-designs/pants/duchesse/id/7">duchesse</a></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/03.jpg" /></div></div></div>]]></melisTag> <melisTag id="content_text_3"><![CDATA[<div class="show-product row"><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/pants/03/01.jpg" /></div></div><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat"><a href="/our-designs/pants/velour/id/8">velour</a></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div></div>]]></melisTag>    <melisTag id="content_text_6"><![CDATA[<div class="show-product row"><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat"><a href="/our-designs/pants/grimy/id/11">grimy</a></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/pants/06/03.jpg" /></div></div></div>]]></melisTag> <melisTag id="content_text_5"><![CDATA[<div class="show-product row"><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/pants/05/01.jpg" /></div></div><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat"><a href="/our-designs/pants/glany/id/10">glany</a></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div></div>]]></melisTag> <melisTag id="content_text_4"><![CDATA[<div class="show-product row"><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat"><a href="/our-designs/pants/streester/id/9">streester</a></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/pants/04/01.jpg" /></div></div></div>]]></melisTag>  <melisTag id="header_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/bg/designs.jpg" data-mce-src="/MelisDemoCmsTwig/images/bg/designs.jpg" caption="false">]]></melisTag></document>',

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
                                                // <OurDesigns | Jaker>
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
                                                                'page_name' => 'Jaker',
                                                                'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Content Details']],
                                                                'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="header_title"><![CDATA[Our Designs]]></melisTag>  <melisTag id="header_subtitle"><![CDATA[<h5 class="uppercase">pants</h5>]]></melisTag>  <melisTag id="content_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/team/pants/p01.jpg" caption="false" height=" " width=" " data-mce-src="/MelisDemoCmsTwig/images/team/pants/p01.jpg">]]></melisTag> <melisTag id="content_subtitle1"><![CDATA[New Fashion]]></melisTag> <melisTag id="content_title"><![CDATA[Jaker]]></melisTag>   <melisTag id="content_subtitle2"><![CDATA[sweet collection]]></melisTag>    <melisTag id="content_text"><![CDATA[<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>]]></melisTag>    <melisTag id="header_image"><![CDATA[<img alt="" src="/MelisDemoCmsTwig/images/bg/designs.jpg" data-mce-src="/MelisDemoCmsTwig/images/bg/designs.jpg">]]></melisTag></document>',

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
                                                // </OurDesigns | Jaker>

                                                // <OurDesigns | Duchesse>
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
                                                                'page_name' => 'Duchesse',
                                                                'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Content Details']],
                                                                'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="header_title"><![CDATA[Our Designs]]></melisTag>  <melisTag id="content_subtitle"><![CDATA[Shirts]]></melisTag>   <melisTag id="content_text_1"><![CDATA[<div class="show-product row"><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/01.jpg" alt="" data-mce-src="/MelisDemoCmsTwig/images/product/01.jpg"></div></div><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat">Brand Cortta</h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div></div>]]></melisTag>    <melisTag id="content_text_2"><![CDATA[<div class="show-product row"><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat">Brand Cortta</h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/02.jpg" alt="" data-mce-src="/MelisDemoCmsTwig/images/product/02.jpg"></div></div></div>]]></melisTag>    <melisTag id="content_text_3"><![CDATA[<div class="show-product row"><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/03.jpg" alt="" data-mce-src="/MelisDemoCmsTwig/images/product/03.jpg"></div></div><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat">Brand Cortta</h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div></div>]]></melisTag>    <melisTag id="header_subtitle"><![CDATA[<h5 class="uppercase">pants</h5>]]></melisTag>  <melisTag id="content_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/team/pants/p02.jpg">]]></melisTag> <melisTag id="content_subtitle1"><![CDATA[New Fashion]]></melisTag> <melisTag id="content_title"><![CDATA[Duchesse]]></melisTag>    <melisTag id="content_subtitle2"><![CDATA[sweet collection]]></melisTag>    <melisTag id="content_text"><![CDATA[<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>]]></melisTag>    <melisTag id="header_image"><![CDATA[<img alt="" src="/MelisDemoCmsTwig/images/bg/designs.jpg" data-mce-src="/MelisDemoCmsTwig/images/bg/designs.jpg">]]></melisTag></document>',

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
                                                // </OurDesigns | Duchesse>

                                                // <OurDesigns | Velour>
                                                [
                                                    Melis::PRIMARY_KEY => 'tree_page_id',
                                                    'tree_page_id' => Melis::CURRENT_PAGE_ID,
                                                    'tree_father_page_id' => Melis::FOREIGN_KEY,
                                                    'tree_page_order' => 4,
                                                    Site::THEN => [Site::UPDATE_CURRENT_PAGE_ID],
                                                    Melis::RELATION => [
                                                        Melis::CMS_PAGE_PUBLISHED => [
                                                            [
                                                                Melis::PRIMARY_KEY => 'page_id',
                                                                'page_id' => Melis::FOREIGN_KEY,
                                                                'page_type' => 'PAGE',
                                                                'page_status' => '1',
                                                                'page_menu' => 'LINK',
                                                                'page_name' => 'Velour',
                                                                'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Content Details']],
                                                                'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="header_title"><![CDATA[Our Designs]]></melisTag>  <melisTag id="header_subtitle"><![CDATA[<h5 class="uppercase">pants</h5>]]></melisTag>  <melisTag id="content_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/team/pants/p03.jpg" />]]></melisTag>   <melisTag id="content_subtitle1"><![CDATA[New Fashion]]></melisTag> <melisTag id="content_title"><![CDATA[Velour]]></melisTag>  <melisTag id="content_subtitle2"><![CDATA[sweet collection]]></melisTag>    <melisTag id="content_text"><![CDATA[<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>]]></melisTag>    <melisTag id="header_image"><![CDATA[<img alt="" src="/MelisDemoCmsTwig/images/bg/designs.jpg" data-mce-src="/MelisDemoCmsTwig/images/bg/designs.jpg">]]></melisTag></document>',

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
                                                // </OurDesigns | Velour>

                                                // <OurDesigns | Streester>
                                                [
                                                    Melis::PRIMARY_KEY => 'tree_page_id',
                                                    'tree_page_id' => Melis::CURRENT_PAGE_ID,
                                                    'tree_father_page_id' => Melis::FOREIGN_KEY,
                                                    'tree_page_order' => 5,
                                                    Site::THEN => [Site::UPDATE_CURRENT_PAGE_ID],
                                                    Melis::RELATION => [
                                                        Melis::CMS_PAGE_PUBLISHED => [
                                                            [
                                                                Melis::PRIMARY_KEY => 'page_id',
                                                                'page_id' => Melis::FOREIGN_KEY,
                                                                'page_type' => 'PAGE',
                                                                'page_status' => '1',
                                                                'page_menu' => 'LINK',
                                                                'page_name' => 'Streester',
                                                                'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Content Details']],
                                                                'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="header_image"><![CDATA[<img alt="" src="/MelisDemoCmsTwig/images/bg/designs.jpg" data-mce-src="/MelisDemoCmsTwig/images/bg/designs.jpg">]]></melisTag>    <melisTag id="header_title"><![CDATA[Our Designs]]></melisTag>  <melisTag id="content_subtitle"><![CDATA[pants 4]]></melisTag>  <melisTag id="content_text_1"><![CDATA[<div class="show-product row"><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/01.jpg" alt="" /></div></div><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat">Brand Cortta</h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div></div>]]></melisTag> <melisTag id="content_text_2"><![CDATA[<div class="show-product row"><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat">Brand Cortta</h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/02.jpg" alt="" /></div></div></div>]]></melisTag> <melisTag id="content_text_3"><![CDATA[<div class="show-product row"><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/03.jpg" alt="" /></div></div><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat">Brand Cortta</h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div></div>]]></melisTag> <melisTag id="header_subtitle"><![CDATA[<h5 class="uppercase">pants</h5>]]></melisTag>  <melisTag id="content_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/team/pants/p04.jpg">]]></melisTag> <melisTag id="content_subtitle1"><![CDATA[New Fashion]]></melisTag> <melisTag id="content_title"><![CDATA[Streester]]></melisTag>   <melisTag id="content_subtitle2"><![CDATA[Blain collection]]></melisTag>    <melisTag id="content_text"><![CDATA[<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>]]></melisTag></document>',

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
                                                // </OurDesigns | Streester>

                                                // <OurDesigns | Glany>
                                                [
                                                    Melis::PRIMARY_KEY => 'tree_page_id',
                                                    'tree_page_id' => Melis::CURRENT_PAGE_ID,
                                                    'tree_father_page_id' => Melis::FOREIGN_KEY,
                                                    'tree_page_order' => 6,
                                                    Site::THEN => [Site::UPDATE_CURRENT_PAGE_ID],
                                                    Melis::RELATION => [
                                                        Melis::CMS_PAGE_PUBLISHED => [
                                                            [
                                                                Melis::PRIMARY_KEY => 'page_id',
                                                                'page_id' => Melis::FOREIGN_KEY,
                                                                'page_type' => 'PAGE',
                                                                'page_status' => '1',
                                                                'page_menu' => 'LINK',
                                                                'page_name' => 'Glany',
                                                                'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Content Details']],
                                                                'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="header_image"><![CDATA[<img alt="" src="/MelisDemoCmsTwig/images/bg/designs.jpg" data-mce-src="/MelisDemoCmsTwig/images/bg/designs.jpg">]]></melisTag>    <melisTag id="header_title"><![CDATA[Our Designs]]></melisTag>  <melisTag id="content_subtitle"><![CDATA[Shirts]]></melisTag>   <melisTag id="content_text_1"><![CDATA[<div class="show-product row"><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/01.jpg" alt="" data-mce-src="/MelisDemoCmsTwig/images/product/01.jpg"></div></div><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat">Brand Cortta</h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div></div>]]></melisTag>    <melisTag id="content_text_2"><![CDATA[<div class="show-product row"><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat">Brand Cortta</h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/02.jpg" alt="" data-mce-src="/MelisDemoCmsTwig/images/product/02.jpg"></div></div></div>]]></melisTag>    <melisTag id="header_subtitle"><![CDATA[<h5 class="uppercase">pants</h5>]]></melisTag>  <melisTag id="content_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/team/pants/p05.jpg" />]]></melisTag>   <melisTag id="content_subtitle1"><![CDATA[New Fashion]]></melisTag> <melisTag id="content_title"><![CDATA[Glany]]></melisTag>   <melisTag id="content_subtitle2"><![CDATA[<span class="product-price">Blain collection</span>]]></melisTag> <melisTag id="content_text"><![CDATA[<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>]]></melisTag></document>',

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
                                                // </OurDesigns | Glany>

                                                // <OurDesigns | Grimy>
                                                [
                                                    Melis::PRIMARY_KEY => 'tree_page_id',
                                                    'tree_page_id' => Melis::CURRENT_PAGE_ID,
                                                    'tree_father_page_id' => Melis::FOREIGN_KEY,
                                                    'tree_page_order' => 7,
                                                    Site::THEN => [Site::UPDATE_CURRENT_PAGE_ID],
                                                    Melis::RELATION => [
                                                        Melis::CMS_PAGE_PUBLISHED => [
                                                            [
                                                                Melis::PRIMARY_KEY => 'page_id',
                                                                'page_id' => Melis::FOREIGN_KEY,
                                                                'page_type' => 'PAGE',
                                                                'page_status' => '1',
                                                                'page_menu' => 'LINK',
                                                                'page_name' => 'Grimy',
                                                                'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Content Details']],
                                                                'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="header_image"><![CDATA[<img alt="" src="/MelisDemoCmsTwig/images/bg/designs.jpg" data-mce-src="/MelisDemoCmsTwig/images/bg/designs.jpg">]]></melisTag>    <melisTag id="header_title"><![CDATA[Our Designs]]></melisTag>  <melisTag id="header_subtitle"><![CDATA[pants]]></melisTag> <melisTag id="content_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/team/pants/p06.jpg">]]></melisTag> <melisTag id="content_subtitle1"><![CDATA[New Fashion]]></melisTag> <melisTag id="content_title"><![CDATA[Grimy]]></melisTag>   <melisTag id="content_subtitle2"><![CDATA[Blain collection]]></melisTag></document>',

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
                                                // </OurDesigns | Grimy>
                                            ]
                                        ]
                                    ],
                                    // </OurDesigns | Pants>


                                    // <OurDesigns | Suits>
                                    [
                                        Melis::PRIMARY_KEY => 'tree_page_id',
                                        'tree_page_id' => Melis::CURRENT_PAGE_ID,
                                        'tree_father_page_id' => Melis::FOREIGN_KEY,
                                        'tree_page_order' => 8,
                                        Site::THEN => [Site::UPDATE_CURRENT_PAGE_ID],
                                        Melis::RELATION => [
                                            Melis::CMS_PAGE_PUBLISHED => [
                                                [
                                                    Melis::PRIMARY_KEY => 'page_id',
                                                    'page_id' => Melis::FOREIGN_KEY,
                                                    'page_type' => 'PAGE',
                                                    'page_status' => '1',
                                                    'page_menu' => 'LINK',
                                                    'page_name' => 'Suits',
                                                    'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Content Details']],
                                                    'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="header_image"><![CDATA[<img alt="" src="/MelisDemoCmsTwig/images/bg/designs.jpg" data-mce-src="/MelisDemoCmsTwig/images/bg/designs.jpg">]]></melisTag>    <melisTag id="header_title"><![CDATA[Our Designs]]></melisTag>  <melisTag id="content_subtitle"><![CDATA[suits]]></melisTag>    <melisTag id="content_text_1"><![CDATA[<div class="show-product row"><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/suits/01/01.jpg" /></div></div><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat"><a href="/our-designs/suits/domna/id/13">Domna</a></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div></div>]]></melisTag> <melisTag id="content_text_2"><![CDATA[<div class="show-product row"><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat"><a href="/our-designs/suits/fuerza/id/14">fuerza</a></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/suits/03/03.jpg" /></div></div></div>]]></melisTag>   <melisTag id="content_text_3"><![CDATA[<div class="show-product row"><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/suits/05/01.jpg" /></div></div><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat"><a href="/our-designs/suits/galant/id/15">Galant</a></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div></div>]]></melisTag>   <melisTag id="content_text_4"><![CDATA[<div class="show-product row"><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat"><a href="/our-designs/suits/scoop/id/16">scoop</a></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/suits/06/03.jpg" /></div></div></div>]]></melisTag> <melisTag id="content_text_5"><![CDATA[]]></melisTag>   <melisTag id="content_text_6"><![CDATA[]]></melisTag></document>',

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
                                                // <OurDesigns | Suits | Domna>
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
                                                                'page_name' => 'Domna',
                                                                'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Content Details']],
                                                                'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="header_image"><![CDATA[<img alt="" src="/MelisDemoCmsTwig/images/bg/designs.jpg" data-mce-src="/MelisDemoCmsTwig/images/bg/designs.jpg">]]></melisTag>    <melisTag id="header_title"><![CDATA[Our Designs]]></melisTag>  <melisTag id="content_subtitle"><![CDATA[suits 1]]></melisTag>  <melisTag id="content_text_1"><![CDATA[<div class="show-product row"><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/01.jpg" alt="" data-mce-src="/MelisDemoCmsTwig/images/product/01.jpg"></div></div><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat">Brand Cortta</h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div></div>]]></melisTag>    <melisTag id="content_text_2"><![CDATA[<div class="show-product row"><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat">Brand Cortta</h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/02.jpg" alt="" data-mce-src="/MelisDemoCmsTwig/images/product/02.jpg"></div></div></div>]]></melisTag>    <melisTag id="content_text_3"><![CDATA[<div class="show-product row"><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/03.jpg" alt="" /></div></div><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat">Brand Cortta</h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div></div>]]></melisTag> <melisTag id="content_text_4"><![CDATA[<div class="show-product row"><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat">Brand Cortta</h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/04.jpg" alt="" /></div></div></div>]]></melisTag> <melisTag id="content_text_5"><![CDATA[<div class="show-product row"><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/05.jpg" alt="" /></div></div><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat">Brand Cortta</h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div></div>]]></melisTag> <melisTag id="content_text_6"><![CDATA[<div class="show-product row"><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat">Brand Cortta</h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/06.jpg" alt="" /></div></div></div>]]></melisTag> <melisTag id="header_subtitle"><![CDATA[<h5 class="uppercase">suits</h5>]]></melisTag>  <melisTag id="content_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/team/suits/p01.jpg" />]]></melisTag>   <melisTag id="content_subtitle1"><![CDATA[New Fashion]]></melisTag> <melisTag id="content_title"><![CDATA[Domna]]></melisTag>   <melisTag id="content_subtitle2"><![CDATA[Class Selection]]></melisTag> <melisTag id="content_text"><![CDATA[<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>]]></melisTag></document>',

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
                                                // </OurDesigns | Suits | Domna>

                                                // <OurDesigns | Suits | Fuerza>
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
                                                                'page_name' => 'Fuerza',
                                                                'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Content Details']],
                                                                'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="header_image"><![CDATA[<img alt="" src="/MelisDemoCmsTwig/images/bg/designs.jpg" data-mce-src="/MelisDemoCmsTwig/images/bg/designs.jpg">]]></melisTag>    <melisTag id="header_title"><![CDATA[Our Designs]]></melisTag>  <melisTag id="content_subtitle"><![CDATA[suit 2]]></melisTag>   <melisTag id="content_text_1"><![CDATA[<div class="show-product row"><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/01.jpg" alt="" data-mce-src="/MelisDemoCmsTwig/images/product/01.jpg"></div></div><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat">Brand Cortta</h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div></div>]]></melisTag>    <melisTag id="content_text_2"><![CDATA[<div class="show-product row"><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat">Brand Cortta</h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/02.jpg" alt="" data-mce-src="/MelisDemoCmsTwig/images/product/02.jpg"></div></div></div>]]></melisTag>    <melisTag id="header_subtitle"><![CDATA[<h5 class="uppercase">suits</h5>]]></melisTag>  <melisTag id="content_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/team/suits/p02.jpg">]]></melisTag> <melisTag id="content_subtitle1"><![CDATA[New Fashion]]></melisTag> <melisTag id="content_title"><![CDATA[Fuerza]]></melisTag>  <melisTag id="content_subtitle2"><![CDATA[Class Selection]]></melisTag> <melisTag id="content_text"><![CDATA[<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>]]></melisTag></document>',

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
                                                // </OurDesigns | Suits | Fuerza>

                                                // <OurDesigns | Suits | Galant>
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
                                                                'page_name' => 'Galant',
                                                                'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Content Details']],
                                                                'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="header_image"><![CDATA[<img alt="" src="/MelisDemoCmsTwig/images/bg/designs.jpg" data-mce-src="/MelisDemoCmsTwig/images/bg/designs.jpg">]]></melisTag>    <melisTag id="header_title"><![CDATA[Our Designs]]></melisTag>  <melisTag id="header_subtitle"><![CDATA[<h5 class="uppercase">suits</h5>]]></melisTag>  <melisTag id="content_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/team/suits/p03.jpg">]]></melisTag> <melisTag id="content_subtitle1"><![CDATA[New Fashion]]></melisTag> <melisTag id="content_title"><![CDATA[Galant]]></melisTag>  <melisTag id="content_subtitle2"><![CDATA[Class Selection]]></melisTag> <melisTag id="content_text"><![CDATA[<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>]]></melisTag></document>',

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
                                                // </OurDesigns | Suits | Galant>

                                                // <OurDesigns | Suits | Scoop>
                                                [
                                                    Melis::PRIMARY_KEY => 'tree_page_id',
                                                    'tree_page_id' => Melis::CURRENT_PAGE_ID,
                                                    'tree_father_page_id' => Melis::FOREIGN_KEY,
                                                    'tree_page_order' => 4,
                                                    Site::THEN => [Site::UPDATE_CURRENT_PAGE_ID],
                                                    Melis::RELATION => [
                                                        Melis::CMS_PAGE_PUBLISHED => [
                                                            [
                                                                Melis::PRIMARY_KEY => 'page_id',
                                                                'page_id' => Melis::FOREIGN_KEY,
                                                                'page_type' => 'PAGE',
                                                                'page_status' => '1',
                                                                'page_menu' => 'LINK',
                                                                'page_name' => 'Scoop',
                                                                'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Content Details']],
                                                                'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="header_image"><![CDATA[<img alt="" src="/MelisDemoCmsTwig/images/bg/designs.jpg" data-mce-src="/MelisDemoCmsTwig/images/bg/designs.jpg">]]></melisTag>    <melisTag id="header_title"><![CDATA[Our Designs]]></melisTag>  <melisTag id="header_subtitle"><![CDATA[suits]]></melisTag> <melisTag id="content_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/team/suits/p04.jpg">]]></melisTag> <melisTag id="content_subtitle1"><![CDATA[New Fashion]]></melisTag> <melisTag id="content_title"><![CDATA[scoop]]></melisTag>   <melisTag id="content_subtitle2"><![CDATA[class selection]]></melisTag> <melisTag id="content_text"><![CDATA[<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>]]></melisTag></document>',

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
                                                // </OurDesigns | Suits | Scoop>
                                            ]
                                        ]
                                    ],
                                    // </OutDesigns | Suits>

                                    // <OurDesigns | Shoes>
                                    [
                                        Melis::PRIMARY_KEY => 'tree_page_id',
                                        'tree_page_id' => Melis::CURRENT_PAGE_ID,
                                        'tree_father_page_id' => Melis::FOREIGN_KEY,
                                        'tree_page_order' => 9,
                                        Site::THEN => [Site::UPDATE_CURRENT_PAGE_ID],
                                        Melis::RELATION => [
                                            Melis::CMS_PAGE_PUBLISHED => [
                                                [
                                                    Melis::PRIMARY_KEY => 'page_id',
                                                    'page_id' => Melis::FOREIGN_KEY,
                                                    'page_type' => 'PAGE',
                                                    'page_status' => '1',
                                                    'page_menu' => 'LINK',
                                                    'page_name' => 'Shoes',
                                                    'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Content Details']],
                                                    'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="header_image"><![CDATA[<img alt="" src="/MelisDemoCmsTwig/images/bg/designs.jpg" data-mce-src="/MelisDemoCmsTwig/images/bg/designs.jpg">]]></melisTag>    <melisTag id="header_title"><![CDATA[Our Designs]]></melisTag>  <melisTag id="content_subtitle"><![CDATA[shoes]]></melisTag>    <melisTag id="content_text_1"><![CDATA[<div class="show-product row"><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/shoes/01/04.jpg" /></div></div><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat"><a href="/our-designs/shoes/mounster/id/18">Mounster</a></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div></div>]]></melisTag>   <melisTag id="content_text_2"><![CDATA[<div class="show-product row"><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat"><a href="/our-designs/shoes/regalo/id/19">regalo</a></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/shoes/02/01.jpg" /></div></div></div>]]></melisTag>   <melisTag id="header_subtitle"><![CDATA[shoes]]></melisTag> <melisTag id="content_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/team/branding.png" alt="" data-mce-src="/MelisDemoCmsTwig/images/team/branding.png">]]></melisTag> <melisTag id="content_subtitle1"><![CDATA[New Fashion]]></melisTag> <melisTag id="content_text_4"><![CDATA[<div class="show-product row"><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat"><a href="/our-designs/shoes/slany/id/21">Slany</a></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/shoes/04/03.jpg" /></div></div></div>]]></melisTag> <melisTag id="content_text_3"><![CDATA[<div class="show-product row"><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/shoes/03/03.jpg" /></div></div><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat"><a href="/our-designs/shoes/zekker/id/20">Zekker</a></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div></div>]]></melisTag>   <melisTag id="content_text_5"><![CDATA[<div class="show-product row"><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/shoes/05/01.jpg" /></div></div><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat"><a href="/our-designs/shoes/tripknot/id/22">tripknot</a></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div></div>]]></melisTag>   <melisTag id="content_text_6"><![CDATA[]]></melisTag></document>',

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
                                                // <OurDesigns | Shoes | Mounster>
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
                                                                'page_name' => 'Mounster',
                                                                'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Content Details']],
                                                                'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="header_image"><![CDATA[<img alt="" src="/MelisDemoCmsTwig/images/bg/designs.jpg" data-mce-src="/MelisDemoCmsTwig/images/bg/designs.jpg">]]></melisTag>    <melisTag id="header_title"><![CDATA[Our Designs]]></melisTag>  <melisTag id="content_subtitle"><![CDATA[Shirts]]></melisTag>   <melisTag id="content_text_1"><![CDATA[<div class="show-product row"><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/01.jpg" alt="" data-mce-src="/MelisDemoCmsTwig/images/product/01.jpg"></div></div><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat">Brand Cortta</h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div></div>]]></melisTag>    <melisTag id="content_text_2"><![CDATA[<div class="show-product row"><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat">Brand Cortta</h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/02.jpg" alt="" data-mce-src="/MelisDemoCmsTwig/images/product/02.jpg"></div></div></div>]]></melisTag>    <melisTag id="header_subtitle"><![CDATA[shoes]]></melisTag> <melisTag id="content_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/team/shoes/p01.jpg" data-mce-src="/MelisDemoCmsTwig/images/team/shoes/p01.jpg">]]></melisTag>  <melisTag id="content_subtitle1"><![CDATA[New Fashion]]></melisTag> <melisTag id="content_title"><![CDATA[Mounster]]></melisTag>    <melisTag id="content_subtitle2"><![CDATA[Envy Style]]></melisTag>  <melisTag id="content_text"><![CDATA[<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>]]></melisTag></document>',

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
                                                // </OurDesigns | Shoes | Mounster>

                                                // <OurDesigns | Shoes | Regalo>
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
                                                                'page_name' => 'Regalo',
                                                                'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Content Details']],
                                                                'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="header_image"><![CDATA[<img alt="" src="/MelisDemoCmsTwig/images/bg/designs.jpg" data-mce-src="/MelisDemoCmsTwig/images/bg/designs.jpg">]]></melisTag>    <melisTag id="header_title"><![CDATA[Our Designs]]></melisTag>  <melisTag id="content_subtitle"><![CDATA[Shirts]]></melisTag>   <melisTag id="content_text_1"><![CDATA[<div class="show-product row">                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">                    <div class="brand-img text-center">                        <img src="/MelisDemoCmsTwig/images/product/01.jpg" alt="">                    </div>                </div>                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">                    <div class="show-product-description">                        <h6 class="sp-category">New Fashion</h6>                        <h2 class="uppercase montserrat">Brand Cortta</h2>                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>                                                    </div>                </div>            </div>]]></melisTag>   <melisTag id="content_text_2"><![CDATA[<div class="show-product row">                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">                    <div class="show-product-description">                        <h6 class="sp-category">New Fashion</h6>                        <h2 class="uppercase montserrat">Brand Cortta</h2>                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>                    </div>                </div>                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">                    <div class="brand-img text-center">                        <img src="/MelisDemoCmsTwig/images/product/02.jpg" alt="">                    </div>                </div>            </div>]]></melisTag>   <melisTag id="header_subtitle"><![CDATA[shoes]]></melisTag> <melisTag id="content_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/team/shoes/p02.jpg" data-mce-src="/MelisDemoCmsTwig/images/team/shoes/p02.jpg">]]></melisTag>  <melisTag id="content_subtitle1"><![CDATA[New Fashion]]></melisTag> <melisTag id="content_title"><![CDATA[Regalo]]></melisTag>  <melisTag id="content_subtitle2"><![CDATA[Envy Style]]></melisTag>  <melisTag id="content_text"><![CDATA[<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>]]></melisTag></document>',

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
                                                // </OurDesigns | Shoes | Regalo>

                                                // <OurDesigns | Shoes | Zekker>
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
                                                                'page_name' => 'Zekker',
                                                                'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Content Details']],
                                                                'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="header_image"><![CDATA[<img alt="" src="/MelisDemoCmsTwig/images/bg/designs.jpg" />]]></melisTag> <melisTag id="header_title"><![CDATA[Our Designs]]></melisTag>  <melisTag id="content_subtitle"><![CDATA[Shirts]]></melisTag>   <melisTag id="content_text_1"><![CDATA[<div class="show-product row">                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">                    <div class="brand-img text-center">                        <img src="/MelisDemoCmsTwig/images/product/01.jpg" alt="">                    </div>                </div>                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">                    <div class="show-product-description">                        <h6 class="sp-category">New Fashion</h6>                        <h2 class="uppercase montserrat">Brand Cortta</h2>                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>                                                    </div>                </div>            </div>]]></melisTag>   <melisTag id="content_text_2"><![CDATA[<div class="show-product row">                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">                    <div class="show-product-description">                        <h6 class="sp-category">New Fashion</h6>                        <h2 class="uppercase montserrat">Brand Cortta</h2>                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>                    </div>                </div>                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">                    <div class="brand-img text-center">                        <img src="/MelisDemoCmsTwig/images/product/02.jpg" alt="">                    </div>                </div>            </div>]]></melisTag>   <melisTag id="header_subtitle"><![CDATA[shoes]]></melisTag> <melisTag id="content_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/team/shoes/p03.jpg"/>]]></melisTag>    <melisTag id="content_subtitle1"><![CDATA[New Fashion]]></melisTag> <melisTag id="content_title"><![CDATA[Zekker]]></melisTag>  <melisTag id="content_subtitle2"><![CDATA[Envy Style]]></melisTag>  <melisTag id="content_text"><![CDATA[<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>]]></melisTag></document>',

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
                                                // </OurDesigns | Shoes | Zekker>

                                                // <OurDesigns | Shoes | Slany>
                                                [
                                                    Melis::PRIMARY_KEY => 'tree_page_id',
                                                    'tree_page_id' => Melis::CURRENT_PAGE_ID,
                                                    'tree_father_page_id' => Melis::FOREIGN_KEY,
                                                    'tree_page_order' => 4,
                                                    Site::THEN => [Site::UPDATE_CURRENT_PAGE_ID],
                                                    Melis::RELATION => [
                                                        Melis::CMS_PAGE_PUBLISHED => [
                                                            [
                                                                Melis::PRIMARY_KEY => 'page_id',
                                                                'page_id' => Melis::FOREIGN_KEY,
                                                                'page_type' => 'PAGE',
                                                                'page_status' => '1',
                                                                'page_menu' => 'LINK',
                                                                'page_name' => 'Slany',
                                                                'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Content Details']],
                                                                'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="header_image"><![CDATA[<img alt="" src="/MelisDemoCmsTwig/images/bg/designs.jpg" data-mce-src="/MelisDemoCmsTwig/images/bg/designs.jpg">]]></melisTag>    <melisTag id="header_title"><![CDATA[Our Designs]]></melisTag>  <melisTag id="content_subtitle"><![CDATA[Shirts]]></melisTag>   <melisTag id="content_text_1"><![CDATA[<div class="show-product row">                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">                    <div class="brand-img text-center">                        <img src="/MelisDemoCmsTwig/images/product/01.jpg" alt="">                    </div>                </div>                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">                    <div class="show-product-description">                        <h6 class="sp-category">New Fashion</h6>                        <h2 class="uppercase montserrat">Brand Cortta</h2>                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>                                                    </div>                </div>            </div>]]></melisTag>   <melisTag id="content_text_2"><![CDATA[<div class="show-product row">                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">                    <div class="show-product-description">                        <h6 class="sp-category">New Fashion</h6>                        <h2 class="uppercase montserrat">Brand Cortta</h2>                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>                    </div>                </div>                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">                    <div class="brand-img text-center">                        <img src="/MelisDemoCmsTwig/images/product/02.jpg" alt="">                    </div>                </div>            </div>]]></melisTag>   <melisTag id="header_subtitle"><![CDATA[shoes]]></melisTag> <melisTag id="content_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/team/shoes/p04.jpg" data-mce-src="/MelisDemoCmsTwig/images/team/shoes/p04.jpg">]]></melisTag>  <melisTag id="content_subtitle1"><![CDATA[New Fashion]]></melisTag> <melisTag id="content_title"><![CDATA[Slany]]></melisTag>   <melisTag id="content_subtitle2"><![CDATA[Envy Style]]></melisTag>  <melisTag id="content_text"><![CDATA[<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>]]></melisTag></document>',

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
                                                // </OurDesigns | Shoes | Slany>

                                                // <OurDesigns | Shoes | Tripknot>
                                                [
                                                    Melis::PRIMARY_KEY => 'tree_page_id',
                                                    'tree_page_id' => Melis::CURRENT_PAGE_ID,
                                                    'tree_father_page_id' => Melis::FOREIGN_KEY,
                                                    'tree_page_order' => 5,
                                                    Site::THEN => [Site::UPDATE_CURRENT_PAGE_ID],
                                                    Melis::RELATION => [
                                                        Melis::CMS_PAGE_PUBLISHED => [
                                                            [
                                                                Melis::PRIMARY_KEY => 'page_id',
                                                                'page_id' => Melis::FOREIGN_KEY,
                                                                'page_type' => 'PAGE',
                                                                'page_status' => '1',
                                                                'page_menu' => 'LINK',
                                                                'page_name' => 'Tripknot',
                                                                'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Content Details']],
                                                                'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="footer_title_1"><![CDATA[Contact US]]></melisTag> <melisTag id="footer_text_1"><![CDATA[<ul>                                        <li>                                            <div class="contact-icon">                                               <i class="zmdi zmdi-pin-drop"></i>                                          </div>                                            <div class="contact-text">                                                <p><span>777/a  Seventh Street,</span> <span>Rampura, Bonosri</span></p>                                            </div>                                        </li>                                        <li>                                            <div class="contact-icon"> <i class="zmdi zmdi-email-open"></i> </div>                                            <div class="contact-text">                                                <p><span><a href="#">company@gmail.com</a></span> <span><a href="#">admin@devitems.com</a></span></p>                                            </div>                                        </li>                                        <li>                                            <div class="contact-icon"> <i class="zmdi zmdi-phone-paused"></i> </div>                                            <div class="contact-text">                                                <p><span>+11 (019) 25184203</span> <span>+11 (018) 50950555</span></p>                                            </div>                                        </li>                                    </ul>]]></melisTag>    <melisTag id="footer_title_2"><![CDATA[Information]]></melisTag>    <melisTag id="footer_text_2"><![CDATA[<li><a href="#">My Account</a></li>                                                <li><a href="#">Order History</a></li>                                                <li><a href="#">Wishlist</a></li>                                                <li><a href="#">Returnes</a></li>                                                <li><a href="#">Private Policy</a></li>                                                <li><a href="#">Site Map</a></li>]]></melisTag> <melisTag id="footer_title_3"><![CDATA[InstaGram]]></melisTag>  <melisTag id="header_image"><![CDATA[<img alt="" src="/MelisDemoCmsTwig/images/bg/designs.jpg" data-mce-src="/MelisDemoCmsTwig/images/bg/designs.jpg">]]></melisTag>    <melisTag id="header_title"><![CDATA[Our Designs]]></melisTag>  <melisTag id="content_subtitle"><![CDATA[Shirts]]></melisTag>   <melisTag id="content_text_1"><![CDATA[<div class="show-product row">                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">                    <div class="brand-img text-center">                        <img src="/MelisDemoCmsTwig/images/product/01.jpg" alt="">                    </div>                </div>                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">                    <div class="show-product-description">                        <h6 class="sp-category">New Fashion</h6>                        <h2 class="uppercase montserrat">Brand Cortta</h2>                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>                                                    </div>                </div>            </div>]]></melisTag>   <melisTag id="content_text_2"><![CDATA[<div class="show-product row">                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">                    <div class="show-product-description">                        <h6 class="sp-category">New Fashion</h6>                        <h2 class="uppercase montserrat">Brand Cortta</h2>                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>                    </div>                </div>                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">                    <div class="brand-img text-center">                        <img src="/MelisDemoCmsTwig/images/product/02.jpg" alt="">                    </div>                </div>            </div>]]></melisTag>   <melisTag id="header_subtitle"><![CDATA[shoes 5]]></melisTag>   <melisTag id="content_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/team/shoes/p05.jpg" />]]></melisTag>   <melisTag id="content_subtitle1"><![CDATA[New Fashion]]></melisTag> <melisTag id="content_title"><![CDATA[Tripknot]]></melisTag>    <melisTag id="content_subtitle2"><![CDATA[Envy Style]]></melisTag>  <melisTag id="content_text"><![CDATA[<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>]]></melisTag></document>',

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
                                                // </OurDesigns | Shoes | Tripknot>
                                            ],
                                        ]
                                    ],
                                    // </OurDesigns | Shoes>

                                    // <OurDesigns | Sunglasses>
                                    [
                                        Melis::PRIMARY_KEY => 'tree_page_id',
                                        'tree_page_id' => Melis::CURRENT_PAGE_ID,
                                        'tree_father_page_id' => Melis::FOREIGN_KEY,
                                        'tree_page_order' => 10,
                                        Site::THEN => [Site::UPDATE_CURRENT_PAGE_ID],
                                        Melis::RELATION => [
                                            Melis::CMS_PAGE_PUBLISHED => [
                                                [
                                                    Melis::PRIMARY_KEY => 'page_id',
                                                    'page_id' => Melis::FOREIGN_KEY,
                                                    'page_type' => 'PAGE',
                                                    'page_status' => '1',
                                                    'page_menu' => 'LINK',
                                                    'page_name' => 'Sunglasses',
                                                    'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Content Details']],
                                                    'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="header_image"><![CDATA[<img alt="" src="/MelisDemoCmsTwig/images/bg/designs.jpg" data-mce-src="/MelisDemoCmsTwig/images/bg/designs.jpg">]]></melisTag>    <melisTag id="header_title"><![CDATA[Our Designs]]></melisTag>  <melisTag id="content_subtitle"><![CDATA[sunglasses]]></melisTag>   <melisTag id="content_text_1"><![CDATA[<div class="show-product row"><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/sunglasses/01/01.jpg" /></div></div><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat"><a href="/our-designs/sunglasses/cliff/id/24">cliff</a></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div></div>]]></melisTag>   <melisTag id="content_text_2"><![CDATA[<div class="show-product row"><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat"><a href="/our-designs/sunglasses/molgan/id/25">Molgan</a></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/sunglasses/02/03.jpg" /></div></div></div>]]></melisTag> <melisTag id="header_subtitle"><![CDATA[Brand Product]]></melisTag> <melisTag id="content_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/team/branding.png" alt="" data-mce-src="/MelisDemoCmsTwig/images/team/branding.png">]]></melisTag> <melisTag id="content_subtitle1"><![CDATA[New Fashion]]></melisTag> <melisTag id="content_text_3"><![CDATA[<div class="show-product row"><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/sunglasses/03/01.jpg" /></div></div><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat"><a href="/our-designs/sunglasses/revrex/id/26">Revrex</a></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div></div>]]></melisTag> <melisTag id="content_text_4"><![CDATA[<div class="show-product row"><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat"><a href="/our-designs/sunglasses/greekster/id/27">greekster</a></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/sunglasses/04/01.jpg" /></div></div></div>]]></melisTag>   <melisTag id="content_text_5"><![CDATA[<div class="show-product row"><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/sunglasses/05/02.jpg" /></div></div><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat"><a href="/our-designs/sunglasses/yopla/id/28">Yopla</a></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div></div>]]></melisTag>   <melisTag id="content_text_6"><![CDATA[]]></melisTag></document>',

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
                                                // <OurDesigns | Sunglasses | Cliff>
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
                                                                'page_name' => 'Cliff',
                                                                'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Content Details']],
                                                                'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="header_image"><![CDATA[<img alt="" src="/MelisDemoCmsTwig/images/bg/designs.jpg" data-mce-src="/MelisDemoCmsTwig/images/bg/designs.jpg">]]></melisTag>    <melisTag id="header_title"><![CDATA[Our Designs]]></melisTag>  <melisTag id="content_subtitle"><![CDATA[sunglasses]]></melisTag>   <melisTag id="content_text_1"><![CDATA[<div class="show-product row"><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/sunglasses/01/01.jpg" /></div></div><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat"><a href="/our-designs/sunglasses/cliff/id/24">cliff</a></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div></div>]]></melisTag>   <melisTag id="content_text_2"><![CDATA[<div class="show-product row"><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat"><a href="/our-designs/sunglasses/molgan/id/25">Molgan</a></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/sunglasses/02/03.jpg" /></div></div></div>]]></melisTag> <melisTag id="header_subtitle"><![CDATA[Brand Product]]></melisTag> <melisTag id="content_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/team/branding.png" alt="" data-mce-src="/MelisDemoCmsTwig/images/team/branding.png">]]></melisTag> <melisTag id="content_subtitle1"><![CDATA[New Fashion]]></melisTag> <melisTag id="content_text_3"><![CDATA[<div class="show-product row"><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/sunglasses/03/01.jpg" /></div></div><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat"><a href="/our-designs/sunglasses/revrex/id/26">Revrex</a></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div></div>]]></melisTag> <melisTag id="content_text_4"><![CDATA[<div class="show-product row"><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat"><a href="/our-designs/sunglasses/greekster/id/27">greekster</a></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/sunglasses/04/01.jpg" /></div></div></div>]]></melisTag>   <melisTag id="content_text_5"><![CDATA[<div class="show-product row"><div class="col-lg-5 col-md-5 col-sm-6 col-xs-12"><div class="brand-img text-center"><img src="/MelisDemoCmsTwig/images/product/sunglasses/05/02.jpg" /></div></div><div class="col-lg-7 col-md-7 col-sm-6 col-xs-12"><div class="show-product-description"><h6 class="sp-category">New Fashion</h6><h2 class="uppercase montserrat"><a href="/our-designs/sunglasses/yopla/id/28">Yopla</a></h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div></div>]]></melisTag>   <melisTag id="content_text_6"><![CDATA[]]></melisTag></document>',

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
                                                // </OurDesigns | Sunglasses | Cliff>

                                                // <OurDesigns | Sunglasses | Molgan>
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
                                                                'page_name' => 'Molgan',
                                                                'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Content Details']],
                                                                'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="header_image"><![CDATA[<img alt="" src="/MelisDemoCmsTwig/images/bg/designs.jpg" data-mce-src="/MelisDemoCmsTwig/images/bg/designs.jpg">]]></melisTag>    <melisTag id="header_title"><![CDATA[Our Designs]]></melisTag>  <melisTag id="content_subtitle"><![CDATA[Shirts]]></melisTag>   <melisTag id="content_text_1"><![CDATA[<div class="show-product row">                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">                    <div class="brand-img text-center">                        <img src="/MelisDemoCmsTwig/images/product/01.jpg" alt="">                    </div>                </div>                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">                    <div class="show-product-description">                        <h6 class="sp-category">New Fashion</h6>                        <h2 class="uppercase montserrat">Brand Cortta</h2>                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>                                                    </div>                </div>            </div>]]></melisTag>   <melisTag id="content_text_2"><![CDATA[<div class="show-product row">                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">                    <div class="show-product-description">                        <h6 class="sp-category">New Fashion</h6>                        <h2 class="uppercase montserrat">Brand Cortta</h2>                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>                    </div>                </div>                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">                    <div class="brand-img text-center">                        <img src="/MelisDemoCmsTwig/images/product/02.jpg" alt="">                    </div>                </div>            </div>]]></melisTag>   <melisTag id="header_subtitle"><![CDATA[sunglasses]]></melisTag>    <melisTag id="content_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/team/sunglasses/p02.jpg">]]></melisTag>    <melisTag id="content_subtitle1"><![CDATA[New Fashion]]></melisTag> <melisTag id="content_title"><![CDATA[Molgan]]></melisTag>  <melisTag id="content_subtitle2"><![CDATA[<span class="product-price">Summer set</span>]]></melisTag>   <melisTag id="content_text"><![CDATA[<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>]]></melisTag></document>',

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
                                                // </OurDesigns | Sunglasses | Molgan>

                                                // <OurDesigns | Sunglasses | Revrex>
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
                                                                'page_name' => 'Revrex',
                                                                'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Content Details']],
                                                                'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="header_image"><![CDATA[<img alt="" src="/MelisDemoCmsTwig/images/bg/designs.jpg">]]></melisTag>   <melisTag id="header_title"><![CDATA[Our Designs]]></melisTag>  <melisTag id="content_subtitle"><![CDATA[accessories 3]]></melisTag>    <melisTag id="content_text_1"><![CDATA[<div class="show-product row">                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">                    <div class="brand-img text-center">                        <img src="/MelisDemoCmsTwig/images/product/01.jpg" alt="">                    </div>                </div>                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">                    <div class="show-product-description">                        <h6 class="sp-category">New Fashion</h6>                        <h2 class="uppercase montserrat">Brand Cortta</h2>                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>                                                    </div>                </div>            </div>]]></melisTag>   <melisTag id="content_text_2"><![CDATA[<div class="show-product row">                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">                    <div class="show-product-description">                        <h6 class="sp-category">New Fashion</h6>                        <h2 class="uppercase montserrat">Brand Cortta</h2>                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>                    </div>                </div>                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">                    <div class="brand-img text-center">                        <img src="/MelisDemoCmsTwig/images/product/02.jpg" alt="">                    </div>                </div>            </div>]]></melisTag>   <melisTag id="header_subtitle"><![CDATA[sunglasses]]></melisTag>    <melisTag id="content_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/team/sunglasses/p03.jpg"/>]]></melisTag>   <melisTag id="content_subtitle1"><![CDATA[New Fashion]]></melisTag> <melisTag id="content_title"><![CDATA[Revrex]]></melisTag>  <melisTag id="content_subtitle2"><![CDATA[Summer set]]></melisTag>  <melisTag id="content_text"><![CDATA[<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>]]></melisTag></document>',

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
                                                // </OurDesigns | Sunglasses | Revrex>

                                                // <OurDesigns | Sunglasses | Greekster>
                                                [
                                                    Melis::PRIMARY_KEY => 'tree_page_id',
                                                    'tree_page_id' => Melis::CURRENT_PAGE_ID,
                                                    'tree_father_page_id' => Melis::FOREIGN_KEY,
                                                    'tree_page_order' => 4,
                                                    Site::THEN => [Site::UPDATE_CURRENT_PAGE_ID],
                                                    Melis::RELATION => [
                                                        Melis::CMS_PAGE_PUBLISHED => [
                                                            [
                                                                Melis::PRIMARY_KEY => 'page_id',
                                                                'page_id' => Melis::FOREIGN_KEY,
                                                                'page_type' => 'PAGE',
                                                                'page_status' => '1',
                                                                'page_menu' => 'LINK',
                                                                'page_name' => 'Greekster',
                                                                'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Content Details']],
                                                                'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="header_image"><![CDATA[<img alt="" src="/MelisDemoCmsTwig/images/bg/designs.jpg" data-mce-src="/MelisDemoCmsTwig/images/bg/breadcumb2.jpg">]]></melisTag> <melisTag id="header_title"><![CDATA[Our Designs]]></melisTag>  <melisTag id="content_subtitle"><![CDATA[Shirts]]></melisTag>   <melisTag id="content_text_1"><![CDATA[<div class="show-product row">                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">                    <div class="brand-img text-center">                        <img src="/MelisDemoCmsTwig/images/product/01.jpg" alt="">                    </div>                </div>                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">                    <div class="show-product-description">                        <h6 class="sp-category">New Fashion</h6>                        <h2 class="uppercase montserrat">Brand Cortta</h2>                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>                                                    </div>                </div>            </div>]]></melisTag>   <melisTag id="content_text_2"><![CDATA[<div class="show-product row">                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">                    <div class="show-product-description">                        <h6 class="sp-category">New Fashion</h6>                        <h2 class="uppercase montserrat">Brand Cortta</h2>                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>                    </div>                </div>                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">                    <div class="brand-img text-center">                        <img src="/MelisDemoCmsTwig/images/product/02.jpg" alt="">                    </div>                </div>            </div>]]></melisTag>   <melisTag id="header_subtitle"><![CDATA[sunglasses]]></melisTag>    <melisTag id="content_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/team/sunglasses/p04.jpg" />]]></melisTag>  <melisTag id="content_subtitle1"><![CDATA[New Fashion]]></melisTag> <melisTag id="content_title"><![CDATA[Greekster]]></melisTag>   <melisTag id="content_subtitle2"><![CDATA[Summer set]]></melisTag>  <melisTag id="content_text"><![CDATA[<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>]]></melisTag></document>',

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
                                                // </OurDesigns | Sunglasses | Greekster>

                                                // <OurDesigns | Sunglasses | Yoopla>
                                                [
                                                    Melis::PRIMARY_KEY => 'tree_page_id',
                                                    'tree_page_id' => Melis::CURRENT_PAGE_ID,
                                                    'tree_father_page_id' => Melis::FOREIGN_KEY,
                                                    'tree_page_order' => 5,
                                                    Site::THEN => [Site::UPDATE_CURRENT_PAGE_ID],
                                                    Melis::RELATION => [
                                                        Melis::CMS_PAGE_PUBLISHED => [
                                                            [
                                                                Melis::PRIMARY_KEY => 'page_id',
                                                                'page_id' => Melis::FOREIGN_KEY,
                                                                'page_type' => 'PAGE',
                                                                'page_status' => '1',
                                                                'page_menu' => 'LINK',
                                                                'page_name' => 'Yoopla',
                                                                'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Content Details']],
                                                                'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="header_image"><![CDATA[<img alt="" src="/MelisDemoCmsTwig/images/bg/designs.jpg" data-mce-src="/MelisDemoCmsTwig/images/bg/designs.jpg">]]></melisTag>    <melisTag id="header_title"><![CDATA[Our Designs]]></melisTag>  <melisTag id="content_subtitle"><![CDATA[Shirts]]></melisTag>   <melisTag id="content_text_1"><![CDATA[<div class="show-product row">                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">                    <div class="brand-img text-center">                        <img src="/MelisDemoCmsTwig/images/product/01.jpg" alt="">                    </div>                </div>                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">                    <div class="show-product-description">                        <h6 class="sp-category">New Fashion</h6>                        <h2 class="uppercase montserrat">Brand Cortta</h2>                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>                                                    </div>                </div>            </div>]]></melisTag>   <melisTag id="content_text_2"><![CDATA[<div class="show-product row">                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">                    <div class="show-product-description">                        <h6 class="sp-category">New Fashion</h6>                        <h2 class="uppercase montserrat">Brand Cortta</h2>                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>                    </div>                </div>                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">                    <div class="brand-img text-center">                        <img src="/MelisDemoCmsTwig/images/product/02.jpg" alt="">                    </div>                </div>            </div>]]></melisTag>   <melisTag id="header_subtitle"><![CDATA[sunglasses]]></melisTag>    <melisTag id="content_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/team/sunglasses/p05.jpg" />]]></melisTag>  <melisTag id="content_subtitle1"><![CDATA[New Fashion]]></melisTag> <melisTag id="content_title"><![CDATA[Yopla]]></melisTag>   <melisTag id="content_subtitle2"><![CDATA[Summer set]]></melisTag>  <melisTag id="content_text"><![CDATA[<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>]]></melisTag></document>',

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
                                                // </OurDesigns | Sunglasses | Yoopla>
                                            ],
                                        ]
                                    ],
                                    // </OurDesigns | Sunglasses>
                                ],
                            ],
                        ],
                        // </OurDesigns>

                        // <AboutUs>
                        [
                            Melis::PRIMARY_KEY => 'tree_page_id',
                            'tree_page_id' => Melis::CURRENT_PAGE_ID,
                            'tree_father_page_id' => Melis::CMS_SITE_ID,
                            'tree_page_order' => 12,
                            Site::THEN => [Site::UPDATE_CURRENT_PAGE_ID, Site::TRIGGER_EVENT => ['event_name' => 'melis_marketplace_site_intall_test', 'params' => ['page' => 'AboutUs']]],
                            Melis::RELATION => [
                                Melis::CMS_PAGE_PUBLISHED => [
                                    [
                                        Melis::PRIMARY_KEY => 'page_id',
                                        'page_id' => Melis::FOREIGN_KEY,
                                        'page_type' => 'PAGE',
                                        'page_status' => '1',
                                        'page_menu' => 'LINK',
                                        'page_name' => 'About us',
                                        'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'About']],
                                        'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="content_subtitle"><![CDATA[Our designs]]></melisTag>  <melisTag id="header_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/bg/about.jpg" caption="false" data-mce-src="/MelisDemoCmsTwig/images/bg/about.jpg">]]></melisTag>   <melisTag id="header_title"><![CDATA[ABOUT DETAILS]]></melisTag>    <melisTag id="about_part1_title"><![CDATA[About Us]]></melisTag>    <melisTag id="about_part1_image"><![CDATA[<img class="img-responsive" src="/MelisDemoCmsTwig/images/blog/about01.jpg" />]]></melisTag>  <melisTag id="about_part1_text"><![CDATA[<div class="about-des"><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p></div>]]></melisTag> <melisTag id="about_part2_title"><![CDATA[Why choose us]]></melisTag>   <melisTag id="about_part2_text"><![CDATA[<div class="col-md-3 col-sm-4 col-xs-12"><div class="single-choose text-center"><div class="choose-icon pos-rltv"><div class="svg"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 70 70" enable-background="new 0 0 70 70" xml:space="preserve"> <g> <path fill="#262826" d="M18.4,57c0,0,5.5,2.3,7.9-2C26.3,55,22.5,52.1,18.4,57z"></path> <path fill="#262826" d="M22.5,48.8c-0.3,3.2,1.9,4.8,1.9,4.8c1.2,0,2.3,0.9,2.3,0.9C27.3,50.1,22.5,48.8,22.5,48.8z"></path> <path fill="#262826" d="M12.4,52.4c0,0,4.4,3.6,8.1,0.3C20.5,52.8,17.5,48.7,12.4,52.4z"></path> <path fill="#262826" d="M18.7,50.9c1.3,0.3,1.9,1.4,1.9,1.4c2.2-4-2.3-6.7-2.3-6.7C17.2,48.5,18.7,50.9,18.7,50.9z"></path> <path fill="#262826" d="M15.3,48.8c0,0-2.4-4.5-8.1-1.7C7.2,47.2,11.1,51.5,15.3,48.8z"></path> <path fill="#262826" d="M14.3,41.5c-1.6,2.6-0.4,5.1-0.4,5.1c1.3,0.6,1.8,1.6,1.8,1.6C18.2,44.8,14.3,41.5,14.3,41.5z"></path> <path fill="#262826" d="M10.7,44.1c0,0-1.3-4.9-7.4-3.5C3.3,40.6,6.1,45.7,10.7,44.1z"></path> <path fill="#262826" d="M11.1,43.7c3.3-2.8,0.5-7,0.5-7c-2.3,2.2-1.6,5-1.6,5C11,42.6,11.1,43.7,11.1,43.7z"></path> <path fill="#262826" d="M7.7,39c0,0,0.3-5-6.1-5.4C1.6,33.6,2.9,39.3,7.7,39z"></path> <path fill="#262826" d="M10.7,32.2c-2.9,1.6-3,4.3-3,4.3c0.7,1.3,0.6,2.3,0.6,2.3C12.4,37,10.7,32.2,10.7,32.2z"></path> <path fill="#262826" d="M5.3,32.8c0,0,1-5-5.2-6.4C0,26.4,0.4,32.2,5.3,32.8z"></path> <path fill="#262826" d="M9.2,26.4c-3,1.2-3.6,3.8-3.6,3.8c0.5,1.3,0.3,2.5,0.3,2.5C10.2,31.5,9.2,26.4,9.2,26.4z"></path> <path fill="#262826" d="M4.8,26.1c0,0,1.9-4.7-4-7.3C0.8,18.8,0.1,24.5,4.8,26.1z"></path> <path fill="#262826" d="M9.8,20.5c-3.1,0.5-4.2,3-4.2,3c0.3,1.3-0.3,2.4-0.3,2.4C9.8,25.5,9.8,20.5,9.8,20.5z"></path> <path fill="#262826" d="M5.1,19.3c0,0,3-4-2.1-7.9C3,11.4,0.8,16.8,5.1,19.3z"></path> <path fill="#262826" d="M11.3,15.3c-3.2-0.3-4.9,1.9-4.9,1.9c0,1.3-0.8,2.3-0.8,2.3C10.1,20.3,11.3,15.3,11.3,15.3z"></path> <path fill="#262826" d="M19.1,0.5c0,0-8.6,0.8-9.3,8C9.8,8.5,17.2,9.9,19.1,0.5z"></path> <path fill="#262826" d="M6.5,5.2c0,0-3.2,4.9,0.2,8.2C6.7,13.3,10.7,10.2,6.5,5.2z"></path> <path fill="#262826" d="M7.4,13.6c4,1.8,6.3-2.7,6.3-2.7c-2.9-0.9-5,0.7-5,0.7C8.2,13,7.4,13.6,7.4,13.6z"></path> <path fill="#262826" d="M43.8,55c2.6,4.2,8,2,8,2C47.8,52.1,43.8,55,43.8,55z"></path> <path fill="#262826" d="M47.8,48.8c0,0-4.9,1.2-4.1,5.7c0,0,0.8-0.9,2.3-0.9C45.9,53.6,48,52.1,47.8,48.8z"></path> <path fill="#262826" d="M49.7,52.8c3.7,3.3,8.2-0.3,8.2-0.3C52.7,48.7,49.7,52.8,49.7,52.8z"></path> <path fill="#262826" d="M49.4,52.3c0,0,0.7-1.1,2-1.4c0,0,1.6-2.4,0.3-5.3C51.8,45.6,47.4,48.3,49.4,52.3z"></path> <path fill="#262826" d="M54.9,48.8c4.3,2.7,8.2-1.7,8.2-1.7C57.3,44.4,54.9,48.8,54.9,48.8z"></path> <path fill="#262826" d="M54.6,48.3c0,0,0.5-1,1.6-1.6c0,0,1.2-2.5-0.3-5.1C55.9,41.5,51.9,44.8,54.6,48.3z"></path> <path fill="#262826" d="M59.6,44.1c4.7,1.6,7.4-3.5,7.4-3.5C60.7,39.2,59.6,44.1,59.6,44.1z"></path> <path fill="#262826" d="M59.1,43.7c0,0,0.2-1,1.1-2c0,0,0.5-2.8-1.7-5C58.6,36.7,55.6,40.8,59.1,43.7z"></path> <path fill="#262826" d="M62.5,39c4.9,0.3,6-5.4,6-5.4C62.3,34,62.5,39,62.5,39z"></path> <path fill="#262826" d="M59.6,32.2c0,0-1.7,4.8,2.3,6.6c0,0-0.2-1,0.7-2.3C62.6,36.5,62.3,33.8,59.6,32.2z"></path> <path fill="#262826" d="M65.1,32.8c4.8-0.5,5.1-6.4,5.1-6.4C63.9,27.8,65.1,32.8,65.1,32.8z"></path> <path fill="#262826" d="M61.1,26.4c0,0-1.2,5.2,3.2,6.4c0,0-0.2-1.2,0.2-2.5C64.5,30.2,63.9,27.5,61.1,26.4z"></path> <path fill="#262826" d="M65.5,26.1c4.6-1.5,3.9-7.3,3.9-7.3C63.5,21.3,65.5,26.1,65.5,26.1z"></path> <path fill="#262826" d="M64.6,23.5c0,0-1.1-2.5-4.2-3c0,0,0,5,4.3,5.4C64.8,25.9,64.3,24.8,64.6,23.5z"></path> <path fill="#262826" d="M65.2,19.3c4.2-2.5,2-7.9,2-7.9C62.2,15.3,65.2,19.3,65.2,19.3z"></path> <path fill="#262826" d="M64.5,19.5c0,0-0.6-1-0.6-2.3c0,0-1.8-2.2-4.9-1.9C58.9,15.3,60.2,20.3,64.5,19.5z"></path> <path fill="#262826" d="M60.5,8.5c-0.6-7.1-9.2-8-9.2-8C53.1,9.9,60.5,8.5,60.5,8.5z"></path> <path fill="#262826" d="M63.4,13.3c3.6-3.3,0.2-8.2,0.2-8.2C59.6,10.2,63.4,13.3,63.4,13.3z"></path> <path fill="#262826" d="M56.4,10.9c0,0,2.4,4.6,6.4,2.7c0,0-0.8-0.6-1.1-2C61.6,11.6,59.5,9.9,56.4,10.9z"></path> <polygon fill="#262826" points="36.5,53.1 35.2,48.9 33.8,53.1 29.4,53.1 33,55.8 31.5,60 35.2,57.4 38.7,60 37.2,55.8 40.9,53.1                                "></polygon> <path fill="#262826" d="M18.4,25.4v1v0.7C19.1,35.4,25.6,42,34,42.6l0.6,0.1h1l0.6-0.1c8.3-0.6,14.9-7.3,15.4-15.5l0.1-0.7v-0.9                           l-0.1-0.6c-0.5-8.3-7.2-15-15.4-15.6h-0.6h-1H34c-8.4,0.6-15,7.3-15.6,15.6V25.4z M19.8,25.5v-0.5c0.6-7.5,6.7-13.7,14.4-14.3                           l0.4-0.1h1l0.5,0.1c7.7,0.5,13.8,6.7,14.3,14.3l0.1,0.5v0.9l-0.1,0.5c-0.5,7.6-6.6,13.8-14.3,14.4h-0.5h-0.9h-0.5                           c-7.7-0.6-13.9-6.7-14.4-14.4v-0.5V25.5z"></path> <path fill="#262826" d="M34.3,39.8h0.5h0.7h0.6c6.9-0.4,12.5-6.1,12.9-13v-0.4v-0.9V25c-0.4-6.9-6-12.4-12.9-13h-0.6h-0.7l-0.5,0.1                            c-7.1,0.4-12.5,6-13,12.9l-0.1,0.4v0.9l0.1,0.4C21.7,33.8,27.2,39.4,34.3,39.8z M22.1,25.5V25c0.6-6.4,5.7-11.7,12.1-12l0.5-0.1                         h0.7L36,13c6.5,0.3,11.6,5.7,12.1,12l0.1,0.5v0.8l-0.1,0.5c-0.5,6.4-5.7,11.7-12.1,12.1h-0.5h-0.7h-0.5                         c-6.4-0.3-11.6-5.7-12.1-12.1v-0.5V25.5z"></path> <polygon fill="#262826" points="28.4,35.5 35.2,30.6 41.9,35.5 39.6,27.5 46,22.7 37.9,22.7 35.2,14.7 32.5,22.7 24.4,22.7                            30.9,27.5   "></polygon> </g> <rect x="0" y="62" fill="#262826" width="70.1" height="8"></rect> <rect x="3.3" y="63" fill="none" width="64.5" height="6.3"></rect> <text transform="matrix(1 0 0 1 3.2905 68.3026)" fill="#FFFFFF" font-family="\'Tahoma\'" font-size="7">Shutterstock License</text> </svg></div></div><div class="choose-title"><h5>High Quality</h5></div><div class="choose-des"><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p></div></div></div><div class="col-md-3 col-sm-4 col-xs-12"><div class="single-choose text-center"><div class="choose-icon pos-rltv"><div class="svg"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 70 70" enable-background="new 0 0 70 70" xml:space="preserve"> <g> <path fill="#262826" d="M47.2,17.4c-3.1-2.8-7.1-4-11.1-4c-5.2,0-10.3,2.2-13.7,6.5c-3.1,3.6-4.5,8.1-4.1,12.8                     c0.4,4.5,2.6,8.9,6.2,11.9c3.1,2.6,7,4,11.1,4c5.2,0,10.3-2.3,13.6-6.3c3-3.7,4.5-8.3,4.1-13C52.8,24.6,50.7,20.5,47.2,17.4z                         M50,30.9L50,30.9h-4.8c-0.1,0-0.1,0-0.3,0c0,0,0,0-0.3,0H44c-0.2,0-0.2,0.1-0.2,0.2c0,0.3,0.1,0.5,0.2,0.5h0.6                     c0.3,0,0.3,0,0.3-0.1c0.2,0.1,0.2,0.1,0.3,0.1H50l0,0c-0.1,3.1-1.3,6.2-3.3,8.4c-2.7,3.4-6.7,5.4-11.1,5.4c-3.2,0-6.4-1.3-8.9-3.4                       c-2.8-2.4-4.6-5.8-5-9.4c0-0.5,0-1,0-1.5h4.6c0.2,0,0.2,0,0.2-0.1c0.2,0.1,0.2,0.1,0.4,0.1h0.6c0.2,0,0.3-0.2,0.3-0.4                       c0,0-0.2-0.3-0.3-0.3h-0.6c-0.2,0-0.2,0-0.4,0c0,0,0,0-0.2,0h-4.6c0-0.6,0.2-1.3,0.3-2c0.2,0.2,0.2,0.2,0.5,0.2h4.7                     c0,0,0.3,0,0.3,0c0.1,0,0.2,0,0.2,0h0.6c0.2,0,0.3-0.2,0.3-0.2c0-0.3-0.1-0.4-0.3-0.4h-0.6c0,0-0.2,0-0.2,0c0,0-0.2,0-0.3,0h-4.7                        c-0.2,0-0.3,0-0.3,0.1c0.5-2.1,1.5-4.2,3-6c2.6-3.2,6.7-5.2,10.9-5.2c3.3,0,6.5,1.2,9.1,3.3c2.8,2.5,4.6,5.8,5,9.6                      C50,30.1,50,30.6,50,30.9z"></path> <path fill="#262826" d="M37.4,29.1c-2.2-0.8-3-1.3-3-1.9c0-0.9,0.7-1.2,2-1.2c1.6,0,2.7,0.6,3.4,0.9l0.2,0c0.1,0,0.3,0,0.3,0                        c0.2,0,0.2-0.3,0.3-0.3l0.7-3c0,0,0-0.4-0.2-0.4c-1.1-0.5-2.3-0.8-3.7-0.8v-1.9c0-0.3-0.2-0.3-0.4-0.3h-2.6c-0.3,0-0.5,0-0.5,0.3                        v2.2c-2.6,0.5-4.3,2.5-4.3,4.9c0,3.1,2.6,4.3,4.9,5.1c2.2,0.8,2.6,1.4,2.6,2c0,1.2-1.7,1.2-2.2,1.2c-1.9,0-3.4-0.6-4.1-1.1                      c-0.1,0-0.2-0.1-0.3,0c-0.1,0.1-0.2,0.2-0.3,0.3l-0.8,3c0,0.2,0.1,0.4,0.3,0.4c1,0.6,2.6,1,4.3,1.1v2.2c0,0.1,0.2,0.4,0.4,0.4h2.5                       c0.2,0,0.5-0.3,0.5-0.4v-2.4c2.7-0.6,4.6-2.5,4.6-5.1C42,31.7,40.6,30.1,37.4,29.1z"></path> <path fill="#262826" d="M28.1,32.6h-0.5c-0.2,0-0.2,0-0.2,0.1c0-0.1-0.2-0.1-0.3-0.1h-4.7c-0.3,0-0.5,0.1-0.5,0.3                        c0,0.3,0.2,0.5,0.5,0.5h4.7c0,0,0.3-0.2,0.3-0.2c0.1,0,0.1,0.2,0.2,0.2h0.5c0.3,0,0.4-0.2,0.4-0.5C28.5,32.7,28.4,32.6,28.1,32.6z"></path> <path fill="#262826" d="M44.1,28.4c0,0-0.1-0.1-0.2-0.1h-0.6c-0.3,0-0.5,0.2-0.5,0.5c0,0.3,0.2,0.3,0.5,0.3h0.6                     c0.1,0,0.2-0.1,0.2-0.1c0.1,0,0.2,0.1,0.3,0.1h4.8c0.1,0,0.4-0.1,0.4-0.3c0-0.2-0.3-0.5-0.4-0.5h-4.8                       C44.3,28.4,44.2,28.4,44.1,28.4z"></path> <path fill="#262826" d="M42.9,33.3c0,0.4,0.2,0.5,0.5,0.5h0.6c0.1,0,0.2-0.1,0.2-0.1c0.1,0,0.3,0.1,0.3,0.1h4.8                       c0.3,0,0.4-0.1,0.4-0.5c0-0.2-0.1-0.3-0.4-0.3h-4.8c0,0-0.2,0-0.3,0.1c0-0.1-0.1-0.1-0.2-0.1h-0.6C43.1,33,42.9,33.2,42.9,33.3z"></path> <polygon fill="#262826" points="37.9,52.5 34.9,54.6 31.9,52.5 33.1,55.9 30,58.2 33.8,58.2 34.9,61.6 36,58.2 39.8,58.2                      36.8,55.9   "></polygon> <polygon fill="#262826" points="48.2,51.6 47.1,48.1 45.9,51.6 42.2,51.5 45.1,53.8 43.9,57.2 47,55.1 50,57.3 48.9,53.8                      51.9,51.7   "></polygon> <polygon fill="#262826" points="58.8,40.4 55.7,42.3 52.8,40.1 53.9,43.8 50.7,45.7 54.4,45.8 55.5,49.4 56.8,45.9 60.4,46.1                      57.6,43.9   "></polygon> <polygon fill="#262826" points="23.9,51.6 22.7,48.1 21.6,51.6 18,51.7 21,53.8 20,57.3 22.8,55.1 25.8,57.2 24.6,53.8 27.6,51.5                          "></polygon> <polygon fill="#262826" points="15.9,43.8 17,40.1 14,42.3 11,40.4 12.2,43.9 9.3,46.1 13,45.9 14.3,49.4 15.4,45.8 19.1,45.7     "></polygon> <polygon fill="#262826" points="32.2,9.2 35.2,7 38.2,9.2 37.1,5.9 40,3.5 36.3,3.5 35.2,0.1 34,3.5 30.3,3.5 33.3,5.9    "></polygon> <polygon fill="#262826" points="21.9,10.1 23,13.6 24.1,10.3 27.9,10.3 25.1,8.1 26.1,4.6 23.2,6.6 20.2,4.5 21.3,8 18.2,10.1     "></polygon> <polygon fill="#262826" points="11.3,21.4 14.4,19.2 17.3,21.6 16.3,18 19.3,16 15.7,15.9 14.6,12.4 13.4,15.7 9.7,15.6 12.6,18                           "></polygon> <polygon fill="#262826" points="46.2,10.3 47.4,13.6 48.4,10.1 52.2,10.1 49.1,8 50.2,4.5 47.3,6.6 44.3,4.6 45.5,8.1 42.5,10.3                           "></polygon> <polygon fill="#262826" points="54.2,18 53.2,21.6 56,19.2 59.1,21.4 57.8,18 60.7,15.6 57,15.7 55.8,12.4 54.8,15.9 51,16    "></polygon> </g> <rect x="0" y="62" fill="#262826" width="70.1" height="8"></rect> <rect x="3.3" y="63" fill="none" width="64.5" height="6.3"></rect> <text transform="matrix(1 0 0 1 3.2905 68.3026)" fill="#FFFFFF" font-family="\'Tahoma\'" font-size="7">Shutterstock License</text> </svg></div></div><div class="choose-title"><h5>Best Value</h5></div><div class="choose-des"><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p></div></div></div><div class="col-md-3 col-sm-4 col-xs-12"><div class="single-choose text-center"><div class="choose-icon pos-rltv"><div class="svg"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 70 70" enable-background="new 0 0 70 70" xml:space="preserve"> <g> <path fill="#262826" d="M21,41.6c-0.3-0.9-0.4-1.6-0.3-2.2c-5,2.2-8.1,4.4-7.8,5.3l0,0c0.1,0.1,0.2,0.3,0.3,0.3                      c0.1,0,0.3,0,0.5,0.1c1.4,0.3,4.6-0.2,8.5-1.6c-0.3-0.2-0.7-0.7-0.9-1.2C21.3,42,21.1,41.9,21,41.6z"></path> <path fill="#262826" d="M23.1,43.3c0.1-0.2,0.1-0.3,0.1-0.4c0.1-0.4,0.1-0.7,0-1.3c0-0.3-0.1-0.6-0.2-0.8c-0.3-0.8-0.8-1.4-1.2-1.6                       c0,0-0.2,0-0.3,0l0,0c-0.1,0-0.1,0-0.3,0.1c-0.1,0.3-0.1,1.1,0.3,2.1c0.1,0.3,0.3,0.6,0.3,0.7c0.3,0.6,0.7,0.9,1,1.2                        c0.1,0,0.2,0,0.2,0H23.1z"></path> <path fill="#262826" d="M64,21.6L10.1,41.9l2.3,2.3c0.7-1.8,4.8-4,8.8-5.7l0,0l0,0h0.1l0.3-0.1v0.1c0.7,0,1.3,0.8,1.9,2.1                        c0.2,0.2,0.2,0.3,0.2,0.7l6.7-2.7L25,48.2l6.6-2.6l11.5-11.6l11.5-4.4l1.4-0.5c0.1,0,0.1,0,0.2-0.2c1.9-0.9,2.2-0.9,5.9-2.7                     c4.6-2,4.1-3.6,4.1-3.6C66,22.1,65.5,21.7,64,21.6z"></path> <path fill="#262826" d="M62.3,21.6l-10-1c-1.5,0-2.8,0.4-3.7,0.7l-8.7,3.2l-6.8-1.3l-4.9,1.8l3.3,2.8l-16.7,7.2L4.7,30.7l-4.2,1.7                       l5.1,3.7l-2,3.9l2.7-1l0.3-0.5l3.9-4l0.3-0.4l0.4,0.4l-3.8,4L9.2,41h0.1l52.6-19.2L62.3,21.6z M26.6,33.7l-3.5,1.4l-0.3-2l3.6-1.5                       L26.6,33.7z M32.3,31.4l-3.4,1.4l-0.3-2.2l3.6-1.2L32.3,31.4z M38.1,29.2l-3.5,1.4l-0.1-2l3.4-1.3L38.1,29.2z M43.9,27l-3.5,1.4                     l-0.3-2l3.5-1.3L43.9,27z M51,22c-0.2-0.6,0.1-0.8,0.6-1.1c0,0,7.9,0.9,8,0.9c-0.1,0.1-5.1,2-5.1,2C53.1,24.1,51.6,23.4,51,22z"></path> </g> <rect x="0" y="62" fill="#262826" width="70.1" height="8"></rect> <rect x="3.3" y="63" fill="none" width="64.5" height="6.3"></rect> <text transform="matrix(1 0 0 1 3.2905 68.3026)" fill="#FFFFFF" font-family="\'Tahoma\'" font-size="7">Shutterstock License</text> </svg></div></div><div class="choose-title"><h5>Fast Delivery</h5></div><div class="choose-des"><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p></div></div></div><div class="col-md-3 hidden-sm col-xs-12"><div class="single-choose text-center"><div class="choose-icon pos-rltv"><div class="svg"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 70 70" enable-background="new 0 0 70 70" xml:space="preserve"> <g> <path fill="#262826" d="M65.8,0.9c-0.8-0.6-2.1-1.2-4.2-0.6c-2.9,0.6-6.9,5.2-9.8,9.5c-6.2,0.2-18.2,0.5-19,1.2L2.6,38.9                      c-1.3,1.3-1.5,3.2-0.3,4.3l16.2,17.7c1.2,1.2,3,1.2,4.2,0.2L53,32.9c0.9-0.6,1.7-10.5,2.1-17.1c0.8-0.6,2-0.7,2.8-1.2                       c4-1.9,9.3-4.4,9.6-8.3C67.9,4.1,67.2,2,65.8,0.9z M48.3,33.9L22.7,57.4c-1.1,1.1-3,1.1-4.2-0.1L5.8,43.5c-1.2-1.2-1.1-3.3,0.1-4.3                      l25.6-23.4c1.3-1.2,3.2-1.2,4.3,0l12.8,13.9C49.5,30.9,49.3,32.7,48.3,33.9z M51.1,18.9c-1.4,1.3-3.6,1.3-5.1-0.2                       c-1.3-1.5-1.2-3.6,0.2-5.1c1.1-0.9,2.4-1.1,3.6-0.7c-0.2,0.4-0.6,0.8-0.7,1.2c-0.5,0-0.9,0.3-1.4,0.6c-0.7,0.5-0.7,1.8-0.1,2.6                      c0.9,0.6,1.7,0.6,2.7,0c0.7-0.6,0.7-1.8,0-2.4c0.1-0.5,0.4-1,0.7-1.4c0.1,0.1,0.1,0.1,0.3,0.1C52.7,15.3,52.7,17.5,51.1,18.9z                        M66.4,6.4c-0.2,3-5.2,5.4-8.9,7c-0.7,0.4-1.5,0.8-2.3,1.2c0.2-2.9,0.3-5.1,0.3-5.1s-0.8,0.2-2,0.2c2.6-4,6.1-7.7,8.6-8.2                       c1.1-0.5,2.2-0.2,2.9,0.3C66.1,2.8,66.5,4.5,66.4,6.4z"></path> <polygon fill="#262826" points="20.2,38.4 18.8,37 13.1,42.4 14.3,43.8 16.4,41.9 22.2,48.2 24,46.5 18,40.2     "></polygon> <path fill="#262826" d="M20.7,35.2l4.8,9.8l1.9-1.8L26,40.7l2.4-1.8l2.4,1.3l1.8-1.9l-9.4-5.4L20.7,35.2z M24.8,36.5l2.1,1.2                      l-1.7,1.8L24,37.3c-0.2-0.7-0.7-1.2-1-2l0,0C23.6,35.9,24,36.2,24.8,36.5z"></path> <path fill="#262826" d="M32.7,30l1.4,1.5l1-1.1l1.7,1.7c-0.2,0.1-0.4,0.5-1,0.9c-1.3,1.2-3.3,1.2-4.7-0.2c-1.4-1.9-1.1-3.6,0.3-5                      c0.8-0.8,1.5-1.1,2.1-1.2l-1-1.8c-0.5,0.2-1.6,0.5-2.4,1.6c-2.6,2.4-3,5.4-0.6,8c1.1,1.1,2.4,1.8,3.7,1.8c1.2,0.1,2.6-0.7,4-1.9                     c1.1-0.8,1.7-2.1,2.3-2.8l-3.9-4.1L32.7,30z"></path> </g> <rect x="0" y="62" fill="#262826" width="70.1" height="8"></rect> <rect x="3.3" y="63" fill="none" width="64.5" height="6.3"></rect> <text transform="matrix(1 0 0 1 3.2905 68.3026)" fill="#FFFFFF" font-family="\'Tahoma\'" font-size="7">Shutterstock License</text> </svg></div></div><div class="choose-title"><h5>Trending</h5></div><div class="choose-des"><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p></div></div></div>]]></melisTag>   <melisTag id="about_part3_title"><![CDATA[We Are Better]]></melisTag>   <melisTag id="about_part3_text"><![CDATA[<div class="skill-content"><div class="skill-content"><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p><div class="powerfull-skills"><div class="single-prograss"><div class="progess-heading">Trending<span>(79%)</span></div><div class="progress"><div class="progress-bar pr-blue wow fadeInLeft     animated" style="width: 79%; visibility: hidden; animation-duration: 2s; animation-delay: 1s; animation-name: none;" data-wow-duration="2s" data-wow-delay="1s"></div></div></div><div class="single-prograss"><div class="progess-heading">Design<span>(96%)</span></div><div class="progress"><div class="progress-bar pr-green wow fadeInLeft     animated" style="width: 96%; visibility: hidden; animation-duration: 2s; animation-delay: 1s; animation-name: none;" data-wow-duration="2s" data-wow-delay="1s"></div></div></div><div class="single-prograss"><div class="progess-heading pr-voilate">Availability<span>(85%)</span></div><div class="progress"><div class="progress-bar pr-violate wow fadeInLeft     animated" style="width: 85%; visibility: hidden; animation-duration: 2s; animation-delay: 1s; animation-name: none;" data-wow-duration="2s" data-wow-delay="1s"></div></div></div><div class="single-prograss"><div class="progess-heading">Quality <span>(92%)</span></div><div class="progress"><div class="progress-bar pr-ornage wow fadeInLeft     animated" style="width: 92%; visibility: hidden; animation-duration: 2s; animation-delay: 1s; animation-name: none;" data-wow-duration="2s" data-wow-delay="1s"></div></div></div></div><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. will be distracted by the readable content of a page when looking at its layout.</p></div></div>]]></melisTag> <melisTag id="about_part3_image"><![CDATA[<img class="img-responsive" src="/MelisDemoCmsTwig/images/blog/about02.jpg" />]]></melisTag>  <melisTag id="about_part4_title"><![CDATA[Our Team]]></melisTag></document>',

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
                        // </AboutUs>

                        // <ContactUs>
                        [
                            Melis::PRIMARY_KEY => 'tree_page_id',
                            'tree_page_id' => Melis::CURRENT_PAGE_ID,
                            'tree_father_page_id' => Melis::CMS_SITE_ID,
                            'tree_page_order' => 13,
                            Site::THEN => [Site::UPDATE_CURRENT_PAGE_ID],
                            Melis::RELATION => [
                                Melis::CMS_PAGE_PUBLISHED => [
                                    [
                                        Melis::PRIMARY_KEY => 'page_id',
                                        'page_id' => Melis::FOREIGN_KEY,
                                        'page_type' => 'PAGE',
                                        'page_status' => '1',
                                        'page_menu' => 'LINK',
                                        'page_name' => 'Contact Us',
                                        'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Contact']],
                                        'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="header_title"><![CDATA[contact&nbsp;us]]></melisTag>  <melisTag id="content_subtitle"><![CDATA[Shirts]]></melisTag>   <melisTag id="content_text_1"><![CDATA[<div class="show-product row">                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">                    <div class="brand-img text-center">                        <img src="/MelisDemoCmsTwig/images/product/01.jpg" alt="">                    </div>                </div>                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">                    <div class="show-product-description">                        <h6 class="sp-category">New Fashion</h6>                        <h2 class="uppercase montserrat">Brand Cortta</h2>                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>                                                    </div>                </div>            </div>]]></melisTag>   <melisTag id="content_text_2"><![CDATA[<div class="show-product row">                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">                    <div class="show-product-description">                        <h6 class="sp-category">New Fashion</h6>                        <h2 class="uppercase montserrat">Brand Cortta</h2>                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>                    </div>                </div>                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">                    <div class="brand-img text-center">                        <img src="/MelisDemoCmsTwig/images/product/02.jpg" alt="">                    </div>                </div>            </div>]]></melisTag>   <melisTag id="content_text_3"><![CDATA[<div class="show-product row">                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">                    <div class="brand-img text-center">                        <img src="/MelisDemoCmsTwig/images/product/03.jpg" alt="">                    </div>                </div>                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">                    <div class="show-product-description">                        <h6 class="sp-category">New Fashion</h6>                        <h2 class="uppercase montserrat">Brand Cortta</h2>                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>                    </div>                </div>            </div>]]></melisTag>   <melisTag id="content_text_4"><![CDATA[<div class="show-product row">                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">                    <div class="show-product-description">                        <h6 class="sp-category">New Fashion</h6>                        <h2 class="uppercase montserrat">Brand Cortta</h2>                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>                    </div>                </div>                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">                    <div class="brand-img text-center">                        <img src="/MelisDemoCmsTwig/images/product/04.jpg" alt="">                    </div>                </div>            </div>]]></melisTag>   <melisTag id="content_text_5"><![CDATA[<div class="show-product row">                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">                    <div class="brand-img text-center">                        <img src="/MelisDemoCmsTwig/images/product/05.jpg" alt="">                    </div>                </div>                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">                    <div class="show-product-description">                        <h6 class="sp-category">New Fashion</h6>                        <h2 class="uppercase montserrat">Brand Cortta</h2>                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>                    </div>                </div>            </div>]]></melisTag>   <melisTag id="content_text_6"><![CDATA[<div class="show-product row">                                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">                    <div class="show-product-description">                        <h6 class="sp-category">New Fashion</h6>                        <h2 class="uppercase montserrat">Brand Cortta</h2>                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>                    </div>                </div>                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">                    <div class="brand-img text-center">                        <img src="/MelisDemoCmsTwig/images/product/06.jpg" alt="">                    </div>                </div>            </div>]]></melisTag>   <melisTag id="footer_title_1"><![CDATA[Contact US]]></melisTag> <melisTag id="header_image"><![CDATA[<img src="/MelisDemoCmsTwig/images/bg/contact.jpg" caption="false" data-mce-src="/MelisDemoCmsTwig/images/bg/contact.jpg" height="29" width="229">]]></melisTag>   <melisTag id="footer_text_1"><![CDATA[<ul><li><div class="contact-icon"><i class="zmdi zmdi-pin-drop"></i><br></div><div class="contact-text"><p><span>777/a Seventh Street,</span> <span>Rampura, Bonosri</span></p></div></li><li><div class="contact-icon"><i class="zmdi zmdi-email-open"></i><br></div><div class="contact-text"><p><span><a href="#" data-mce-href="#">company@gmail.com</a></span> <span><a href="#" data-mce-href="#">admin@devitems.com</a></span></p></div></li><li><div class="contact-icon"><i class="zmdi zmdi-phone-paused"></i><br></div><div class="contact-text"><p><span>+11 (019) 25184203</span> <span>+11 (018) 50950555</span></p></div></li></ul>]]></melisTag>  <melisTag id="footer_title_2"><![CDATA[Information]]></melisTag>    <melisTag id="footer_text_2"><![CDATA[<li><a href="#">My Account</a></li>                                                <li><a href="#">Order History</a></li>                                                <li><a href="#">Wishlist</a></li>                                                <li><a href="#">Returnes</a></li>                                                <li><a href="#">Private Policy</a></li>                                                <li><a href="#">Site Map</a></li>]]></melisTag> <melisTag id="contact_gmap_lat"><![CDATA[<span style="color: #999999; font-family: Roboto, Arial, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; display: inline !important; float: none;">48.850973</span>]]></melisTag> <melisTag id="contact_gmap_long"><![CDATA[2.382171]]></melisTag>    <melisTag id="contact_addresses"><![CDATA[<div class="heading-title text-center mb-50"><h5 class="uppercase">Contact Info</h5></div><ul class="contact-info"><li><div class="contact-icon"><i class="zmdi zmdi-phone-paused"></i></div><div class="contact-text"><p>(+33) 972 386 280<br />&nbsp;</p></div></li><li><div class="contact-icon"><i class="zmdi zmdi-email-open"></i></div><div class="contact-text"><p>contact@melistechnology.com&nbsp;</p></div></li><li><div class="contact-icon"><i class="zmdi zmdi-pin-drop"></i></div><div class="contact-text"><p><span>4, rue du Dahomey</span>&nbsp;75011 Paris, France</p></div></li></ul>]]></melisTag>   <melisTag id="contact_text"><![CDATA[<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>]]></melisTag> <melisTag id="footer_text_3"><![CDATA[123.896545]]></melisTag></document>',

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
                        // </ContactUs>

                        // <TraversalPages>
                        [
                            Melis::PRIMARY_KEY => 'tree_page_id',
                            'tree_page_id' => Melis::CURRENT_PAGE_ID,
                            'tree_father_page_id' => Melis::CMS_SITE_ID,
                            'tree_page_order' => 14,
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
                                    [
                                        Melis::PRIMARY_KEY => 'tree_page_id',
                                        'tree_page_id' => Melis::CURRENT_PAGE_ID,
                                        'tree_father_page_id' => Melis::FOREIGN_KEY,
                                        'tree_page_order' => 15,
                                        Site::THEN => [Site::UPDATE_CURRENT_PAGE_ID],
                                        Melis::RELATION => [
                                            Melis::CMS_PAGE_PUBLISHED => [
                                                [
                                                    Melis::PRIMARY_KEY => 'page_id',
                                                    'page_id' => Melis::FOREIGN_KEY,
                                                    'page_type' => 'PAGE',
                                                    'page_status' => '1',
                                                    'page_menu' => 'LINK',
                                                    'page_name' => 'Search results',
                                                    'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => 'Search']],
                                                    'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">  <melisTag id="header_image"><![CDATA[<img alt="" src="/MelisDemoCmsTwig/images/bg/search.jpg">]]></melisTag>    <melisTag id="header_title"><![CDATA[Search Results]]></melisTag>   <melisTag id="search_title"><![CDATA[Search Results]]></melisTag>   <melisTag id="footer_title_1"><![CDATA[Contact US]]></melisTag> <melisTag id="footer_text_1"><![CDATA[<ul>                                        <li>                                            <div class="contact-icon">                                               <i class="zmdi zmdi-pin-drop"></i>                                          </div>                                            <div class="contact-text">                                                <p><span>777/a  Seventh Street,</span> <span>Rampura, Bonosri</span></p>                                            </div>                                        </li>                                        <li>                                            <div class="contact-icon"> <i class="zmdi zmdi-email-open"></i> </div>                                            <div class="contact-text">                                                <p><span><a href="#">company@gmail.com</a></span> <span><a href="#">admin@devitems.com</a></span></p>                                            </div>                                        </li>                                        <li>                                            <div class="contact-icon"> <i class="zmdi zmdi-phone-paused"></i> </div>                                            <div class="contact-text">                                                <p><span>+11 (019) 25184203</span> <span>+11 (018) 50950555</span></p>                                            </div>                                        </li>                                    </ul>]]></melisTag>    <melisTag id="footer_title_2"><![CDATA[Information]]></melisTag></document>',

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
                                    // </SearchResults>

                                    // <TraversalPages | Testimonials>
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
                            Melis::PRIMARY_KEY => 'tree_page_id',
                            'tree_page_id' => Melis::CURRENT_PAGE_ID,
                            'tree_father_page_id' => Melis::CMS_SITE_ID,
                            'tree_page_order' => 16,
                            Site::THEN => [Site::UPDATE_CURRENT_PAGE_ID],
                            Melis::RELATION => [
                                Melis::CMS_PAGE_PUBLISHED => [
                                    [
                                        Melis::PRIMARY_KEY => 'page_id',
                                        'page_id' => Melis::FOREIGN_KEY,
                                        'page_type' => 'PAGE',
                                        'page_status' => '1',
                                        'page_menu' => 'NONE',
                                        'page_name' => '404',
                                        'page_tpl_id' => [Site::GET_TEMPLATE_ID => ['template_name' => '404']],
                                        'page_content' => '<?xml version="1.0" encoding="UTF-8"?><document type="MelisCMS" author="MelisTechnology" version="2.0">		<melisTag id="page-404" plugin_container_id="" type="html"><![CDATA[<div class="page-404-container"><h1>404</h1><h4>Sorry, the page you were looking for could not be found.</h4><p>You can return to our <a href="/">home page</a>.</p></div>]]></melisTag></document>',

                                    ],
                                ],
                                Melis::CMS_PAGE_LANG => [
                                    [
                                        'plang_page_id' =>  Melis::FOREIGN_KEY,
                                        'plang_lang_id' => 1,
                                        'plang_page_id_initial' =>  Melis::FOREIGN_KEY
                                    ]
                                ],
                                Melis::CMS_SITE_404 => [
                                    [
                                        's404_site_id' => Melis::CMS_SITE_ID,
                                        's404_page_id' =>  Melis::FOREIGN_KEY
                                    ]
                                ],
                            ]
                        ],
                        // </Page404>
                    ],
                    // </editor-fold>

                    // <editor-fold desc="CMS_NEWS">
                    Melis::CMS_NEWS => [
                        [
                            'cnews_status' => '1',
                            'cnews_image1' => '/' . __NAMESPACE__ . '/images/news/N01.jpg',
                            'cnews_site_id' => Melis::CMS_SITE_ID,
                            'cnews_publish_date' => date('Y-m-d h:i:s',strtotime('2018-11-27')),
                            Melis::RELATION => [
                                Melis::CMS_NEWS_TEXTS => [
                                    [
                                        'cnews_title' => 'Fashion show Obscuria in PARIS this spring 2017!',
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
                            'cnews_publish_date' =>  date('Y-m-d h:i:s',strtotime('2018-11-27')),
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
                            'cnews_publish_date' =>  date('Y-m-d h:i:s',strtotime('2018-11-27')),
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
                            'cnews_publish_date' =>  date('Y-m-d h:i:s',strtotime('2018-11-27')),
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
                            'cnews_publish_date' =>  date('Y-m-d h:i:s',strtotime('2018-10-27')),
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
                            'cnews_publish_date' => date('Y-m-d h:i:s',strtotime('2018-10-27')),
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
                            'cnews_publish_date' => date('Y-m-d h:i:s',strtotime('2018-10-27')),
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
                            'cnews_publish_date' => date('Y-m-d h:i:s',strtotime('2018-10-27')),
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
                            'cnews_publish_date' => date('Y-m-d h:i:s',strtotime('2018-09-27')),
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
                            'cnews_publish_date' => date('Y-m-d h:i:s',strtotime('2018-10-27')),
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
                            'cnews_publish_date' => date('Y-m-d h:i:s',strtotime('2018-09-27')),
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
                            'cnews_publish_date' => date('Y-m-d h:i:s',strtotime('2018-09-27')),
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
                            'cnews_publish_date' => date('Y-m-d h:i:s',strtotime('2018-08-27')),
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
                            'cnews_publish_date' => date('Y-m-d h:i:s',strtotime('2018-08-27')),
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
                            'cnews_publish_date' => date('Y-m-d h:i:s',strtotime('2018-07-27')),
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
                            'cnews_publish_date' => date('Y-m-d h:i:s',strtotime('2018-07-27')),
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
                            'cnews_publish_date' => date('Y-m-d h:i:s',strtotime('2018-06-27')),
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
                            'cnews_publish_date' => date('Y-m-d h:i:s',strtotime('2018-06-27')),
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

                    // <editor-fold desc="CMS_PROSPECTS_THEMES">
                    Melis::CMS_PROSPECTS_THEMES => [
                        [
                            'pros_theme_name' => 'Melis Demo CMS Twig Contact',
                            'pros_theme_code' => 'MELIS_DEMO_CMS_CONTACT',
                            Melis::RELATION => [
                                Melis::CMS_PROSPECTS_THEMES_ITEMS => [
                                    [

                                        'pros_theme_id' => 1,
                                        Melis::RELATION => [
                                            Melis::CMS_PROSPECTS_THEMES_ITEMS_TRANSLATIONS => [
                                                [
                                                    'item_trans_text' => 'About a product',
                                                    'item_trans_lang_id' => 1,
                                                    'item_trans_theme_item_id' => 1,
                                                ],
                                                [
                                                    'item_trans_text' => 'About the company',
                                                    'item_trans_lang_id' => 1,
                                                    'item_trans_theme_item_id' => 2,
                                                ],
                                                [
                                                    'item_trans_text' => 'Press related',
                                                    'item_trans_lang_id' => 1,
                                                    'item_trans_theme_item_id' => 3,
                                                ],
                                                [
                                                    'item_trans_text' => 'Apply for a position',
                                                    'item_trans_lang_id' => 1,
                                                    'item_trans_theme_item_id' => 4,
                                                ],
                                                [
                                                    'item_trans_text' => 'Other',
                                                    'item_trans_lang_id' => 1,
                                                    'item_trans_theme_item_id' => 5,
                                                ],
                                            ],
                                        ],
                                    ],
                                    ['pros_theme_id' => 1],
                                    ['pros_theme_id' => 1],
                                    ['pros_theme_id' => 1],
                                    ['pros_theme_id' => 1]
                                ],
                            ],
                        ],
                    ],
                    // </editor-fold>

                    // <editor-fold desc="CMS_SLIDER">
                    Melis::CMS_SLIDER => [
                        [
                            'mcslide_name' => 'Homepage Header Slider',
                            'mcslide_page_id' => Melis::CMS_SITE_ID,
                            'mcslide_date' => date('Y-m-d H:i:s'),
                            Melis::RELATION => [
                                Melis::CMS_SLIDER_DETAILS => [
                                    [
                                        'mcsdetail_mcslider_id' => Melis::FOREIGN_KEY,
                                        'mcsdetail_status' => 1,
                                        'mcsdetail_title' => 'New Fashion Event 2017!',
                                        'mcsdetail_sub1' => 'Best Collection',
                                        'mcsdetail_sub2' => 'Discover it!',
                                        'mcsdetail_sub3' => '',
                                        'mcsdetail_link' => '/news/news-details/id/3?newsid=9',
                                        'mcsdetail_img' => '/' . __NAMESPACE__ . '/images/slider/slider01.jpg',
                                        'mcsdetail_order' => 1,
                                    ],
                                    [
                                        'mcsdetail_mcslider_id' => Melis::FOREIGN_KEY,
                                        'mcsdetail_status' => 1,
                                        'mcsdetail_title' => 'Best Suit Collection',
                                        'mcsdetail_sub1' => 'Exclusive Fashion 2017',
                                        'mcsdetail_sub2' => 'Check it out!',
                                        'mcsdetail_sub3' => '',
                                        'mcsdetail_link' => '/our-designs/suits/id/11',
                                        'mcsdetail_img' => '/' . __NAMESPACE__ . '/images/slider/slider02.jpg',
                                        'mcsdetail_order' => 2,
                                    ],
                                    [
                                        'mcsdetail_mcslider_id' => Melis::FOREIGN_KEY,
                                        'mcsdetail_status' => 1,
                                        'mcsdetail_title' => 'What type of model are you?',
                                        'mcsdetail_sub1' => 'Exclusive Quiz!',
                                        'mcsdetail_sub2' => 'Take the test',
                                        'mcsdetail_sub3' => '',
                                        'mcsdetail_link' => '/news/news-details/id/3?newsid=5',
                                        'mcsdetail_img' => '/' . __NAMESPACE__ . '/images/slider/slider03.jpg',
                                        'mcsdetail_order' => 3,
                                    ],
                                ]
                            ]
                        ],

                        [
                            'mcslide_name' => 'About us - Our Team',
                            'mcslide_page_id' =>  [Site::GET_PAGE_ID => ['page_name' => 'About us']],
                            'mcslide_date' => date('Y-m-d H:i:s'),
                            Melis::RELATION => [
                                Melis::CMS_SLIDER_DETAILS => [
                                    [
                                        'mcsdetail_mcslider_id' => Melis::FOREIGN_KEY,
                                        'mcsdetail_status' => 1,
                                        'mcsdetail_title' => 'Wendy Silver',
                                        'mcsdetail_sub1' => 'Stylist',
                                        'mcsdetail_img' => '/' . __NAMESPACE__ . '/images/team/01.jpg',
                                        'mcsdetail_order' => 1,
                                    ],
                                    [
                                        'mcsdetail_mcslider_id' => Melis::FOREIGN_KEY,
                                        'mcsdetail_status' => 1,
                                        'mcsdetail_title' => 'Robert Stian',
                                        'mcsdetail_sub1' => 'Designer',
                                        'mcsdetail_img' => '/' . __NAMESPACE__ . '/images/team/02.jpg',
                                        'mcsdetail_order' => 2,
                                    ],
                                    [
                                        'mcsdetail_mcslider_id' => Melis::FOREIGN_KEY,
                                        'mcsdetail_status' => 1,
                                        'mcsdetail_title' => 'Edward Liton',
                                        'mcsdetail_sub1' => 'Event Expert',
                                        'mcsdetail_img' => '/' . __NAMESPACE__ . '/images/team/03.jpg',
                                        'mcsdetail_order' => 3,
                                    ],
                                    [
                                        'mcsdetail_mcslider_id' => Melis::FOREIGN_KEY,
                                        'mcsdetail_status' => 1,
                                        'mcsdetail_title' => 'Beth Gentle',
                                        'mcsdetail_sub1' => 'Model',
                                        'mcsdetail_img' => '/' . __NAMESPACE__ . '/images/team/04.jpg',
                                        'mcsdetail_order' => 4,
                                    ],
                                    [
                                        'mcsdetail_mcslider_id' => Melis::FOREIGN_KEY,
                                        'mcsdetail_status' => 1,
                                        'mcsdetail_title' => 'Greg Dylan',
                                        'mcsdetail_sub1' => 'Fashion Expert',
                                        'mcsdetail_img' => '/' . __NAMESPACE__ . '/images/team/05.jpg',
                                        'mcsdetail_order' => 5,
                                    ],
                                    [
                                        'mcsdetail_mcslider_id' => Melis::FOREIGN_KEY,
                                        'mcsdetail_status' => 1,
                                        'mcsdetail_title' => 'Christine Bolian',
                                        'mcsdetail_sub1' => 'Press officer',
                                        'mcsdetail_img' => '/' . __NAMESPACE__ . '/images/team/06.jpg',
                                        'mcsdetail_order' => 6,
                                    ],
                                    [
                                        'mcsdetail_mcslider_id' => Melis::FOREIGN_KEY,
                                        'mcsdetail_status' => 1,
                                        'mcsdetail_title' => 'Michael Stans',
                                        'mcsdetail_sub1' => 'Model',
                                        'mcsdetail_img' => '/' . __NAMESPACE__ . '/images/team/07.jpg',
                                        'mcsdetail_order' => 7,
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
