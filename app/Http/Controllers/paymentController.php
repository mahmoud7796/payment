<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class paymentController extends Controller
{
    public function index()
    {
         $offers = Offer::get();
        return view('front.index', compact('offers'));
    }
        public function orders($id){
        $details[] = Offer::get()-> find($id);

            return view('front.details',compact('details'));
        }
}
