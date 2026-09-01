#!/bin/sh
set -e

echo "==> Starting KaHejo Production Boot Sequence..."

# If using SQLite and database file does not exist, initialize it
if [ "$DB_CONNECTION" = "sqlite" ] || [ -z "$DB_CONNECTION" ]; then
    mkdir -p /var/www/html/database
    if [ ! -f /var/www/html/database/database.sqlite ]; then
        echo "==> Creating SQLite database file..."
        touch /var/www/html/database/database.sqlite
    fi
    chmod -R 777 /var/www/html/database
fi

# Ensure storage directories exist and have proper permissions
mkdir -p /var/www/html/storage/framework/cache/data \
         /var/www/html/storage/framework/sessions \
         /var/www/html/storage/framework/views \
         /var/www/html/storage/logs \
         /var/www/html/storage/app/public \
         /var/www/html/bootstrap/cache

chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Create storage symbolic link
php artisan storage:link --force || true

# Cache Laravel configuration, routes, and views for lightning-fast performance
echo "==> Optimizing Laravel Caches..."
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Run Database Migrations and Seeders
echo "==> Running Database Migrations..."
php artisan migrate --force || true

echo "==> Seeding Essential Database Records (Admins, Articles, FAQs, Emission Factors)..."
php artisan db:seed --force || true

echo "==> KaHejo Application is Ready! Launching Nginx & PHP-FPM..."
exec /usr/bin/supervisord -c /etc/supervisord.conf
