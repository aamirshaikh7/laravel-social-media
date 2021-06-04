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
        'name',
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

        return Lweet::whereIn('user_id', $ids)->latest()->get();
    }

    public function getProfileAttribute () {
        return "https://i.pravatar.cc/200?u=" . $this->email;
    }

    public function lweets () {
        return $this->hasMany(Lweet::class)->latest();
    }
    
    public function getRouteKeyName () {
        return 'name';
    }
}
