<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Order;
use Illuminate\Http\Request;
use Auth;

class paymentController extends Controller
{
    public function index()
    {
        $offers = Offer::get();
        return view('front.index', compact('offers'));
    }

        public function orders($id){

            $details = Offer::findOrFail($id);

            if(request('id') && request('resourcePath')){
                    $payment_status = $this -> getPaymentStatus(request('id'),request('resourcePath'));
            if(isset($payment_status['id'])){
                $showSuccessPaymentMessage = true;

                Order::insert([
                'order_no' => $payment_status['id'],
                'total_amount' => $payment_status['amount'],
                'user_id' => Auth::user() -> id,
                'offer_id' => $details->id,
                'bank_transaction_id' => $payment_status['id'],
                ]);

                return view('front.details',compact('details'))-> with(['success' => $showSuccessPaymentMessage]);
            }else{
                $showFailPaymentMessage = true;
                return view('front.details',compact('details'))-> with(['fail' => $showFailPaymentMessage]);

            }

        }
            return view('front.details',compact('details'));


        }


    public function checkout_id(Request $request){

        $url = "https://test.oppwa.com/v1/checkouts";
        $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
            "&amount=". $request -> price .
            "&currency=EUR" .
            "&paymentType=DB";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);

         $res = json_decode($responseData, true);

         $view = view('ajax.form')-> with(['res' => $res, 'id' => $request -> offer_id ])
             -> renderSections();

         return response()-> json([
            'status' => true,
            'content' => $view['main']
         ]);
    }

    private function getPaymentStatus($id, $resourcePath)
    {
        $url = "https://test.oppwa.com/";
        $url .= $resourcePath;
        $url .= "?entityId=8a8294174b7ecb28014b9699220015ca";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        return json_decode($responseData, true);
    }


}
