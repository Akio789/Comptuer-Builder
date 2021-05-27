<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;


class ComponentsTest extends DuskTestCase
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
                  ->visit('/slots/create?motherboard=1')
                    ->click('@slotType')
                    ->click('@RAM')
                    ->press('Continue',10)
                    ->click('@select')
                    ->click('@DDR3')
                    ->press('Save',10)
                    ->assertPathIs('/motherboards');
        });
    }
}
