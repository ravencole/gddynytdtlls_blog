<?php

namespace App\Presenters;

use App\Post;

class PostPresenter extends Presenter
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function headerImagePath($defaultPostImage)
    {
        if ($this->post->header_img) {
            $path = explode('/',$this->post->header_img);
            array_shift($path);
            array_unshift($path, 'storage');

            return '/'.join('/',$path);
        }
        return $defaultPostImage;
    }

    public function preview()
    {
        return $this->post->post_preview ?
               $this->post->post_preview :
               strip_tags(substr($this->post->body, 0, 200)) . '...';
    }

    public function tagString()
    {
        $tags = [];

        foreach($this->post->tags as $tag) {
            array_push($tags, $tag->name);
        }
        
        return implode(', ', $tags);
    }

    public function timestamp()
    {
        return $this->post->created_at->diffForHumans();
    }
}