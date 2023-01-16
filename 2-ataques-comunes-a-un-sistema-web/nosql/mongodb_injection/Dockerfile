FROM php:7-apache

COPY . /var/www/html/
WORKDIR /var/www/html/

RUN apt-get update && apt-get install -y git zip libcurl4-openssl-dev pkg-config libssl-dev && pecl install mongodb
RUN echo "extension=mongodb.so" >> /usr/local/etc/php/conf.d/docker-php-ext-sodium.ini
COPY --from=composer/composer /usr/bin/composer /usr/bin/composer
RUN composer require mongodb/mongodb

ENTRYPOINT ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]