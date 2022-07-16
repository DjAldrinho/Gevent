FROM php:5.6-fpm

ARG user=laravel
ARG uid=1000

# Install system dependencies
RUN apt-get update && apt-get install -y \
    curl \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libgd-dev \
    unzip \
    supervisor \
    openssl \
    libfreetype6-dev libjpeg62-turbo-dev

RUN mkdir -p /etc/supervisor.d/

COPY supervisord/supervisord.ini /etc/supervisor.d/supervisord.ini

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Configure gd
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath zip fileinfo gd

# Enable Zip
RUN docker-php-ext-enable zip

# Get latest Composer
COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www

USER $user
