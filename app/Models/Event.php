<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function organiser(): BelongsTo
    {
        return $this->belongsTo(Organiser::class);
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
