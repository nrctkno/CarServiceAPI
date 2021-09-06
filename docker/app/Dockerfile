FROM php:8.0.10-apache-buster

#COPY ./docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf
#RUN a2enmod rewrite

WORKDIR /var/www/html

ENV DEBIAN_FRONTEND noninteractive

RUN docker-php-ext-install pdo_mysql

# prepare app code

#COPY ./ .
#COPY --from=vendors app/vendor/ vendor/

#RUN chown -R www-data:www-data storage/ bootstrap/cache \
#    && chmod -R 775 storage/ bootstrap/cache
