# Pilih PHP sebagai base image
FROM php:8.1-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy aplikasi Laravel ke dalam container
COPY . /var/www

# Install dependensi aplikasi
RUN composer install --no-dev --optimize-autoloader

# Cache konfigurasi Laravel
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Ubah izin agar folder storage bisa ditulis
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Jalankan Laravel menggunakan PHP-FPM
CMD ["php-fpm"]
