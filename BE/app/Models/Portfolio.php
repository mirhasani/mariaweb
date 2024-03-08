<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends Model
{
    use HasFactory;

    protected $guard = [];

    public function user(): BelongsTo
    {
     return $this->belongsTo(User::class);
    }

    public function likes(): HasMany
    {
     return $this->hasmany(Like::class);
    }
}
