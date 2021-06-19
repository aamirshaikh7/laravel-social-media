<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

trait Likable {
    public function scopeWithLikes (Builder $query) {
        $query->leftJoinSub('SELECT lweet_id, sum(is_liked) likes FROM likes GROUP BY lweet_id', 'likes', 'likes.lweet_id', 'lweets.id');
    }

    public function like (User $user = null, $like = true) {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id(),
        ], [
            'is_liked' => $like
        ]);
    }

    public function unlike (User $user = null) {
        return $this->like($user, false);
    }

    public function isLikedBy (User $user, $like = true) {
        return (bool) $user->likes->where('lweet_id', $this->id)->where('is_liked', $like)->count();
    }

    public function isDislikedBy (User $user) {
        return $this->isLikedBy($user, false);
    }

    public function likes () {
        return $this->hasMany(Like::class);
    }
}