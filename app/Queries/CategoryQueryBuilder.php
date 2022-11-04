<?php
declare(strict_types=1);

namespace App\Queries;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

final class CategoryQueryBuilder
{
    private Builder $model;
    public function __construct()
    {
        $this->model = Category::query();
    }

    public function getCategory(): Collection |LengthAwarePaginator
    {
        return $this->model->with('news')->paginate(config('pagination.admin.category'));
    }

    public function getCategories(): Collection |LengthAwarePaginator
    {
        return $this->model->get();
    }
    public function getCategoryBySlug($slug)
    {
        return $this->model->findOrFail($slug);
    }

    public function getCategoryById(int $id): object
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data): Category | bool
    {
        return Category::create($data);
    }

    public function update(Category $category, array $data): bool
    {
        return $category->fill($data)->save();
    }

    public function delete(int $id): bool
    {
        $category = $this->model->find($id);
        return $category->delete();
    }

}
