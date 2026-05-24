<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FAQ extends Model
{
    protected $fillable = [
        'question',
        'answer',
        'f_a_q_category_id',
    ];

    /**
     * FAQ belongs to one category
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(FAQCategory::class, 'f_a_q_category_id');
    }
}
