@extends('partials.layout')
@section('title', 'Twitter')
@section('content')
        @include('partials.tweet', ['reply' => false])
        <div class="card">
            <div class="card-body">
                <form action="/tweet/{{$tweet->id}}" method="POST">
                    @csrf
                    <textarea placeholder="Tweet your reply!" class="textarea" name="content"></textarea>
                    <input class="button is-primary is-rounded my-2" type="submit" value="Reply">
                </form>
            </div>
        </div>
        @foreach($tweet->replies()->latest()->get() as $reply)
            <div class="card mb-2">
                <div class="card-content">
                    <a href="/user/{{$reply->user->username}}">
                        <div class="media">
                            <div class="media-left">
                                <figure class="image is-48x48">
                                    <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                </figure>
                            </div>
                            <div class="media-content">
                                <p class="title is-6">{{$reply->user->name}}</p>
                                <p class="subtitle is-7">{{ '@' . $reply->user->username }}</p>
                            </div>
                        </div>
                    </a>
                    <div class="content is-size-7">
                        {{$reply->content}}
                        <a href="#">#css</a> <a href="#">#responsive</a>
                        <br>
                        <time datetime="2016-1-1">{{$reply->created_at->diffForHumans()}}</time>
                    </div>
                </div>
                @if($reply->user->id === Auth::user()->id)
                    <a href="/reply/{{$reply->id}}/delete" class="card-footer-item has-text-danger">Delete reply</a>
                @endif
            </div>
        @endforeach
@endsection
