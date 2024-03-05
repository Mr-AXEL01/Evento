<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'cover',
        'date',
        'location',
        'place',
        'status',
        'organiser_id',
        'category_id',
    ];

    #----------------- set the relationShip -----------------#
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
