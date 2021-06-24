<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Lweet;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'profile',
        'bio',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function timeline () {
        $ids = $this->follows()->pluck('id');
        $ids->push($this->id);

        return Lweet::whereIn('user_id', $ids)->withRelweets()->withLikes()->latest()->paginate(10);
    }
    
    public function relweeted () {
        $ids = $this->relweets->where('user_id', $this->id)->where('is_relweeted', true)->pluck('lweet_id');

        return Lweet::whereIn('id', $ids)->withRelweets()->withLikes()->latest()->paginate(10);
    }

    public function liked () {
        $ids = $this->likes->where('user_id', $this->id)->where('is_liked', true)->pluck('lweet_id');

        return Lweet::whereIn('id', $ids)->withRelweets()->withLikes()->latest()->paginate(10);
    }

    public function getProfileAttribute ($value) {
        if ($value) {
            return asset('storage/' . $value);
        } else {
            return asset('storage/profiles/profile.jpg');
        }
    }

    public function lweets () {
        return $this->hasMany(Lweet::class)->latest();
    }

    public function profilePath () {
        return route('profiles.show', $this);
    }

    public function authorizeProfile (User $user) {
        return $this->is($user);
    }

    public function likes () {
        return $this->hasMany(Like::class);
    }
    
    public function relweets () {
        return $this->hasMany(Relweet::class);
    }
}
