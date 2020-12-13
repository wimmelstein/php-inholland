FROM php:7.2-apache

# Apache conf
# allow .htaccess with RewriteEngine/
RUN a2enmod rewrite
RUN a2enmod ssl

COPY ./apache/apache2.conf /etc/apache2/
COPY ./apache/jacksguitarshop.com.conf /etc/apache2/sites-available/

RUN a2ensite jacksguitarshop.com.conf
RUN mkdir /var/tmp/certs

COPY ./certs/* /var/tmp/certs/

RUN apt-get update && \
    apt-get install -y \
    zlib1g-dev libpng-dev git zip net-tools

RUN docker-php-ext-install mysqli 

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer require mollie/mollie-api-php:^2.0