<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory;

    protected $table = "banners";
    protected $guarded = [];

    public function getIsActiveAttribute($is_active)
    {
        return $is_active ? 'فعال' : 'غیرفعال';
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
