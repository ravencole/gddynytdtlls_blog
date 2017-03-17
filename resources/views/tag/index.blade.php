@extends('layouts.master',['title' => 'Tags' ])
@section('content')
    <header class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>~ All Tags ~</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <table class="table table-hover tags-container">
                    <tbody>
                       @foreach($tags as $tag)
                            @if(!$tag->posts->isEmpty())
                                <tr>
                                    <td>
                                        <a href="{{ $tag->present()->tagUrl }}">#{{ $tag->name }}</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection