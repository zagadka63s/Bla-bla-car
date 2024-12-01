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
                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name">Ім'я:</label>
                        <input type="text" id="first_name" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Прізвище:</label>
                        <input type="text" id="last_name" name="last_name" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Стать:</label>
                        <div class="radio-group">
                            <input type="radio" id="male" name="gender" value="male" required>
                            <label for="male">Чоловік</label>
                            <input type="radio" id="female" name="gender" value="female" required>
                            <label for="female">Жінка</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone">Номер телефону:</label>
                    <input type="text" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="email">Електронна пошта:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="password">Пароль:</label>
                        <div class="password-container">
                            <input type="password" id="password" name="password" required>
                            <span class="toggle-password" onclick="togglePassword()">👁</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Підтвердження пароля:</label>
                        <div class="password-container">
                            <input type="password" id="password_confirmation" name="password_confirmation" required>
                            <span class="toggle-password" onclick="togglePassword()">👁</span>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="birth_day">Дата народження:</label>
                        <div class="birthdate-fields">
                            <select id="birth_day" required>
                                <option value="">День</option>
                                @for ($i = 1; $i <= 31; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            <select id="birth_month" required>
                                <option value="">Місяць</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            <select id="birth_year" required>
                                <option value="">Рік</option>
                                @for ($i = now()->year; $i >= 1900; $i--)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            <input type="hidden" id="date_of_birth" name="date_of_birth">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="checkbox" id="agreement" name="agreement" required>
                    <label for="agreement">Я погоджуюсь з <a href="{{ url('terms-of-use') }}">умовами використання</a> і <a href="{{ url('terms') }}">політикою конфіденційності</a>.</label>
                </div>
                <button type="submit">Зареєструватися</button>
            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordFields = document.querySelectorAll(".password-container input");
            const toggleIcons = document.querySelectorAll(".toggle-password");
            passwordFields.forEach((field, index) => {
                if (field.type === "password") {
                    field.type = "text";
                    toggleIcons[index].textContent = "🙈";
                } else {
                    field.type = "password";
                    toggleIcons[index].textContent = "👁";
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            const dayField = document.querySelector('#birth_day');
            const monthField = document.querySelector('#birth_month');
            const yearField = document.querySelector('#birth_year');
            const dateOfBirthField = document.querySelector('#date_of_birth');

            function updateDateOfBirth() {
                const day = dayField.value.padStart(2, '0');
                const month = monthField.value.padStart(2, '0');
                const year = yearField.value;
                if (day && month && year) {
                    dateOfBirthField.value = `${year}-${month}-${day}`;
                }
            }

            dayField.addEventListener('change', updateDateOfBirth);
            monthField.addEventListener('change', updateDateOfBirth);
            yearField.addEventListener('change', updateDateOfBirth);
        });
    </script>
</body>
</html>
