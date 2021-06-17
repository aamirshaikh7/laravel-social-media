<?php

namespace App\Models;

trait Likable {
    public function like (User $user = null) {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id(),
        ], [
            'is_liked' => true
        ]);
    }

    public function dislike (User $user = null) {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id(),
        ], [
            'is_liked' => false
        ]);
    }

    public function likes () {
        return $this->hasMany(Like::class);
    }
}