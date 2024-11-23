<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Історія поїздок</title>
    <link rel="stylesheet" href="{{ asset('css/trip_history.css') }}">
</head>
<body>
    <div class="container">
        <!-- Верхняя панель -->
        <div class="header">
            <div class="logo">GoTogether</div>
            <div class="buttons">
                <a href="{{ route('trip.search') }}"><button class="main-button">Знайти поїздку</button></a>
                <a href="{{ route('trip.create') }}"><button class="main-button">Створити поїздку</button></a>
            </div>
        </div>

        <!-- Основное содержимое страницы -->
        <div class="content">
            <!-- Левое боковое меню -->
            <div class="sidebar">
                <a href="{{ route('profile') }}" class="sidebar-item">Мій профіль</a>
                <a href="{{ route('trips') }}" class="sidebar-item">Мої поїздки</a>
                <a href="{{ route('messages') }}" class="sidebar-item">Повідомлення</a>
                <a href="{{ route('notifications') }}" class="sidebar-item">Сповіщення</a>
                <a href="{{ route('reviews') }}" class="sidebar-item">Відгуки</a>
                <a href="{{ route('trip.history') }}" class="sidebar-item active">Історія поїздок</a>
                <a href="{{ route('settings') }}" class="sidebar-item">Налаштування</a>
            </div>

            <!-- Основной блок с историей поездок -->
            <div class="main-content">
                <h2>Історія поїздок</h2>
                <div class="trip-list">
                    <div class="trip-item">
                        <img src="{{ asset('images/user1.png') }}" alt="User">
                        <div class="trip-info">
                            <div class="route">Київ - Львів</div>
                            <div class="date">Дата: 15 Січня 2024</div>
                        </div>
                        <button class="review-button">Залишити відгук</button>
                    </div>
                    <div class="trip-item">
                        <img src="{{ asset('images/user2.png') }}" alt="User">
                        <div class="trip-info">
                            <div class="route">Одеса - Харків</div>
                            <div class="date">Дата: 20 Січня 2024</div>
                        </div>
                        <button class="review-button">Залишити відгук</button>
                    </div>
                </div>
                <a href="{{ url()->previous() }}" class="back-button">Назад</a>
            </div>
        </div>

        <!-- Футер -->
        <div class="footer">
            <div>©GoTogether - 2024 | Всі права захищені</div>
            <div class="footer-links">
                <a href="#">FAQ</a>
                <a href="#">Умови користування</a>
                <a href="#">Політика конфіденційності</a>
                <a href="#">Контакти</a>
            </div>
        </div>
    </div>
</body>
</html>
