<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;

class News
{
    private Category $category;

    private array $news = [
        1 => [
            'id' => 1,
            'title' => 'Новость 1',
            'text' => 'А у нас новость 1 и она очень хорошая про спорт!',
            'isPrivate' => false,
            'category_id' => 1
        ],
        2 => [
            'id' => 2,
            'title' => 'Новость 2',
            'text' => 'А тут плохие новости про политику(((',
            'isPrivate' => false,
            'category_id' => 2
        ],
        '3' => [
            'id' => 3,
            'title' => 'Новость 3',
            'text' => 'Приватная про политику',
            'isPrivate' => true,
            'category_id' => 2
        ],
    ];

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

  //  public function getNews(): array
  //  {
  //      return json_decode(Storage::disk('local')->get('news.json'), true);
  //  }

  //  public function saveNews($news): int
  //  {
  //      $news = $this->getNews();
  //      $id = (array_key_last($newsArray)) + 1;

  //      $news += array(
  //          'id'=> $id,
  //          'isPrivate' => array_key_exists('isPrivate', $news) ? '1' : '0');
  //      $newsArray[] = $news;

  //      Storage::disk('local')->put('news.json',
  //          json_encode($newsArray, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

  //return $id;
  //  }

    public function getNewsByCategorySlug($slug): array
    {
        $id = $this->category->getCategoryIdBySlug($slug);
        $news = [];
        foreach ($this->getNews() as $item) {
            if ($item['category_id'] == $id) {
                $news[] = $item;
            }
        }
        return $news;
    }

    public function getNews(): array
    {
        return $this->news;
    }

    public function getNewsId($id): ?array
    {
        if (array_key_exists($id, $this->getNews())) {
            return $this->getNews()[$id];
        }
        return null;
    }
}
