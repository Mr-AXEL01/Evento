<?php

namespace App\Http\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait OneToOneTrait {

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
