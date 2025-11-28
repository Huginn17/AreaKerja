# ===== Step 1: Gunakan PHP 8.2 dengan Apache =====
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# ===== Step 2: Install dependencies system =====
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# ===== Step 3: Enable Apache mod_rewrite =====
RUN a2enmod rewrite

# ===== Step 4: Install Composer =====
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# ===== Step 5: Copy project files =====
COPY . .

# ===== Step 6: Install PHP dependencies =====
RUN composer install --no-dev --optimize-autoloader

# ===== Step 7: Clear Laravel cache =====
RUN php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear

# ===== Step 8: Set permissions =====
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# ===== Step 9: Expose port 80 =====
EXPOSE 80

# ===== Step 10: Jalankan Apache =====
CMD ["apache2-foreground"]
