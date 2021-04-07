<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\datas;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class mailTest extends Controller
{
   public function data(){
        datas::where('emails','kapoo9595@gmail.com')->chunk(1, function($datas)
        {
            foreach ($datas as $data)
            {
                $data-> insert([
                   'emails' =>  'kapoo9595@gmail.com',
                ]);
            }
        });

       datas::create([
           'emails' => 'mahmoud_diab@yahoo.com',
        ]);
    }

    public function mail_sent(){
        return $emails = datas::select('emails')->get();

       foreach ($emails as $v) {
           echo  $v -> emails;
        // Mail::to($v-> emails)->send(new TestMail());
        }
    }

     public function coll(){
         $arr = ['name', 'age', 'title','address'];
           $coll = collect($arr);
             $collection =  $coll -> combine(['mahmoud',24,'assuit','assuit']);
           $coll->countBy();
          $nums =  datas::get();
        return $nums -> countBy('emails');
           $res =  collect($num);
          $res -> countBy();
        // return $num -> countBy($num);
     }

    public function complex1(){

        $nums =  datas::get();
        $coll=  collect($nums);
       $each = $coll -> each(function($category){
           if($category-> emails == 'kapoo9595@gmail.com'){
               unset($category -> emails);   //remove from the collection
           }
             //unset($category -> emails);   //remove from the collection
           //$category -> emails  = 'add something'; // replace the value of the key
        });
        return $nums;
    }

    public function complex(){

        $nums =  datas::get();
          $coll=  collect($nums);
         $filter =  $coll -> filter(function ($value, $key){
            return  $value['emails'] == 'mahmoud12@gmail.com';
        });
         $array = array_values($filter-> all())[0];
        return  $array['emails'];
    }

    public function complexTransform(){

        $nums =  datas::get();
        $coll=  collect($nums);
       return  $transform =  $coll -> transform(function ($value, $key){

           return $value['emails'];
           //add  Keys and value you want
           $data = [];
           $data['betengan'] = $value['emails'];
           $data['name'] = 'mahmoud diab diab';
            return $data;
        });
        $array = array_values($filter-> all())[0];
        return  $array['emails'];
    }

    public function form(){
       return view('date');



    }


}
