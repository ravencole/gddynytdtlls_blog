<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Tag;

class PostController extends Controller
{
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

    public function update(Post $post, Request $request)
    {
        $post = $this->persist($post, $request);

        return redirect('post/'.$post->id);
    }

    public function store(Request $request)
    {
        $post = $this->persist(new Post(), $request);

        return redirect('post/'.$post->id);
    }

    public function destroy(Post $post, Request $request)
    {
        Post::destroy($post->id);

        return redirect('/');
    }

    private function persist(Post $post, Request $request)
    {
        $post->title = $request->title;

        $post->body = $request->body;

        if ($request->post_preview) {
            $post->post_preview = $request->post_preview;
        }

        if ($request->file('header_image')) {
            $post->header_img = $request->file('header_image')->store('public/images');
        }

        $post->save();

        $this->attachTags($post, $request);

        return $post;
    }

    private function attachTags(Post $post, Request $request)
    {
        $post->tags()->detach();

        if ($request->tags) {
            foreach(explode(",",$request->tags) as $tag) {
                $post->tags()
                     ->attach(Tag::firstOrCreate(['name' => trim($tag)])->id);
            }
        }
    }
}
