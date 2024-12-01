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

            <!-- Flash Messages -->
            @if (session('status'))
                <div class="alert success">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert error">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <label for="email">Номер телефону або електронна адреса</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Пароль</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" required>
                    <span class="toggle-password" onclick="togglePassword()">👁</span>
                </div>

                <button type="submit">Увійти</button>

                <div class="link-container">
                    <a href="{{ route('password.request') }}">Забули пароль?</a>
                    <a href="{{ route('register') }}">Зареєструватися</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById("password");
            const toggleIcon = document.querySelector(".toggle-password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.textContent = "🙈"; 
            } else {
                passwordField.type = "password";
                toggleIcon.textContent = "👁"; 
            }
        }
    </script>
</body>
</html>
