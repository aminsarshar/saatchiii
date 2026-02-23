<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class SearchController extends Controller
{
    public function index()
{

    return view('search.index');
}

public function search(Request $request , Product $products)
{
    $attributes = $products->attributes()->with('values')->get();
    $variation = $products->attributes()->with('variationValues')->first();

    $query = $request->input('query');
    // انجام عملیات جستجو بر اساس $query
    // مثلاً از مدل‌ها و دیتابیس برای جستجو استفاده کنید
    $products = Product::where('name', 'like', "%$query%")->where('deleted_at', null)->get();

    return view('search.results', ['results' => $products] , compact('attributes' , 'variation' , 'products'));
}
}
