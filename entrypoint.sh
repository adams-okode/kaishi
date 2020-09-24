#!/bin/sh
php artisan key:generate && php artisan cache:clear
php-fpm