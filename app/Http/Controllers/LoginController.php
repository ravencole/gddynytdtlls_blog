<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\SessionErrors\LoginSessionError;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->only(['index']);
    }

    public function index()
    {
        return view('session.login');
    }

    public function store(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/');
        }

        $errors = LoginSessionError::handle($request, [
            'wrong creds' => 'No, no. Not even close.'
        ]);

        return back()->withErrors($errors);
    }

    public function destroy()
    {
        if(!Auth::check()) {
            return view('errors.403')->withStatus(302);
        }

        Auth::logout();
        return back();
    }
}
