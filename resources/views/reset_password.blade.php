<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Відновлення пароля</title>
    <link rel="stylesheet" href="{{ asset('css/reset_password.css') }}">
</head>
<body>
    <div class="container">
        <div class="background-image">
            <img src="{{ asset('images/join.jpg') }}" alt="background">
        </div>
        <div class="reset-form">
            <h2>Відновлення пароля</h2>
            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <label for="email">Введіть вашу електронну пошту:</label>
                <input type="email" id="email" name="email" required>
                
                <button type="submit">Надіслати посилання для скидання</button>
            </form>
        </div>
    </div>
</body>
</html>
