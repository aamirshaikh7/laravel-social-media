<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\Followed;

class FollowController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        if (! auth()->user()->isFollowing($user)) {
            auth()->user()->follow($user);

            $user->notify(new Followed(auth()->user()));

            return back()->with('user_followed', 'Following - ' . $user->username);
        } else {
            auth()->user()->unFollow($user);

            return back()->with('user_unfollowed', 'Unfollowed - ' . $user->username);
        }
    }
}
