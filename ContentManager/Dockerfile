# Use the official PHP image with FPM
FROM php:8.2-fpm

# Install system dependencies (and any PHP extensions you need)
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Install Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set the working directory to /var/www
WORKDIR /var/www

# Copy the application files to the container
COPY . /var/www

# Install Composer dependencies
RUN composer install --no-interaction

# Chown all the files to the www-data user
RUN chown -R www-data:www-data /var/www

# Change current user to www-data
USER www-data

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]