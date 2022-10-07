<div class="card mb-2">
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
            <a href="#">#css</a> <a href="#">#responsive</a>
            <br>
            <time datetime="2016-1-1">{{$tweet->created_at->diffForHumans()}}</time>
        </div>
    </div>
    <footer class="card-footer">
        @unless(isset($reply) && $reply === false)
            <a href="/tweet/{{$tweet->id}}" class="card-footer-item">Reply</a>
        @endunless
        <a href="#" class="card-footer-item">Like</a>
        <a href="#" class="card-footer-item">Retweet</a>
    </footer>
</div>

