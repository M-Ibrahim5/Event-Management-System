<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteSponsorTest extends DuskTestCase
{
    /**
     * A Dusk test for deleting a sponsor.
     */
    public function testDeleteSponsor(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('login')
                ->type('email', 'admin@gmail.com')
                ->type('password', 'abc123')
                ->press('Login')
                ->assertPathIs('/admin')
                ->clickLink('Sponsorships')
                ->assertPathIs('/sponsors')
                ->press('Delete')
                ->assertSee('Sponsor Deleted Successfully') 
                ->pause(2000); 
        });
    }
}
