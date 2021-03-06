FROM php:7.3-fpm-alpine

# install system basics
RUN apk add postgresql-dev --no-cache && docker-php-ext-install pdo_pgsql

ARG PROD_OPTIM=false
RUN if [ "$PROD_OPTIM" = "true" ] ; then \
  apk add --no-cache $PHPIZE_DEPS \
  && pecl install apcu \
  && docker-php-ext-enable apcu \
  && docker-php-ext-install opcache \
  && mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" \
  && apk del $PHPIZE_DEPS \
  && rm -rf /tmp/pear; \
  else \
  apk add --no-cache $PHPIZE_DEPS \
  && pecl install xdebug \
  && docker-php-ext-enable xdebug \
  && apk del $PHPIZE_DEPS \
  && rm -rf /tmp/pear; \
  fi ;

# install composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN apk add curl --no-cache \
  && curl -s https://getcomposer.org/composer.phar > /usr/local/bin/composer \
  && chmod a+x /usr/local/bin/composer \
  && composer global require hirak/prestissimo -q --no-plugins --no-scripts \
  && rm -rf /root/.composer \
  && apk del curl

# copy the source code
WORKDIR /var/www
COPY composer.* ./
RUN composer install --prefer-dist --no-scripts --no-dev --no-autoloader -q && rm -rf /root/.composer
COPY . ./

COPY --from=kraynel/builder-front:latest /var/www/public/build/*.json /var/www/public/build/

RUN composer dump-autoload --no-scripts --no-dev --optimize -q \
  && rm -rf /root/.composer \
  && bin/console --env=prod cache:warmup -q
