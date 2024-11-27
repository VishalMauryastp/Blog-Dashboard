# Use the base image with Nginx and PHP-FPM
FROM richarvey/nginx-php-fpm:3.1.6

# Set environment variables for PHP
ENV PHP_MEMORY_LIMIT 256M  # Adjust the memory limit for PHP
ENV PHP_ERRORS_STDERR 1    # Output PHP errors to STDERR

# Set environment variables for Laravel
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# Allow composer to run as root if necessary
ENV COMPOSER_ALLOW_SUPERUSER 1

# Set the web root and ensure proper paths
ENV WEBROOT /var/www/html/public
ENV REAL_IP_HEADER 1

# Install dependencies and set up Composer (if needed)
RUN apt-get update && apt-get install -y \
    unzip \
    curl \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy all files into the container
COPY . /var/www/html

# Ensure proper ownership of the app files
RUN chown -R www-data:www-data /var/www/html

# Set the working directory to the Laravel app root
WORKDIR /var/www/html

# Install PHP dependencies (composer install)
RUN composer install --no-dev --optimize-autoloader

# Expose the necessary port for Nginx
EXPOSE 80

# Use a script to start the services
CMD ["/start.sh"]
