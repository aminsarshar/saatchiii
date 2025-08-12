<?php

namespace App\Http\Livewire\Admin\Trashed;

use App\Models\Product;
use Livewire\Component;

class TrashedList extends Component
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
        $products = Product::query()->where('deleted_at', '!=', null)->where('deleted_at', '!=', null)->where('name', 'like', '%' . $this->search . '%')->onlyTrashed()->paginate(10);
        return view('livewire.admin.trashed.trashed-list', compact('products'));
    }
}
