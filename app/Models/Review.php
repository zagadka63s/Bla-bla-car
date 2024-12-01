<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    /**
     * Атрибуты, которые можно назначать массово.
     *
     * @var array<string>
     */
    protected $fillable = [
        'trip_id',
        'reviewer_id',
        'reviewed_id',
        'rating',
        'comment',
    ];

    /**
     * Атрибуты для кастинга.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'rating' => 'integer',
        'trip_id' => 'integer',
        'reviewer_id' => 'integer',
        'reviewed_id' => 'integer',
    ];

    /**
     * Связь между отзывом и поездкой.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    /**
     * Связь между отзывом и пользователем, который его написал.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }

    /**
     * Связь между отзывом и пользователем, которого оценивают.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reviewed()
    {
        return $this->belongsTo(User::class, 'reviewed_id');
    }

    /**
     * Динамический атрибут для имени автора отзыва.
     *
     * @return string
     */
    public function getReviewerNameAttribute()
    {
        if ($this->reviewer) {
            return "{$this->reviewer->first_name} {$this->reviewer->last_name}";
        }
        return 'Анонім';
    }

    /**
     * Динамический атрибут для имени оцениваемого пользователя.
     *
     * @return string
     */
    public function getReviewedNameAttribute()
    {
        if ($this->reviewed) {
            return "{$this->reviewed->first_name} {$this->reviewed->last_name}";
        }
        return 'Невідомий користувач';
    }

    /**
     * Получение статуса отзыва как текст (например, позитивный/негативный).
     *
     * @return string
     */
    public function getReviewStatusAttribute()
    {
        return $this->rating >= 4 ? 'Позитивний' : ($this->rating >= 2 ? 'Нейтральний' : 'Негативний');
    }

    /**
     * Динамический атрибут для аватара автора отзыва.
     *
     * @return string
     */
    public function getReviewerAvatarAttribute()
    {
        return $this->reviewer && $this->reviewer->avatar_path
            ? $this->reviewer->avatar_path
            : asset('images/default-avatar.png');
    }
}
