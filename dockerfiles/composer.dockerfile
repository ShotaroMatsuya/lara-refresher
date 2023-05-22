FROM php:8.0-fpm-alpine
ENV COMPOSER_MEMORY_LIMIT=-1
# 必要なパッケージや設定を追加するなどの処理
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
