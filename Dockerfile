FROM php:8.2-apache

# Install required packages
RUN apt-get update && apt-get install -y \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    git \
    curl \
    && docker-php-ext-install pdo_mysql zip

# Enable Apache mod_rewrite for pretty URLs
RUN a2enmod rewrite

# Set the working directory
WORKDIR /var/www/html

# Copy all files into the container
COPY . /var/www/html

# Give Apache access to the writable folder
RUN chown -R www-data:www-data /var/www/html/writable

# Set Apache's root to the CodeIgniter public directory
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Update Apache config to reflect the new document root
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
