<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $product_normal_mens = Product::where('category_id', '17', '15')->where('is_active', 1)->where('type', 1)->get()->take(10);
        return view('home.products.show' , compact('product' , 'product_normal_mens'));
    }

}
