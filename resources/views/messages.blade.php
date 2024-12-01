<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Повідомлення</title>
    <link rel="stylesheet" href="{{ asset('css/messages.css') }}">
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
            <div class="sidebar">
                <a href="{{ route('profile') }}" class="sidebar-item">Мій профіль</a>
                <a href="{{ route('trips') }}" class="sidebar-item">Мої поїздки</a>
                <a href="{{ route('messages') }}" class="sidebar-item active">Повідомлення</a>
                <a href="{{ route('notifications') }}" class="sidebar-item">Сповіщення</a>
                <a href="{{ route('reviews') }}" class="sidebar-item">Відгуки</a>
                <a href="{{ route('trip.history') }}" class="sidebar-item">Історія поїздок</a>
                <a href="{{ route('settings') }}" class="sidebar-item">Налаштування</a>
            </div>

            <div class="main-content">
                <h2>Ваші повідомлення</h2>
                <div class="message-list">
                    @foreach($messages as $message)
                    <a href="{{ route('messages.chat', $message->sender_id === auth()->id() ? $message->receiver->id : $message->sender->id) }}" class="message-item">
                        <img src="{{ $message->sender_id === auth()->id() ? $message->receiver->avatar_path : $message->sender->avatar_path }}" alt="User">
                        <div class="text">
                            {{ $message->sender_id === auth()->id() ? $message->receiver->name : $message->sender->name }}
                        </div>
                        <div class="time">{{ $message->created_at->format('d M, H:i') }}</div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>
