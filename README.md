Я собрал два способа моего проекта через 
Форма заполения посетитиле Отеля (взял за основу один из своих заказов) на Laravel: форма бронирования + API, которое сохраняет данные в MySQL.

Под Docker образ пришлось пожертвовать СSS, ,были проблемы при сборке пришлось отказаться. 
И еще смотрите на порты MySQL, у меня XAMP когда я запускал контйнер он путался с ним по портам. Так что или меняйте в конфигурации портов БД или запускать на чистой система без XAMP

# 📘 # 1 cпособ через Docker 
🚀 1. Установи необходимые программы

### Установи Docker Desktop
https://www.docker.com/products/docker-desktop/

### Установи Git
https://git-scm.com/downloads

### Скопируй проект

```bash
git clone https://github.com/igormuzyka555/hotel-api.git
cd Hotel_API_Docker
```
### Cоздай .env файл

В проекте уже есть .env.example.

Скопируй его:
```bash
cp .env.example .env
```
### API ключ 
API_KEY= # cюда вписать ключ 

### Запусти проект через Docker
```bash
docker compose up -d
docker compose ps
```
### Установи Laravel-зависимости и создай таблицы

Зайди внутрь контейнера приложения:
laravel-app в exec app bash

Внутри контейнера:
```bash
composer install
php artisan key:generate
php artisan migrate
```

### Открой сайт с формой

Перейди в браузере:

http://localhost:8000/booking-form

Ты увидишь форму:

Имя

Фамилия

Год рождения

Email

Дата заселения

Кол-во дней

Заполни и нажми Отправить.

### Посмотреть данные через API

Используется GET-запрос.

Формат:

http://localhost:8000/api/bookings?api_key=ВАШ_КЛЮЧ

### Внимание лучше это делать через "Docker Desktop"


# Второй Способ Классический 
# 📘 Hotel API (Laravel + XAMPP + MySQL)
---
## 📦 1. Необходимые установки

Перед запуском установите:

### ✔ XAMPP  
https://www.apachefriends.org/  

Запускаем модули:
- Apache  
- MySQL  

### ✔ Git  
https://git-scm.com/downloads  

### ✔ Composer  
https://getcomposer.org/download/
---

## 🚀 2. Запуск XAMPP

1. Открыть **XAMPP Control Panel**
2. Нажать **Start** напротив:
   - Apache  
   - MySQL  

---

## 📥 3. Скачать проект

```bash
git clone https://github.com/igormuzyka555/hotel-api.git
cd hotel-api/hotel_API
```
---

## 📦 4. Установка зависимостей PHP

```bash
composer install
```

---

## 🗄 5. Создание базы данных

1. Открыть http://localhost/phpmyadmin  
2. Войти под root (пароль пустой, если не меняли)  
3. Создать базу **hotel_api**

---

В репозитории лежит файл .env.example.
На его основе нужно создать рабочий .env:

```env
cd hotel-api/hotel_API
cp .env.example .env
```

## ⚙ 6. Настройка .env

```env
APP_NAME=Laravel
APP_ENV=local
APP_KEY= #Генерация ниже
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://localhost:8000

# API ключ 
API_KEY= # cюда вписать ключ 

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
APP_MAINTENANCE_STORE=database

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

# Настройки БД под docker-compose
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=hotel_api
DB_USERNAME=laravel
DB_PASSWORD=laravel
```

---

## 🔑 7. Генерация APP_KEY

```bash
php artisan key:generate
```

---

## 📚 8. Миграции

```bash
php artisan migrate
```

---

## ▶ 9. Запуск приложения

```bash
php artisan serve
```

Приложение: http://127.0.0.1:8000

---

## 🧾 10. Функциональность

### Форма:

http://127.0.0.1:8000/booking-form

### API GET:

http://127.0.0.1:8000/api/bookings?api_key="тут API ключ"

### API POST пример:

```bash
curl -X POST "http://127.0.0.1:8000/api/bookings?api_key="тут API ключ"" \
  -H "Content-Type: application/json" \
  -d '{
    "first_name": "Дима",
    "last_name": "Стрелков",
    "birth": 1998,
    "email": "dmitri@test.com",
    "time_in": "2025-11-20 14:00:00",
    "days": 6
  }'

```

---

## 🛢 phpMyAdmin

http://localhost/phpmyadmin  
База: hotel_api  
Таблица: bookings

---

## 🤖 12. Тест через n8n

Я в папку добавил Workflow проекта для наглядности, файл "Проверка API.json"

n8n Запускать в Docker (лучше через Docker Desktop )

```bash
docker volume create n8n_data
docker run -it --rm --name n8n -p 5678:5678 -v n8n_data:/home/node/.n8n docker.n8n.io/n8nio/n8n
```
 Перейти в http://localhost:5678 и импортировать проект в ново созданый Workflow
---

## ✔ Готово

