<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('name', 'TestBot1')
                    ->type('email', 'testBot1@test.com')
                    ->type('password', '123')
                    ->type('password_confirmation', '123')
                    ->press('Register')
                    ->assertPathIs('/computers');
        });
    }
}
