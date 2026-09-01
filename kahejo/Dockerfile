FROM php:8.3-fpm-alpine

# Set Environment Variables
ENV COMPOSER_ALLOW_SUPERUSER=1 \
    APP_ENV=production \
    APP_DEBUG=false

# Install Required Alpine System Packages & PHP Extension Build Dependencies
RUN apk add --no-cache \
    nginx \
    supervisor \
    curl \
    git \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    sqlite-dev \
    icu-dev \
    oniguruma-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        pdo \
        pdo_mysql \
        pdo_sqlite \
        bcmath \
        mbstring \
        zip \
        gd \
        intl \
        opcache

# Configure PHP Production Settings
RUN echo "upload_max_filesize = 32M" > /usr/local/etc/php/conf.d/uploads.ini \
    && echo "post_max_size = 32M" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "memory_limit = 256M" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "opcache.enable=1" > /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.memory_consumption=128" >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.max_accelerated_files=10000" >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.validate_timestamps=0" >> /usr/local/etc/php/conf.d/opcache.ini

# Get Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Set Working Directory
WORKDIR /var/www/html

# Copy Project Files
COPY . /var/www/html

# Copy Configuration Files
COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/supervisord.conf /etc/supervisord.conf
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh

# Fix line endings and permissions on entrypoint
RUN chmod +x /usr/local/bin/entrypoint.sh

# Install Composer PHP Dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress

# Set Proper Permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expose Web Port
EXPOSE 80

# Run Boot Script
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
