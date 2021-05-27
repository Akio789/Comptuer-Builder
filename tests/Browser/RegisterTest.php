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
                    ->type('name', 'TestBo3t12223')
                    ->type('email', 'testBo3t12223@test.com')
                    ->type('password', '12')
                    ->type('password_confirmation', '12')
                    ->press('Register')
                    ->assertPathIs('/computers');
        });
    }
}
