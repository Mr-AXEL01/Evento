<?php

namespace App\Models;

use App\Http\Traits\OneToOneTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;
    use OneToOneTrait;

    protected $fillable = [
        'user_id'
    ];

    #----------------- set the relationShip -----------------#
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

}
