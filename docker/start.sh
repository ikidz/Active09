#!/bin/bash

# Give proper permissions (AFTER volume is mounted)
if [ -d /var/www/html/storage ]; then
    echo "Setting permissions..."
    chown -R www-data:www-data /var/www/html
    chmod -R 755 /var/www/html/storage
fi

# Run any other Laravel-specific setup
if [ -f /var/www/html/artisan ]; then
    echo "Running Composer install..."
    composer install --no-interaction --no-dev --optimize-autoloader --no-scripts
fi

# รัน Laravel Artisan Commands ก่อน
echo "Running Laravel artisan commands..."

php artisan config:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# ถ้าใช้ database migration ให้ใส่ด้วย
php artisan migrate --force

# เริ่มต้น PHP-FPM แบบ foreground
echo "Starting PHP-FPM..."
nginx -g 'daemon off;' &
php-fpm
