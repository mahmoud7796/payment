<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = "offers";
    protected $fillable=['id','title','description','price','created_at','updated_at'];
    protected $hidden =['created_at','updated_at'];
    public $timestamps = false;

    public function orders(){
        $this -> hasOne(Order::class,'offer_id','id');
    }

}
