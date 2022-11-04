<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    protected $table ='news';
    protected $dates = ['released_at'];
    protected $fillable = ['category_id', 'title', 'description', 'text', 'is_private', 'author', 'image', 'released_at', 'created_at', 'updated_at'];
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}
