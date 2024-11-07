<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вхід</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="container">
        <div class="background-image">
            <img src="{{ asset('images/join.jpg') }}" alt="background">
        </div>
        <div class="form-container">
            <h2>GoTogether</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <label for="email">Номер телефону або електронна адреса</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Пароль</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Увійти</button>

                <div class="link-container">
                    <a href="{{ route('password.request') }}">Забули пароль?</a>
                    <a href="{{ route('register') }}">Зареєструватися</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
