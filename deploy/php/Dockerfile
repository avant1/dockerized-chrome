FROM php:7.2-cli

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libicu-dev \
        libcurl4-openssl-dev \
        libpq-dev

RUN docker-php-ext-install -j$(nproc) iconv intl mysqli curl \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install -j$(nproc) pgsql pdo pdo_pgsql pdo_mysql

RUN docker-php-ext-install -j$(nproc) zip bcmath pcntl

RUN apt-get install -y git

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer --version=1.3.2 && \
    chmod +x /usr/local/bin/composer && \
    rm composer-setup.php

WORKDIR /dockerized-chrome

#COPY app/composer.* /dockerized-chrome/
#
#RUN composer install --no-suggest --optimize-autoloader
#
#COPY app/ /dockerized-chrome/
