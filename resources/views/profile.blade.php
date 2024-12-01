<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мій профіль</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <style>
        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }
        .profile-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .avatar-container, .profile-details, .statistics {
            flex: 1 1 calc(33.33% - 20px);
            max-width: calc(33.33% - 20px);
            text-align: center;
        }
        .statistics {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            margin-top: 20px;
        }
        .statistics p {
            font-size: 1rem;
            margin: 10px 0;
        }
        .section-title {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .avatar-upload-input {
            margin-top: 10px;
        }
        .upload-button {
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        .upload-button:hover {
            background-color: #45a049;
        }
        .feedback-message {
            margin-top: 10px;
            font-size: 0.9rem;
        }
    </style>
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
                <div class="profile-container">
                    <!-- Аватар -->
                    <div class="avatar-container">
                        <img src="{{ auth()->user()->avatar ? asset('storage/avatars/' . auth()->user()->avatar) : asset('images/default-avatar.png') }}" 
                             alt="Аватар користувача" class="profile-avatar" id="avatar-preview">
                        <form method="POST" action="{{ route('profile.update.avatar') }}" enctype="multipart/form-data" id="avatar-form">
                            @csrf
                            <label for="avatar-upload" class="avatar-upload-label">Завантажити новий аватар</label>
                            <input type="file" id="avatar-upload" name="avatar" class="avatar-upload-input">
                            <button type="submit" class="upload-button">Зберегти</button>
                        </form>
                        <div id="avatar-feedback" class="feedback-message"></div>
                    </div>

                    <!-- Данные профиля -->
                    <div class="profile-details">
                        <h3 class="section-title">Особисті дані</h3>
                        <p><strong>Ім'я:</strong> {{ auth()->user()->full_name }}</p>
                        <p><strong>Електронна пошта:</strong> {{ auth()->user()->email }}</p>
                        <p><strong>Номер телефону:</strong> {{ auth()->user()->phone }}</p>
                        <p><strong>Дата народження:</strong> {{ auth()->user()->date_of_birth->format('d.m.Y') }}</p>
                    </div>

                    <!-- Статистика -->
                    <div class="statistics">
                        <h3 class="section-title">Статистика</h3>
                        <p><strong>Кількість завершених поїздок:</strong> {{ $trips_count ?? 0 }}</p>
                        <p><strong>Середній рейтинг:</strong> {{ $average_rating ?? '0.0' }}/5</p>
                        <p><strong>Кількість відгуків:</strong> {{ $reviews_count ?? 0 }}</p>
                    </div>
                </div>

                <!-- Кнопки -->
                <div class="buttons">
                    <a href="{{ route('profile.edit') }}"><button class="edit-button">Редагувати профіль</button></a>
                    <a href="{{ url()->previous() }}" class="back-button">Назад</a>
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
        document.getElementById('avatar-upload').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('avatar-preview').src = e.target.result;
                };
                reader.readAsDataURL(file);

                const feedback = document.getElementById('avatar-feedback');
                feedback.textContent = "Аватар готовий до завантаження.";
                feedback.style.color = "green";
            }
        });
    </script>
</body>
</html>
