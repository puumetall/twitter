<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home(){
        $tweets = Tweet::latest()->paginate(10);
        return view('home', compact('tweets'));
    }
}
