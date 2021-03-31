<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $table = "notifications";
    protected $fillable=['id','user_name','user_id','comment','post_id','created_at','updated_at'];
    protected $hidden =['created_at','updated_at'];
    public $timestamps = false;


}
