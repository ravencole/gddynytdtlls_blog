<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\PostPresenter;

class Post extends Model
{
    protected $guarded = [];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    
    public function present()
    {
        return new PostPresenter($this);
    }
}
