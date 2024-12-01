<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Налаштування</title>
    <link rel="stylesheet" href="{{ asset('css/settings.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        /* Дополнительные стили для уведомлений */
        .toast-success {
            background-color: #1BA441 !important;
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
                <a href="{{ route('profile') }}" class="sidebar-item">Мій профіль</a>
                <a href="{{ route('trips') }}" class="sidebar-item">Мої поїздки</a>
                <a href="{{ route('messages') }}" class="sidebar-item">Повідомлення</a>
                <a href="{{ route('notifications') }}" class="sidebar-item">Сповіщення</a>
                <a href="{{ route('reviews') }}" class="sidebar-item">Відгуки</a>
                <a href="{{ route('trip.history') }}" class="sidebar-item">Історія поїздок</a>
                <a href="{{ route('settings') }}" class="sidebar-item active">Налаштування</a>
            </div>

            <!-- Основной блок настроек -->
            <div class="main-content">
                <h2>Налаштування</h2>

                <!-- Редактирование профиля -->
                <div class="settings-section">
                    <h3>Редагувати профіль</h3>
                    <form action="{{ route('settings.profile.update') }}" method="POST" id="profile-form">
                        @csrf
                        <label for="name">Ім'я:</label>
                        <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" required>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" required>

                        <label for="phone">Телефон:</label>
                        <input type="text" id="phone" name="phone" value="{{ auth()->user()->phone }}">

                        <button type="submit" class="save-button">Зберегти зміни</button>
                    </form>
                </div>

                <!-- Форма изменения пароля -->
                <div class="settings-section">
                    <h3>Змінити пароль</h3>
                    <form action="{{ route('settings.password.update') }}" method="POST" id="password-form">
                        @csrf
                        <label for="current-password">Поточний пароль:</label>
                        <input type="password" id="current-password" name="current_password" required>
                        
                        <label for="new-password">Новий пароль:</label>
                        <input type="password" id="new-password" name="new_password" required>

                        <label for="confirm-password">Підтвердити новий пароль:</label>
                        <input type="password" id="confirm-password" name="confirm_password" required>

                        <button type="submit" class="save-button">Зберегти зміни</button>
                    </form>
                </div>

                <!-- Настройки уведомлений -->
                <div class="settings-section">
                    <h3>Налаштування сповіщень</h3>
                    <form action="{{ route('settings.notifications.update') }}" method="POST" id="notifications-form">
                        @csrf
                        <label>
                            <input type="checkbox" name="email_notifications" {{ auth()->user()->email_notifications ? 'checked' : '' }}>
                            Отримувати сповіщення на електронну пошту
                        </label>
                        <label>
                            <input type="checkbox" name="sms_notifications" {{ auth()->user()->sms_notifications ? 'checked' : '' }}>
                            Отримувати сповіщення по SMS
                        </label>
                        <button type="submit" class="save-button">Зберегти налаштування</button>
                    </form>
                </div>

                <!-- Настройки языка -->
                <div class="settings-section">
                    <h3>Мова інтерфейсу</h3>
                    <form action="{{ route('settings.language.update') }}" method="POST" id="language-form">
                        @csrf
                        <label for="language">Оберіть мову:</label>
                        <select id="language" name="language">
                            <option value="uk" {{ auth()->user()->language == 'uk' ? 'selected' : '' }}>Українська</option>
                            <option value="en" {{ auth()->user()->language == 'en' ? 'selected' : '' }}>English</option>
                        </select>
                        <button type="submit" class="save-button">Зберегти налаштування</button>
                    </form>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Пример имитации отправки уведомлений
            @if(session('success'))
                toastr.success("{{ session('success') }}");
            @endif
            @if(session('error'))
                toastr.error("{{ session('error') }}");
            @endif
        });
    </script>
</body>
</html>