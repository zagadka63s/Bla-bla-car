<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Созданные поездки</title>
    <link rel="stylesheet" href="{{ asset('css/created_trips.css') }}">
</head>
<body>
    <header class="header">
        <h1>GoTogether</h1>
        <nav>
            <a href="{{ route('trip.search') }}" class="nav-button">Найти поездку</a>
            <a href="{{ route('trip.create') }}" class="nav-button">Создать поездку</a>
            <div class="profile-icon">👤</div>
        </nav>
    </header>
    <main class="container">
        <aside class="sidebar">
            <ul>
                <li><a href="{{ route('profile') }}">Мой профиль</a></li>
                <li><a href="{{ route('my.trips') }}">Мои поездки</a></li>
                <li><a href="{{ route('messages') }}">Сообщения</a></li>
                <li class="active"><a href="{{ route('created.trips') }}">Созданные поездки</a></li>
                <li><a href="{{ route('status') }}">Статус</a></li>
                <li><a href="{{ route('trip.history') }}">История поездок</a></li>
                <li><a href="{{ route('settings') }}">Настройки</a></li>
            </ul>
        </aside>
        <section class="content">
            <div class="created-trips-list">
                <!-- Здесь будут созданные поездки -->
                <p>Созданная поездка 1</p>
                <p>Созданная поездка 2</p>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; GoTogether - 2024 | Все права защищены</p>
    </footer>
</body>
</html>
