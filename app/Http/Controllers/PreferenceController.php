<?php

namespace App\Http\Controllers;

use App\Models\Preference;
use Illuminate\Http\Request;

class PreferenceController extends Controller
{
    // Получить предпочтения для конкретной поездки
    public function index($tripId)
    {
        $preferences = Preference::where('trip_id', $tripId)->first();

        if (!$preferences) {
            return response()->json(['message' => 'Preferences not found'], 404);
        }

        return response()->json($preferences);
    }

    // Создать или обновить предпочтения для поездки
    public function storeOrUpdate(Request $request, $tripId)
    {
        $validatedData = $request->validate([
            'child_seat' => 'boolean',
            'pet_allowed' => 'boolean',
            'music_allowed' => 'boolean',
            'smoking_allowed' => 'boolean',
            'large_baggage' => 'boolean',
        ]);

        $preferences = Preference::updateOrCreate(
            ['trip_id' => $tripId],
            array_merge($validatedData, ['trip_id' => $tripId])
        );

        return response()->json([
            'message' => 'Preferences saved successfully',
            'preferences' => $preferences,
        ]);
    }

    // Удалить предпочтения для поездки
    public function destroy($tripId)
    {
        $preferences = Preference::where('trip_id', $tripId)->first();

        if (!$preferences) {
            return response()->json(['message' => 'Preferences not found'], 404);
        }

        $preferences->delete();

        return response()->json(['message' => 'Preferences deleted successfully']);
    }
}
