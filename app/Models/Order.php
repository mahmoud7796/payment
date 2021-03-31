<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    protected $fillable=['id','order_no','total_amount','offer_id','bank_transaction'];
    protected $hidden =['created_at','updated_at'];
    public $timestamps = false;

    public function orders(){
        $this -> belongsTo(Offer::class,'offer_id','id');
    }
}
