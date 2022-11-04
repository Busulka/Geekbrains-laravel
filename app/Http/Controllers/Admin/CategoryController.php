<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CreateRequest;
use App\Http\Requests\Categories\EditRequest;
use App\Models\Category;
use App\Queries\CategoryQueryBuilder;
use Illuminate\Http\RedirectResponse;




class CategoryController extends Controller
{

    public function index(CategoryQueryBuilder $builder)    {

        return view('admin.categories.index', [
            'categories' => $builder->getCategories()
        ]);

    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CreateRequest $request, CategoryQueryBuilder $builder) : RedirectResponse
    {
        $category = $builder->create(
            $request->validated());
        if($category->save()) {
            return redirect()->route('admin.categories.index')->with('success', 'Запись успешно добавлена');
        }
        return back()->with('error', 'Не удалось добавить запись');
    }

    public function edit(Category $category)
    {

        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(EditRequest $request, Category $category, CategoryQueryBuilder $builder) : RedirectResponse
    {

        $category = $category->fill($request->validated());

        if($category->save()) {

            return redirect()->route('admin.categories.index')->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обно вить запись');
    }


    public function destroy(Category $category)
    {
        dump($category);
    }

}
