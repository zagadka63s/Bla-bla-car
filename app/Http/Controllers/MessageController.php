<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // Список диалогов
    public function index(Request $request)
{
    $userId = auth()->id();

    $messages = Message::where('sender_id', $userId)
        ->orWhere('receiver_id', $userId)
        ->with(['sender', 'receiver'])
        ->orderBy('created_at', 'asc')
        ->get();

    return view('messages', compact('messages'));
}


    // Открыть чат с конкретным пользователем
    public function chat($userId)
    {
        $currentUserId = auth()->id();

        // Получить все сообщения между текущим пользователем и указанным пользователем
        $messages = Message::where(function ($query) use ($currentUserId, $userId) {
            $query->where('sender_id', $currentUserId)
                  ->where('receiver_id', $userId);
        })->orWhere(function ($query) use ($currentUserId, $userId) {
            $query->where('sender_id', $userId)
                  ->where('receiver_id', $currentUserId);
        })->orderBy('created_at', 'asc')->get();

        // Получить информацию о другом пользователе
        $otherUser = $messages->isNotEmpty()
            ? ($messages->first()->sender_id === $currentUserId ? $messages->first()->receiver : $messages->first()->sender)
            : null;

        return view('chat', [
            'messages' => $messages,
            'otherUser' => $otherUser,
            'userId' => $userId,
        ]);
    }

    // Отправить сообщение
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'receiver_id' => 'required|integer|exists:users,id',
            'content' => 'required|string|max:1000',
        ]);

        $message = Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $validatedData['receiver_id'],
            'content' => $validatedData['content'],
        ]);

        // Перенаправление обратно в чат
        return redirect()->route('messages.chat', ['userId' => $validatedData['receiver_id']]);
    }
}
