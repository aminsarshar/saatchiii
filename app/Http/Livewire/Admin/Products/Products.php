<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public $search;

    public function ChangeProductStatus($id)
    {
        $products = Product::query()->find($id);
        if ($products->is_active == 'فعال') {
            $products->update([
                'is_active' => 0
            ]);
        } else {
            $products->update([
                'is_active' => 1
            ]);
        }
    }
    public function render()
    {
        $products = Product::query()->where('name', 'like', '%' . $this->search . '%')->paginate(7);
        return view('livewire.admin.products.products' , compact('products'));
    }
}
