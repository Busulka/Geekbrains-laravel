<?php
use Tests\TestCase;

use App\Models\News;

class NewsTest extends TestCase
{

public function test_news_page_returns_a_successful_response()
{
$response = $this->get('/news');

$response->assertStatus(200);
}

public function test_news_article_can_be_rendered()
{
$view = $this->view('news.index', ['news' => [1 => [
    'id' => 1,
    'title' => 'Новость 1',
    'text' => 'А у нас новость 1 и она очень хорошая про спорт!',
    'isPrivate' => false,
    'category_id' => 1
    ]
]]);

$view->assertSee('Новость 1');
}
}

