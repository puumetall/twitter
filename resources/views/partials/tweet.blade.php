<div class="card mb-2" @isset($user) style="background-color: {{$user->profile->color}}" @endisset>
{{--    <div class="card-image">--}}
{{--        <figure class="image is-4by3">--}}
{{--            <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">--}}
{{--        </figure>--}}
{{--    </div>--}}
    <div class="card-content">
        <a href="/user/{{$tweet->user->username}}">
            <div class="media">
                <div class="media-left">
                    <figure class="image is-48x48">
                        <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                    </figure>
                </div>
                    <div class="media-content">
                        <p class="title is-4">{{$tweet->user->name}}</p>
                        <p class="subtitle is-6">{{ '@' . $tweet->user->username }}</p>
                    </div>
            </div>
        </a>
        <div class="content">
            {{$tweet->content}}
            @foreach($tweet->tags as $tag)
                <a href="/tag/{{$tag->id}}">#{{$tag->name}}</a>
            @endforeach
            <br>
            <time datetime="2016-1-1">{{$tweet->created_at->diffForHumans()}}</time>
        </div>
    </div>
    <footer class="card-footer">
        @unless(isset($reply) && $reply === false)
            <a href="/tweet/{{$tweet->id}}" class="card-footer-item">Reply {{$tweet->replies()->count()}}</a>
        @endunless
        <a href="/tweet/{{$tweet->id}}/like" class="card-footer-item">Like {{$tweet->likes()->count()}}</a>
        <a href="/tweet/{{$tweet->id}}/retweet" class="card-footer-item">Retweet</a>
            @auth
                @if($tweet->user->id === Auth::user()->id)
                    <a href="/tweet/{{$tweet->id}}/delete" class="card-footer-item has-text-danger">Delete tweet</a>
                @endif
            @endif
    </footer>
</div>

