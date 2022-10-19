<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function create(Request $request, Category $category, News $news)
    {
        if($request->isMethod('post')){
         $request->flash();
         return redirect() ->route('admin.create');
        }

    return view('admin.create', [
        'categories' => $category->getCategories()
    ]);
    }

    public function test1()
    {
        return response()->download('cat.jpg');
    }

    public function test2(News $news)
    {
        return response()->json($news->getNews())
        ->header('Content-Disposition', 'attachment; filename = "json.txt"')
        ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

}
