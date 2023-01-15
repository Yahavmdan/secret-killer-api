#!/usr/bin/env bash

chown -R www-data:www-data /var/www/html/storage/app/temp

php artisan app:reset

apachectl -D FOREGROUND