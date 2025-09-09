<?php

namespace App\Http\Livewire\Admin\Banners;

use App\Models\Banner;
use Livewire\Component;
use Livewire\WithPagination;

class Banners extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;

    public function ChangeBannerStatus($id)
    {
        $banners = Banner::query()->find($id);
        if ($banners->is_active == 'فعال') {
            $banners->update([
                'is_active' => 0
            ]);
        } else {
            $banners->update([
                'is_active' => 1
            ]);
        }
    }


    protected $listeners = [
        'destroyBanner',
        'refreshComponent' => '$refresh'
    ];

    public function deleteBanner($id)
    {
        $this->dispatchBrowserEvent('deleteBanner', ['id' => $id]);
    }

    public function destroyBanner($id)
    {
        Banner::destroy($id);
        $this->emit('refreshComponent');
    }
    public function render()
    {
        $banners = Banner::query()->where('title', 'like', '%' . $this->search . '%')->paginate(7);
        return view('livewire.admin.banners.banners', compact('banners'));
    }
}
