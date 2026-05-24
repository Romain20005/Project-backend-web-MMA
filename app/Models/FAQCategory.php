<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FAQCategory extends Model
{
    protected $fillable = [
        'name',
    ];

    /**
     * Category has many FAQs
     */
    public function faqs(): HasMany
    {
        return $this->hasMany(FAQ::class);
    }
}
