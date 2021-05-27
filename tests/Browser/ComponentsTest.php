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
                  ->visit('/computers')
                    ->click('@AddC',10)
                    ->click('@comp')
                    ->click('@1')
                    ->press('add')
                    ->assertPathIs('/computers');
        });
    }
}
