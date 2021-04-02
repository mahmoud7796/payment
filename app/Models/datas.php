<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class datas extends Model
{
    protected  $table = "data";
    protected $fillable=['id','emails','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = false;



}
