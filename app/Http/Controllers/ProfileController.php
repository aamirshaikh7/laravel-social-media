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
        return view('profiles.show', ['user' => $user, 'lweets' => $user->lweets()->withRelweets()->withLikes()->paginate(10)]);
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
        $attributes = request()->validate([
            'username' => ['required', 'string', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user)],
            'name' => ['required', 'string', 'max:255'],
            'profile' => ['file'],
            'bio' => ['max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => ['max:255', 'confirmed']
        ]);

        if (! request('password')) {
            $attributes['password'] = $user->password;
        } else {
            $attributes['password'] = Hash::make(request('password'));
        }

        if (request('profile')) {
            $attributes['profile'] = request('profile')->store('profiles');
        }

        $user->update($attributes);

        return redirect($user->profilePath())->with('profile_updated', 'Profile has been updated !');
    }
}
