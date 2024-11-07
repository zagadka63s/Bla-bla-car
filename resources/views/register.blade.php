<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Реєстрація</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <div class="container">
        <div class="background-image">
            <img src="{{ asset('images/join.jpg') }}" alt="background">
        </div>
        <div class="form-container">
            <h2>Реєстрація в GoTogether</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <label for="name">Ім'я:</label>
                <input type="text" id="name" name="name" required>

                <label for="gender">Стать:</label>
                <select id="gender" name="gender" required>
                    <option value="">Оберіть стать</option>
                    <option value="male">Чоловік</option>
                    <option value="female">Жінка</option>
                </select>

                <label for="phone">Номер телефону:</label>
                <input type="text" id="phone" name="phone" required>

                <label for="email">Електронна пошта:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Пароль:</label>
                <input type="password" id="password" name="password" required>

                <label for="password_confirmation">Підтвердження пароля:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>

                <label for="birthdate">Дата народження:</label>
                <div class="birthdate-fields">
                    <select name="day" required>
                        <option value="">День</option>
                        @for ($i = 1; $i <= 31; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    <select name="month" required>
                        <option value="">Місяць</option>
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    <select name="year" required>
                        <option value="">Рік</option>
                        @for ($i = now()->year; $i >= 1900; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <div class="agreement">
                    <input type="checkbox" id="agreement" name="agreement" required>
                    <label for="agreement">Я погоджуюсь з <a href="#">умовами використання</a> і <a href="#">політикою конфіденційності</a>.</label>
                </div>

                <button type="submit">Зареєструватися</button>
            </form>
        </div>
    </div>
</body>
</html>
