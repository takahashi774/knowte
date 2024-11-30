<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['title', 'image', 'consideration', 'post_flg'];

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function user()
    {   
        return $this->belongsTo('App\User');
    }
}
