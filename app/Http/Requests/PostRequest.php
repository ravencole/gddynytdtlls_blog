<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Tag;
use App\Post;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'body' => 'required'
        ];
    }

    public function persist(Post $post, $request)
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

    private function attachTags(Post $post, $request)
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
