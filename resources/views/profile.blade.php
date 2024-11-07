<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мій профіль</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body>
    <div class="container">
        <!-- Верхняя панель -->
        <div class="header">
            <div class="logo">GoTogether</div>
            <div class="buttons">
                <a href="{{ route('trip.search') }}"><button>Знайти поїздку</button></a>
                <a href="{{ route('trip.create') }}"><button>Створити поїздку</button></a>
            </div>
            <div class="profile-icon"></div>
        </div>

        <!-- Основное содержимое страницы -->
        <div class="content" style="display: flex;">
            <!-- Левое боковое меню -->
            <div class="sidebar">
                <a href="{{ route('profile') }}" class="sidebar-item active">Мій профіль</a>
                <a href="{{ route('trips') }}" class="sidebar-item">Мої поїздки</a>
                <a href="{{ route('messages') }}" class="sidebar-item">Повідомлення</a>
                <a href="{{ route('notifications') }}" class="sidebar-item">Сповіщення</a>
                <a href="{{ route('reviews') }}" class="sidebar-item">Відгуки</a>
                <a href="{{ route('trip.history') }}" class="sidebar-item">Історія поїздок</a>
                <a href="{{ route('settings') }}" class="sidebar-item">Налаштування</a>
            </div>

            <!-- Основной блок профиля -->
            <div class="main-content">
                <h2>Профіль користувача</h2>
                <div class="profile-details">
                    <p><strong>Имя:</strong> Соловйов Артем</p>
                    <p><strong>Електронна пошта:</strong> ivan@example.com</p>
                    <p><strong>Номер телефону:</strong> +38 (050) 123-45-67</p>
                </div>
                <div class="buttons">
                    <button class="edit-button">Редагувати профіль</button>
                    <button class="back-button" onclick="window.history.back()">Назад</button>
                </div>
            </div>
        </div>

        <!-- Футер -->
        <div class="footer">
            <p>&copy; GoTogether - 2024 | Всі права захищені</p>
            <div class="footer-links">
                <a href="#">Контакти</a>
                <a href="#">Політика конфіденційності</a>
                <a href="#">Умови користування</a>
            </div>
        </div>
    </div>
</body>
</html>
