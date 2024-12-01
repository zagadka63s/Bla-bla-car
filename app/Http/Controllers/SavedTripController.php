<?php

namespace App\Http\Controllers;

use App\Models\SavedTrip;
use Illuminate\Http\Request;

class SavedTripController extends Controller
{
    // Получить все сохраненные поездки для конкретного пользователя
    public function index(Request $request)
    {
        $userId = $request->user()->id; // Получаем ID текущего пользователя
        $savedTrips = SavedTrip::where('user_id', $userId)->with('trip')->get();

        return response()->json($savedTrips);
    }

    // Сохранить поездку
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'trip_id' => 'required|integer|exists:trips,id',
        ]);

        $savedTrip = SavedTrip::firstOrCreate([
            'user_id' => $request->user()->id,
            'trip_id' => $validatedData['trip_id'],
        ]);

        return response()->json([
            'message' => 'Trip saved successfully',
            'savedTrip' => $savedTrip,
        ]);
    }

    // Удалить сохраненную поездку
    public function destroy($id)
    {
        $savedTrip = SavedTrip::find($id);

        if (!$savedTrip) {
            return response()->json(['message' => 'Saved trip not found'], 404);
        }

        $savedTrip->delete();

        return response()->json(['message' => 'Saved trip deleted successfully']);
    }
}
