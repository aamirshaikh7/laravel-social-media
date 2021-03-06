<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lweet;

class LweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lweets.index',[
            'lweets' => auth()->user()->timeline()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lweet = new Lweet(request()->validate([
            'body' => 'required | max:255',
            'image' => 'file'
        ]));

        $lweet->user_id = auth()->user()->id;
        
        if (request('image')) {
            $lweet['image'] = request('image')->store('images');
        }

        $lweet->save();

        return redirect(route('home'))->with('lweet_added', 'Lweet added successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lweet $lweet)
    {
        return view('lweets.edit', ['lweet' => $lweet]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lweet $lweet)
    {
        $attributes = request()->validate([
            'body' => ['required', 'string', 'max:255'],
            'image' => ['file']
        ]);

        if (request('image')) {
            $attributes['image'] = request('image')->store('images');
        }

        $lweet->update($attributes);

        return redirect(route('home'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lweet $lweet)
    {
        $lweet->delete();

        return back();
    }
}
