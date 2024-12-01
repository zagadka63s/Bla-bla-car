<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'phone',
        'email',
        'password',
        'date_of_birth',
        'email_notifications',
        'sms_notifications',
        'language',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_of_birth' => 'date',
        'email_notifications' => 'boolean',
        'sms_notifications' => 'boolean',
    ];

    /**
     * Отношения с моделью Trip (путешествия пользователя).
     */
    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    /**
     * Отношения с моделью Review (полученные отзывы).
     */
    public function receivedReviews()
    {
        return $this->hasMany(Review::class, 'reviewed_id');
    }

    /**
     * Отношения с моделью Review (оставленные отзывы).
     */
    public function givenReviews()
    {
        return $this->hasMany(Review::class, 'reviewer_id');
    }

    /**
     * Отношения с моделью SavedTrip (сохраненные поездки).
     */
    public function savedTrips()
    {
        return $this->hasMany(SavedTrip::class);
    }

    /**
     * Отношения с моделью Notification.
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    /**
     * Отношения с моделью Trip (забронированные поездки).
     */
    public function reservedTrips()
    {
    return $this->belongsToMany(Trip::class, 'reservations', 'user_id', 'trip_id')
        ->withTimestamps();
    }


    /**
     * Полное имя пользователя.
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Путь к аватару пользователя.
     */
    public function getAvatarPathAttribute()
    {
        return $this->avatar 
            ? asset('storage/avatars/' . $this->avatar) 
            : asset('images/default-avatar.png');
    }

    /**
     * Удаление старого аватара (если есть).
     */
    public function deleteOldAvatar()
    {
        if ($this->avatar) {
            Storage::delete('public/avatars/' . $this->avatar);
        }
    }
}
