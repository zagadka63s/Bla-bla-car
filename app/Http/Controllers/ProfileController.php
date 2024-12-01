<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Показ профиля
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'Користувач не знайдений.']);
        }

        // Статистика пользователя
        $tripsCount = $user->trips()->count();
        $averageRating = $user->receivedReviews()->avg('rating') ?? 0;
        $reviewsCount = $user->receivedReviews()->count();

        return view('profile', [
            'trips_count' => $tripsCount,
            'average_rating' => number_format($averageRating, 1),
            'reviews_count' => $reviewsCount,
        ]);
    }

    // Обновление аватара
    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'Користувач не знайдений.']);
        }

        // Удаление старого аватара, если есть
        if ($user->avatar && Storage::exists('public/avatars/' . $user->avatar)) {
            Storage::delete('public/avatars/' . $user->avatar);
        }

        // Сохранение нового аватара
        $fileName = time() . '.' . $request->file('avatar')->getClientOriginalExtension();
        $request->file('avatar')->storeAs('public/avatars', $fileName);

        $user->avatar = $fileName;
        $user->save();

        return redirect()->route('profile')->with('success', 'Аватар оновлено успішно.');
    }
}
