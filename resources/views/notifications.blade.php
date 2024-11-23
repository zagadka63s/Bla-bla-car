<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сповіщення</title>
    <link rel="stylesheet" href="{{ asset('css/notifications.css') }}">
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
        </div>

        <!-- Основное содержимое страницы -->
        <div class="content">
            <!-- Левое боковое меню -->
            <div class="sidebar">
                <a href="{{ route('profile') }}" class="sidebar-item">Мій профіль</a>
                <a href="{{ route('trips') }}" class="sidebar-item">Мої поїздки</a>
                <a href="{{ route('messages') }}" class="sidebar-item">Повідомлення</a>
                <a href="{{ route('notifications') }}" class="sidebar-item active">Сповіщення</a>
                <a href="{{ route('reviews') }}" class="sidebar-item">Відгуки</a>
                <a href="{{ route('trip.history') }}" class="sidebar-item">Історія поїздок</a>
                <a href="{{ route('settings') }}" class="sidebar-item">Налаштування</a>
            </div>

            <!-- Основной блок уведомлений -->
            <div class="main-content">
<<<<<<< HEAD
                <h2>Ваши уведомления</h2>
                <div class="notification-list">
                    <div class="notification-item">Нове повідомлення від Вікторії</div>
                    <div class="notification-item">Ваш рейс на 23 жовтня підтверджено</div>
=======
                <h1>Ваши уведомления</h1>
                <div class="notification-list">
                    <div class="notification-item">Нове повідомлення від Вікторії</div>
                    <div class="notification-item">Ваш рейс на 23 жовтня підтверджено</div>
                    <!-- Добавьте другие уведомления здесь -->
>>>>>>> c91c4d7ada0cd075785f672445ecf866378a3ac4
                </div>
            </div>
        </div>

        <!-- Футер -->
        <div class="footer">
<<<<<<< HEAD
            <div>©GoTogether - 2024 | Всі права захищені</div>
            <div class="footer-links">
                <a href="#">FAQ</a>
                <a href="#">Умови користування</a>
                <a href="#">Політика конфіденційності</a>
                <a href="#">Контакти</a>
=======
            <p>&copy; GoTogether - 2024 | Всі права захищені</p>
            <div class="footer-links">
                <a href="#">Контакти</a>
                <a href="#">Політика конфіденційності</a>
                <a href="#">Умови користування</a>
>>>>>>> c91c4d7ada0cd075785f672445ecf866378a3ac4
            </div>
        </div>
    </div>
</body>
</html>
