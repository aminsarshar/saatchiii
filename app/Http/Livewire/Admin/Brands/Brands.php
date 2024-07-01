<?php

namespace App\Http\Livewire\Admin\Brands;

use App\Models\Brand;
use Livewire\Component;

class Brands extends Component
{

    public $search;

    public function ChangeUserStatus($id) {
        $brands = Brand::query()->find($id);
        if($brands->status == 1){
            $brands->update([
                'status' => 0
            ]);
        }else{
            $brands->update([
                'status' => 1
            ]);
        }
    }

    public function render()
    {
        $brands = Brand::query()->
        where('name','like','%'.$this->search.'%')->paginate(7);
        return view('livewire.admin.brands.brands' , compact('brands'));
    }
}