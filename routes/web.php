<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PreferenceController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SavedTripController;
use App\Http\Controllers\SettingsController;

// Главная страница
Route::get('/', [MainController::class, 'index']);
Route::get('/terms', [MainController::class, 'terms']);
Route::get('/terms-of-use', fn() => view('terms-of-use'));

// Страницы создания поездки и автомобиля
Route::get('/create-trip', [TripController::class, 'create'])->name('trip.create');
Route::post('/create-trip', [TripController::class, 'store'])->name('trip.store');
Route::get('/create-trip2', fn() => view('create-trip2'))->name('trip.create2');

// Новый маршрут для страницы "Мои поездки"
Route::get('/my-trips', [TripController::class, 'myTrips'])->name('trips');

// Маршруты для редактирования, удаления и завершения поездок
Route::get('/trips/edit/{id}', [TripController::class, 'edit'])->name('trip.edit');
Route::delete('/trips/delete/{id}', [TripController::class, 'destroy'])->name('trip.destroy');
Route::post('/trips/complete/{id}', [TripController::class, 'complete'])->name('trip.complete');

// Маршрут для бронирования поездки
Route::post('/trips/reserve', [TripController::class, 'reserve'])->name('trip.reserve');

// Страницы, связанные с автомобилем
Route::get('/create-car', fn() => view('create-car'))->name('car.create');
Route::post('/create-car', fn() => request()->all())->name('car.store');

// Страница поиска поездок
Route::get('/search-trip', [TripController::class, 'search'])->name('trip.search');

// Страницы для входа, регистрации и восстановления пароля
Route::get('/login', fn() => view('login'))->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.process');
Route::get('/register', fn() => view('register'))->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register.store');

// Профиль пользователя
Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [UserController::class, 'update'])->name('profile.update');
Route::post('/profile/update-avatar', [UserController::class, 'updateAvatar'])->name('profile.update.avatar');

// История поездок
Route::get('/trip-history', [TripController::class, 'history'])->name('trip.history');

// Настройки
Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
Route::post('/settings/password/update', [SettingsController::class, 'updatePassword'])->name('settings.password.update');
Route::post('/settings/notifications/update', [SettingsController::class, 'updateNotifications'])->name('settings.notifications.update');
Route::post('/settings/language/update', [SettingsController::class, 'updateLanguage'])->name('settings.language.update');
Route::post('/settings/profile/update', [SettingsController::class, 'updateProfile'])->name('settings.profile.update');

// Обработка восстановления пароля
Route::get('/password/reset', fn() => view('reset_password'))->name('password.request');
Route::post('/password/email', fn() => back()->with('status', 'Ссылка для сброса пароля отправлена на вашу почту.'))->name('password.email');

// Управление пользователями
Route::resource('users', UserController::class);

// Сообщения
Route::get('/messages', [MessageController::class, 'index'])->name('messages'); // Список сообщений
Route::get('/messages/chat/{userId}', [MessageController::class, 'chat'])->name('messages.chat'); // Открыть чат с конкретным пользователем
Route::post('/messages/send', [MessageController::class, 'store'])->name('messages.send'); // Отправить сообщение
Route::get('/messages/update/{userId}', [MessageController::class, 'getChatMessages'])->name('messages.update'); // Обновление чата

// Управление уведомлениями
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
Route::put('/notifications/{id}', [NotificationController::class, 'markAsRead']);

// Управление предпочтениями
Route::resource('preferences', PreferenceController::class);

// Управление отзывами
Route::get('/reviews', [ReviewController::class, 'userReviews'])->name('reviews'); // Новый маршрут для отзывов текущего пользователя
Route::get('/reviews/{tripId}', [ReviewController::class, 'index'])->name('reviews.index'); // Отзывы конкретной поездки
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store'); // Сохранение отзывов
Route::delete('/reviews/{id}', [ReviewController::class, 'destroy']);

// Тестовый маршрут для проверки подключения к базе данных
Route::get('/db-test', function () {
    try {
        DB::connection()->getPdo();
        return 'Подключение к базе данных успешно!';
    } catch (\Exception $e) {
        return 'Ошибка подключения: ' . $e->getMessage();
    }
});

// Универсальный маршрут для всех остальных страниц
Route::get('/{any}', fn() => view('welcome'))->where('any', '.*');
