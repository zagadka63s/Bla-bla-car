<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    // Получить список всех поездок
    public function index()
    {
        $trips = Trip::all();
        return response()->json($trips);
    }

    // Показать форму создания поездки
    public function create()
    {
        if (!auth()->check()) {
            return redirect('/login')->with('message', 'Пожалуйста, войдите, чтобы создать поездку.');
        }

        return view('create-trip');
    }

    // Создать новую поездку
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'departure_location' => 'required|string|max:100',
            'arrival_location' => 'required|string|max:100',
            'departure_date' => 'required|date',
            'departure_time' => 'required|date_format:H:i',
            'price' => 'required|numeric|min:0',
            'available_seats' => 'required|integer|min:1',
            'phone' => 'required|string|max:15',
            'additional_info' => 'nullable|string|max:255',
        ]);

        $trip = Trip::create([
            'user_id' => auth()->id(),
            'departure_location' => $validatedData['departure_location'],
            'arrival_location' => $validatedData['arrival_location'],
            'departure_date' => $validatedData['departure_date'],
            'departure_time' => $validatedData['departure_time'],
            'price' => $validatedData['price'],
            'available_seats' => $validatedData['available_seats'],
            'phone' => $validatedData['phone'],
            'additional_info' => $validatedData['additional_info'] ?? null,
        ]);

        return redirect()->route('trips')->with('message', 'Поездка успешно создана!');
    }

    // Показать список поездок пользователя
    public function myTrips()
    {
        $user = auth()->user();

        // Получаем только незавершенные поездки, созданные пользователем
        $createdTrips = $user->trips()->where('completed', false)->get();

        // Получаем поездки, забронированные пользователем, и тоже только незавершенные
        $reservedTrips = $user->reservedTrips()->where('completed', false)->get();

        // Объединяем все поездки
        $allTrips = $createdTrips->merge($reservedTrips);

        return view('my_trips', ['trips' => $allTrips]);
    }

    // Получить информацию о конкретной поездке
    public function show($id)
    {
        $trip = Trip::with('user')->find($id); // Загрузка пользователя

        if (!$trip) {
            return response()->json(['message' => 'Поездка не найдена'], 404);
        }

        return response()->json($trip);
    }

    // Метод для отображения деталей поездки
    public function view($id)
    {
        $trip = Trip::find($id);

        if (!$trip) {
            return redirect()->route('trips')->with('error', 'Поездка не найдена.');
        }

        return view('trip_view', compact('trip'));
    }

    // Метод для отображения страницы редактирования поездки
    public function edit($id)
    {
        $trip = Trip::find($id);

        if (!$trip) {
            return redirect()->route('trips')->with('error', 'Поездка не найдена.');
        }

        return view('trip_edit', compact('trip'));
    }

    // Обновить информацию о поездке
    public function update(Request $request, $id)
    {
        $trip = Trip::find($id);

        if (!$trip) {
            return response()->json(['message' => 'Поездка не найдена'], 404);
        }

        $validatedData = $request->validate([
            'departure_location' => 'string|max:100',
            'arrival_location' => 'string|max:100',
            'departure_date' => 'date',
            'departure_time' => 'date_format:H:i',
            'price' => 'numeric|min:0',
            'available_seats' => 'integer|min:1',
            'phone' => 'string|max:15',
            'additional_info' => 'nullable|string|max:255',
        ]);

        $trip->update($validatedData);

        return redirect()->route('trips')->with('message', 'Поездка успешно обновлена!');
    }

    // Удалить поездку
    public function destroy($id)
    {
        $trip = Trip::find($id);

        if (!$trip) {
            return response()->json(['message' => 'Поездка не найдена'], 404);
        }

        $trip->delete();

        return redirect()->route('trips')->with('message', 'Поездка успешно удалена!');
    }

    // Поиск поездок
    public function search(Request $request)
    {
        $validatedData = $request->validate([
            'departure' => 'nullable|string|max:100',
            'destination' => 'nullable|string|max:100',
            'date' => 'nullable|date',
            'passengers' => 'nullable|integer|min:1',
            'price' => 'nullable|numeric|min:0',
        ]);

        $query = Trip::with('user'); // Загрузка связанных пользователей

        if (!empty($validatedData['departure'])) {
            $query->where('departure_location', 'like', '%' . $validatedData['departure'] . '%');
        }

        if (!empty($validatedData['destination'])) {
            $query->where('arrival_location', 'like', '%' . $validatedData['destination'] . '%');
        }

        if (!empty($validatedData['date'])) {
            $query->where('departure_date', $validatedData['date']);
        }

        if (!empty($validatedData['passengers'])) {
            $query->where('available_seats', '>=', $validatedData['passengers']);
        }

        if (!empty($validatedData['price'])) {
            $query->where('price', '<=', $validatedData['price']);
        }

        $trips = $query->get();

        return view('search-trip', ['trips' => $trips]);
    }

    // История поездок пользователя
    public function history()
    {
        $user = auth()->user();
        $trips = Trip::where('user_id', $user->id)
            ->orderBy('departure_date', 'desc')
            ->get();

        return view('trip_history', compact('trips'));
    }

    // Сохранение забронированной поездки
    public function reserve(Request $request)
    {
        $validatedData = $request->validate([
            'trip_id' => 'required|exists:trips,id',
        ]);

        $trip = Trip::find($validatedData['trip_id']);

        if (!$trip) {
            return response()->json(['message' => 'Поездка не найдена'], 404);
        }

        if ($trip->available_seats > 0) {
            $trip->available_seats--;
            $trip->save();

            try {
                auth()->user()->reservedTrips()->attach($trip->id);
                return response()->json(['message' => 'Поездка успешно забронирована!'], 200);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Ошибка при сохранении бронирования.', 'error' => $e->getMessage()], 500);
            }
        } else {
            return response()->json(['message' => 'Нет доступных мест.'], 400);
        }
    }

    // Завершить поездку
    public function complete($id)
    {
        $trip = Trip::find($id);

        if (!$trip) {
            return redirect()->route('trips')->with('error', 'Поездка не найдена.');
        }

        if ($trip->user_id !== auth()->id()) {
            return redirect()->route('trips')->with('error', 'Вы не можете завершить эту поездку.');
        }

        $trip->completed = true;
        $trip->save();

        return redirect()->route('trips')->with('message', 'Поездка успешно завершена.');
    }
}
