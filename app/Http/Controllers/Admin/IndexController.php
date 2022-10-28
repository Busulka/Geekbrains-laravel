<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\News;
use App\Queries\NewsQueryBuilder;
use Illuminate\Contracts\View\{View, Factory};
use Illuminate\Contracts\Foundation\Application;




class IndexController extends Controller
{
    public function index(NewsQueryBuilder $builder): Factory|View|Application
    {
        return view('admin.index', [
            'newsList' => $builder->getAllNews(),
        ]);
    }


    public function test1()
    {
        return response()->download('cat.jpg');
    }

    /*    public function test2(News $news)
        {
            return response()
                ->json($news->getNews())
                ->header('Content-Disposition', 'attachment; filename="json.txt"',)
                ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        }
    }
    */
}
