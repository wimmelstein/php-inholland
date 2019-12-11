FROM php:7.2-apache

# Apache conf
# allow .htaccess with RewriteEngine
RUN a2enmod rewrite
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

RUN apt-get update && \
    apt-get install -y \
    zlib1g-dev libpng-dev

RUN docker-php-ext-install mysqli 
RUN docker-php-ext-install gd
