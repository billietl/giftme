FROM php:7.1-fpm
RUN mkdir /app
WORKDIR /app
RUN mkdir /.config && chmod 0777 /.config
RUN docker-php-ext-install -j$(nproc) pdo_mysql
COPY code /app
RUN chmod -R 0777 /app
