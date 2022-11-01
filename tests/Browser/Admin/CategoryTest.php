<?php

namespace Tests\Browser\Admin;

use App\Models\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CategoryTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_add_category_page(): void
    {
        $category = Category::factory()->create();

        $this->browse(function ($browser) use ($category) {
            $browser->visit('/admin/news/categories/create')
                ->type('name', $category->name)
                ->type('slug', $category->slug)
                ->press('Создать')
                ->assertPathIs('/admin/news/categories/store');
        });
    }

    public function test_visit_categories_page(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/categories')
                ->assertSee('Cписок категорий');
        });
    }
}
