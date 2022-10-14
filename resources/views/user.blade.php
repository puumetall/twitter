@extends('partials.layout')
@section('title', $user->name)
@section('content')

    <div class="card mb-6" style="background-color: {{$user->profile->color}}">
        <div class="card-image">
            <figure class="image is-3by1 mx-0">
                <img src="{{$user->profile->background}}" alt="Placeholder image">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-left" style="margin-top:-4em">
                    <figure class="image is-96x96">
                        <img class="is-rounded" src="{{$user->profile->image}}" alt="Placeholder image">
                    </figure>
                </div>
                <div class="media-content" style="z-index: 10;">
                    <p class="title is-4">{{$user->name}}</p>
                    <p class="subtitle is-6">{{'@' . $user->username}}</p>
                </div>
            </div>

            <div class="content">
                {{$user->profile->bio}}
            </div>
        </div>
    </div>

    @foreach($tweets as $tweet)
        @if($tweet->isRetweet)
            @include('partials.retweet')
        @else
            @include('partials.tweet')
        @endif
    @endforeach
    {{$tweets->links()}}
@endsection
