@extends('layouts.master',['title' => 'Login' ])
@section('content')
    <header class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>~ Login ~</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container editor-container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <form method="POST" action="/login">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input 
                            type="text" 
                            name="email" 
                            placeholder="Email"
                            @if(Session::has('error-login-email'))
                                value="{{ Session::get('error-login-email') }}"
                            @endif
                            
                            />
                    </div>
                    <div class="form-group">
                        <input 
                            type="password" 
                            name="password" 
                            placeholder="Password"
                            @if(Session::has('error-login-password'))
                                value="{{ Session::get('error-login-password') }}"
                            @endif
                            
                            />
                    </div>
                    @foreach($errors->all() as $error)
                        <h3 class="error-red">{{ $error }}</h3>
                    @endforeach
                    <div class="form-group">
                        <button type="submit" class="btn-editor btn-submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection