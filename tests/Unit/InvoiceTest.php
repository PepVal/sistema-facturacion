<?php


use App\InventoryMovement;
use App\Invoice;
use App\InvoiceItem;
use Illuminate\Database\Eloquent\Model;

class InvoiceTest extends \Tests\TestCase
{

    public function testCalculateSummary()
    {
        // Arrange
        $data = [
            [
                "product_id"=>"1",
                "code"=>"P001",
                "description"=>"Encebollado",
                "quantity"=>"1",
                "price"=>"1110.00",
                "subtotal"=>"1110.00"
            ]
        ];
        $expect = [
            "igv_percent"=>18,
            "subtotal"=>1110,
            "tax"=>199.8,
            "total"=>1309.8,
        ];
        // Act
        $response = Invoice::calculateSummary($data);

        // Assert
        $this->assertEquals($expect['igv_percent'], $response['igv_percent']);
        $this->assertEquals($expect['subtotal'], $response['subtotal']);
        $this->assertEquals($expect['tax'], $response['tax']);
        $this->assertEquals($expect['total'], $response['total']);
    }

    public function testDescriptionFor()
    {
        // Arrange
        $datos = new InvoiceItem();
        $datos->product_id="P001";
        $datos->code="0001";
        $datos->description="Pañal";
        $datos->quantity="3";
        $datos->price="5";
        $datos->created_at="2021-06-15 19:40:31";

        $expected = "NUEVA COMPRA DE 3 PRODUCTOS (Pañal) REGISTRADO EL 2021-06-15 19:40:31";

        // Act
        $response = InventoryMovement::descriptionFor('PURCHASE',$datos);

        // Assert
        $this->assertEquals($expected,$response);
    }

}
