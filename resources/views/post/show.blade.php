@extends('layouts.master',[
    'title' => $post->title,
    'additionalScripts' => ['jsfuck-syntax-highlighter.js']
])
@section('content')
    @include('post.partials.header')
    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 post--container">
                    {!! $post->body !!}
                    <hr>
                </div>
            </div>
            @if(Auth::check())
                <a href="/post/{{$post->id}}/edit" class="btn-site col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">Edit this post</a>
            @endif
        </div>
    </article>
@endsection