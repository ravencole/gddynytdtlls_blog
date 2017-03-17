@extends('layouts.master',['title' => 'Tags'])

@section('content')
    <header class="intro-header" style="background-image: url('/images/home-bg.jpeg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1><i>Tags</i></h1>
                        <hr class="small">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @foreach($tags as $tag)
                <div class="post-preview">
                    <a href="{{ $tag->path() }}"><h2>{{ $tag->name }}</h2></a>
                </div>
                <hr>
                @endforeach
                <hr>
            </div>
        </div>
    </div>
@endsection
    