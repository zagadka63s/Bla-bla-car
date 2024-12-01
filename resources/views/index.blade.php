@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Мої відгуки</h1>
    <div class="reviews-list">
        @forelse($reviews as $review)
            <div class="review-item">
                <h3>Поїздка: {{ $review->trip->departure_location }} - {{ $review->trip->arrival_location }}</h3>
                <p><strong>Рейтинг:</strong> {{ $review->rating }} / 5</p>
                <p><strong>Коментар:</strong> {{ $review->comment ?? 'Без коментарів' }}</p>
                <p><strong>Автор відгуку:</strong> {{ $review->reviewer->name }}</p>
                <p><strong>Отримувач:</strong> {{ $review->reviewed->name }}</p>
            </div>
        @empty
            <p>У вас поки немає відгуків.</p>
        @endforelse
    </div>
</div>
@endsection
