FROM php:7.4-fpm

RUN apt-get update \
   && apt-get -y install gcc pkg-config libc-dev libicu-dev libonig-dev git unzip \
   && docker-php-ext-install intl \
   && docker-php-ext-install pdo_mysql \
   && docker-php-ext-install mysqli

RUN pecl install xdebug && docker-php-ext-enable xdebug

# Install Composer
COPY --from=composer /usr/bin/composer /usr/bin/composer
