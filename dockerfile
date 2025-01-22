# Gunakan base image PHP dengan ekstensi yang dibutuhkan Laravel
FROM php:8.1-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpq-dev libonig-dev libjpeg-dev libpng-dev libfreetype6-dev libzip-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql zip

# Install Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Salin semua file ke dalam container
COPY . .

# Set permissions
RUN chown -R www-data:www-data /var/www

# Set permission untuk storage dan cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Jalankan server
CMD php artisan serve --host=0.0.0.0 --port=${PORT}
