<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfileTweets extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
