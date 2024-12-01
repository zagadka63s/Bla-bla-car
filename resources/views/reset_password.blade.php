<!DOCTYPE html>
<html lang="uk">
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
        <div class="form-container">
            <h2>Відновлення пароля</h2>
            <p class="instruction">
                Яка електронна адреса зв'язана з вашим обліковим записом? Ми надішлемо посилання для скидання пароля.
            </p>
            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <label for="email">Електронна адреса:</label>
                <input type="email" id="email" name="email" required>
                <button type="submit">Надіслати посилання</button>
            </form>
        </div>
    </div>
</body>
</html>
