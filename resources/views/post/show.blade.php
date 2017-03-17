@extends('layouts.master',['title' => $post->title ])
@section('content')
    @include('post.partials.header')
    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    {!! $post->body !!}
                    <hr>
                </div>
            </div>
            <a href="/post/{{$post->id}}/edit" class="btn-site col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">Edit this post</a>
        </div>
    </article>
@endsection