<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug'];

    public function news() {
        return $this->hasMany(News::class);
    }

    public function getCategories(): array
    {
        return DB::table('categories')->get()->toArray();
    }

    public function getSlugById($id)
    {
        return DB::table('categories')->where('id', '=', $id)->value('slug');
    }

    public function getCategoryNameBySlug($slug)
    {
        return DB::table('categories')->where('slug', '=', $slug)->value('title');
    }

    public function getIdCategoryBySlug($slug)
    {
        return DB::table('categories')->where('slug', '=', $slug)->value('id');
    }

}
