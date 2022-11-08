<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Category;
use App\Models\News;
use App\Services\Contracts\Parser;
use DateTime;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    private string $link;

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getParseData()
    {
        $xml = XmlParser::load($this->link);

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ],
        ]);

    foreach($data['news'] as $news) {
        $datePublic = (new DateTime($news['pubDate']))->format('Y-m-d H:i:s');

    if(News::query()->where('created_at', '=', $datePublic)->count() != 0) {
    continue;
    }

    if(is_null($news['title']) || is_null($news['description']) || is_null($data['title'])) {
    continue;
    }

    $slugCategory = Str::slug($data['title']);
    Category::query()->firstOrCreate([
        'title' => $data['title'],
        'slug' => $slugCategory,
    ]);

    $categoryID = 11;

    News::query()->firstOrCreate([
        'title' => $news['title'],
        'description' => $news['description'],
        'is_private' => 0,
        'image' => $data['image'],
        'created_at' => $datePublic,
        'updated_at' => $datePublic,
        'category_id' => $categoryID,
    ]);

    }



    }
}
