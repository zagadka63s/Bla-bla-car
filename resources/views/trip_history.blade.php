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
                <a href="{{ route('trip.search') }}"><button>Знайти поїздку</button></a>
                <a href="{{ route('trip.create') }}"><button>Створити поїздку</button></a>
            </div>
            <div class="profile-icon"></div>
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
                        <button class="review-button" onclick="openModal()">Залишити відгук</button>
                    </div>
                    <div class="trip-item">
                        <img src="{{ asset('images/user2.png') }}" alt="User">
                        <div class="trip-info">
                            <div class="route">Одеса - Харків</div>
                            <div class="date">Дата: 20 Січня 2024</div>
                        </div>
                        <button class="review-button" onclick="openModal()">Залишити відгук</button>
                    </div>
                </div>
                <a href="{{ url()->previous() }}" class="back-button">Назад</a>
            </div>
        </div>

        <!-- Модальное окно отзыва -->
        <div id="reviewModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2>Ваш відгук</h2>
                <img src="{{ asset('images/user1.png') }}" alt="User" class="user-avatar">
                <p><strong>Ваша оцінка:</strong></p>
                <select class="rating">
                    <option value="5">5 зірок</option>
                    <option value="4">4 зірки</option>
                    <option value="3">3 зірки</option>
                    <option value="2">2 зірки</option>
                    <option value="1">1 зірка</option>
                </select>
                <textarea class="review-text" placeholder="Напишіть свій відгук..."></textarea>
                <button class="submit-button">Надіслати</button>
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
        function openModal() {
            document.getElementById("reviewModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("reviewModal").style.display = "none";
        }
    </script>
</body>
</html>
