<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Queries\CategoryQueryBuilder;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;



class CategoriesController extends Controller
{
    public function index(CategoryQueryBuilder $builder){
        return view('news.categories', [
            'categories' => $builder->getCategories()
        ]);

    }

    public function show(string $slug): Factory|View|Application|Collection
    {
        $findValue = Category::where('slug', $slug);
        return view('news.category')
            ->with('category', News::where('category_id', $findValue->value('id'))->get())
            ->with('nameCategory', $findValue->value('title'));
    }

}
