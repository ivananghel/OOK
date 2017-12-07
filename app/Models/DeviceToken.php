<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceToken extends Model {

    protected $fillable = ['token'];

    public function user(){
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
