FROM php:8.2-fpm-alpine

WORKDIR /var/www/html

RUN apk --update --no-cache add git
RUN docker-php-ext-install pdo_mysql

RUN apk update
RUN apk upgrade
RUN apk add tzdata
RUN apk add bash

ENV TZ="America/Sao_Paulo"

# Installing Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chown -R www-data .

EXPOSE 9000