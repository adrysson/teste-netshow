#!/bin/bash
chown -R www-data:www-data storage
# composer update
npm install
php artisan cache:clear
php artisan route:cache
php artisan config:cache
php artisan migrate
php-fpm