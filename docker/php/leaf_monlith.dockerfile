FROM pelentan/leaf-app-base:1.0 as base

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
