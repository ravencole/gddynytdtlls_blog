@extends('errors.error',[
    'statusCode' => 404
])
@section('message')
<h6 class="status-code">404</h6>
<div class="status-message">
    <h1>How'd you get here?</h1>
    <h3><a href="/" class="site-link">Try to act right</a></h3>
</div>
@endsection