<?php

namespace App\Http\Livewire\Admin\Coupons;

use App\Models\Coupon;
use Livewire\Component;

class Coupons extends Component
{
    public $search;

    public function render()
    {

        $coupons = Coupon::query()->
        where('name','like','%'.$this->search.'%')->orderBy('created_at', 'DESC')->paginate(7);
        return view('livewire.admin.coupons.coupons' , compact('coupons'));
    }
}