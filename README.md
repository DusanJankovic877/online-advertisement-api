Composer - Dependency Management for PHP
========================================

Composer helps you declare, manage, and install dependencies of PHP projects.

See [https://getcomposer.org/](https://getcomposer.org/) for more information and documentation.

[![Continuous Integration](https://github.com/composer/composer/workflows/Continuous%20Integration/badge.svg?branch=main)](https://github.com/composer/composer/actions)

Installation / Usage
--------------------

Download and install Composer by following the [official instructions](https://getcomposer.org/download/).

For usage, see [the documentation](https://getcomposer.org/doc/).

Packages
--------

Find public packages on [Packagist.org](https://packagist.org). 

For private package hosting take a look at [Private Packagist](https://packagist.com).

Community
---------

Follow [@packagist](https://twitter.com/packagist) or [@seldaek](https://twitter.com/seldaek) on Twitter for announcements, or check the [#composerphp](https://twitter.com/search?q=%23composerphp&src=typed_query&f=live) hashtag.

For support, Stack Overflow offers a good collection of
[Composer related questions](https://stackoverflow.com/questions/tagged/composer-php), or you can use the [GitHub discussions](https://github.com/composer/composer/discussions).

Please note that this project is released with a
[Contributor Code of Conduct](https://www.contributor-covenant.org/version/1/4/code-of-conduct/).
By participating in this project and its community you agree to abide by those terms.

Requirements
------------

#### Latest Composer

PHP 7.2.5 or above for the latest version.

#### Composer 2.2 LTS (Long Term Support)

PHP versions 5.3.2 - 8.1 are still supported via the LTS releases of Composer (2.2.x). If you
run the installer or the `self-update` command the appropriate Composer version for your PHP
should be automatically selected.

Authors
-------

- Nils Adermann  | [GitHub](https://github.com/naderman)  | [Twitter](https://twitter.com/naderman) | <naderman@naderman.de> | [naderman.de](https://naderman.de)
- Jordi Boggiano | [GitHub](https://github.com/Seldaek) | [Twitter](https://twitter.com/seldaek) | <j.boggiano@seld.be> | [seld.be](https://seld.be)

See also the list of [contributors](https://github.com/composer/composer/contributors) who participated in this project.

Security Reports
----------------

Please send any sensitive issue to [security@packagist.org](mailto:security@packagist.org). Thanks!

License
-------

Composer is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

Acknowledgments
---------------

- This project's Solver started out as a PHP port of openSUSE's
  [Libzypp satsolver](https://en.opensuse.org/openSUSE:Libzypp_satsolver).
  
  
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>



# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker). 

Clone the repository

    git clone git@github.com:gothinkster/laravel-realworld-example-app.git

Switch to the repo folder

    cd laravel-realworld-example-app

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Generate a new JWT authentication secret key

    php artisan jwt:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone git@github.com:gothinkster/laravel-realworld-example-app.git
    cd laravel-realworld-example-app
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan jwt:generate 
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

**Populate the database with seed data with relationships which includes users, articles, comments, tags, favorites and follows. This can help you to quickly start testing the api or couple a frontend and start using it with ready content.**

Open the DummyDataSeeder and set the property values as per your requirement

    database/seeds/DummyDataSeeder.php

Run the database seeder and you're done

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh
    
## Docker

To install with [Docker](https://www.docker.com), run following commands:

```
git clone git@github.com:gothinkster/laravel-realworld-example-app.git
cd laravel-realworld-example-app
cp .env.example.docker .env
docker run -v $(pwd):/app composer install
cd ./docker
docker-compose up -d
docker-compose exec php php artisan key:generate
docker-compose exec php php artisan jwt:generate
docker-compose exec php php artisan migrate
docker-compose exec php php artisan db:seed
docker-compose exec php php artisan serve --host=0.0.0.0
```

The api can be accessed at [http://localhost:8000/api](http://localhost:8000/api).

## API Specification

This application adheres to the api specifications set by the [Thinkster](https://github.com/gothinkster) team. This helps mix and match any backend with any other frontend without conflicts.

## Dependencies

- [laravel-jwt-auth.readthedocs.io](https://laravel-jwt-auth.readthedocs.io/) - For authentication using JSON Web Tokens
