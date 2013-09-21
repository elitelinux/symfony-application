# Endroid Symfony Application

[![Latest Stable Version](https://poser.pugx.org/endroid/symfony-application/v/stable.png)](https://packagist.org/packages/endroid/symfony-application)
[![Total Downloads](https://poser.pugx.org/endroid/symfony-application/downloads.png)](https://packagist.org/packages/endroid/symfony-application)

Use this project if you want to quickly set up a basis for your web application. This application
is built on [`endroid/symfony-standard`](https://github.com/symfony/symfony-standard) and extended
with popular and well-maintained community bundles and some example implementations to speed up the
development process. You decide which functionalities you use, depending on the type of web
application you are building. Browse the [`live demo`](http://symfony-application.endroid.nl/) and
the [`admin section`](http://symfony-application.endroid.nl/admin/dashboard) (admin/admin)
to get a quick impression of the full package.

## Live demo

  * Front end - [`symfony-application.endroid.nl`](http://symfony-application.endroid.nl/)
  * Admin - [`symfony-application.endroid.nl/admin/dashboard`](http://symfony-application.endroid.nl/admin/dashboard) (admin/admin)

## Features

  * Front end
  * CMS
    * Users
    * Media
    * Pages
    * News
    * Forms
    * Sitemap
    * Menu's
  * Behaviors
    * Publishable
    * Sluggable
    * Sortable
    * Timestampable
    * Translatable
    * Traversable
  * Multilanguage
  * Search

## Installation

### Create your personal parameters.yml file

    cp app/config/parameters.yml.dist app/config/parameters.yml

### Create directories with proper access

    mkdir app/cache app/logs web/uploads

    sudo setfacl -R -m u:www-data:rwX -m u:`whoami`:rwX app/cache app/logs web/uploads
    sudo setfacl -dR -m u:www-data:rwx -m u:`whoami`:rwx app/cache app/logs web/uploads

### Install dependencies

    curl -s http://getcomposer.org/installer | php
    php composer.phar install

### Create the database and schema

    php app/console doctrine:database:create
    php app/console doctrine:schema:update --force

### [`Install ElasticSearch (optional)`](http://www.elasticsearch.org/guide/reference/setup/installation/)

### Load fixtures (optional)

    php app/console doctrine:fixtures:load -n
    php app/console assets:install --symlink
    php app/console fos:elastica:populate

## Note

Please note that if you are using PHP < 5.4 you have to copy the trait code into your entities
instead of using the traits.