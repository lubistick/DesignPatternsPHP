FROM php:8.0.5-fpm-alpine

MAINTAINER lub1s

# Install Composer
RUN curl --silent --show-error https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/ \
    && ln -s /usr/local/bin/composer.phar /usr/local/bin/composer
