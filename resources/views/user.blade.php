@extends('partials.layout')
@section('title', $user->name)
@section('content')
    @foreach($tweets as $tweet)
        @include('partials.tweet')
    @endforeach
    {{$tweets->links()}}
@endsection
