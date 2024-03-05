<?php

namespace App\Models;

use App\Http\Traits\OneToOneTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organiser extends Model
{
    use HasFactory;
    use OneToOneTrait;

    protected $fillable = [
        'user_id'
    ];

    #----------------- set the relationShip -----------------#
    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

}
