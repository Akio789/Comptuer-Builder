<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class DataBaseNoEmptyTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        
        $this->browse(function ($browser) {
            $browser->loginAs(User::find(1))
                  ->visit('/computers/create')
                    ->type('name',"Test1")
                    ->click('@motherboard')
                    ->click('@1')
                    ->press('Store')
                    ->assertSee('Total');
        });
        
           /*
        visit('/login')
                    ->type('email', 'testBot0@test.com')
                    ->type('password', '12345')
                    ->press('Login')
                    ->assertSee('RAM');

                /*
                    ->click('@NC')
                    ->type('name',"Test1")
                    ->click('@motherboard')
                    ->click('@1')
                    ->press('Store')
                    ->assertSee('Total');

            
                    ->type('description', '')
                    ->press('')
                    ->waitForText('',10)
                    ->assertSee('RAM');
                */

    }
}
