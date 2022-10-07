<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Http\Requests\StoreLikeRequest;
use App\Http\Requests\UpdateLikeRequest;
use App\Models\Tweet;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
   public function like(Tweet $tweet){
       $like = $tweet->likes()->where('user_id', Auth::user()->id)->first();
       if($like){
           $like->delete();
       } else {
           $like = new Like();
           $like->tweet()->associate($tweet);
           $like->user()->associate(Auth::user());
           $like->save();
       }
       return redirect()->back();
   }
}
