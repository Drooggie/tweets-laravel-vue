<?php

namespace App\Models;

use App\Events\TweetCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tweet extends Model
{
    protected $fillable = [
        'message',
    ];

    protected $dispatchesEvents = [
        'created' => TweetCreated::class
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
