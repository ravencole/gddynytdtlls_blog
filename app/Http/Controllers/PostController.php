<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only([
            'create',
            'edit',
            'update',
            'store',
            'destroy'
        ]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function edit(Post $post, Request $request)
    {
        return view('post.edit', compact('post'));
    }

    public function show(Post $post, Request $request)
    {
        return view('post.show',compact('post'));
    }

    public function update(Post $post, PostRequest $request)
    {
        $post = $request->persist($post, $request);

        return redirect('post/'.$post->id);
    }

    public function store(PostRequest $request)
    {
        $post = $request->persist(new Post(), $request);

        return redirect('post/'.$post->id);
    }

    public function destroy(Post $post, Request $request)
    {
        Post::destroy($post->id);

        return redirect('/');
    }
}
