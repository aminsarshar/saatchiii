<?php

namespace App\Http\Livewire\Admin\Brands;

use App\Models\Brand;
use Livewire\Component;

class TrashedBrand extends Component
{
    public $search;

    public function ChangeBrandStatus($id)
    {
        $brands = Brand::query()->find($id);
        if ($brands->status == 1) {
            $brands->update([
                'status' => 0
            ]);
        } else {
            $brands->update([
                'status' => 1
            ]);
        }
    }

    protected $listeners = [
        'forceDestroyBrand',
        'refreshComponent' => '$refresh'
    ];

    public function forceDeleteBrand($id)
    {
        $this->dispatchBrowserEvent('forceDeleteBrand', ['id' => $id]);
    }

    public function forceDestroyBrand($id)
    {
        Brand::query()->withTrashed()->find($id)->forceDelete();
        $this->emit('refreshComponent');
    }

    public function restoreBrand($id)
    {
        Brand::query()->withTrashed()->find($id)->restore();
        $this->emit('refreshComponent');
    }
    public function render()
    {
        $brands = Brand::query()->where('deleted_at', '!=', null)->where('name', 'like', '%' . $this->search . '%')->onlyTrashed()->paginate(10);
        return view('livewire.admin.brands.trashed-brand', compact('brands'));
    }
}
