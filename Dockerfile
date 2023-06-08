# Use the official PHP image as the base image
FROM php:latest

# Set the working directory
WORKDIR /var/www/html/mvc
# Install the PDO extension for MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Install any necessary dependencies or packages
RUN apt-get update && apt-get install -y \
    zip \
    unzip

# Copy the files from the current directory into the container's /var/www/html/mvc directory
COPY . /var/www/html/mvc

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the COMPOSER_ALLOW_SUPERUSER environment variable
ENV COMPOSER_ALLOW_SUPERUSER=1

# Install Composer dependencies
RUN composer install --no-scripts --no-autoloader

# Switch back to the root directory
WORKDIR /var/www/html

# Define the command to start your PHP application
CMD [ "php", "-S", "0.0.0.0:80" ]
