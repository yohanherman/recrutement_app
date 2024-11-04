FROM php:8.3.0-fpm

#  Install dependancies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libicu-dev \
    libpq-dev \
    libzip-dev \
    && docker-php-ext-install \
    intl \
    opcache \
    pdo \
    pdo_pgsql \
    pdo_mysql \
    zip \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*


# Installer curl et les dépendances nécessaires
RUN apt-get update && apt-get install -y curl gnupg


# Installer Node.js 20.x
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs=20.18.0-1nodesource1

    
# la configuration d'OpCache
RUN echo "opcache.enable=1\n\
opcache.memory_consumption=128\n\
opcache.interned_strings_buffer=8\n\
opcache.max_accelerated_files=4000\n\
opcache.revalidate_freq=2\n\
opcache.validate_timestamps=0" > /usr/local/etc/php/conf.d/opcache.ini

# Set working directory
WORKDIR /var/www/recrutement

# # Copy existing appliaction directory contents    
COPY . .

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Create necessary directories and set permissions
RUN mkdir -p /var/www/recrutement/storage /var/www/recrutement/bootstrap/cache \
    && chown -R www-data:www-data /var/www/recrutement\
    && chmod -R 775 /var/www/recrutement/storage \
    && chmod -R 775 /var/www/recrutement/bootstrap/cache


# Change current user to www
USER www-data

EXPOSE 9000

# Start PHP-FPM server
CMD [ "php-fpm" ]