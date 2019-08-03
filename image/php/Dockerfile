FROM php:7.2-fpm

RUN apt-get update && apt-get install -y \
        zip unzip \
        git \
        libmcrypt-dev \
        libpq-dev \
        libz-dev \
        libmemcached-dev \
        && pecl install memcached redis \
        && pecl install xdebug \
        && docker-php-ext-install mbstring tokenizer \
        && docker-php-ext-enable memcached redis

WORKDIR /var/www
