<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
   protected $table	= 'likes';
   protected $fillable = ['user_id', 'post_id', 'like'];
   protected $dates = ['created_at', 'updated_at'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

}
