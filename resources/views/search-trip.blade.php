@extends('layouts.main')

@section('title', 'Найти поездку')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/search-trip.css') }}">
    
    <!-- Верхняя панель навигации -->
    <div class="top-navigation">
        <h1>GoTogether</h1>
        <div class="nav-buttons">
            <button class="nav-button">Знайти поїздку</button>
            <button class="nav-button">Створити поїздку</button>
        </div>
        <div class="user-icon">
            <img src="path_to_user_icon" alt="User Icon">
        </div>
    </div>

    <div class="search-trip-container">
        <!-- Левая колонка с фильтрами -->
        <div class="search-filters">
            <h1>Знайдіть поїздку</h1>

            <form action="{{ route('trip.search') }}" method="GET">
                @csrf
                <label for="departure">Звідки:</label>
                <input type="text" name="departure" id="departure" required>

                <label for="destination">Куди:</label>
                <input type="text" name="destination" id="destination" required>

                <label for="date">Обрати дату:</label>
                <input type="date" name="date" id="date">

                <label for="passengers">Кількість пасажирів:</label>
                <input type="number" name="passengers" id="passengers" min="1">

                <label for="price">Ціна:</label>
                <input type="range" name="price" id="price" min="0" max="10000">
                <span id="price-value">0</span>

                <button type="submit" class="search-button">Пошук</button>
            </form>

            <!-- Секция "Додатково" -->
            <div class="dodatkovo-container">
                <h3>Додатково</h3>
                <label>
                    <input type="checkbox" name="child_seat"> Дитяче крісло
                </label>
                <label>
                    <input type="checkbox" name="pets_allowed"> З тваринкою
                </label>
                <label>
                    <input type="checkbox" name="music_allowed"> Не проти музики
                </label>
                <label>
                    <input type="checkbox" name="baggage_allowed"> Є багажне відділення
                </label>
                <label>
                    <input type="checkbox" name="no_smoking"> Не проти куріння
                </label>

                <label for="car_type">Тип автомобіля:</label>
                <select name="car_type" id="car_type">
                    <option value="">Тип авто</option>
                    <option value="sedan">Седан</option>
                    <option value="suv">Позашляховик</option>
                    <option value="minivan">Мінівен</option>
                </select>
            </div>
        </div>

        <!-- Правая колонка со списком водителей -->
        <div class="search-results">
            <div class="driver-list">
                <div class="driver-card">
                    <img src="path_to_image" alt="Фото водія">
                    <div class="driver-info">
                        <h4>Віталій Вітя</h4>
                        <p>Маршрут: Київ - Львів</p>
                        <p>Дата: 15 грудня</p>
                        <p>Ціна: 600 грн</p>
                        <button class="reserve-button">Забронювати</button>
                    </div>
                </div>
                <div class="driver-card">
                    <img src="path_to_image" alt="Фото водія">
                    <div class="driver-info">
                        <h4>Іван Петров</h4>
                        <p>Маршрут: Харків - Одеса</p>
                        <p>Дата: 20 грудня</p>
                        <p>Ціна: 800 грн</p>
                        <button class="reserve-button">Забронювати</button>
                    </div>
                </div>
                <div class="driver-card">
                    <img src="path_to_image" alt="Фото водія">
                    <div class="driver-info">
                        <h4>Олег Кравчук</h4>
                        <p>Маршрут: Дніпро - Львів</p>
                        <p>Дата: 25 грудня</p>
                        <p>Ціна: 900 грн</p>
                        <button class="reserve-button">Забронювати</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Нижняя панель навигации -->
    <div class="footer">
        <p>&copy; GoTogether - 2024 | Всі права захищені</p>
        <div class="footer-links">
            <a href="#">FAQ</a>
            <a href="#">Умови користування</a>
            <a href="#">Політика конфіденційності</a>
            <a href="#">Контакти</a>
        </div>
    </div>
@endsection
