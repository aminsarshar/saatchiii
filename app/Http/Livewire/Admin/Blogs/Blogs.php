<?php

namespace App\Http\Livewire\Admin\Blogs;

use App\Models\Blog;
use Livewire\Component;

class Blogs extends Component
{
public $search;

   public function ChangeBlogStatus($id) {
        $blogs = Blog::query()->find($id);
        if($blogs->is_active == 'فعال'){
            $blogs->update([
                'is_active' => 0
            ]);
        }else{
            $blogs->update([
                'is_active' => 1
            ]);
        }
    }

    public function render()
    {
        $blogs = Blog::query()->
        where('title','like','%'.$this->search.'%')->paginate(7);
        return view('livewire.admin.blogs.blogs' , compact('blogs'));
    }
}
