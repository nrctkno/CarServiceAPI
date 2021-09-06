FROM php:8.0.10-apache-buster

COPY ./docker/app/000-default.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite

WORKDIR /var/www/html

ENV DEBIAN_FRONTEND noninteractive

RUN docker-php-ext-install pdo_mysql
