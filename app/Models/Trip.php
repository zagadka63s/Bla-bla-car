<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    /**
     * Атрибути, які можна призначати масово.
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_id',
        'departure_location',
        'arrival_location',
        'departure_date',
        'departure_time',
        'price',
        'available_seats',
        'phone',
        'additional_info',
    ];

    /**
     * Визначте зв'язок між подорожжю та її творцем (користувачем).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Визначте зв'язок між подорожжю та користувачами, які її забронювали.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function reservedUsers()
    {
        return $this->belongsToMany(User::class, 'reservations', 'trip_id', 'user_id')
            ->withTimestamps();
    }

    /**
     * Визначте зв'язок між подорожжю та своїми вподобаннями.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function preferences()
    {
        return $this->hasOne(Preference::class);
    }

    /**
     * Визначте зв'язок між поїздкою та збереженими поїздками.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function savedTrips()
    {
        return $this->hasMany(SavedTrip::class);
    }

    /**
     * Визначте зв'язок між подорожжю та відгуками про неї.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
