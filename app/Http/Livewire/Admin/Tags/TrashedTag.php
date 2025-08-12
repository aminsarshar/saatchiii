<?php

namespace App\Http\Livewire\Admin\Tags;

use App\Models\Tag;
use Livewire\Component;

class TrashedTag extends Component
{
    public $search;

    public function render()
    {
        $tags = Tag::query()->where('deleted_at', '!=', null)->where('name', 'like', '%' . $this->search . '%')->onlyTrashed()->paginate(10);
        return view('livewire.admin.tags.trashed-tag', compact('tags'));
    }
}
