FROM php:8.2-cli

# Устанавливаем нужные PHP-расширения
RUN docker-php-ext-install pdo pdo_mysql mbstring

# Устанавливаем composer из официального образа
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Рабочая директория внутри контейнера
WORKDIR /var/www/html

# Копируем composer-файлы и ставим зависимости
COPY composer.json composer.lock* ./
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Копируем остальной код проекта
COPY . .

ENV COMPOSER_ALLOW_SUPERUSER=1

# При старте контейнера:
# 1) запустить миграции
# 2) запустить встроенный сервер Laravel
CMD ["sh", "-c", "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000"]
