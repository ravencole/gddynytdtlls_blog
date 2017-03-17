<?php

namespace App\Queries;

use App\Post;

class HomePageQuery
{
    public static function posts()
    {
        return Post::orderBy('created_at', 'desc')->with('tags')->paginate(15);
    }
}