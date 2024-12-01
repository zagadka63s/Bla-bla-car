<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Trip;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Получить все отзывы для конкретной поездки
    public function index(Request $request, $tripId)
    {
        $reviews = Review::where('trip_id', $tripId)
            ->with(['reviewer', 'reviewed'])
            ->get();

        return response()->json($reviews);
    }

    // Получить отзывы текущего авторизованного пользователя
    public function userReviews()
    {
        $userId = auth()->id(); // ID текущего пользователя

        // Получение отзывов, где пользователь либо автор, либо адресат
        $reviews = Review::where('reviewer_id', $userId)
            ->orWhere('reviewed_id', $userId)
            ->with(['trip', 'reviewer', 'reviewed']) // Загрузка связанных данных
            ->get();

        // Передача отзывов в шаблон
        return view('reviews', compact('reviews')); // Убедитесь, что файл `reviews.blade.php` существует
    }

    // Создать новый отзыв
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'trip_id' => 'required|integer|exists:trips,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        $validatedData['reviewer_id'] = auth()->id();

        $trip = Trip::find($validatedData['trip_id']);
        $validatedData['reviewed_id'] = $trip->user_id ?? null;

        if (!$validatedData['reviewer_id'] || !$validatedData['reviewed_id']) {
            return response()->json(['message' => 'Reviewer or Reviewed user is missing.'], 400);
        }

        $review = Review::create($validatedData);

        return response()->json([
            'message' => 'Review created successfully',
            'review' => $review->load('reviewer', 'reviewed'),
        ]);
    }

    // Обновить существующий отзыв
    public function update(Request $request, $id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        $validatedData = $request->validate([
            'rating' => 'sometimes|required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        $review->update($validatedData);

        return response()->json([
            'message' => 'Review updated successfully',
            'review' => $review->load('reviewer', 'reviewed'),
        ]);
    }

    // Удалить отзыв
    public function destroy($id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        $review->delete();

        return response()->json(['message' => 'Review deleted successfully']);
    }
}
