<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ExploreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('explore.index', ['users' => User::all()]);
    }
}
