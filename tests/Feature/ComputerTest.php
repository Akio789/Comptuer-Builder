<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Computer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ComputerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test getting corresponding public computers.
     *
     * @return void
     */
    public function test_computers_public()
    {
        // Create fake db data
        $private = Computer::factory()->create();
        $public = Computer::factory()->create(['is_public' => true]);

        // Go to route
        $response = $this->get('/');

        // Get data sent to the route
        $publicComputers = $response->getOriginalContent()->getData()['computers'];

        // Assertions
        $response->assertStatus(200);
        $this->assertTrue(count($publicComputers) == 1);
        $this->assertTrue($public->name == $publicComputers[0]->name);
    }
}
