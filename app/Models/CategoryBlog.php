<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBlog extends Model
{
    use HasFactory;
    protected $table = "category_blogs";
    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(CategoryBlog::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(CategoryBlog::class, 'parent_id');
    }

    public function blogs()
    {

        return $this->hasMany(Blog::class);
    }
}
