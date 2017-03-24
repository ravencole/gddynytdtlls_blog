@extends('errors.error',[
    'statusCode' => 403
])
@section('message')
<h6 class="status-code">403</h6>
<div class="status-message">
    <h1>Might wanna log in, doug</h1>
    <h3><a href="/login" class="site-link">Try to act right</a></h3>
</div>
@endsection