FROM php:8.0-apache

WORKDIR /var/www/html

COPY . /var/www/html

CMD ["apache2-foreground"]
