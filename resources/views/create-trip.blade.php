<<<<<<< HEAD
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
=======
@extends('layouts.main')

@section('title', 'Создать поездку')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/create-trip.css') }}">
    
    <!-- Верхняя панель -->
    <div class="top-navigation">
        <h1 class="logo-text">GoTogether</h1>
>>>>>>> c91c4d7ada0cd075785f672445ecf866378a3ac4
        <div class="nav-buttons">
            <a href="{{ route('trip.search') }}" class="nav-button">Знайти поїздку</a>
            <a href="{{ route('trip.create') }}" class="nav-button">Створити поїздку</a>
        </div>
<<<<<<< HEAD
    </div>

    <!-- Контейнер -->
    <div class="container">
        <!-- Форма создания поездки -->
        <div class="create-trip-form">
            <h1 class="form-title">Створіть поїздку за декілька кроків</h1>
            <p class="form-description">Заповніть тільки правдиву інформацію, від цього може залежати ваш рейтинг водія.</p>
            <form>
                <label for="departure">Місце відправлення:</label>
                <select id="departure" name="departure">
                    <option value="">Виберіть місце</option>
                    <option value="Київ">Київ</option>
                    <option value="Львів">Львів</option>
                </select>

                <label for="arrival">Місце прибуття:</label>
                <select id="arrival" name="arrival">
                    <option value="">Виберіть місце</option>
                    <option value="Київ">Київ</option>
                    <option value="Львів">Львів</option>
                </select>

                <label for="date">Дата поїздки:</label>
                <input type="date" id="date" name="date">

                <label for="time">Час відправлення:</label>
                <input type="time" id="time" name="time">

                <label for="price">Ціна за одне місце:</label>
                <input type="text" id="price" name="price" placeholder="Ціна">

                <label for="phone">Ваш номер телефону:</label>
                <input type="text" id="phone" name="phone" placeholder="Номер телефону">
=======
        <div class="user-icon">
            <img src="{{ asset('images/user-icon.png') }}" alt="Профиль">
        </div>
    </div>

    <div class="create-trip-page">
        <!-- Левая часть - форма -->
        <div class="create-trip-form">
            <h1 class="form-title">Створіть поїздку за кілька кроків</h1>
            <p class="form-description">Заповнюйте тільки правдиву інформацію, від цього може залежати ваш рейтинг водія.</p>
            <form action="{{ route('trip.store') }}" method="POST">
                @csrf
                <label for="departure">Місце відправлення:</label>
                <select name="departure" id="departure" required>
                    <option value="">Виберіть місце</option>
                    <option value="Киев">Київ</option>
                    <option value="Львов">Львів</option>
                    <!-- Добавьте другие города -->
                </select>

                <label for="destination">Місце прибуття:</label>
                <select name="destination" id="destination" required>
                    <option value="">Виберіть місце</option>
                    <option value="Киев">Київ</option>
                    <option value="Львов">Львів</option>
                    <!-- Добавьте другие города -->
                </select>

                <label for="date">Дата поїздки:</label>
                <input type="date" name="date" id="date" required>

                <label for="passengers">Кількість пасажирів:</label>
                <input type="number" name="passengers" id="passengers" required min="1" placeholder="Вкажіть кількість">

                <label for="time">Час відправлення:</label>
                <input type="time" name="time" id="time" required placeholder="Час відправлення">

                <label for="price">Ціна за одне місце:</label>
                <input type="text" name="price" id="price" required placeholder="Ціна">

                <label for="phone">Ваш номер телефону:</label>
                <input type="tel" name="phone" id="phone" required placeholder="Номер телефону">
>>>>>>> c91c4d7ada0cd075785f672445ecf866378a3ac4

                <button type="submit" class="submit-button">Перейти до наступного кроку</button>
            </form>
        </div>
<<<<<<< HEAD

        <!-- Блок с изображением -->
        <div class="trip-image"></div>
    </div>

    <!-- Футер -->
    <div class="footer">
        <p>©GoTogether - 2024 | Всі права захищені</p>
=======
        
        <!-- Правая часть - изображение -->
        <div class="trip-image"></div>
    </div>

    <!-- Нижняя панель -->
    <div class="footer">
        <p>&copy; GoTogether - 2024. Всі права захищені</p>
>>>>>>> c91c4d7ada0cd075785f672445ecf866378a3ac4
        <div class="footer-links">
            <a href="#">FAQ</a>
            <a href="#">Умови користування</a>
            <a href="#">Політика конфіденційності</a>
            <a href="#">Контакти</a>
        </div>
    </div>
<<<<<<< HEAD
</body>
</html>
=======
@endsection
>>>>>>> c91c4d7ada0cd075785f672445ecf866378a3ac4
