<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Історія поїздок</title>
    <link rel="stylesheet" href="{{ asset('css/trip_history.css') }}">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">GoTogether</div>
            <div class="buttons">
                <a href="{{ route('trip.search') }}"><button class="main-button">Знайти поїздку</button></a>
                <a href="{{ route('trip.create') }}"><button class="main-button">Створити поїздку</button></a>
            </div>
        </div>

        <div class="content">
            <div class="sidebar">
                <a href="{{ route('profile') }}" class="sidebar-item">Мій профіль</a>
                <a href="{{ route('trips') }}" class="sidebar-item">Мої поїздки</a>
                <a href="{{ route('messages') }}" class="sidebar-item">Повідомлення</a>
                <a href="{{ route('notifications') }}" class="sidebar-item">Сповіщення</a>
                <a href="{{ route('reviews') }}" class="sidebar-item">Відгуки</a>
                <a href="{{ route('trip.history') }}" class="sidebar-item active">Історія поїздок</a>
                <a href="{{ route('settings') }}" class="sidebar-item">Налаштування</a>
            </div>

            <div class="main-content">
                <h2>Історія поїздок</h2>
                <div class="trip-list">
                    @forelse(auth()->user()->trips as $trip)
                        <div class="trip-item">
                            <img src="{{ $trip->user->avatar_path }}" alt="User Avatar" class="user-avatar">
                            <div class="trip-info">
                                <div class="route">{{ $trip->departure_location }} - {{ $trip->arrival_location }}</div>
                                <div class="date">Дата: {{ \Carbon\Carbon::parse($trip->departure_date)->format('d M Y') }}</div>
                            </div>
                            <button class="review-button" data-trip-id="{{ $trip->id }}">Залишити відгук</button>
                        </div>
                    @empty
                        <p>Немає записів про поїздки.</p>
                    @endforelse
                </div>
                <a href="{{ url()->previous() }}" class="back-button">Назад</a>
            </div>
        </div>

        <!-- Модальное окно -->
        <div class="modal" id="reviewModal" style="display: none;">
            <div class="modal-content">
                <span class="close-button">&times;</span>
                <h3>Залишити відгук</h3>
                <form id="reviewForm" action="{{ route('reviews.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="trip_id" id="modal-trip-id">
                    <div class="form-group">
                        <label for="rating">Оцінка:</label>
                        <select name="rating" id="rating" required>
                            <option value="5">5 зірок</option>
                            <option value="4">4 зірки</option>
                            <option value="3">3 зірки</option>
                            <option value="2">2 зірки</option>
                            <option value="1">1 зірка</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="comment">Відгук:</label>
                        <textarea name="comment" id="comment" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="submit-button">Надіслати</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById('reviewModal');
        const closeModalButton = document.querySelector('.close-button');
        const reviewButtons = document.querySelectorAll('.review-button');
        const reviewForm = document.getElementById('reviewForm');

        reviewButtons.forEach(button => {
            button.addEventListener('click', () => {
                const tripId = button.getAttribute('data-trip-id');
                document.getElementById('modal-trip-id').value = tripId;
                modal.style.display = 'block';
            });
        });

        closeModalButton.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });

        reviewForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(reviewForm);
            const response = await fetch(reviewForm.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            });

            if (response.ok) {
                alert('Відгук успішно збережено!');
                modal.style.display = 'none';
                reviewForm.reset();
            } else {
                alert('Помилка при відправленні відгуку.');
            }
        });
    </script>
</body>
</html>
