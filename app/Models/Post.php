<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    public function category(){  
        return $this->BelongsTo('App\Models\Category');
    }

    public function user(){
        return $this->belongsTo('App\User');  // mi servirà per user_info
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }
}
