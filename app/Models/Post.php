<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{

    protected $fillable = ['title', 'user_id', 'post_date', 'author', 'post_content', 'category_id'];

    public function category(){  
        return $this->BelongsTo('App\Models\Category');
    }

    public function user(){
        return $this->BelongsTo('App\User');  // mi servirà per user_info
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }
}
