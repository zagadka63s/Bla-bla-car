<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // Получить все уведомления аутентифицированного пользователя
    public function index()
    {
        $notifications = Notification::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        // Передача уведомлений в Blade-шаблон
        return view('notifications', ['notifications' => $notifications]);
    }

    // Пометить уведомление как прочитанное
    public function markAsRead($id)
    {
        $notification = Notification::find($id);

        if (!$notification) {
            return response()->json(['message' => 'Notification not found'], 404);
        }

        $notification->is_read = true;
        $notification->save();

        return response()->json(['message' => 'Notification marked as read']);
    }

    // Создать уведомление
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'type' => 'required|string|max:50',
            'content' => 'required|string',
        ]);

        $notification = Notification::create($validatedData);

        return response()->json([
            'message' => 'Notification created successfully',
            'notification' => $notification,
        ]);
    }

    // Удалить уведомление
    public function destroy($id)
    {
        $notification = Notification::find($id);

        if (!$notification) {
            return response()->json(['message' => 'Notification not found'], 404);
        }

        $notification->delete();

        return response()->json(['message' => 'Notification deleted successfully']);
    }
}