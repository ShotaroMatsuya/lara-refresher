FROM php:8.0-fpm-alpine

# 必要なパッケージのインストール
RUN apk add autoconf build-base sqlite-dev\
    && pecl install xdebug-3.1.5 redis \
    && docker-php-ext-enable xdebug redis
RUN docker-php-ext-install pdo pdo_mysql mysqli pdo_sqlite

COPY dockerfiles/php.ini /usr/local/etc/php/php.ini

WORKDIR /var/www/html

COPY app .

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN composer update \
    && composer global require hirak/prestissimo --ignore-platform-reqs \
    && composer install --ignore-platform-reqs

RUN chown -R www-data:www-data /var/www/html