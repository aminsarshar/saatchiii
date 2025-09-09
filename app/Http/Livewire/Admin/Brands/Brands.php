<?php

namespace App\Http\Livewire\Admin\Brands;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class Brands extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

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
        'destroyBrand',
        'refreshComponent' => '$refresh'
    ];

    public function deleteBrand($id)
    {
        $this->dispatchBrowserEvent('deleteBrand', ['id' => $id]);
    }

    public function destroyBrand($id)
    {
        Brand::destroy($id);
        $this->emit('refreshComponent');
    }

    public function render()
    {
        $brands = Brand::query()->where('name', 'like', '%' . $this->search . '%')->paginate(7);
        return view('livewire.admin.brands.brands', compact('brands'));
    }
}
