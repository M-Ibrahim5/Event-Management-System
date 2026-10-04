<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User; 


class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {

        $this->browse(function (Browser $browser) {
            $browser->visitRoute('login')
                    ->type('email', "averylongemailaddressconsisting
                    ofmorethan255charactersexampleaverylongdomainnam
                    ejusttokeeptheemailaddresslongandextenditfurther
                    tomaketheentirelengthofthisemailaddressexceedthe
                    255characterlimitwhichisrequiredfortestpurposesan
                    ditshouldbesufficientlylongtomeettxQDQWDhecriteri
                    a@example.com")
                    ->type('password', "") 
                    ->screenshot('login')
                    ->press('Login')
                    ->assertPathIs('/') 
                    ->assertSee('Find your next event'); 
        });
    }
}
