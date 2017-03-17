@extends('errors.error',[
    'statusCode' => 503
])
@section('message')
<h6 class="status-code">503</h6>
<div class="status-message">
    <h1>This might have been our bad.</h1>
    <h3><a href="/" class="site-link">Home</a></h3>
</div>
@endsection