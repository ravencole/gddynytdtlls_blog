<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\TagPresenter;

class Tag extends Model
{
    protected $guarded = [];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function path() 
    {
        return "/tag/".$this->name;
    }

    public function present()
    {
        return new TagPresenter($this);
    }
}
