<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddSponsorTest extends DuskTestCase
{
    /**
     * A Dusk test for adding a sponsor.
     */
    public function testAddSponsor(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('login')
                ->type('email', 'admin@gmail.com')
                ->type('password', 'abc123')
                ->press('Login')
                ->assertPathIs('/admin')
                ->clickLink('Sponsorships')
                ->assertPathIs('/sponsors')
                ->clickLink('Add Sponsor')
                ->assertPathIs('/createsponsor')
                ->type('name', 'ASTRO')
                ->type('description', 'sponsoring concert or any event related to music.')
                ->type('amount', '1800')
                ->screenshot('/createsponsor')
                ->press('Add Sponsor')
                ->waitFor('.alert-success')
                ->assertSee('Sponsor Added Successfully') 
                ->screenshot('/sponsors')
                ->pause(2000); 
        });
    }
}
