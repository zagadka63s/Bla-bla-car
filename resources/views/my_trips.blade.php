<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мої поїздки</title>
    <link rel="stylesheet" href="{{ asset('css/my_trips.css') }}">
</head>
<body>
    <div class="container">
        <!-- Верхняя панель -->
        <div class="header">
            <div class="logo">GoTogether</div>
            <div class="buttons">
                <button>Знайти поїздку</button>
                <button>Створити поїздку</button>
            </div>
            <div class="profile-icon"></div>
        </div>

        <!-- Основное содержимое страницы -->
        <div class="content">
            <!-- Левое боковое меню -->
            <div class="sidebar">
                <div class="sidebar-item">Мій профіль</div>
                <div class="sidebar-item active">Мої поїздки</div>
                <div class="sidebar-item">Повідомлення</div>
                <div class="sidebar-item">Сповіщення</div>
                <div class="sidebar-item">Відгуки</div>
                <div class="sidebar-item">Історія поїздок</div>
                <div class="sidebar-item">Налаштування</div>
            </div>

            <!-- Основной блок с поездками -->
            <div class="main-content">
                <div class="trip-list">
                    <div class="trip-item">
                        <div class="trip-info">
                            <div class="trip-date">23 Жовтня 2024</div>
                            <div class="trip-details">Львів - Київ</div>
                        </div>
                        <div class="trip-status">
                            <button class="view-button">Переглянути</button>
                            <button class="edit-button">Редагувати</button>
                        </div>
                    </div>
                    <div class="trip-item">
                        <div class="trip-info">
                            <div class="trip-date">15 Листопада 2024</div>
                            <div class="trip-details">Одеса - Харків</div>
                        </div>
                        <div class="trip-status">
                            <button class="view-button">Переглянути</button>
                            <button class="edit-button">Редагувати</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Футер -->
        <div class="footer">
            <div>©GoTogether - 2024 | Всі права захищені</div>
            <div>Контакти</div>
            <div>Політика конфіденційності</div>
            <div>Умови користування</div>
        </div>
    </div>
</body>
</html>
