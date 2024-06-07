FROM registry.digitalocean.com/charlie-container-registry/base:latest

WORKDIR /var/www/app

RUN install-php-extensions xdebug

EXPOSE 9003