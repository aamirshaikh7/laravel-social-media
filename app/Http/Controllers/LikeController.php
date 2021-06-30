<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lweet;
use App\Models\User;
use App\Notifications\Liked;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return view('profiles.likes', ['user' => $user, 'lweets' => $user->liked()]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Lweet $lweet)
    {
        if ($lweet->isLikedBy(auth()->user())) {
            $lweet->unlike(auth()->user());
        } else {
            $lweet->like(auth()->user());

            $lweet->user->notify(new Liked(auth()->user()));
        }
        
        return back();
    }
}
