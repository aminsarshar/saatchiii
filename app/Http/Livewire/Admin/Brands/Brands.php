<?php

namespace App\Http\Livewire\Admin\Brands;

use App\Models\Brand;
use Livewire\Component;

class Brands extends Component
{

    public $search;

    public function ChangeUserStatus($id) {
        $brands = Brand::query()->find($id);
        if($brands->is_active==1){
            $brands->update([
                'is_active' => 0
            ]);
        }else{
            $brands->update([
                'is_active' => 1
            ]);

        }
    }

    // public function Changebrandis_active($id) {
    //     $brands = Brand::query()->find($id);
    //     if($brands->is_active = 1){
    //         $brands->update([
    //             'is_active' => 0
    //         ]);
    //     }else{
    //         $brands->update([
    //             'is_active' => 1
    //         ]);

    //     }

    // }

    public function render()
    {
        $brands = Brand::query()->
        where('name','like','%'.$this->search.'%')->paginate(7);
        return view('livewire.admin.brands.brands' , compact('brands'));
    }
}