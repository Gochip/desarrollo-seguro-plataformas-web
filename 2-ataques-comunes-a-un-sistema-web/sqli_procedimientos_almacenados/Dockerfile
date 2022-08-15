FROM php:7-apache

RUN docker-php-ext-install mysqli

COPY bd_scripts/sp.php /data/sp.php

ENTRYPOINT ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]