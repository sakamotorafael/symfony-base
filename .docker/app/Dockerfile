FROM php:8.3-fpm-alpine

WORKDIR /var/www/html

RUN apk update
RUN apk upgrade
RUN apk add git
RUN docker-php-ext-install pdo_mysql

RUN apk add tzdata
RUN apk add bash

ENV TZ="America/Sao_Paulo"

# Installing Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


EXPOSE 9000