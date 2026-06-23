FROM composer:2.6 AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress --prefer-dist --no-scripts

FROM node:20-alpine AS assets
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm ci
COPY resources ./resources
COPY vite.config.js .
RUN npm run build

FROM php:8.3-cli-alpine
WORKDIR /var/www/html
RUN apk add --no-cache icu-dev oniguruma-dev libzip-dev zip unzip
RUN docker-php-ext-install intl pdo pdo_sqlite zip

COPY --from=vendor /app/vendor ./vendor
COPY --from=vendor /app/composer.json ./composer.json
COPY --from=vendor /app/composer.lock ./composer.lock
COPY --from=assets /app/public/build ./public/build
COPY . .

RUN chown -R www-data:www-data /var/www/html
EXPOSE 10000
CMD ["php", "-S", "0.0.0.0:10000", "-t", "public", "public/index.php"]
