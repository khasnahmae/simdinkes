FROM php:8.1-fpm

# Install dependencies sistem dan PHP
RUN apt-get update && apt-get install -y \
    zip unzip git curl libonig-dev libzip-dev libxml2-dev libssl-dev && \
    docker-php-ext-install \
    ctype \
    mbstring \
    tokenizer \
    session \
    pcntl \
    zip \
    opcache && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Salin semua file ke dalam container
COPY . .

# Set permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Debug composer install
RUN composer install --no-dev --no-interaction --prefer-dist --no-progress --verbose || \
    (composer diagnose && exit 1)

# Expose port
EXPOSE 80

# Jalankan server Laravel
CMD php artisan serve --host=0.0.0.0 --port=${PORT}
