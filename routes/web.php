<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Здесь вы можете зарегистрировать веб-маршруты для вашего приложения.
| Эти маршруты загружаются поставщиком маршрутов (RouteServiceProvider)
| и будут присвоены "web" группе посредников. Создайте что-то замечательное!
|
*/


Route::get('/', [MainController::class, 'index']);


Route::get('/terms', [MainController::class, 'terms']);


Route::get('/terms-of-use', function () {
    return view('terms-of-use');
});


Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
