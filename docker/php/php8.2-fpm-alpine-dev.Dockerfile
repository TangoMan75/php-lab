#/**
# * TangoMan symfony-php-fpm-alpine.dockerfile
# *
# * php-fpm alpine Dockerfile
# *
# * @version  0.1.0
# * @author   "Matthias Morin" <mat@tangoman.io>
# * @license  MIT
# * @link     https://hub.docker.com/_/php
# */

FROM php:8.2-fpm-alpine

WORKDIR /var/www/

# persistent / runtime deps
RUN apk add --no-cache bash fcgi file gettext vim;

# Install symfony PHP Core extensions dependencies (amqp gd intl pdo_mysql pdo_pgsql xsl zip)
RUN set -eux; \
    apk add --no-cache --virtual .build-deps \
        $PHPIZE_DEPS \
        icu-dev \
        libzip-dev \
        linux-headers \
        postgresql-dev \
        zlib-dev \
    ; \
    \
    docker-php-ext-configure zip; \
    docker-php-ext-install -j$(nproc) \
        intl \
        pdo_mysql \
        pdo_pgsql \
        zip \
    ; \
    pecl install \
        xdebug-3.2.0 \
    ; \
    pecl clear-cache; \
    docker-php-ext-enable \
        xdebug \
    ; \
    \
    runDeps="$( \
        scanelf --needed --nobanner --format '%n#p' --recursive /usr/local/lib/php/extensions \
            | tr ',' '\n' \
            | sort -u \
            | awk 'system("[ -e /usr/local/lib/" $1 " ]") == 0 { next } { print "so:" $1 }' \
    )"; \
    apk add --no-cache --virtual .api-phpexts-rundeps $runDeps; \
    \
    apk del .build-deps

# branding and aliases
ENV ENV="/root/.ashrc"
RUN echo -e "\033[33m TangoMan branding and aliases \033[0m" \
    && echo "printf \"\\033[0;32m _____%17s_____\\n|_   _|___ ___ ___ ___|%5s|___ ___\\n  | | | .'|   | . | . | | | | .'|   |\\n  |_| |__,|_|_|_  |___|_|_|_|__,|_|_|\\n%14s|___|%6s\\033[33mtangoman.io\\033[0m\\n\"" >> ~/.ashrc >> ~/.bashrc \
    && printf 'alias ..="cd .."\nalias cc="clear"\nalias h="history"\nalias ll="ls -alFh"\nalias sf="./bin/console"\nalias unit="./bin/phpunit"\nalias xx="exit"' >> ~/.ashrc >> ~/.bashrc

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN ln -s $PHP_INI_DIR/php.ini-production $PHP_INI_DIR/php.ini
COPY ./conf.d/custom.ini $PHP_INI_DIR/conf.d/custom.ini

# https://getcomposer.org/doc/03-cli.md#composer-allow-superuser
ENV COMPOSER_ALLOW_SUPERUSER=1

CMD ["sh", "-c", "php-fpm"]
