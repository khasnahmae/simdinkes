# FROM php:8.1-fpm

# # Install ekstensi yang diperlukan
# RUN apt-get update && apt-get install -y \
#     zip unzip git curl libpng-dev libonig-dev libxml2-dev \
#     && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# # Install Composer
# COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# # Set working directory
# WORKDIR /var/www

# # Salin aplikasi Laravel
# COPY . .

# # Install dependensi Laravel
# RUN composer install --optimize-autoloader

# # Ubah izin file
# RUN chown -R www-data:www-data /var/www \
#     && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# CMD ["php-fpm"]
