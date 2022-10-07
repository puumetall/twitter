@extends('partials.layout')
@section('title', $user->name)
@section('content')
    @foreach($tweets as $tweet)
        @if($tweet->isRetweet)
            @include('partials.retweet')
        @else
            @include('partials.tweet')
        @endif
    @endforeach
    {{$tweets->links()}}
@endsection
