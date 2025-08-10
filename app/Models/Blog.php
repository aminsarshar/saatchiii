<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = "blogs";
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(CategoryBlog::class);
    }

    public function getIsActiveAttribute($is_active)
    {
        return $is_active ? 'فعال' : 'غیرفعال';
    }

    public function scopeSearch($query)
    {
        $keyword = request()->search;
        if (request()->has('search') && trim($keyword) != '') {
            $query->where('title', 'LIKE', '%' . trim($keyword) . '%');
        }

        return $query;
    }
}
