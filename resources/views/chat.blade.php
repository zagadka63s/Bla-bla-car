<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Чат</title>
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            <!-- Боковое меню -->
            <div class="sidebar">
                <a href="{{ route('profile') }}" class="sidebar-item">Мій профіль</a>
                <a href="{{ route('trips') }}" class="sidebar-item">Мої поїздки</a>
                <a href="{{ route('messages') }}" class="sidebar-item active">Повідомлення</a>
                <a href="{{ route('notifications') }}" class="sidebar-item">Сповіщення</a>
                <a href="{{ route('reviews') }}" class="sidebar-item">Відгуки</a>
                <a href="{{ route('trip.history') }}" class="sidebar-item">Історія поїздок</a>
                <a href="{{ route('settings') }}" class="sidebar-item">Налаштування</a>
            </div>

            <!-- Чат -->
            <div class="main-content">
                <h2>Чат</h2>
                <div id="chat-box" class="chat-box">
                    @foreach($messages as $message)
                        <div class="chat-message {{ $message->sender_id === auth()->id() ? 'sent' : 'received' }}">
                            <p>{{ $message->content }}</p>
                            <span>{{ $message->created_at->format('d M, H:i') }}</span>
                        </div>
                    @endforeach
                </div>
                <form id="chat-form">
                    @csrf
                    <input type="hidden" name="receiver_id" id="receiver_id" value="{{ $userId }}">
                    <textarea name="content" id="message-content" placeholder="Напишіть повідомлення..." required></textarea>
                    <button type="submit">Надіслати</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Обработка формы чата
        $('#chat-form').on('submit', function (e) {
            e.preventDefault(); // Предотвращаем перезагрузку страницы

            const receiverId = $('#receiver_id').val();
            const content = $('#message-content').val();

            axios.post('{{ route('messages.send') }}', {
                receiver_id: receiverId,
                content: content,
            }, {
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            })
            .then(response => {
                const message = response.data.data;

                // Добавляем новое сообщение в чат
                $('#chat-box').append(`
                    <div class="chat-message sent">
                        <p>${message.content}</p>
                        <span>${new Date(message.created_at).toLocaleString('uk-UA')}</span>
                    </div>
                `);

                // Очищаем поле ввода
                $('#message-content').val('');
                $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight); // Прокрутка вниз
            })
            .catch(error => {
                console.error('Ошибка отправки сообщения:', error);
                alert('Не вдалося відправити повідомлення.');
            });
        });

        // Автообновление чата
        setInterval(() => {
            axios.get('{{ route('messages.chat', $userId) }}')
                .then(response => {
                    $('#chat-box').html(''); // Очищаем чат
                    response.data.messages.forEach(message => {
                        const className = message.sender_id === {{ auth()->id() }} ? 'sent' : 'received';
                        $('#chat-box').append(`
                            <div class="chat-message ${className}">
                                <p>${message.content}</p>
                                <span>${new Date(message.created_at).toLocaleString('uk-UA')}</span>
                            </div>
                        `);
                    });
                    $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight); // Прокрутка вниз
                })
                .catch(error => {
                    console.error('Ошибка обновления чата:', error);
                });
        }, 5000); // Обновляем каждые 5 секунд
    </script>
</body>
</html>
