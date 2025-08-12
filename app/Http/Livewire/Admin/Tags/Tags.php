<?php

namespace App\Http\Livewire\Admin\Tags;

use App\Models\Tag;
use Livewire\Component;

class Tags extends Component
{
    public $search;
    public function render()
    {
        $tags = Tag::query()->where('name', 'like', '%' . $this->search . '%')->paginate(7);
        return view('livewire.admin.tags.tags', compact('tags'));
    }
}
