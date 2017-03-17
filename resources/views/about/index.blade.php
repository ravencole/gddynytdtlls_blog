@extends('layouts.master',[
    'title'=>'About',
    'additionalScripts' => ['about.js']
])
@section('content')
    <header class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading site-heading__about">
                        <h1>~ About ~</h1>
                        <hr>
                        <h2 id="about--main">
                            I <a href="#">graduated</a> from the <a href="#">Sculpture + Extended Media Dept</a> at <a href="#">Virginia Commonwealth University</a> in <a href="#">2014</a>. Since then I've been making <a href="#">kitchens</a>, <a href="#">sculpture</a>, and <a href="#">programs</a> in <a href="#">Philadelphia</a>.
                        </h2>
                        <hr>
                        <h4 data-id="about--skills">
                            Excellent with <a href="#">Javascript</a>, <a href="#">PHP</a>, <a href="#">Unix</a>
                        </h4>
                        <hr>
                        <h4 data-id="about--skills">
                            Proficient with <a href="#">Haskell</a>, <a href="#">C</a>, <a href="#">x86</a>
                        </h4>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection