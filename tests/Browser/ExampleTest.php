<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('notes')
            ->clickLink('Create a note')
            ->waitForText('Create a note')
            ->type('note','A new note')
            ->press('Create a note')
            ->waitForText('A new note');
        });
        $this->assertDatabaseHas('notes', [
        'note' => 'A new note'
    ]);
    }
}
