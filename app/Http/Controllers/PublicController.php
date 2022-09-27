<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home(){
        $tweets = Tweet::latest()->get();
        return view('home', compact('tweets'));
    }
}
