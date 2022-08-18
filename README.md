# online-advertisement-api
There is few ways to install Laravel, I used Composer for installation. Docker can be used also but i didn't use it

Composer - Dependency Management for PHP
========================================

Composer helps you declare, manage, and install dependencies of PHP projects.

See [https://getcomposer.org/](https://getcomposer.org/) for more information and documentation.

[![Continuous Integration](https://github.com/composer/composer/workflows/Continuous%20Integration/badge.svg?branch=main)](https://github.com/composer/composer/actions)

Installation / Usage
--------------------

Download and install Composer by following the [official instructions](https://getcomposer.org/download/).

For usage, see [the documentation](https://getcomposer.org/doc/).


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
install Laravel 
```composer global require "laravel/installer"```

install Laravel Project
```composer create-project --prefer-dist laravel/laravel blog"```

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

To run project switch to the repo folder

    cd online-advertisement-api

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

    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

**Populate the database with seed data with relationships which includes users, articles, comments, tags, favorites and follows. This can help you to quickly start testing the api or couple a frontend and start using it with ready content.**

Open the DatabaseSeeder and set the property values as per your requirement

**Note*** I have manualy seeded category data

Run the database seeder and you're done

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh
    
## API
The api can be accessed at [http://localhost:8000/api](http://localhost:8000/api).
Auth routesd can be accessed at [http://localhost:8000/api/auth](http://localhost:8000/api/auth).


## Dependencies

- [laravel-jwt-auth.readthedocs.io](https://laravel-jwt-auth.readthedocs.io/) - For authentication using JSON Web Tokens


