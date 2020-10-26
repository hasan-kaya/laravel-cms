# Laravel 8 CMS
Laravel simple CMS with multi-language support

-----
## Table of Contents

* [Features](#item1)
* [Installation Guide](#item2)

-----
<a name="item1"></a>
## Features:
  * Page, category management
  * Menu builder like wordpress
  * Role based permission system for admins
  * Homepage Builder
  * Multilingual
-----
<a name="item2"></a>
## Installation Guide:

Clone this repository and install the dependencies.

    $ git clone github.com/hasan-kaya/laravel-cms.git && cd laravel-cms
    $ composer install

Run the command below to initialize. Do not forget to configure your .env file. 

    $ php artisan migrate
    $ php artisan db:seed --class=AdminsTableSeeder
    $ php artisan key:generate

Admin Panel Credentials

    $ url: localhost/laravel-cms/system
    $ username: admin
    $ password: 123456