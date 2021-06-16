<?php

namespace Tests\Unit;

use App\Invoice;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testName()
    {
        $data = [
            "items"=>[
                "product_id"=>"1",
                "code"=>"P001",
                "description"=>"algo",
                "quantity"=>"1",
                "price"=>"1110.00",
                "subtotal"=>"1110.00"
            ]
        ];
        $response = Invoice::calculateSummary($data['items']);

        $expect = [
            "igv_percent"=>18,
            "subtotal"=>1110,
            "tax"=>199.8,
            "total"=>1309.8,
        ];

        $this->assertEquals($expect['igv_percent'], $response['igv_percent']);

    }


}
