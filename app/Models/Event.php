<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
