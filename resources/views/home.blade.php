@extends('layouts.master',['title'=>'Home'])
@section('content')
    <header class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>gddynytdtlls</h1>
                        <hr class="small">
                        <span class="subheading">by Raven Cole</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @foreach($posts as $post)
                    @include('post.partials.post-item')
                    @if(!$loop->last)
                        <hr>
                    @endif
                @endforeach
                <hr>
                <!-- Pager -->
                @component('layouts.pager', ['page' => $posts])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
    