<?php

namespace App\Models;

use App\Http\Traits\OneToOneTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends User
{
    use HasFactory;
    use OneToOneTrait;

    protected $fillable = [
        'user_id'
    ];

}
