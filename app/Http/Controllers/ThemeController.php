<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;


class ThemeController extends Controller
{
    public function index()
    {
        return view('theme.index');
    }

    public function store(Request $request)
    {
        return redirect('/theme')->withCookie(cookie()->forever('theme',$request->theme));
    }
}
