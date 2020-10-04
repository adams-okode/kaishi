#!/bin/sh
composer install --no-interaction

php artisan key:generate

# Clear the old boostrap/cache/compiled.php
php artisan clear-compiled

# Recreate boostrap/cache/compiled.php
php artisan optimize
