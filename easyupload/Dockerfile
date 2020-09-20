FROM php:7.1-apache

LABEL maintainer="Ebounce <3199729962@qq.com>"

COPY www/ /var/www/html
RUN chown 555 -R /var/www/html/ \
    && chown 777 -R /var/www/html/read.php \
    && chown 666 -R /var/www/html/upload \
    && apt-get update \
    && apt-get install -y --no-install-recommends libzip-dev \
    && rm -r /var/lib/apt/lists/* \
    && docker-php-ext-install -j$(nproc) zip

