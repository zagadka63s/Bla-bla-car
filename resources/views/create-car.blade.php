@extends('layouts.main')

@section('title', 'Создать автомобиль')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/create-car.css') }}">
    
    <!-- Верхняя панель -->
    <div class="header">
        <div class="header-content">
            <h1>GoTogether</h1>
            <div class="nav">
                <a href="#">Знайти поїздку</a>
                <a href="#">Створити поїздку</a>
                <a href="#">Профіль</a>
            </div>
        </div>
    </div>

    <div class="create-car-container">
        <div class="form-section">
            <h1>Створіть автомобіль за кілька кроків</h1>
            <form action="{{ route('car.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="car_type">Тип автомобіля:</label>
                <select name="car_type" id="car_type" required>
                    <option value="">Виберіть тип</option>
                    <option value="Легковий">Легковий</option>
                    <option value="Позашляховик">Позашляховик</option>
                </select>

                <label for="brand">Марка автомобіля:</label>
                <input type="text" name="brand" id="brand" placeholder="Введіть марку автомобіля" required>

                <label for="capacity">Місткість багажного відділення (кг):</label>
                <input type="number" name="capacity" id="capacity" placeholder="Введіть місткість" required min="1">

                <label for="car_photo">Фото автомобіля:</label>
                <input type="file" name="car_photo" id="car_photo" required>

                <label for="terms">Ознайомтесь з політикою конфіденційності:</label>
                <input type="checkbox" name="terms" id="terms" required> Політика конфіденційності

                <button type="submit">Створити автомобіль</button>
            </form>
        </div>
        <div class="image-section">
            <img src="{{ asset('images/car_image.jpg') }}" alt="Фото автомобіля">
        </div>
    </div>

    <!-- Нижняя панель -->
    <div class="footer">
        <div class="footer-content">
            <p>© GoTogether - 2024. Всі права захищені</p>
            <a href="#">FAQ</a>
            <a href="#">Умови користування</a>
            <a href="#">Політика конфіденційності</a>
            <a href="#">Контакти</a>
        </div>
    </div>
@endsection
