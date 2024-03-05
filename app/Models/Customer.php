<?php

namespace App\Models;

use App\Http\Traits\OneToOneTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    use OneToOneTrait;
}
