<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function test_object()
    {
          $offers = Offer::get();
        return view('front.indext', compact('offers'));
    }

    public function object($id)
    {
         return $details = Offer::findOrFail($id);
        return view('front.detailst', compact('details'));
    }
}
