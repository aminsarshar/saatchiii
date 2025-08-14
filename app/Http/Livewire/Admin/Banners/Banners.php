<?php

namespace App\Http\Livewire\Admin\Banners;

use App\Models\Banner;
use Livewire\Component;

class Banners extends Component
{
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
    public function render()
    {
        $banners = Banner::query()->
        where('title','like','%'.$this->search.'%')->paginate(7);
        return view('livewire.admin.banners.banners' , compact('banners'));
    }
}
