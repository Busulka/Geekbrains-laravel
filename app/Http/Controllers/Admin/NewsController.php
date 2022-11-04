<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditRequest;
use App\Queries\NewsQueryBuilder;
use Illuminate\Http\RedirectResponse;
use App\Models\{Category, News};

class NewsController extends Controller
{
    public function index(NewsQueryBuilder $builder)
    {
        return view('admin.news.index', [
            'newsList' => $builder->getNews()
        ]);
    }

    public function create(News $news)
    {
        $categories = Category::all();
        return view('admin.news.create', [
            'news' => $news,
            'categories' => $categories
        ]);
    }

    public function store(CreateRequest $request, NewsQueryBuilder $builder): RedirectResponse
    {
        $news = $builder->create(
            $request->validated()
        );

        if($news) {
            return redirect()->route('admin.news.index')->with('success', __('messages.admin.news.create.success'));
        }
        return back()->with('error', __('messages.admin.news.create.fail'));
    }

    public function edit(News $news)
    {
        $categories = Category::all();
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories
        ]);

    }

    public function update(EditRequest $request, News $news, NewsQueryBuilder $builder): RedirectResponse
    {
        if($builder->update(
            $news,
            $request->validated()))
        {
            return redirect()->route('admin.news.index')->with('success', __('messages.admin.news.update.success'));
        }
        return back()->with('error', __('messages.admin.news.update.fail'));

    }

    public function destroy(int $id, NewsQueryBuilder $builder)
    {
        if($builder->delete($id))
            return \response()->json(['ok']);
        return \response()->json(['status' => 'error'], 400);
    }

}
