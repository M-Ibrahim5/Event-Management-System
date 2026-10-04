<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Facebook\WebDriver\Exception\NoSuchElementException;

class PurchaseTicketTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            // Step 1: Log in
            $browser->visitRoute('login')
                ->type('email', 'ibrahim@gmail.com')
                ->type('password', 'abc') // Use the actual password
                ->press('Login')
                ->assertPathIs('/'); // Adjust based on your application

            // Step 2: Select the event
            $browser->visitRoute('home')
                ->waitForText('View details')
                ->scrollTo('a.btn.btn-primary') // Scroll to the "View details" button
                ->waitFor('a.btn.btn-primary') // Wait for the "View details" button to be visible
                ->pause(1000) // Wait a bit to ensure it is fully rendered
                ->with('.eh-events', function (Browser $row) {
                    $row->click('a.btn.btn-primary');
                })
                ->waitForLocation('/events/1'); 
                
            // Step 3: Choose the ticket quantity and submit
            $browser->type('#quantity', '1') 
                ->waitFor('#getTicket', 5) 
                ->scrollTo('#getTicket') 
                ->pause(2000) 
                ->click('#getTicket')
                ->pause(5000)
                ->assertSee('Tech Conference') 
                ->assertSee('Pay with card')
                ->type('#email', 'ibrahim@gmail.com')
                ->type('#cardNumber', '4242 4242 4242 4242 ')
                ->type('#cardExpiry', '04 / 25')
                ->type('#cardCvc', '545')
                ->type('#billingName', 'ibrahim')
                ->type('#billingCountry', '@kiruMal')
                ->press('Pay')
                ->pause(5000) 
                ->waitForText('Continue Exploring', 5); 

        });
    }
}
