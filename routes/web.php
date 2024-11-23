<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

// Главная страница
Route::get('/', [MainController::class, 'index']);

// Страницы политики и условий
Route::get('/terms', [MainController::class, 'terms']);
Route::get('/terms-of-use', function () {
    return view('terms-of-use');
});

// Страницы создания поездки и автомобиля
Route::get('/create-trip', function () {
    return view('create-trip');
})->name('trip.create');

Route::post('/create-trip', function () {
    return request()->all();
})->name('trip.store');

Route::get('/create-car', function () {
    return view('create-car');
})->name('car.create');

Route::post('/create-car', function () {
    return request()->all();
})->name('car.store');

// Страница поиска поездок
Route::get('/search-trip', function () {
    return view('search-trip');
})->name('trip.search');

// Страницы для входа, регистрации и восстановления пароля
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/password/reset', function () {
    return view('reset_password');
})->name('password.request');

Route::post('/password/email', function () {
    return back()->with('status', 'Ссылка для сброса пароля отправлена на вашу почту.');
})->name('password.email');

// Новые маршруты для страниц "Сообщения", "Мои поездки" и "Созданные поездки"
Route::get('/messages', function () {
    return view('messages');
})->name('messages');

Route::get('/trips', function () {
    return view('trips');
})->name('trips');

Route::get('/created-trips', function () {
    return view('created_trips');
})->name('created.trips');

// Добавляем недостающие маршруты
Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/notifications', function () {
    return view('notifications');
})->name('notifications');

Route::get('/reviews', function () {
    return view('reviews');
})->name('reviews');

Route::get('/trip-history', function () {
    return view('trip_history');
})->name('trip.history');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');

// Универсальный маршрут для всех остальных страниц
Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
