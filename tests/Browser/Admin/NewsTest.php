<?php

namespace Tests\Browser\Admin;

use App\Models\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_add_news_page(): void
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->select('category_id', '1')
                ->type('title', 'Random title')
                ->type('text', 'texty text text')
                ->type('author', 'Me')
                ->type('release_date', '22/12/2022 12:59')
                ->checkbox('is_private', 'true')
                ->press('Создать')
                ->assertSee('The description field is required.');

        });
    }

}
