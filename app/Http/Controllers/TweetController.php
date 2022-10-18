<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Tweet;
use App\Http\Requests\StoreTweetRequest;
use App\Http\Requests\UpdateTweetRequest;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreTweetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTweetRequest $request)
    {
        $tweet = new Tweet();
        $tweet->content = $request->input('content');
        //$tweet->user_id = Auth::user()->id;
        $tweet->user()->associate(Auth::user()->id);
        $tweet->save();
        preg_match_all('/#\w+/', $request->input('content'), $tags);
        foreach($tags[0] as $tag){
            $tag = str_replace('#', '', $tag);
            $tagModel = Tag::where('name', $tag)->first();
            if(!$tagModel){
                $tagModel = new Tag();
                $tagModel->name = $tag;
                $tagModel->save();
            }
            $tweet->tags()->attach($tagModel);
        }
        return redirect('/');
    }

    public function retweet(Tweet $tweet){
        $retweet = new Tweet();
        $retweet->tweet_id = $tweet->id;
        $retweet->user()->associate(Auth::user());
        $retweet->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function show(Tweet $tweet)
    {
        return view('show', compact('tweet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function edit(Tweet $tweet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTweetRequest  $request
     * @param  \App\Models\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTweetRequest $request, Tweet $tweet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tweet $tweet)
    {
        if($tweet->user->id = Auth::user()->id){
            $tweet->delete();
        }
        return redirect()->back();
    }
}
