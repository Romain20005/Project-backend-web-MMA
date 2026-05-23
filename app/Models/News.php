<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    protected $fillable = [
        'title',
        'content',
        'image',
        'published_at',
        'user_id',
    ];

    /**
     * News belongs to one user
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
