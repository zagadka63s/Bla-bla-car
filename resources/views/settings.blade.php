<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Налаштування</title>
    <link rel="stylesheet" href="{{ asset('css/settings.css') }}">
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

        <div class="main-content">
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

            <!-- Основной блок с настройками -->
            <div class="settings-content">
                <h1>Налаштування</h1>

                <!-- Форма изменения пароля -->
                <div class="settings-section">
                    <h2>Змінити пароль</h2>
                    <form>
                        <label for="current-password">Поточний пароль:</label>
                        <input type="password" id="current-password" name="current-password" required>
                        
                        <label for="new-password">Новий пароль:</label>
                        <input type="password" id="new-password" name="new-password" required>

                        <label for="confirm-password">Підтвердити новий пароль:</label>
                        <input type="password" id="confirm-password" name="confirm-password" required>

                        <button type="submit" class="save-button">Зберегти зміни</button>
                    </form>
                </div>

                <!-- Настройки уведомлений -->
                <div class="settings-section">
                    <h2>Налаштування сповіщень</h2>
                    <form>
                        <label>
                            <input type="checkbox" name="email-notifications" checked>
                            Отримувати сповіщення на електронну пошту
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name="sms-notifications">
                            Отримувати сповіщення по SMS
                        </label>
                        <br>
                        <button type="submit" class="save-button">Зберегти налаштування</button>
                    </form>
                </div>

                <!-- Настройки языка -->
                <div class="settings-section">
                    <h2>Мова інтерфейсу</h2>
                    <form>
                        <label for="language">Оберіть мову:</label>
                        <select id="language" name="language">
                            <option value="uk">Українська</option>
                            <option value="en">English</option>
                            <option value="ru">Русский</option>
                        </select>
                        <button type="submit" class="save-button">Зберегти налаштування</button>
                    </form>
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
