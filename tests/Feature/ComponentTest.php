<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ComponentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test getting corresponding components in components index.
     *
     * @return void
     */
    public function testBasicTest()
    {
        // Mock user logged in
        $user = User::factory()->create();
        Auth::shouldReceive('user')->once()->andReturn($user);
        $this->withoutMiddleware();

        // Create fake db data
        $quantity = 3;
        $factories = Component::factory()->count($quantity)->create();

        // Go to route
        $response = $this->get('/components');

        // Get data sent to the route
        $components = $response->getOriginalContent()->getData()['components'];

        // Assertions
        $response->assertStatus(200);
        $this->assertTrue(count($components) == $quantity);
        $this->assertTrue($factories[0]->name == $components[0]->name);
        $this->assertTrue($factories[1]->name == $components[1]->name);
        $this->assertTrue($factories[2]->name == $components[2]->name);
    }
}
