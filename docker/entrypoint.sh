#!/bin/bash

php artisan config:cache

php artisan storage:link

exec apache2-foreground
