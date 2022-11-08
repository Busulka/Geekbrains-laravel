<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];
    protected $table = 'categories';

    public $timestamps = false;


    public function news() {
        return $this->hasMany(News::class, 'category_id', 'id');
    }

}
