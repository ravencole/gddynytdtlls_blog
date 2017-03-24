<!DOCTYPE html>
<html>
<head>
    @include('layouts.header',['title'=>'Themes'])
</head>
<body>
    @include('layouts.nav')
    <header class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>~ Themes ~</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 theme--container">
                @foreach(config('view.themes') as $theme)
                    <div class="theme--item">
                        <h1>{{ $theme }}</h1>
                        <img width="100%" src="/storage/images/theme-{{ $theme }}.png" />
                        <form method="POST" action="/theme">
                            {{ csrf_field() }}
                            <input type="hidden" name="theme" value="{{ $theme }}" />
                            <button type="submit" class="btn-theme__submit">
                                {{ $theme }} theme
                            </button>
                        </form>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
    @include('layouts.footer')
</body>
</html>