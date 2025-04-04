<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class DonationController extends Controller
{
    public function donationView()
{
 return view("donation");
}

public function donation(Request $request)

{
    $donador = auth()->user()->name ?? 'Invitado';

    $provider = new PayPalClient;
    $provider->setApiCredentials(config("paypal"));
    $provider->getAccessToken();
    
    $order = $provider->createOrder([
        "intent"=> "CAPTURE",
        "aplication_context"=>[
            "return_url" =>route("success"),
            "cancel_url"=>route("cancel"),
        ],
        "purchase_units"=> [
         [
            "amount"=> [
            "currency_code"=> "USD",
            "value"=> $request->monto,
            ]
         ]
        ]
            
    ]);
    //dd($order);


    if(isset($order['id']) && $order['id'] != null) 
    {
        foreach($order['links'] as $link) 
        {
           if($link['rel'] == 'approve') {
             session()->put('product_name','Donacion de ' . $donador);
             session()->put('quantity', $request->quantity); 
             return redirect()->away ($link['href']);
            }
        }
    }else
    { 
        return redirect()->route('cancel');
    }
       
        
}

public function success(Request $request)
{

    $provider = new PayPalClient;
    $provider->setApiCredentials(config("paypal"));
    $provider->getAccessToken();

    dd($request->token);
    $response =$provider->capturePaymentOrder();
    dd($response);
}

public function cancel()

{

}
}
