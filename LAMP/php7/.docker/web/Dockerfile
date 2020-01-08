FROM php:7.3-apache

RUN apt-get update
RUN apt-get install -y --no-install-recommends \
        libmemcached-dev \
        libz-dev \
        libpq-dev \
        libjpeg-dev \
        libpng-dev \
        libfreetype6-dev \
        libssl-dev \
        libmcrypt-dev \
        git \
        zip \
        unzip

RUN php -i
RUN docker-php-ext-install mysqli pdo_mysql

RUN pecl install mcrypt-1.0.2
RUN docker-php-ext-enable mcrypt

RUN docker-php-ext-configure gd \
        --with-jpeg-dir=/usr/lib \
        --with-freetype-dir=/usr/include/freetype2

RUN docker-php-ext-install gd

RUN pecl install xdebug-2.7.0
RUN docker-php-ext-enable xdebug
RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/php.ini

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN a2enmod rewrite expires headers

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY composer.json /var/www/html/
WORKDIR /var/www/html
RUN composer install
ENV PATH=$PATH:/var/www/.composer/vendor/bin