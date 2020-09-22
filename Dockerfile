FROM php:7.3-fpm

# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libzip-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
RUN docker-php-ext-install gd

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chown -R www-data:www-data /var/www
RUN chmod -R 755 /var/www

# Copy existing application directory contents
COPY ./ /var/www/

RUN composer install

RUN cp .env.example .env

RUN php artisan key:generate\ 
    && php artisan storage:link\ 
    && php artisan view:clear\
    && php artisan route:clear\
    && php artisan cache:clear

RUN chown -R www-data:www-data /var/www/storage

# Expose port 9000 and start php-fpm server
EXPOSE 9000

CMD ["php-fpm"]