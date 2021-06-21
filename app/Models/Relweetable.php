<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

trait Relweetable {
    public function scopeWithRelweets (Builder $query) {
        $query->leftJoinSub('SELECT lweet_id, sum(is_relweeted) relweets FROM relweets group by lweet_id', 'relweets', 'relweets.lweet_id', 'lweets.id');
    }

    public function relweet (User $user = null, $relweet = true) {
        $this->relweets()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id()
        ], [
            'is_relweeted' => $relweet
        ]);
    }

    public function undoRelweet (User $user = null) {
        return $this->relweet($user, false);
    }

    public function isRelweetedBy(User $user) {
        return (bool) $user->relweets->where('lweet_id', $this->id)->where('is_relweeted', true)->count();
    }

    public function relweets () {
        return $this->hasMany(Relweet::class);
    }
}