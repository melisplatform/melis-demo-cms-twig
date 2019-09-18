# Melis Demo Cms Twig

A demo site demonstrating the usage of [Twig](https://twig.symfony.com/) inside Melis Platform.

## Getting Started

These instructions will get you a copy of the project up and running on your machine.  

## Vhost Configuration
MELIS_MODULE variable (identifies which site will be loaded as the front office for this domain).  
We should set this variable with `MelisDemoCmsTwig`  
Vhost should look like this:
```
<VirtualHost *:80>
    DocumentRoot "PATH_DOCROOT/public"
    <Directory "PATH_DOCROOT/public">
        Options +Indexes +FollowSymLinks +ExecCGI
        DirectoryIndex index.php
        Order allow,deny
        Allow from all
        AllowOverride All
        Require all granted
    </Directory>

    ServerName www.mysite.local:80
    SetEnv MELIS_PLATFORM "development"
    SetEnv MELIS_MODULE "MelisDemoCmsTwig"

</VirtualHost>
```

## Requirements

* composer/installers 
* php 7  

This will automatically be done when using composer.

## Installing

Run the composer command:
```
composer require melisplatform/melis-demo-cms-twig
```

#### Dependencies:
* Melis Front
* Melis Engine
* Melis Cms
* Melis Cms Slider
* Melis Cms News
    
## Authors

* **Melis Technology** - [www.melistechnology.com](https://www.melistechnology.com/)

See also the list of [contributors](https://github.com/melisplatform/melis-demo-cms/contributors) who participated in this project.


## License

This project is licensed under the OSL-3.0 License - see the [LICENSE.md](LICENSE.md) file for details
