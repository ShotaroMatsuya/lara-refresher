FROM php:8.0-fpm-alpine

# 必要なパッケージのインストール
RUN apk add autoconf build-base sqlite-dev linux-headers git \
    && pecl install xdebug redis \
    && docker-php-ext-enable xdebug redis
RUN docker-php-ext-install pdo pdo_mysql mysqli pdo_sqlite

# RUN apk add openssh-client-default
# RUN mkdir -p ~/.ssh
# RUN ssh-keyscan -t rsa github.com >> ~/.ssh/known_hosts

COPY dockerfiles/php.ini /usr/local/etc/php/php.ini

WORKDIR /var/www/html

COPY app .

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN composer update \
    && composer global require hirak/prestissimo --ignore-platform-reqs \
    && composer install --ignore-platform-reqs

RUN chown -R www-data:www-data /var/www/html