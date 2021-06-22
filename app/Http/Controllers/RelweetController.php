<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lweet;

class RelweetController extends Controller
{
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
        }

        return back();
    }
}
