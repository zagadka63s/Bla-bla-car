@extends('layouts.main')

@section('title', 'Найти поездку')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/search-trip.css') }}">

    <!-- Верхняя панель навигации -->
    <div class="top-navigation">
        <h1 class="logo">GoTogether</h1>
        <div class="nav-buttons">
            <button class="nav-button">Знайти поїздку</button>
            <button class="nav-button">Створити поїздку</button>
            <button class="nav-button profile-button">Профіль</button>
        </div>
    </div>

    <div class="main-content">
        <!-- Левая колонка -->
        <div class="left-section">
            <div class="form-container search-trip-form">
                <h1>Знайдіть поїздку</h1>
                <form action="#" method="GET">
                    @csrf
                    <label for="departure">Звідки:</label>
                    <input type="text" name="departure" id="departure" class="form-input" placeholder="Вибрати місце" value="{{ request('departure') }}">

                    <label for="destination">Куди:</label>
                    <input type="text" name="destination" id="destination" class="form-input" placeholder="Вибрати місце" value="{{ request('destination') }}">

                    <label for="date">Обрати дату:</label>
                    <input type="date" name="date" id="date" class="form-input" value="{{ request('date') }}">

                    <label for="passengers">Кількість пасажирів:</label>
                    <input type="number" name="passengers" id="passengers" class="form-input" placeholder="Вкажіть кількість" min="1" value="{{ request('passengers') }}">

                    <label for="price">Ціна:</label>
                    <div class="range-wrapper">
                        <span class="range-min">0</span>
                        <div class="range-track">
                            <input type="range" name="price" id="price" class="form-range" min="0" max="1000" step="10" value="{{ request('price', 1000) }}">
                            <div class="range-fill" id="range-fill" style="width: {{ request('price', 1000) / 10 }}%;"></div>
                        </div>
                        <span class="range-max">1000</span>
                    </div>
                    <div class="range-value" id="range-value">{{ request('price', 1000) }}</div>

                    <div class="form-buttons">
                        <button type="reset" class="reset-button" onclick="window.location.href='{{ url()->current() }}'">Очистити фільтр</button>
                        <button type="submit" class="search-button">Пошук</button>
                    </div>
                </form>
            </div>

            <div class="form-container dodatkovo-container">
                <h1>Додатково</h1>
                <div class="checkbox-container">
                    <div class="checkbox-item">
                        <input type="checkbox" name="child_seat" id="child_seat" {{ request('child_seat') ? 'checked' : '' }}>
                        <label for="child_seat">Дитяче крісло</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="checkbox" name="pets_allowed" id="pets_allowed" {{ request('pets_allowed') ? 'checked' : '' }}>
                        <label for="pets_allowed">З тваринкою</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="checkbox" name="music_allowed" id="music_allowed" {{ request('music_allowed') ? 'checked' : '' }}>
                        <label for="music_allowed">Не проти музики</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="checkbox" name="baggage_allowed" id="baggage_allowed" {{ request('baggage_allowed') ? 'checked' : '' }}>
                        <label for="baggage_allowed">Є багажне відділення</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="checkbox" name="no_smoking" id="no_smoking" {{ request('no_smoking') ? 'checked' : '' }}>
                        <label for="no_smoking">Не проти куріння</label>
                    </div>
                </div>

                <label for="car_type">Тип автомобіля:</label>
                <select name="car_type" id="car_type" class="form-select">
                    <option value="" {{ request('car_type') == '' ? 'selected' : '' }}>Тип авто</option>
                    <option value="sedan" {{ request('car_type') == 'sedan' ? 'selected' : '' }}>Седан</option>
                    <option value="suv" {{ request('car_type') == 'suv' ? 'selected' : '' }}>Позашляховик</option>
                    <option value="minivan" {{ request('car_type') == 'minivan' ? 'selected' : '' }}>Мінівен</option>
                </select>
            </div>
        </div>

        <!-- Правая колонка -->
        <div class="form-container search-results">
            @php
                $drivers = [
                    (object)[
                        'photo' => 'images/vitaliy-vitya.jpg',
                        'name' => 'Віталій Вітя',
                        'route' => 'Київ - Львів',
                        'date' => '2024-12-01',
                        'time' => '14:00',
                        'price' => 600,
                        'seats' => 2,
                        'child_seat' => true,
                        'pets_allowed' => true,
                        'music_allowed' => true,
                        'baggage_allowed' => true,
                        'no_smoking' => false,
                        'car_type' => 'sedan',
                    ],
                    (object)[
                        'photo' => 'images/igor-petrenko.jpg',
                        'name' => 'Ігор Петренко',
                        'route' => 'Одеса - Харків',
                        'date' => '2024-12-02',
                        'time' => '10:00',
                        'price' => 800,
                        'seats' => 3,
                        'child_seat' => false,
                        'pets_allowed' => false,
                        'music_allowed' => true,
                        'baggage_allowed' => true,
                        'no_smoking' => true,
                        'car_type' => 'suv',
                    ],
                    (object)[
                        'photo' => 'images/olga-bondar.jpg',
                        'name' => 'Ольга Бондар',
                        'route' => 'Дніпро - Львів',
                        'date' => '2024-12-03',
                        'time' => '09:00',
                        'price' => 500,
                        'seats' => 1,
                        'child_seat' => true,
                        'pets_allowed' => true,
                        'music_allowed' => false,
                        'baggage_allowed' => true,
                        'no_smoking' => true,
                        'car_type' => 'minivan',
                    ],
                    (object)[
                        'photo' => 'images/anton-petrov.jpg',
                        'name' => 'Антон Петров',
                        'route' => 'Чернівці - Ужгород',
                        'date' => '2024-12-04',
                        'time' => '16:00',
                        'price' => 700,
                        'seats' => 2,
                        'child_seat' => true,
                        'pets_allowed' => true,
                        'music_allowed' => true,
                        'baggage_allowed' => false,
                        'no_smoking' => false,
                        'car_type' => 'sedan',
                    ],
                    (object)[
                        'photo' => 'images/anna-smirnova.jpg',
                        'name' => 'Анна Смірнова',
                        'route' => 'Львів - Одеса',
                        'date' => '2024-12-05',
                        'time' => '12:00',
                        'price' => 900,
                        'seats' => 4,
                        'child_seat' => true,
                        'pets_allowed' => false,
                        'music_allowed' => true,
                        'baggage_allowed' => true,
                        'no_smoking' => true,
                        'car_type' => 'suv',
                    ],
                ];

                $filteredDrivers = collect($drivers)->filter(function ($driver) {
                    $matches = true;

                    if (request('passengers') && $driver->seats < request('passengers')) {
                        $matches = false;
                    }

                    foreach (['child_seat', 'pets_allowed', 'music_allowed', 'baggage_allowed', 'no_smoking'] as $filter) {
                        if (request($filter) && empty($driver->$filter)) {
                            $matches = false;
                        }
                    }

                    if (request('car_type') && $driver->car_type != request('car_type')) {
                        $matches = false;
                    }

                    if (request('price') && $driver->price > request('price')) {
                        $matches = false;
                    }

                    return $matches;
                });
            @endphp

            @if ($filteredDrivers->isNotEmpty())
                @foreach ($filteredDrivers as $driver)
                    <div class="driver-block">
                        <div class="driver-photo">
                            <img src="{{ asset($driver->photo) }}" alt="Фото водія" class="photo">
                        </div>
                        <div class="driver-info">
                            <p class="driver-name"><strong>{{ $driver->name }}</strong></p>
                            <p class="driver-route">Маршрут: {{ $driver->route }}</p>
                            <p class="driver-date">Дата: {{ $driver->date }} о {{ $driver->time }}</p>
                        </div>
                        <div class="driver-price-info">
                            <p class="driver-price">{{ $driver->price }} грн</p>
                            <p class="driver-seats">Вільні місця: {{ $driver->seats }}</p>
                        </div>
                    </div>
                    <hr class="divider">
                @endforeach
            @else
                <p>Водіїв не знайдено за вказаними критеріями</p>
            @endif
        </div>
    </div>

    <div class="bottom-navigation">
        <div class="footer-container">
            <p>© GoTogether - 2024. Всі права захищені</p>
            <div class="footer-links">
                <a href="#">FAQ</a>
                <a href="#">Умови користування</a>
                <a href="#">Політика конфіденційності</a>
                <a href="#">Контакти</a>
            </div>
        </div>
    </div>
@endsection
