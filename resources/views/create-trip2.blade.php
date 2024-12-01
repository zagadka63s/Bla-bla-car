<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Створіть поїздку</title>
    <link rel="stylesheet" href="{{ asset('css/create-trip2.css') }}">
</head>
<body>
    <!-- Верхняя панель -->
    <div class="top-navigation">
        <div class="logo-text">GoTogether</div>
        <div class="nav-buttons">
            <a href="{{ route('trip.search') }}" class="nav-button">Знайти поїздку</a>
            <a href="{{ route('trip.create') }}" class="nav-button">Створити поїздку</a>
        </div>
    </div>

    <!-- Контейнер -->
    <div class="container">
        <!-- Форма создания поездки -->
        <div class="create-trip-form">
            <h1 class="form-title">Створіть поїздку за декілька кроків</h1>
            <p class="form-description">Заповнюйте тільки правдиву інформацію, від цього може залежати ваш рейтинг водія.</p>
            <form action="{{ route('trip.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="car-type">Тип автомобіля:</label>
                <select id="car-type" name="car_type" required>
                    <option value="">Тип авто</option>
                    <option value="Седан">Седан</option>
                    <option value="Хетчбек">Хетчбек</option>
                </select>

                <label for="car-model">Марка автомобіля:</label>
                <input type="text" id="car-model" name="car_model" placeholder="Марка авто" required>

                <label for="baggage">Місткість багажного відділення:</label>
                <input type="number" id="baggage" name="baggage" placeholder="Місткість в кілограмах" required>

                <label for="seats">Місць в автомобілі:</label>
                <input type="number" id="seats" name="seats" placeholder="Кількість місць" required>

                <label for="car-photo">Фото автомобіля:</label>
                <input type="file" id="car-photo" name="car_photo" accept="image/*" required>
                <label for="car-photo" class="file-upload-label">Завантажити фото</label>

                <div class="checkbox-container">
                    <input type="checkbox" id="policy" name="policy" required>
                    <label for="policy">Політика конфіденційності</label>
                </div>

                <div class="checkbox-container">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">Умови користування</label>
                </div>

                <div class="checkbox-container">
                    <input type="checkbox" id="save-info" name="save_info">
                    <label for="save-info">Зберегти інформацію про поїздку</label>
                    <p class="small-text">Використовується для автоматизації наступних поїздок</p>
                </div>

                <button type="submit" class="submit-button">Створити поїздку</button>
            </form>
        </div>

        <!-- Блок с изображением -->
        <div class="trip-image"></div>
    </div>

    <!-- Футер -->
    <div class="footer">
        <p>©GoTogether - 2024 | Всі права захищені</p>
        <div class="footer-links">
            <a href="#">FAQ</a>
            <a href="#">Умови користування</a>
            <a href="#">Політика конфіденційності</a>
            <a href="#">Контакти</a>
        </div>
    </div>
</body>
</html>
