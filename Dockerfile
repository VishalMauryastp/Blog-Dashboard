# Use the base image with Nginx and PHP-FPM
FROM richarvey/nginx-php-fpm:3.1.6

# Set environment variables for PHP
ENV PHP_MEMORY_LIMIT 256M  # Adjust the memory limit for PHP
ENV PHP_ERRORS_STDERR 1    # Output PHP errors to STDERR
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr
ENV COMPOSER_ALLOW_SUPERUSER 1  # Allow composer to run as root

# Set web root and ensure proper paths
ENV WEBROOT /var/www/html/public
ENV REAL_IP_HEADER 1

# Install dependencies: Node.js, npm, and Composer
RUN apt-get update && apt-get install -y \
    curl \
    unzip \
    gnupg \
    lsb-release \
    && curl -sL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && apt-get clean

# Copy all files into the container
COPY . /var/www/html

# Set working directory to the Laravel app root
WORKDIR /var/www/html

# Ensure proper file ownership for Nginx and PHP-FPM
RUN chown -R www-data:www-data /var/www/html

# Install PHP dependencies (composer install)
RUN composer install --no-dev --optimize-autoloader

# Install Node.js dependencies (npm install)
RUN npm install

# Build assets using Vite (generates manifest.json)
RUN npm run build

# Expose the necessary port for Nginx
EXPOSE 80

# Use a script to start both PHP-FPM and Nginx
CMD ["/start.sh"]
