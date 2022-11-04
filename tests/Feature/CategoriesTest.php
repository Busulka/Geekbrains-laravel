<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoriesTest extends TestCase
{
    public function test_the_category_list_returns_a_successful_response()
    {
        $response = $this->get('/news/category');

        $response->assertStatus(200);
    }

    public function test_the_category_one_returns_a_successful_response()
    {
        $response = $this->get('/news/category/test-category');

        $response->assertStatus(200);
    }

    public function test_the_news_one_returns_a_successful_response()
    {
        $response = $this->get('/news/category/test-category/15');

        $response->assertStatus(200);
    }

    public function test_a_categories_list_view_can_be_rendered()
    {
        $category = (object) [
            'id' => 865,
            'title' => 'Test category',
            'slug' => 'slug',
        ];

        $view = $this->view('pages.news.categories', ['categories' => [$category]]);

        $view->assertSee('Test category');
        $view->assertSee('/news/category/slug');
    }

    public function test_a_categories_list_view_empty_categories()
    {
        $view = $this->view('pages.news.categories', ['categories' => []]);

        $view->assertSee('Нет категорий новостей для просмотра.');
    }
}
