<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\datas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class mailTest extends Controller
{
/*    public function data(){
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
    }*/


    public function mail_sent(){
         $emails = datas::select('emails')->get();
        foreach ($emails as $v) {
         Mail::to($v-> emails)->send(new TestMail());
            //echo $v->emails;
        }
    }

}
