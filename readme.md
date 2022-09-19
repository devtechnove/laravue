# Laravel and Vue Single Administration with Laravel and Vuejs

This project is based on those who are starting in the world of web development.
-
Here you can find Users, Roles and Permissions pre-loaded and working within the application, enjoy it!

## Technologies

### Frontend

* [VueJS](https://fr.vuejs.org/index.html) - A JavaScript framework for building great user interfaces.
* [Bootstrap 5](https://getbootstrap.com) - Bootstrap is the most used CSS framework.
* [Vuex](https://getbootstrap.com) - A state management library for VueJS applications and serves as a central
store for the application.

### Backend

* PHP 7.4
* SQLite3 for development and MySQL for production.
* PHPUnit for unit tests.
* [Laravel](http://www.laravel.com) - A PHP Full stack framework
* [Tymon/Jwt-auth](https://jwt-auth.readthedocs.io/en/develop/) - A library used in laravel for Json Web Token authentication


## Prerequisites

* PHP >= 7.4
* Mysql or PostgreSQL
* Git
* Composer

## Getting Started

* Clone the project from Github

          $ git clone https://github.com/devtechnove/laravue
          $ cd laravue
          laravue$

* Install the packages for laravel:

         laravue$ composer install

* Create the database:

          laravue$ touch database/database
          
* Create the .env file :

          laravue$ cp .env.example .env
        
* Generate the encryption key for Laravel :

          laravue$ php artisan key:generate
        
* Add database information :

          laravue$ vim .env
        
* Change the DB_CONNECTION to put Mysql or PostgreSQL :

          DB_CONNECTION=postgres        

* Load sample records:

          laravue$ php artisan migrate --seed

* Run the Laravel Server in development mode

          laravue$ php artisan serve

* Start client in development mode. You should be able to go to `http://localhost:8000`

* To access to the administration panel, there is a link in the bottom of the page or go to `http://localhost:8000/login`

## Next step

* [ ] Create Laravel and React Single Page Application Forum


## Donations by Paypal?

https://wa.me/message/HU3A3WJN5QYJB1

