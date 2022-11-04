<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Queries\NewsQueryBuilder;


class NewsController extends Controller
{
    public function index(NewsQueryBuilder $builder)
    {
        return view('news.index', [
            'news' => $builder->getNews(),
        ]);
    }

    public function show(int $id)
    {
        return view('news.one')->with('news', News::findOrFail($id));
    }
}
