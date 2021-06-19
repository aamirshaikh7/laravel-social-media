<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lweet;

class LweetLikeUnlikeController extends Controller
{
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
        }

        return back();
    }
}
