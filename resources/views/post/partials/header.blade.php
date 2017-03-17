<header class="intro-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-heading">
                    <h1>{{ $post->title }}</h1>
                    <p class="post-meta">Published {{ $post->created_at->diffForHumans() }}</p>
                    <p class="post-meta">
                        @foreach($post->tags as $tag)
                            <a href="/tag/{{ $tag->name }}">{{ '#'.$tag->name.' ' }}</a>
                        @endforeach
                    </p>
                </div>
                <hr>
            </div>
        </div>
    </div>
</header>