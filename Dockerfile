FROM php:7.2-fpm-alpine
MAINTAINER travler

RUN apk --update add zlib-dev \
    libmcrypt-dev \
    && rm -rf /var/cache/apk/* && \
    docker-php-ext-install pdo_mysql && \
    docker-php-ext-install opcache && \
    docker-php-ext-install zip && \
    docker-php-ext-install mysqli && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer && \
    composer global require "laravel/installer"

