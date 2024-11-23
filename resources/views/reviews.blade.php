<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Відгуки</title>
    <link rel="stylesheet" href="{{ asset('css/reviews.css') }}">
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
                <a href="{{ route('notifications') }}" class="sidebar-item">Сповіщення</a>
                <a href="{{ route('reviews') }}" class="sidebar-item active">Відгуки</a>
                <a href="{{ route('trip.history') }}" class="sidebar-item">Історія поїздок</a>
                <a href="{{ route('settings') }}" class="sidebar-item">Налаштування</a>
            </div>

            <!-- Основной блок отзывов -->
            <div class="main-content">
                <h2>Відгуки</h2>
                <div class="review-list">
                    <div class="review-item">
                        <div class="user-info">
                            <img src="{{ asset('images/user1.png') }}" alt="User">
                            <div class="user-name">Іван Іванович</div>
                        </div>
                        <div class="review-text">Відмінна поїздка, все пройшло гладко!</div>
                        <div class="review-rating">4.5 ★</div>
                    </div>
                    <div class="review-item">
                        <div class="user-info">
                            <img src="{{ asset('images/user2.png') }}" alt="User">
                            <div class="user-name">Вікторія Вікторівна</div>
                        </div>
                        <div class="review-text">Дуже сподобався водій і організація.</div>
                        <div class="review-rating">5.0 ★</div>
                    </div>
                </div>
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
