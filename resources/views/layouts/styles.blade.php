<link rel="stylesheet" type="text/css" href="/css/app.css">

@if(Cookie::has('theme'))
    <link rel="stylesheet" type="text/css" href="/css/theme-{{ Cookie::get('theme') }}.css">
@else
    <link rel="stylesheet" type="text/css" href="/css/theme-dark.css">
@endif