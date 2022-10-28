<?php

namespace App\Http\Controllers\Admin;

use App\Exports\NewsExport;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Maatwebsite\Excel\Facades\Excel;


class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function create(Request $request, Category $category, News $news)
    {
        if ($request->isMethod('post')) {
            $request->flash();
            return redirect()->route('admin.create');
        }
        //     $newsCreated = $request->except('_token');
        //     Storage::disk('local')
        //         ->put('news.json', json_encode($newsCreated, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

        return view('admin.create', [
            'categories' => $category->getCategories()
        ]);
    }

    public function test1()
    {
        return response()->download('cat.jpg');
    }

    public function test2(Request $request, News $news, Category $categories)
    {
        if ($request->isMethod('post')) {
            $request->flash();
            if (!isset($request->all()['typeData'])) {
                return redirect()->route('admin.test2');
            } else {
                if ($request->all()['typeData'] === 'json') {
                    return response()->json($news->getNewsCategoryById((int)$request->all()['category']))
                        ->header('Content-Disposition', 'attachment; filename = "json.txt"')
                        ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
                } else {
                    return Excel::download(new NewsExport, 'news.xlsx');
                }
            }
        }
        return view('admin.test2', [
            'categories' => $categories->getCategories()
        ]);

    }
}
