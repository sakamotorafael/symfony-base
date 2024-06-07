FROM base:latest

WORKDIR /var/www/app

RUN install-php-extensions xdebug

EXPOSE 9003