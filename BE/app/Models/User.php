<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Like;
use App\Models\Profile;
use App\Models\Portfolio;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'mobile',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function findForPassport($username)
    {
        return $this->where('mobile', $username)->first();
    }

    protected $with = ['profile'];
    public function profile(): HasOne
    {
      return $this->hasone(Profile::class);
    }

      public function portfolios(): HasMany
    {
      return $this->hasmany(Portfolio::class)->orderByDesc('created_at');
    }

    public function likes(): BelongsToMany
    {
      return $this->belongsToMany(Like::class , 'likes' , 'user_id' , 'portfolio_id');
    }

}
