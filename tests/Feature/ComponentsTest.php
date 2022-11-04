<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class ComponentsTest extends TestCase
{
    public function test_a_menu_view_can_be_rendered()
    {
        $view = $this->blade('<x-menu />');

        $view->assertSee('Главная');
        $view->assertSee('Инфо');
        $view->assertSee('Новости по категориям');
        $view->assertSee('Админка');
        $view->assertSee('/news/category');
        $view->assertSee('/info');
        $view->assertSee('/admin');
    }
}
