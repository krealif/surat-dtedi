#!/bin/sh

php artisan optimize
php artisan config:cache

php-fpm -D
nginx -g "daemon off;"