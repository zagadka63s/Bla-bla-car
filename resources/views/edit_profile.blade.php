<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редагування профілю</title>
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
        </div>

        <!-- Основное содержимое страницы -->
        <div class="content">
            <h2>Редагувати профіль</h2>
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <label for="first_name">Ім'я:</label>
                <input type="text" id="first_name" name="first_name" value="{{ $user->first_name }}" required>

                <label for="last_name">Прізвище:</label>
                <input type="text" id="last_name" name="last_name" value="{{ $user->last_name }}" required>

                <label for="email">Електронна пошта:</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" required>

                <label for="phone">Номер телефону:</label>
                <input type="text" id="phone" name="phone" value="{{ $user->phone }}" required>

                <label for="date_of_birth">Дата народження:</label>
                <input type="date" id="date_of_birth" name="date_of_birth" value="{{ $user->date_of_birth->format('Y-m-d') }}" required>

                <button type="submit">Зберегти зміни</button>
            </form>
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
