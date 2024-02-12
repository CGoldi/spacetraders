FROM php:8.3-rc-apache-bookworm
RUN docker-php-ext-install pdo_mysql
COPY ./code/* /var/www/html/.
