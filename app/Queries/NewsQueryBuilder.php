<?php

declare(strict_types=1);

namespace App\Queries;


use App\Models\News;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

final class NewsQueryBuilder
{
    private Builder $model;
    public function __construct()
    {
        $this->model = News::query();
    }

    public function getNews(): LengthAwarePaginator
    {
        return $this->model->with('category')->paginate(config('pagination.admin.news'));
    }

    public function getNewsById(int $id): object
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data): News | bool
    {
        return News::create($data);
    }

    public function update(News $news, array $data): bool
    {
        return $news->fill($data)->save();
    }

    public function delete(int $id): bool
    {
        $news = $this->model->find($id);
        return $news->delete();
    }


}
