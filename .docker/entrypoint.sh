#!/bin/bash
chown -R www-data:www-data storage
composer --no-ansi \
    --no-interaction \
    --optimize-autoloader \
    --no-progress \
    --no-dev \
    --profile \
    install
php artisan cache:clear
php artisan route:cache
php artisan config:cache
php artisan migrate
composer dump-autoload -o
php-fpm