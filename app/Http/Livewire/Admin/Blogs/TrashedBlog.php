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


    protected $listeners = [
        'forceDestroyBlog',
        'refreshComponent' => '$refresh'
    ];

    public function forceDeleteBlog($id)
    {
        $this->dispatchBrowserEvent('forceDeleteBlog', ['id' => $id]);
    }

    public function forceDestroyBlog($id)
    {
        Blog::query()->withTrashed()->find($id)->forceDelete();
        $this->emit('refreshComponent');
    }

    public function restoreBlog($id)
    {
        Blog::query()->withTrashed()->find($id)->restore();
        $this->emit('refreshComponent');
    }



    public function render()
    {
        $blogs = Blog::query()->where('deleted_at', '!=', null)->where('title', 'like', '%' . $this->search . '%')->onlyTrashed()->paginate(10);
        return view('livewire.admin.blogs.trashed-blog', compact('blogs'));
    }
}
