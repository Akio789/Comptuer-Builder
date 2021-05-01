<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Motherboard;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MotherboardTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test getting corresponding components in motherboards index.
     *
     * @return void
     */
    public function test_motherboard_index()
    {
        // Mock user logged in
        $user = User::factory()->create();
        Auth::shouldReceive('user')->once()->andReturn($user);
        $this->withoutMiddleware();

        // Create fake db data
        $quantity = 3;
        $factories = Motherboard::factory()->count($quantity)->create();

        // Go to route
        $response = $this->get('/motherboards');

        // Get data sent to the route
        $motherboards = $response->getOriginalContent()->getData()['motherboards'];

        // Assertions
        $response->assertStatus(200);
        $this->assertTrue(count($motherboards) == $quantity);
        $this->assertTrue($factories[0]->name == $motherboards[0]->name);
        $this->assertTrue($factories[1]->name == $motherboards[1]->name);
        $this->assertTrue($factories[2]->name == $motherboards[2]->name);
    }
}
