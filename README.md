# 📘 Hotel API (Laravel + XAMPP + MySQL)

Форма заполения посетитиле Отеля (взял за основу один из своиз заказов) на Laravel: форма бронирования + API, которое сохраняет данные в MySQL.

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
cd hotel-api/hotel_API & cd Hotel_API
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

## ⚙ 6. Настройка .env

```env
APP_NAME=Laravel
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

API_KEY=34247999464565567295723495732495

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hotel_api
DB_USERNAME=root
DB_PASSWORD=
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

http://127.0.0.1:8000/api/bookings?api_key=34247999464565567295723495732495

### API POST пример:

```bash
curl -X POST "http://host.docker.internal:8000/api/bookings?api_key=34247999464565567295723495732495" \
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

Проект готов к локальному запуску у любого пользователя Windows.
