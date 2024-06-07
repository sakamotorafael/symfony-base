FROM registry.digitalocean.com/charlie-container-registry/base:1.1

WORKDIR /var/www/html

# dependencias do PHP vvvvv
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions redis imagick

COPY .infra/k8s/app/prod_custom_php.ini /usr/local/etc/php/conf.d/prod_custom_php.ini

COPY ./app /var/www/html

COPY .infra/k8s/nginx/nginx.conf /etc/nginx/nginx.conf
COPY .infra/k8s/nginx/sites /etc/nginx/sites-available
COPY .infra/k8s/nginx/conf.d /etc/nginx/conf.d
COPY .infra/k8s/nginx/startup.sh ./startup.sh
COPY .infra/k8s/nginx/php82/fpm/pool.d/www.conf  /usr/local/etc/php/fpm/pool.d/www.conf

RUN mv .env.build .env

RUN chown -R www-data:www-data .

RUN composer install --no-scripts --optimize-autoloader

CMD [ "/bin/sh", "startup.sh" ]

EXPOSE 80
