FROM php:7.3-fpm-alpine

WORKDIR /var/www/html
COPY ./app/composer.json ./

RUN apk add --update && \
    apk add --update --no-cache build-base curl curl-dev git zip unzip vim bash tzdata
RUN cd /usr/bin && curl -sS https://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer && \
    apk add libxml2-dev $PHPIZE_DEPS && \
    pecl install xdebug && \
    docker-php-ext-install pdo_mysql mbstring xml curl session tokenizer json && \
    docker-php-ext-enable pdo_mysql mbstring xml curl session tokenizer json xdebug && \
    cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime && \
    echo "Asia/Tokyo" > /etc/timezone && \
    apk del tzdata
# CMD crond -l 1 -b

COPY app .

RUN chown -R www-data:www-data /var/www/html