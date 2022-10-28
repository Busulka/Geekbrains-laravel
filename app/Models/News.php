<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'title', 'description', 'text', 'is_private', 'image', 'created_at', 'updated_at'];

    public function category(): Model|BelongsTo|null
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
