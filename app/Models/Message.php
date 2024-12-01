<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'trip_id',
        'content',
        'is_read',
    ];

    /**
     * Define the relationship between a message and its sender (user).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    /**
     * Define the relationship between a message and its receiver (user).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    /**
     * Define the relationship between a message and its trip (optional).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    /**
     * Dynamic attribute to get the sender's name.
     *
     * @return string
     */
    public function getSenderNameAttribute()
    {
        return "{$this->sender->first_name} {$this->sender->last_name}" ?? 'Анонім';
    }

    /**
     * Dynamic attribute to get the receiver's name.
     *
     * @return string
     */
    public function getReceiverNameAttribute()
    {
        return "{$this->receiver->first_name} {$this->receiver->last_name}" ?? 'Невідомий користувач';
    }
}
