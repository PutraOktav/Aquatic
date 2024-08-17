FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql gd zip exif pcntl

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Clear cache
RUN composer clear-cache

# Install dependencies
RUN composer install --ignore-platform-reqs

# Generate key
RUN php artisan key:generate

# Expose port
EXPOSE 9000

CMD ["php-fpm", "--allow-to-run-as-root"]

