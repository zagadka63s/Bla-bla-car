<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SettingsController extends Controller
{
    /**
     * Отображение страницы настроек.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        return view('settings', compact('user'));
    }

    /**
     * Обновление пароля пользователя.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(Request $request)
    {
        // Валидация ввода
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Поточний пароль введено неправильно.']);
        }

        // Обновляем пароль
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Имитация отправки уведомления
        session()->flash('success', 'Пароль успішно оновлено. Ми надіслали підтвердження на вашу електронну пошту.');

        return back();
    }

    /**
     * Обновление профиля пользователя.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:15',
        ]);

        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        session()->flash('success', 'Профіль успішно оновлено. Ми надіслали підтвердження на вашу електронну пошту.');

        return back();
    }

    /**
     * Обновление настроек уведомлений.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateNotifications(Request $request)
    {
        $user = Auth::user();

        // Обновляем настройки уведомлений
        $user->email_notifications = $request->has('email_notifications');
        $user->sms_notifications = $request->has('sms_notifications');
        $user->save();

        session()->flash('success', 'Налаштування сповіщень оновлено.');

        return back();
    }

    /**
     * Обновление языка интерфейса.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateLanguage(Request $request)
    {
        $request->validate([
            'language' => 'required|string|max:10',
        ]);

        $user = Auth::user();
        $user->language = $request->input('language');
        $user->save();

        session()->flash('success', 'Мову інтерфейсу оновлено.');

        return back();
    }
}