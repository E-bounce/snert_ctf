FROM php:7.1-apache
  
LABEL maintainer="Ebounce <3199729962@qq.com>"

COPY ./www/ /var/www/html/
RUN chown root:root -R /var/www \
    && chmod 0755 -R /var/www \
