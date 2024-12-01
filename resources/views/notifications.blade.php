<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сповіщення</title>
    <link rel="stylesheet" href="{{ asset('css/notifications.css') }}">
</head>
<body>
    <div class="container">
        <!-- Верхняя панель -->
        <div class="header">
            <div class="logo">GoTogether</div>
            <div class="buttons">
                <a href="{{ route('trip.search') }}"><button>Знайти поїздку</button></a>
                <a href="{{ route('trip.create') }}"><button>Створити поїздку</button></a>
            </div>
        </div>

        <!-- Основное содержимое страницы -->
        <div class="content">
            <!-- Левое боковое меню -->
            <div class="sidebar">
                <a href="{{ route('profile') }}" class="sidebar-item">Мій профіль</a>
                <a href="{{ route('trips') }}" class="sidebar-item">Мої поїздки</a>
                <a href="{{ route('messages', ['senderId' => auth()->id(), 'receiverId' => 1]) }}" class="sidebar-item">Повідомлення</a>
                <a href="{{ route('notifications') }}" class="sidebar-item active">Сповіщення</a>
                <a href="{{ route('reviews', ['tripId' => 1]) }}" class="sidebar-item">Відгуки</a>
                <a href="{{ route('trip.history') }}" class="sidebar-item">Історія поїздок</a>
                <a href="{{ route('settings') }}" class="sidebar-item">Налаштування</a>
            </div>

            <!-- Основной блок уведомлений -->
            <div class="main-content">
                <h2>Ваші сповіщення</h2>
                <div class="notification-list">
                    @forelse($notifications as $notification)
                        <div class="notification-item {{ $notification->is_read ? 'read' : 'unread' }}">
                            <p>{{ $notification->content }}</p>
                            <small>{{ $notification->created_at->format('d.m.Y H:i') }}</small>
                            @if(!$notification->is_read)
                                <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="mark-as-read-button">Помітити як прочитане</button>
                                </form>
                            @endif
                        </div>
                    @empty
                        <p>У вас немає сповіщень</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Футер -->
        <div class="footer">
            <div>©GoTogether - 2024 | Всі права захищені</div>
            <div class="footer-links">
                <a href="#">FAQ</a>
                <a href="#">Умови користування</a>
                <a href="#">Політика конфіденційності</a>
                <a href="#">Контакти</a>
            </div>
        </div>
    </div>
</body>
</html>
