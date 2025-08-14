<?php

namespace App\Http\Livewire\Admin\Blogs;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class Blogs extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    public function ChangeBlogStatus($id)
    {
        $blogs = Blog::query()->find($id);
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
        'destroyBlog',
        'refreshComponent' => '$refresh'
    ];

    public function deleteBlog($id)
    {
        $this->dispatchBrowserEvent('deleteBlog', ['id' => $id]);
    }

    public function destroyBlog($id)
    {
        Blog::destroy($id);
        $this->emit('refreshComponent');
    }


    public function render()
    {
        $blogs = Blog::query()->where('title', 'like', '%' . $this->search . '%')->paginate(7);
        return view('livewire.admin.blogs.blogs', compact('blogs'));
    }
}
