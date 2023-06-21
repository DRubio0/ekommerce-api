<?php

namespace Tests\Feature;

use App\Models\Product;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testIndex()
    {
        // Creamos un registro de prueba en la tabla 'roles'
        $role = \App\Models\Roles::factory()->create();

        // Creamos una instancia de UserFactory sin persistir en la base de datos
        $user = UserFactory::new()->make([
            'last_name' => 'Allan',
            'phone' => '50312345678',
            'role_id' => $role->id,
            'image' => 'product.jpg',
        ]);

        // Autenticamos al usuario
        $this->actingAs($user);

        // Creamos algunos productos de prueba
        $product = Product::factory()->count(10)->create();

        // Hacemos una solicitud GET al método index
        $response = $this->get(route('product.index'));

        // Verificamos que la respuesta sea exitosa
        $response->assertSuccessful();

        // Verificamos que se cargue la vista correcta
        $response->assertViewIs('product.index');

        // Verificamos que se pasen los productos a la vista
        $response->assertViewHas('product', $product);

        // Verificamos que se pasen otros datos necesarios a la vista
        $response->assertViewHas(['view', 'name', 'role']);
    }
}
