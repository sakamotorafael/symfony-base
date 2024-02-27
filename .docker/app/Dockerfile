FROM php:8.3-fpm-alpine

WORKDIR /var/www/html

RUN apk update
RUN apk upgrade
RUN apk add git
RUN docker-php-ext-install pdo_mysql

RUN apk add tzdata
RUN apk add bash

ENV TZ="America/Sao_Paulo"

# Instalar dependências para o Imagick e GD
RUN apk add --no-cache \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    imagemagick-dev

# Baixar e compilar a extensão Imagick manualmente
RUN mkdir -p /usr/src/php/ext/imagick \
    && curl -fsSL https://pecl.php.net/get/imagick | tar xvz -C /usr/src/php/ext/imagick --strip 1 \
    && docker-php-ext-install -j$(nproc) imagick

# Instalar extensão GD
RUN docker-php-ext-install -j$(nproc) gd

# Instalando Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

EXPOSE 9000
