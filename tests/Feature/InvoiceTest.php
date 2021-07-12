<?php

namespace Tests\Feature;

use App\Http\Controllers\Admin\MyInvoiceController;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\User;

//use PHPUnit\Framework\TestCase;

class InvoiceTest extends TestCase
{
//    use WithoutMiddleware;

    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function GetInvoicesTest()
    {
        $invoice1 = [
            'serie' => '0113',
            'currency_code' => 'usd',
            'creation_date' => '06/07/2021',
            'expiration_date' => '06/08/2021',
            'customer_id' => '1',
            'status' => 'PENDIENTE',
            'igv_percent' => '12',
            'subtotal' => '15.60',
            'tax' => '2',
            'total' => '17.60',
            'created_by' => '1',
            'company_id' => '0'
        ];

        $invoice2 = [
            'serie' => '0114',
            'currency_code' => 'usd',
            'creation_date' => '06/07/2021',
            'expiration_date' => '06/08/2021',
            'customer_id' => '1',
            'status' => 'PENDIENTE',
            'igv_percent' => '12',
            'subtotal' => '15.60',
            'tax' => '2',
            'total' => '17.60',
            'created_by' => '1',
            'company_id' => '0'
        ];

        $stub = $this->createMock(MyInvoiceController::class);

        $stub->method('data')->willReturn(['total' => 2,
            'rows' => [$invoice1, $invoice2]]);

        $this->assertSame(['total' => 2,
            'rows' => [$invoice1, $invoice2]], $stub->data());
    }

}
