<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;


class Categories extends Component
{
    protected $paginationTheme = 'bootstrap';
    public $search;

    public function ChangeCategoryStatus($id) {
        $categories = Category::query()->find($id);
        if($categories->status == 1){
            $categories->update([
                'status' => 0
            ]);
        }else{
            $categories->update([
                'status' => 1
            ]);
        }
    }
    public function render()
    {
        $categories = Category::query()->
        where('name','like','%'.$this->search.'%')->paginate(7);
        return view('livewire.admin.categories.categories' , compact('categories'));
    }
}