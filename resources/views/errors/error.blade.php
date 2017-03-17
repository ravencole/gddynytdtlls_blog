@extends('layouts.master',['title' => $statusCode ])
@section('content')
<header class="intro-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    @yield('message')
                </div>
            </div>
        </div>
    </div>
</header>
@endsection