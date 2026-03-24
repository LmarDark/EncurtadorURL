FROM php:8.3-cli-alpine

RUN apk add --no-cache sqlite sqlite-dev && \
    docker-php-ext-install pdo pdo_sqlite

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction

RUN mkdir -p storage/framework/cache/data storage/framework/sessions \
        storage/framework/views storage/framework/testing \
        storage/logs bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache

EXPOSE 8084

CMD sh -c "php artisan migrate --force && php artisan config:cache && php artisan route:cache && php artisan schedule:work &  php artisan serve --host=0.0.0.0 --port=8084"
