@extends('layouts.main')

<<<<<<< HEAD
@section('title', 'Создать поездку')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/create-trip.css') }}">
    
    <!-- Верхняя панель -->
    <div class="top-navigation">
        <h1 class="logo-text">GoTogether</h1>
        <div class="nav-buttons">
            <a href="{{ route('trip.search') }}" class="nav-button">Знайти поїздку</a>
            <a href="{{ route('trip.create') }}" class="nav-button">Створити поїздку</a>
        </div>
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

                <button type="submit" class="submit-button">Перейти до наступного кроку</button>
            </form>
        </div>
        
        <!-- Правая часть - изображение -->
        <div class="trip-image"></div>
=======
@section('title', 'Создать автомобиль')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/create-car.css') }}">
    
    <!-- Верхняя панель -->
    <div class="header">
        <div class="header-content">
            <h1>GoTogether</h1>
            <div class="nav">
                <a href="#">Знайти поїздку</a>
                <a href="#">Створити поїздку</a>
                <a href="#">Профіль</a>
            </div>
        </div>
    </div>

    <div class="create-car-container">
        <div class="form-section">
            <h1>Створіть автомобіль за кілька кроків</h1>
            <form action="{{ route('car.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="car_type">Тип автомобіля:</label>
                <select name="car_type" id="car_type" required>
                    <option value="">Виберіть тип</option>
                    <option value="Легковий">Легковий</option>
                    <option value="Позашляховик">Позашляховик</option>
                </select>

                <label for="brand">Марка автомобіля:</label>
                <input type="text" name="brand" id="brand" placeholder="Введіть марку автомобіля" required>

                <label for="capacity">Місткість багажного відділення (кг):</label>
                <input type="number" name="capacity" id="capacity" placeholder="Введіть місткість" required min="1">

                <label for="car_photo">Фото автомобіля:</label>
                <input type="file" name="car_photo" id="car_photo" required>

                <label for="terms">Ознайомтесь з політикою конфіденційності:</label>
                <input type="checkbox" name="terms" id="terms" required> Політика конфіденційності

                <button type="submit">Створити автомобіль</button>
            </form>
        </div>
        <div class="image-section">
            <img src="{{ asset('images/car_image.jpg') }}" alt="Фото автомобіля">
        </div>
>>>>>>> c91c4d7ada0cd075785f672445ecf866378a3ac4
    </div>

    <!-- Нижняя панель -->
    <div class="footer">
<<<<<<< HEAD
        <p>&copy; GoTogether - 2024. Всі права захищені</p>
        <div class="footer-links">
=======
        <div class="footer-content">
            <p>© GoTogether - 2024. Всі права захищені</p>
>>>>>>> c91c4d7ada0cd075785f672445ecf866378a3ac4
            <a href="#">FAQ</a>
            <a href="#">Умови користування</a>
            <a href="#">Політика конфіденційності</a>
            <a href="#">Контакти</a>
        </div>
    </div>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> c91c4d7ada0cd075785f672445ecf866378a3ac4
