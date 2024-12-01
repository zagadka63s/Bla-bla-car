<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мої поїздки</title>
    <link rel="stylesheet" href="{{ asset('css/my_trips.css') }}">
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
            <div class="sidebar">
                <a href="{{ route('profile') }}" class="sidebar-item">Мій профіль</a>
                <a href="{{ route('trips') }}" class="sidebar-item active">Мої поїздки</a>
                <a href="{{ route('messages') }}" class="sidebar-item">Повідомлення</a>
                <a href="{{ route('notifications') }}" class="sidebar-item">Сповіщення</a>
                <a href="{{ route('reviews') }}" class="sidebar-item">Відгуки</a>
                <a href="{{ route('trip.history') }}" class="sidebar-item">Історія поїздок</a>
                <a href="{{ route('settings') }}" class="sidebar-item">Налаштування</a>
            </div>

            <div class="main-content">
                <h2>Мої поїздки</h2>
                <div class="trip-list">
                    @if($trips->isEmpty())
                        <p>У вас поки немає створених поїздок.</p>
                    @else
                        @foreach($trips as $trip)
                        <div class="trip-item">
                            <div class="trip-info">
                                <div class="trip-date">
                                    Дата: {{ $trip->departure_date }} в {{ $trip->departure_time }}
                                </div>
                                <div class="trip-details">
                                    Маршрут: {{ $trip->departure_location }} → {{ $trip->arrival_location }}
                                </div>
                                <div class="trip-price">
                                    Ціна: {{ $trip->price }} ₴
                                </div>
                                <div class="trip-seats">
                                    Вільні місця: {{ $trip->available_seats }}
                                </div>
                            </div>
                            <div class="trip-status">
                                <!-- Кнопка "Видалити" -->
                                <form action="{{ route('trip.destroy', ['id' => $trip->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button">Видалити</button>
                                </form>

                                <!-- Кнопка "Завершити поїздку" -->
                                <form action="{{ route('trip.complete', ['id' => $trip->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="complete-button">Завершити поїздку</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
</html>
