<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;

class TrashedProduct extends Component
{
    public $search;
    protected $listeners = [
        'forceDestroyProduct',
        'refreshComponent' => '$refresh'
    ];

    public function forceDeleteProduct($id)
    {
        $this->dispatchBrowserEvent('forceDeleteProduct', ['id' => $id]);
    }

    public function forceDestroyProduct($id)
    {
        Product::query()->withTrashed()->find($id)->forceDelete();
        $this->emit('refreshComponent');
    }

    public function restoreProduct($id)
    {
        Product::query()->withTrashed()->find($id)->restore();
        $this->emit('refreshComponent');
    }

    public function render()
    {
        $products = Product::query()->where('deleted_at', '!=', null)->onlyTrashed()->where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.admin.products.trashed-product' , compact('products'));
    }
}
