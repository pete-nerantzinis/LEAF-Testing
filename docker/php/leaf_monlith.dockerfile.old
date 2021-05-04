FROM php:7.3.5-apache as base

# Set container to EST
ENV TZ=America/New_York
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Create runtime user
ARG BUILD_UID=1000
ENV REMOTE_USER=\\tester
RUN useradd -u $BUILD_UID -g www-data build_user

# Server installs
RUN apt-get update && apt-get install -y wget libpng-dev zlib1g-dev libzip-dev git zip unzip iputils-ping netcat vim mysql-client

# PHP installs
RUN docker-php-ext-install zip mysqli pdo pdo_mysql gd

COPY /docker/php/trust_ca_certs.sh /tmp/
RUN bash -xc "bash /tmp/trust_ca_certs.sh"

RUN a2enmod rewrite &&\
  a2enmod ssl &&\
  a2enmod env &&\
  a2enmod proxy &&\
  a2enmod proxy_http &&\
  a2enmod proxy_connect

# Self-signed cert creation and installing
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/certs/leaf.key -out /etc/ssl/certs/leaf.pem -subj "/C=US/ST=VA/L=Chantilly/O=LEAF/OU=LEAF/CN=%"

# Installation of composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

RUN composer global require phpunit/phpunit ^7.4
RUN composer global require robmorgan/phinx ^0.9.2

ENV PATH /root/.composer/vendor/bin:$PATH

# The "Expose" really doesn't do anything except to log what ports the lister is listening on.
# Currently it _is_ listening on 80, but Traefik is routing all traffic to 443 long before it gets here.
# Once we get to Step 2, NGinx will be retired from even production.
EXPOSE 80
EXPOSE 443

# Mail()
RUN apt-get install -y ssmtp && \
  apt-get clean && \
  echo "FromLineOverride=YES" >> /etc/ssmtp/ssmtp.conf && \
  echo 'sendmail_path = "/usr/sbin/ssmtp -t"' > /usr/local/etc/php/conf.d/mail.ini

COPY /docker/php/ssmtp/ssmtp.conf /etc/ssmtp/
COPY /docker/php/swagger-proxy.conf /etc/apache2/conf-enabled/
COPY /docker/php/000-default.conf /etc/apache2/sites-enabled/
COPY /docker/php/default-ssl.conf /etc/apache2/sites-enabled/
COPY /docker/php/apache2.conf /etc/apache2/
## not sure if this is needed but...
RUN service apache2 restart 

COPY /docker/php/docker-php-entrypoint /usr/local/bin/docker-php-entrypoint
RUN chmod +x /usr/local/bin/docker-php-entrypoint

RUN chmod +x /var/www/html/
RUN chown -R www-data:www-data /var/www
RUN chmod -R g+rwX /var/www

ENV COMPOSER_ALLOW_SUPERUSER 1
# USER build_user

FROM base as dev 
# xdebug
RUN pecl config-set php_ini "$PHP_INI_DIR/php.ini"
RUN pecl install xdebug && docker-php-ext-enable xdebug
COPY /docker/php/etc/xdebug.ini "$PHP_INI_DIR/conf.d/xdebug.ini"

FROM base as prod
COPY ./LEAF_Nexus /var/www/html/LEAF_Nexus
COPY ./LEAF_Request_Portal /var/www/html/LEAF_Request_Portal
COPY ./libs /var/www/html/libs
COPY ./health_checks /var/www/html/health_checks
