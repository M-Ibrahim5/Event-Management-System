<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteEventTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testDeleteEvent(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('login')
                ->type('email', 'ibrahim@gmail.com')
                ->type('password', 'abc')
                ->press('Login')
                ->assertPathIs('/')
                ->click('.nav-link') 
                ->clickLink('Manage my events') 
                ->assertPathIs('/organization')
                ->clickLink('Events')
                ->assertPathIs('/organization/manageEvent')
                ->click('.table tbody tr:last-child .btn-danger')
                ->whenAvailable('.modal.fade.show', function ($modal) {
                    $modal->click('.btn-danger'); 
                })
                ->pause(2000)
                ->waitFor('.alert-success')
                ->assertSee('The event has been successfully deleted') 
                ->pause(2000) ; 
        });
    }
}
