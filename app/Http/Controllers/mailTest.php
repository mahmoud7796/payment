<?php

namespace App\Http\Controllers;

use App\Models\datas;
use Illuminate\Http\Request;

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

  /*      datas::create([
           'emails' => 'mahmoud_diab@yahoo.com',
        ]);*/
    }


    public function mail_sent(){


    }

}
