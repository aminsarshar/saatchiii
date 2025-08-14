<?php

namespace App\Http\Livewire\Admin\Banners;

use App\Models\Banner;
use Livewire\Component;

class TrashedBanner extends Component
{
    public $search;

    protected $listeners = [
        'forceDestroyBanner',
        'refreshComponent' => '$refresh'
    ];

    public function forceDeleteBanner($id)
    {
        $this->dispatchBrowserEvent('forceDeleteBanner', ['id' => $id]);
    }

    public function forceDestroyBanner($id)
    {
        Banner::query()->withTrashed()->find($id)->forceDelete();
        $this->emit('refreshComponent');
    }

    public function restoreBanner($id)
    {
        Banner::query()->withTrashed()->find($id)->restore();
        $this->emit('refreshComponent');
    }
    public function render()
    {
        $banners = Banner::query()->where('deleted_at', '!=', null)->onlyTrashed()->where('title', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.admin.banners.trashed-banner' , compact('banners'));
    }
}
