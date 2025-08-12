<?php

namespace App\Http\Livewire\Admin\Blogs;

use App\Models\Blog;
use Livewire\Component;

class TrashedBlog extends Component
{
    public $search;

    public function ChangeBlogStatus($id)
    {
        $blogs = Blog::query()->where('deleted_at', '!=', null)->onlyTrashed()->find($id);
        if ($blogs->is_active == 'فعال') {
            $blogs->update([
                'is_active' => 0
            ]);
        } else {
            $blogs->update([
                'is_active' => 1
            ]);
        }
    }


    public function render()
    {
        $blogs = Blog::query()->where('deleted_at', '!=', null)->where('title', 'like', '%' . $this->search . '%')->onlyTrashed()->paginate(10);
        return view('livewire.admin.blogs.trashed-blog', compact('blogs'));
    }
}
