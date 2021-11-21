<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{

    protected $fillable = ['title', 'user_id', 'post_date', 'author', 'post_content', 'category_id', 'image_url'];

    public function category(){
        return $this->BelongsTo('App\Models\Category');
    }

    public function author(){
         return $this->BelongsTo('App\User', 'user_id');  // mi servirà per utilizzare author al posto di user_id
    }

    public function user(){
        return $this->belongsTo('App\User');  // mi servirà per user_info
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }

}
