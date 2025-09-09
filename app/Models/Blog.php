<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory, SoftDeletes;
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

    public function scopeIsActive($query, $is_active)
    {
        $query->where('is_active', $is_active);
    }

    // protected static function booted()
    // {
    //     static::addGlobalScope('is_active', function ($query) {
    //         $query->where('is_active', 1);
    //     });

    // }
}
