@extends('layouts.master',['title' => $tag->name ])
@section('content')
    <header class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1><i>{{ '#'.$tag->name }}</i></h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @foreach($tag->posts as $post)
                    <div class="post-preview">
                        <a href="/post/{{ $post->id }}">
                            <h2 class="post-title">
                                {{ $post->title }}
                            </h2>
                            <h3 class="post-subtitle">
                                @if($post->post_preview)
                                    {{ $post->post_preview }}
                                @else
                                    {{ strip_tags(substr($post->body, 0, 200)) . '...' }}
                                @endif
                            </h3>
                        </a>
                        <p class="post-meta">Posted on {{ $post->created_at->toFormattedDateString() }}</p>
                        <p class="post-meta" style="margin-top: 0; margin-bottom: 0; padding: 0;">
                            @foreach($post->tags as $t)
                                <a href="/tag/{{ $t->name }}">{{ '#' . $t->name }}</a>
                            @endforeach
                        </p>
                    </div>
                    @if(!$loop->last)
                        <hr>
                    @endif
                @endforeach
                <hr>
            </div>
        </div>
    </div>
@endsection