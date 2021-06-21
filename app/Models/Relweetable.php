<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

trait Relweetable {
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

    public function relweets () {
        return $this->hasMany(Relweet::class);
    }
}