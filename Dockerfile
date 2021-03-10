FROM php:8.0-apache

# Apache conf
# allow .htaccess with RewriteEngine
RUN a2enmod rewrite

RUN cd /tmp && openssl req -new -newkey rsa:4096 -days 365 -nodes -x509 \
-subj "/C=NL/ST=Noord-Holland/L=Haarlem/O=Inholland/CN=localhost" \
-keyout /tmp/localhost.key  -out /tmp/localhost.crt

RUN cat /tmp/localhost.crt /tmp/localhost.key >> /tmp/localhost.pem
RUN ls /tmp
RUN cp /tmp/localhost.pem /etc/ssl/certs

RUN docker-php-ext-install mysqli pdo pdo_mysql

