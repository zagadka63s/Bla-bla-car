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
<<<<<<< HEAD
                <div class="password-container">
                    <input type="password" id="password" name="password" required>
                    <span class="toggle-password" onclick="togglePassword()">👁</span>
                </div>
=======
                <input type="password" id="password" name="password" required>
>>>>>>> c91c4d7ada0cd075785f672445ecf866378a3ac4

                <button type="submit">Увійти</button>

                <div class="link-container">
                    <a href="{{ route('password.request') }}">Забули пароль?</a>
                    <a href="{{ route('register') }}">Зареєструватися</a>
                </div>
            </form>
        </div>
    </div>
<<<<<<< HEAD

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
=======
>>>>>>> c91c4d7ada0cd075785f672445ecf866378a3ac4
</body>
</html>
