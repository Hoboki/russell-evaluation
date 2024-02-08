FROM php:7.3-apache

COPY --from=composer /usr/bin/composer /usr/bin/composer
