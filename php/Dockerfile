FROM php:7.4-fpm-alpine

WORKDIR /var/www/html

RUN apk --no-cache add postgresql-dev && docker-php-ext-install pgsql pdo_pgsql