<?php

namespace Tests\Feature;

use App\Http\Controllers\Admin\MyInvoiceController;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\User;

//use PHPUnit\Framework\TestCase;

class CreateStoreTest extends TestCase
{
//    use WithoutMiddleware;

    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function CreateStoreTest()
    {
        $stub = $this->createMock(MyInvoiceController::class);

        $stub->method('data')->willReturn(['total' => 5,
            'rows' => [1, 2, 3, 4, 5]]);

        $this->assertSame(['total' => 5,
            'rows' => [1, 2, 3, 4, 5]], $stub->data());
    }

    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function testName()
    {
        $response = $this->json('POST', '/admin/tiendas', ['name' => 'Tienda+Zambrano', 'address' => '5+Esquinas+Centro']);

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'success' => 'La tienda "Tienda Zambrano" fue creada con éxito.',
            ]);
    }


}
