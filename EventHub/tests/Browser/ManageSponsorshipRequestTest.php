<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ManageSponsorshipRequestTest extends DuskTestCase
{
    public function testManageSponsorshipRequests(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('login')
                ->type('email', 'admin@gmail.com')
                ->type('password', 'abc123')
                ->press('Login')
                ->assertPathIs('/admin')
                ->clickLink('Sponsorship Requests')
                ->assertPathIs('/sponsor2')
                ->assertSee('Sponsorship Requests');
            
            $browser->pause(1000); 
/*            
            $browser->click('#accept')
            ->screenshot('/requests'); 
*/            
            $browser->click('#reject')
            ->screenshot('/requests');  
             
            
            $browser->pause(2000); 
        });
    }
}
