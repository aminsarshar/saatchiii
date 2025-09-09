<?php

namespace App\Http\Livewire\Admin\Tags;

use App\Models\Tag;
use Livewire\Component;

class TrashedTag extends Component
{
    public $search;

    protected $listeners = [
        'forceDestroyTag',
        'refreshComponent' => '$refresh'
    ];

    public function forceDeleteTag($id)
    {
        $this->dispatchBrowserEvent('forceDeleteTag', ['id' => $id]);
    }

    public function forceDestroyTag($id)
    {
        Tag::query()->withTrashed()->find($id)->forceDelete();
        $this->emit('refreshComponent');
    }

    public function restoreTag($id)
    {
        Tag::query()->withTrashed()->find($id)->restore();
        $this->emit('refreshComponent');
    }
    public function render()
    {
        $tags = Tag::query()->where('deleted_at', '!=', null)->onlyTrashed()->where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.admin.tags.trashed-tag', compact('tags'));
    }
}
