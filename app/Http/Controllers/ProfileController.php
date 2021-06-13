<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  string  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('profiles.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (auth()->user()->is($user)) {
            return view('profiles.edit', compact('user'));
        } else {
            abort('403');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (! request('password')) {
            $attributes = request()->validate([
                'username' => ['required', 'string', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user)],
                'name' => ['required', 'string', 'max:255'],
                'profile' => ['file'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)]
            ]);

            $attributes['password'] = $user->password;
        } else {
            $attributes = request()->validate([
                'username' => ['required', 'string', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user)],
                'name' => ['required', 'string', 'max:255'],
                'profile' => ['file'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
                'password' => ['required', 'string', 'min:6', 'max:255', 'confirmed']
            ]);
        }
        
        if (request('profile')) {
            $attributes['profile'] = request('profile')->store('profiles');
        }
        
        $attributes['password'] = Hash::make(request('password'));

        $user->update($attributes);

        return redirect($user->profilePath());
    }
}
