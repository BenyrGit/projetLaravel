FROM php:8.4-fpm

RUN apt-get update && apt-get install -y unzip libzip-dev     && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_mysql bcmath zip
RUN docker-php-ext-enable opcache
RUN pecl install xdebug && docker-php-ext-enable xdebug

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
