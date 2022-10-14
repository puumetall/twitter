<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfileRequest  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request)
    {
        $profile = Auth::user()->profile;
        if(!$profile){
            $profile = new Profile();
            $profile->user()->associate(Auth::user());
        }
        $profile->bio = $request->validated('bio');
        $profile->color = $request->validated('color');
        if($request->file('image')){
            $profile->image = Storage::url($request->file('image')->store('public'));
        }
        if($request->file('background')){
            $profile->background = Storage::url($request->file('background')->store('public'));
        }
        $profile->save();
        return redirect()->back();
    }
}
