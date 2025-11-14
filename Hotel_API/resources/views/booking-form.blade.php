<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Заселение в отель</title>
     <meta name="csrf-token" content="{{ csrf_token() }}">  

    {{-- Подключаем CSS через Vite --}}
    @vite(['resources/css/booking.css', 'resources/js/booking.js'])
</head>
<body>

<div class="form-container">
    <h2>Форма заселения</h2>

    <form id="bookingForm">
        <div class="form-group">
            <label>Имя</label>
            <input name="first_name" required>
        </div>

        <div class="form-group">
            <label>Фамилия</label>
            <input name="last_name" required>
        </div>

        <div class="form-group">
            <label>Год рождения</label>
            <input name="birth" type="number" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input name="email" type="email" required>
        </div>

        <div class="form-group">
            <label>Время заезда</label>
            <input type="datetime-local" name="time_in" required>
        </div>

        <div class="form-group">
            <label>Дни отдыха</label>
            <input name="days" type="number" min="1" required>
        </div>

        <button type="submit">Отправить</button>
    </form>

    <p id="result"></p>
</div>

</body>
</html>
