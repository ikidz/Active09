FROM php:8.2-fpm

# Install system dependencies and Node.js (for Vite)
RUN apt-get update && apt-get install -y \
    curl \
    gnupg \
    nginx \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    libzip-dev \
    && curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy Laravel source code
COPY . .

# Install Composer dependencies (production mode)
# RUN composer install --no-interaction --no-dev --optimize-autoloader --no-scripts

# Set permissions
# RUN chown -R www-data:www-data /var/www/html \
#     && chmod -R 755 /var/www/html/storage

# Copy NGINX config and start script
COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/default.conf /etc/nginx/conf.d/default.conf
COPY docker/start.sh /start.sh

# Make start script executable
RUN chmod +x /start.sh

# Expose HTTP port
EXPOSE 80

# Run start script (starts both NGINX and PHP-FPM)
CMD ["/start.sh"]
