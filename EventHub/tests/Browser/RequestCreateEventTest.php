<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RequestCreateEventTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('login')
                ->type('email', "ibrahim@gmail.com")
                ->type('password', "abc")
                ->press('Login')
                ->assertPathIs('/')
                ->click('.nav-link') // Click on the dropdown toggle
                ->clickLink('Manage my events') // Click on the link in the dropdown
                ->assertPathIs('/organization')
                ->clickLink('Events')
                ->assertPathIs('/organization/manageEvent')
                ->press('Create Event')
                ->assertPathIs('/organization/manageEvent/createEvent')
                ->attach('imagePath', 'C:\Users\Acer\Downloads\event5.jpeg')
                ->type('eventName', 'Test Event')
                ->type('eventDescription', 'This is a test event.')
                ->type('eventLocation', 'Test Location')
                ->type('eventCategory', 'Test Category')
                ->type('eventStartDate', '13/06/2024')
                ->type('eventStartTime', '10:00 PM')
                ->type('eventEndDate', '13/06/2024')
                ->type('eventEndTime', '11:00 PM')
                ->type('eventPrice', '100')
                ->type('eventCapacity', '50')
                ->pause(4000)
                ->scrollTo('#createEventButton');

            // Scroll to the create event button
            //$browser->script("document.getElementById('createEventButton').scrollIntoView();");

            // Click the create event button
            $browser->pause(1000); // Add a pause to ensure everything is loaded
            $browser->press('#createEventButton');

            // Assert the success message or any indication of event creation
            $browser->pause(2000); // Adjust pause time based on server response time
            $browser->assertPathIs('/organization/manageEvent'); // Ensure redirect to the correct page
            //$browser->assertSee('The event has been successfully created'); // Example success message

            // Optionally, you can also check if the created event details are displayed on the page
            //$browser->assertSee('Test Event');
        });
    }
}
