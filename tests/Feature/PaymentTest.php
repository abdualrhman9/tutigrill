<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertNotNull;

class PaymentTest extends TestCase
{
    /** @test */
    public function getSessionId(){
        $this->withoutExceptionHandling();
        $response = $this->post('getSessionId',$this->getData());
        dump($response->getData());
        // assertNotNull($response);
    }

    private function getData(){
        return [
            'success_url'=>'https://tutigrill.com',
            'cancel_url'=>'https://tutigrill.com',
            'line_items'=>[
                [
                    'price_data'=>[
                        'currency'=>'usd',
                        'unit_amount'=>500,
                        'product_data'=>[
                            'name'=>'Cool Stripe Checkout',
                        ]
                    ],
                    'quantity'=>1,
                ],
            ],
    
            'mode'=>'payment'
        ];
    }
}
