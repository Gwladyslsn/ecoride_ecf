FROM composer:latest AS composer

FROM php:8.2-apache

RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli pdo_mysql

COPY --from=composer /usr/bin/composer /usr/local/bin/composer

RUN a2enmod rewrite

COPY docker/apache/vhost.conf /etc/apache2/sites-available/000-default.conf

RUN a2ensite 000-default.conf
RUN chown -R www-data:www-data /var/www/html

WORKDIR /var/www/html/public

EXPOSE 80
