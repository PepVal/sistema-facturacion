<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateStoreTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function CreateStoreTest()
    {
//        $this->visit('admin/tiendas')
//            ->clic('Crear Tienda')
//            ->type('Tienda Zambrano', 'Nombre de la Tienda')
//            ->type('5 Esquinas Centro', 'Dirección')
//            ->press('Guardar')
//            ->seePageId('Tiendas')
//            ->see('Tienda Zambrano  5 Esquinas Centro');

        $response = $this->json('POST', '/admin/tiendas', ['name' => 'Tienda+Zambrano', 'address' => '5+Esquinas+Centro']);
        $response
            ->assertStatus(200)
            ->assertExactJson([
                'success' => 'La tienda "Tienda Zambrano" fue creada con éxito.',
            ]);
    }

}
