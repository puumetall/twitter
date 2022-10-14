<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $tweets = $user->tweets()->latest()->paginate(10);

        return view('user', compact('tweets', 'user'));
    }
    public function follow($username){
        $user = User::where('username', $username)->firstOrFail();
        if($user->id !== Auth::user()->id){
            if($user->AuthIsFollowing){
                $user->followers()->detach(Auth::user());
            } else {
                $user->followers()->attach(Auth::user());
            }
        }
        return redirect()->back();
    }
}
