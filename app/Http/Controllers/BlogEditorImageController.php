<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogEditorImageController extends Controller
{
    public function store(Request $request)
    {
        return response()->json([
            'location' => '/path/to/image.jpeg'
        ]);
    }
}
