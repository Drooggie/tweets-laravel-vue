<?php

namespace App\Models;

use App\Models\Tweet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{

    protected $fillable = [
        'comment',
    ];

    public function tweet(): BelongsTo
    {
        return $this->belongsTo(Tweet::class);
    }
}
