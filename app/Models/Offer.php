<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = "offers";
    protected $fillable=['id','title','content','user_id','created_at','updated_at'];
    protected $hidden =['created_at','updated_at'];
    public $timestamps = false;

}
