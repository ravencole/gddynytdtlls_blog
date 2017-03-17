<?php

namespace App\Presenters;

use App\Tag;

class TagPresenter extends Presenter
{
    protected $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function tagUrl()
    {
        return '/tag/'.$this->tag->name;
    }   
}