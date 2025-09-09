<?php

namespace App\Http\Livewire\Admin\Categoryblogs;

use App\Models\CategoryBlog;
use Livewire\Component;

class Categoryblogs extends Component
{
    public $search;
    public function ChangeCategoryStatus($id) {
        $categories = CategoryBlog::query()->find($id);
        if($categories->is_active == 1){
            $categories->update([
                'is_active' => 0
            ]);
        }else{
            $categories->update([
                'is_active' => 1
            ]);
        }
    }

    public function render()
    {
        $categories = CategoryBlog::query()->
        where('name','like','%'.$this->search.'%')->paginate(7);
        return view('livewire.admin.categoryblogs.categoryblogs' , compact('categories'));
    }
}
