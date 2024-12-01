@extends('layouts.main')

@section('title', 'Найти поездку')

@section('content')
<link rel="stylesheet" href="{{ asset('css/search-trip.css') }}">

<!-- Верхняя панель навигации -->
<div class="top-navigation">
    <h1 class="logo">GoTogether</h1>
    <div class="nav-buttons">
        <button class="nav-button" onclick="window.location.href='{{ route('trip.search') }}'">Знайти поїздку</button>
        <button class="nav-button" onclick="window.location.href='{{ route('trip.create') }}'">Створити поїздку</button>
        <button class="nav-button profile-button" onclick="window.location.href='{{ route('profile') }}'">Профіль</button>
    </div>
</div>

<div class="main-content">
    <!-- Левая колонка -->
    <div class="left-section">
        <div class="form-container search-trip-form">
            <h1>Знайдіть поїздку</h1>
            <form action="{{ route('trip.search') }}" method="GET">
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
                    </div>
                    <span class="range-max">1000</span>
                </div>
                <div class="form-buttons">
                    <button type="reset" class="reset-button" onclick="location.href='{{ route('trip.search') }}'">Очистити фільтр</button>
                    <button type="submit" class="search-button">Пошук</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Правая колонка -->
    <div class="form-container search-results">
        @if($trips->isEmpty())
        <p>Водіїв не знайдено за вказаними критеріями</p>
        @else
        @foreach($trips as $trip)
        <div class="driver-block" onclick="openModal({{ $trip }})">
            <div class="driver-avatar">
                <img src="{{ $trip->user->avatar ? asset('storage/avatars/' . $trip->user->avatar) : asset('images/default-avatar.png') }}" alt="Avatar" class="avatar-img">
            </div>
            <div class="driver-info">
                <p class="driver-route"><strong>Маршрут:</strong> {{ $trip->departure_location }} - {{ $trip->arrival_location }}</p>
                <p class="driver-date"><strong>Дата:</strong> {{ $trip->departure_date }}</p>
                <p class="driver-price"><strong>Ціна:</strong> {{ $trip->price }} грн</p>
                <p class="driver-seats"><strong>Вільні місця:</strong> {{ $trip->available_seats }}</p>
            </div>
        </div>
        <hr class="divider">
        @endforeach
        @endif
    </div>
</div>

<!-- Модальное окно -->
<div id="tripModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close-button" onclick="closeModal()">&times;</span>
        <div class="modal-info">
            <div class="modal-image">
                <img src="" id="modalAvatar" alt="Avatar" class="modal-avatar">
            </div>
            <div class="modal-text">
                <p id="modalRoute"></p>
                <p id="modalDate"></p>
                <p id="modalSeats"></p>
                <p id="modalPrice"></p>
                <p id="modalInfo"></p>
            </div>
        </div>
        <div class="modal-footer">
            <button class="book-btn" onclick="reserveTrip()">Забронювати</button>
            <button class="message-btn" onclick="redirectToChat()">Повідомлення</button>
        </div>
    </div>
</div>

<script>
    let selectedTrip = null;

    function openModal(trip) {
        selectedTrip = trip;
        const avatarPath = trip.user && trip.user.avatar ? 
            `{{ asset('storage/avatars') }}/${trip.user.avatar}` : 
            '{{ asset("images/default-avatar.png") }}';
        document.getElementById('modalAvatar').src = avatarPath;
        document.getElementById('modalRoute').innerText = `Маршрут: ${trip.departure_location} - ${trip.arrival_location}`;
        document.getElementById('modalDate').innerText = `Дата: ${trip.departure_date}`;
        document.getElementById('modalSeats').innerText = `Вільні місця: ${trip.available_seats}`;
        document.getElementById('modalPrice').innerText = `Ціна: ${trip.price} грн`;
        document.getElementById('modalInfo').innerText = trip.additional_info 
            ? `Додаткова інформація: ${trip.additional_info}` 
            : 'Додаткова інформація: Немає додаткової інформації';
        document.getElementById('tripModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('tripModal').style.display = 'none';
    }

    function redirectToChat() {
        if (selectedTrip) {
            const receiverId = selectedTrip.user.id;
            window.location.href = `/messages/chat/${receiverId}`;
        }
    }
</script>
@endsection
