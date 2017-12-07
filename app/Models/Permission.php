<?php 
namespace App\Models;

use Illuminate\Support\Facades\Validator;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission {

    public $timestamps = true;
    protected $table = 'permissions';
    protected $fillable = ['name', 'display_name', 'description'];
    protected $dates = ['created_at', 'updated_at'];

    public static function boot(){
        // Saving event handler
        self::saving(function(Permission $permission){
            $validator = Validator::make($permission->attributes, [
                'name' => 'required|string|min:4|max:255|'
            ]);
        });
    }

}