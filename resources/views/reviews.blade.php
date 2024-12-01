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
                <div class="search-container">
                    <input type="text" id="reviewSearch" placeholder="Пошук відгуків..." class="search-input" onkeyup="searchReviews()">
                </div>
                <div class="review-list" id="reviewList">
                    @foreach($reviews as $review)
                        <div class="review-item">
                            <div class="user-info">
                                <img src="{{ $review->reviewer->avatar_path ?? asset('images/default-avatar.png') }}" alt="User Avatar">
                                <div class="details">
                                    <div class="user-name">{{ $review->reviewer_name }}</div>
                                    <div class="review-time">{{ $review->created_at->format('d M Y, H:i') }}</div>
                                </div>
                            </div>
                            <div class="review-text">{{ $review->comment }}</div>
                            <div class="review-rating">{{ $review->rating }} ★</div>
                        </div>
                    @endforeach
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

    <script>
        function searchReviews() {
            const input = document.getElementById('reviewSearch').value;
            window.location.href = `?search=${input}`;
        }
    </script>
</body>
</html>
