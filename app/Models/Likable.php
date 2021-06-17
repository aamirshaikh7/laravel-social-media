<?php

namespace App\Models;

trait Likable {
    public function like (User $user = null, $like = true) {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id(),
        ], [
            'is_liked' => $like
        ]);
    }

    public function dislike (User $user = null) {
        return $this->like($user, false);
    }

    public function likes () {
        return $this->hasMany(Like::class);
    }
}