<?php

namespace Tests\Unit;

use App\InventoryMovement;
use App\Invoice;
use App\InvoiceItem;
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

    public function testDescriptionFor()
    {
        $datos = new InvoiceItem();
        $datos->product_id="P001";
        $datos->code="0001";
        $datos->description="Pañal";
        $datos->quantity="3";
        $datos->price="5";
        $datos->created_at="2021-06-15 19:40:31";
        $data =  [
            "items" =>[
                "product_id"=>"P001",
                "code"=>"0001",
                "description"=>"Pañal",
                "quantity"=>"3",
                "price"=>"5",
                "created_at"=>"2021-06-15 19:40:31"
            ]
        ];
        $response = InventoryMovement::descriptionFor('PURCHASE',$datos);

        $expected = "NUEVA COMPRA DE 3 PRODUCTOS (Pañal) REGISTRADO EL 2021-06-15 19:40:31";

        $this->assertEquals($expected,$response);
    }


}
