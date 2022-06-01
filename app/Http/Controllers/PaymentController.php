<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\StripeClient;

class PaymentController extends Controller
{
    public function getSessionId(Request $request){
        $stripe = new StripeClient(env('STRIPE_API_KEY'));
        $checkout = $stripe->checkout->sessions->create([
            'success_url'=>'https://tutigrill.com',
            'cancel_url'=>'https://tutigrill.com',
            'mode'=>'payment',
            'line_items'=>$request->line_items,
        ]);
        return $checkout;
    
    }
}
