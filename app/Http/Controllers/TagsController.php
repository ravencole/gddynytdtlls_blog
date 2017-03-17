<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;

class TagsController extends Controller
{
    public function index()
    {
        return view('tag.index', [
            'tags' => Tag::all()->sortBy('name')
        ]);
    }

    public function show(Request $request)
    {
        return view('tag.show', [
            'tag' => Tag::where('name',$request->name)->first(),
            'requestedTagName' => $request->name
        ]);
    }
}
