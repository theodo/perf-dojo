FROM php:7.3-fpm-alpine

# install system basics
RUN apk add postgresql-dev --no-cache \
    && docker-php-ext-install pdo_pgsql opcache

ENV COMPOSER_ALLOW_SUPERUSER=1
# install composer
RUN apk add curl --no-cache \
    && curl -s https://getcomposer.org/composer.phar > /usr/local/bin/composer \
    && chmod a+x /usr/local/bin/composer \
    && composer global require hirak/prestissimo -q --no-plugins --no-scripts \
    && rm -rf /root/.composer \
    && apk del curl

WORKDIR /var/www

# copy the source code
COPY composer.* ./
RUN composer install && rm -rf /root/.composer

COPY . ./