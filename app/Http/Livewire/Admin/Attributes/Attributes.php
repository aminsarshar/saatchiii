<?php

namespace App\Http\Livewire\Admin\Attributes;

use Livewire\Component;
use App\Models\Attribute;

class Attributes extends Component
{
    public $search;


    public function render()
    {
        $attributes = Attribute::query()->
        where('name','like','%'.$this->search.'%')->paginate(7);
        return view('livewire.admin.attributes.attributes' , compact('attributes'));
    }
}
