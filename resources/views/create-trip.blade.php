<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Створіть поїздку</title>
    <link rel="stylesheet" href="{{ asset('css/create-trip.css') }}">
</head>
<body>
    <!-- Верхняя панель -->
    <div class="top-navigation">
        <div class="logo-text">GoTogether</div>
        <div class="nav-buttons">
            <a href="{{ route('trip.search') }}" class="nav-button">Знайти поїздку</a>
            <a href="{{ route('trip.create') }}" class="nav-button">Створити поїздку</a>
        </div>
    </div>

    <!-- Контейнер -->
    <div class="container">
        <!-- Форма создания поездки -->
        <div class="create-trip-form">
            <h1 class="form-title">Створіть поїздку за декілька кроків</h1>
            <p class="form-description">Заповніть тільки правдиву інформацію, від цього може залежати ваш рейтинг водія.</p>
            <form method="POST" action="{{ route('trip.store') }}">
                @csrf
                <label for="departure">Місце відправлення:</label>
                <select id="departure" name="departure_location">
                    <option value="">Виберіть місце</option>
                    <option value="Київ">Київ</option>
                    <option value="Львів">Львів</option>
                    <option value="Одеса">Одеса</option>
                    <option value="Харків">Харків</option>
                    <option value="Дніпро">Дніпро</option>
                    <option value="Чернівці">Чернівці</option>
                    <option value="Івано-Франківськ">Івано-Франківськ</option>
                    <option value="Тернопіль">Тернопіль</option>
                </select>                
                <label for="arrival">Місце прибуття:</label>
                <select id="arrival" name="arrival_location">
                    <option value="">Виберіть місце</option>
                    <option value="Київ">Київ</option>
                    <option value="Львів">Львів</option>
                    <option value="Одеса">Одеса</option>
                    <option value="Харків">Харків</option>
                    <option value="Дніпро">Дніпро</option>
                    <option value="Чернівці">Чернівці</option>
                    <option value="Івано-Франківськ">Івано-Франківськ</option>
                    <option value="Тернопіль">Тернопіль</option>
                </select>

                <label for="date">Дата поїздки:</label>
                <input type="date" id="date" name="departure_date">

                <label for="time">Час відправлення:</label>
                <input type="time" id="time" name="departure_time">

                <label for="price">Ціна за одне місце:</label>
                <input type="text" id="price" name="price" placeholder="Ціна">

                <label for="seats">Кількість місць:</label>
                <input type="number" id="seats" name="available_seats" placeholder="Кількість місць">

                <label for="phone">Ваш номер телефону:</label>
                <input type="text" id="phone" name="phone" placeholder="Номер телефону">

                <label for="info">Додаткова інформація:</label>
                <textarea id="info" name="additional_info" placeholder="Додаткова інформація"></textarea>

                <button type="submit" class="submit-button">Перейти до наступного кроку</button>
            </form>
        </div>

        <!-- Блок с изображением -->
        <div class="trip-image"></div>
    </div>

    <!-- Футер -->
    <div class="footer">
        <p>©GoTogether - 2024 | Всі права захищені</p>
        <div class="footer-links">
            <a href="#">FAQ</a>
            <a href="#">Умови користування</a>
            <a href="#">Політика конфіденційності</a>
            <a href="#">Контакти</a>
        </div>
    </div>
</body>
</html>
