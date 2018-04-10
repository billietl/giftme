FROM composer as builder
RUN composer self-update
COPY code /app
WORKDIR /app
RUN composer install --no-dev -o

FROM php:7.1-fpm
RUN docker-php-ext-install -j$(nproc) pdo_mysql
COPY --from=builder /app /app
