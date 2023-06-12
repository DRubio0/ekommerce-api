<?php

namespace Tests\Unit;

use App\Http\Controllers\UserController;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Prueba para mostrar un usuario.
     *
     * @return void
     */
    public function testShowUser()
    {
        $role = Roles::factory()->create();
        $user = User::factory()->create(['last_name' => '', 'phone' => '', 'role_id' => $role->id]);

        $response = $this->get('/users/' . $user->id);

        $response->assertStatus(200)
            ->assertJson([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'last_name' => $user->last_name,
                'role_id' => $user->role_id,
            ]);
    }

}