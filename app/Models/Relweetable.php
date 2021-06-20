<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

trait Relweetable {
    public function relweet (User $user = null) {
        $this->relweets()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id()
        ], [
            'is_relweeted' => true
        ]);
    }

    public function undoRelweet (User $user = null) {
        $this->relweets()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id()
        ], [
            'is_relweeted' => false
        ]);
    }

    public function relweets () {
        return $this->hasMany(Relweet::class);
    }
}