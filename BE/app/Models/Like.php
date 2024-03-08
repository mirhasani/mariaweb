<?php

namespace App\Models;

use App\Models\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Like extends Model
{
    use HasFactory;

    public function user(): BelongsToMany
{
    return $this->belongsToMany(Like::class, 'likes' , 'user_id' , 'portfolio_id');
}
}


