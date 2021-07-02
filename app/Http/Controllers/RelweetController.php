<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lweet;
use App\Models\User;
use App\Notifications\Relweeted;

class RelweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return view('profiles.relweets', ['user' => $user, 'lweets' => $user->relweeted()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Lweet $lweet)
    {
        if ($lweet->isRelweetedBy(auth()->user())) {
            $lweet->undoRelweet(auth()->user());
        } else {
            $lweet->relweet(auth()->user());

            if (! auth()->user()->authorizeProfile($lweet->user)) {
                $lweet->user->notify(new Relweeted(auth()->user(), $lweet));
            }
        }

        return back();
    }
}
