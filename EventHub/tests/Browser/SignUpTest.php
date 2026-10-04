<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SignUpTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('signup')
                    ->type('fname', 'averylongemailaddressconsistingofmorethan255charactersexampleaverylongdomainnamejusttokeeptheemailaddresslongandextenditfurthertomaketheentirelengthofthisemailaddressexceedthe255characterlimitwhichisrequiredfortestpurposesanditshouldbesufficientlylongtomeettxQDQWDhecriteria@example.com
') 
                    ->type('lname', 'averylongemailaddressconsistingofmorethan255charactersexampleaverylongdomainnamejusttokeeptheemailaddresslongandextenditfurthertomaketheentirelengthofthisemailaddressexceedthe255characterlimitwhichisrequiredfortestpurposesanditshouldbesufficientlylongtomeettxQDQWDhecriteria@example.com
')
                    ->type('email', 'averylongemailaddressconsistingofmorethan255charactersexampleaverylongdomainnamejusttokeeptheemailaddresslongandextenditfurthertomaketheentirelengthofthisemailaddressexceedthe255characterlimitwhichisrequiredfortestpurposesanditshouldbesufficientlylongtomeettxQDQWDhecriteria@example.com
')
                    ->type('password', 'averylongemailaddressconsistingofmorethan255charactersexampleaverylongdomainnamejusttokeeptheemailaddresslongandextenditfurthertomaketheentirelengthofthisemailaddressexceedthe255characterlimitwhichisrequiredfortestpurposesanditshouldbesufficientlylongtomeettxQDQWDhecriteria@example.com
')
                    ->screenshot('signup')
                    ->press('.btn.btn-dark') 
                    ->assertPathIs('/login'); 
        });
    }
}


/* ->type('email', "")
                    ->type('password', "")
                    ->press('Login')
                    ->assertPathIs('/') 
                    ->assertSee('Find your next event') */