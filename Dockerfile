FROM php:8.3-fpm-alpine as base

RUN apk update --no-cache && \
    apk upgrade --no-cache

# Set environment variables
ENV HOST_GID=1000 \
    HOST_UID=1000

RUN set -x \
    addgroup -g $HOST_GID -S www-data \
    adduser -u $HOST_UID -D -S -G www-data www-data

FROM composer:latest AS vendor

WORKDIR /app

COPY composer.json composer.json
COPY composer.lock composer.lock

RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --no-dev \
    --prefer-dist

COPY . .

RUN composer dump-autoload    

FROM base as build

RUN apk add --no-cache \
    libpng-dev \
    oniguruma-dev \
    libxml2-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    libpq-dev \
    icu-dev

RUN docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath opcache dom xml intl zip
RUN docker-php-ext-configure gd --with-jpeg=/usr/include/ --with-freetype=/usr/include/
RUN docker-php-ext-install gd

FROM base as target

RUN apk add --no-cache \
    nginx \
    libpng \
    oniguruma \
    libxml2 \
    libjpeg-turbo \
    freetype \
    libzip \
    libpq \
    icu

COPY --from=build /usr/local/lib/php/extensions /usr/local/lib/php/extensions
COPY --from=build /usr/local/etc/php/conf.d/* /usr/local/etc/php/conf.d

# Copy configuration files.
COPY .docker/php/php.ini /usr/local/etc/php/php.ini
COPY .docker/php/php-fpm.conf /usr/local/etc/php-fpm.d/www.conf
COPY .docker/nginx/nginx.conf /etc/nginx/nginx.conf

WORKDIR /var/www

COPY --chown=www-data:www-data . .
RUN chown -R www-data:www-data ./storage

COPY --from=vendor /app/vendor/ ./vendor

RUN php artisan optimize
RUN php artisan view:cache
RUN php artisan route:cache
RUN php artisan config:cache
RUN php artisan icons:cache
RUN php artisan filament:cache-components

RUN chmod +x .docker/entrypoint.sh

ENTRYPOINT [".docker/entrypoint.sh"]