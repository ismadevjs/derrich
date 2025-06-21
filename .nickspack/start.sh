#!/bin/sh

# Start PHP in the background
php-fpm -D

# Start nginx using your custom config
nginx -c /app/.nickspack/nginx.conf -g 'daemon off;'
