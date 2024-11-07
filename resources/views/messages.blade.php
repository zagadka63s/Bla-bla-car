<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Повідомлення</title>
    <link rel="stylesheet" href="{{ asset('css/messages.css') }}">
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
        <div class="content" style="display: flex; margin-top: 30px;">
            <!-- Левое боковое меню -->
            <div class="sidebar">
                <a href="{{ route('profile') }}" class="sidebar-item">Мій профіль</a>
                <a href="{{ route('trips') }}" class="sidebar-item">Мої поїздки</a>
                <a href="{{ route('messages') }}" class="sidebar-item active">Повідомлення</a>
                <a href="{{ route('notifications') }}" class="sidebar-item">Сповіщення</a>
                <a href="{{ route('reviews') }}" class="sidebar-item">Відгуки</a>
                <a href="{{ route('trip.history') }}" class="sidebar-item">Історія поїздок</a>
                <a href="{{ route('settings') }}" class="sidebar-item">Налаштування</a>
            </div>

            <!-- Основной блок с сообщениями -->
            <div class="main-content">
                <div class="message-list">
                    <div class="message-item">
                        <img src="{{ asset('images/user1.png') }}" alt="User">
                        <div class="text">Вікторія Вікторівна</div>
                        <div class="time">23 Окт. 12:00</div>
                    </div>
                    <div class="message-item">
                        <img src="{{ asset('images/user2.png') }}" alt="User">
                        <div class="text">Дмитро Дмитрович</div>
                        <div class="time">23 Окт. 12:00</div>
                    </div>
                    <div class="message-item">
                        <img src="{{ asset('images/user3.png') }}" alt="User">
                        <div class="text">Іван Іванович</div>
                        <div class="time">23 Окт. 12:00</div>
                    </div>
                    <div class="message-item">
                        <img src="{{ asset('images/user4.png') }}" alt="User">
                        <div class="text">Евгенія Владиславовна</div>
                        <div class="time">23 Окт. 12:00</div>
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
