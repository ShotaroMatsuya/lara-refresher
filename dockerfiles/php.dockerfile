FROM php:7.4-fpm-alpine

# xdebugインストール
RUN apk add autoconf build-base \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug 
RUN docker-php-ext-install pdo pdo_mysql mysqli

COPY dockerfiles/php.ini /usr/local/etc/php/php.ini

WORKDIR /var/www/html

COPY app .

COPY --from=composer:1.10.26 /usr/bin/composer /usr/bin/composer

RUN composer update \
    && composer global require hirak/prestissimo --ignore-platform-reqs \
    && composer install --ignore-platform-reqs

RUN chown -R www-data:www-data /var/www/html