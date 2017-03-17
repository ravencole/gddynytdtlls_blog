@extends('layouts.master',[
    'title' => $requestedTagName,
    'additionalScripts' => ['tag-search.js']
])
@section('content')
    <header class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1><i>{{ '#'.$requestedTagName }}</i></h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @if($tag && !$tag->posts->isEmpty())
                    @foreach($tag->posts as $post)
                        <div class="post-preview">
                            <a href="/post/{{ $post->id }}">
                                <h2 class="post-title">
                                    {{ $post->title }}
                                </h2>
                                <h3 class="post-subtitle">
                                    {{ $post->present()->preview }}
                                </h3>
                            </a>
                            <p class="post-meta">Posted on {{ $post->present()->timestamp }}</p>
                            <p class="post-meta" style="margin-top: 0; margin-bottom: 0; padding: 0;">
                                @foreach($post->tags as $t)
                                    <a href="{{ $t->present()->tagUrl }}">{{ '#' . $t->name }}</a>
                                @endforeach
                            </p>
                        </div>
                        <hr>              
                    @endforeach
                @else
                    <hr>
                    <div class="tag-error">
                        <h3>Right now, we don't have what you're looking for.</h3>
                        <h3><a href="/tag">Checkout the full tag index</a></h3>
                        <h3>or</h3>
                        <input 
                            id="tagSearch"
                            type="text" 
                            name="search" 
                            placeholder="Search for a different tag" 
                            />
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection