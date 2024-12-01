<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редагувати поїздку</title>
    <link rel="stylesheet" href="{{ asset('css/trip_edit.css') }}">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">GoTogether</div>
            <div class="buttons">
                <a href="{{ route('trip.search') }}"><button>Знайти поїздку</button></a>
                <a href="{{ route('trip.create') }}"><button>Створити поїздку</button></a>
            </div>
        </div>
        
        <div class="content">
            <h2>Редагувати поїздку</h2>
            <form action="{{ route('trip.update', $trip->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="departure_date">Дата відправлення:</label>
                    <input type="date" name="departure_date" id="departure_date" value="{{ $trip->departure_date }}" required>
                </div>
                <div class="form-group">
                    <label for="departure_time">Час відправлення:</label>
                    <input type="time" name="departure_time" id="departure_time" value="{{ $trip->departure_time }}" required>
                </div>
                <div class="form-group">
                    <label for="departure_location">Місце відправлення:</label>
                    <input type="text" name="departure_location" id="departure_location" value="{{ $trip->departure_location }}" required>
                </div>
                <div class="form-group">
                    <label for="arrival_location">Місце прибуття:</label>
                    <input type="text" name="arrival_location" id="arrival_location" value="{{ $trip->arrival_location }}" required>
                </div>
                <div class="form-group">
                    <label for="price">Ціна:</label>
                    <input type="number" name="price" id="price" value="{{ $trip->price }}" required>
                </div>
                <div class="form-group">
                    <label for="available_seats">Вільні місця:</label>
                    <input type="number" name="available_seats" id="available_seats" value="{{ $trip->available_seats }}" required>
                </div>
                <button type="submit" class="submit-button">Зберегти</button>
            </form>
            <a href="{{ route('trips') }}" class="back-button">Назад</a>
        </div>
    </div>
</body>
</html>
