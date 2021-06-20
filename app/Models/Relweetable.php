<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

trait Relweetable {
    public function relweets () {
        return $this->hasMany(Relweet::class);
    }
}