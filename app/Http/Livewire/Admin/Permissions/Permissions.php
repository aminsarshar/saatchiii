<?php

namespace App\Http\Livewire\Admin\Permissions;

use Livewire\Component;
use App\Models\Permission;

class Permissions extends Component
{
    public $search;

    public function render()
    {
        $permissions = Permission::query()->
        where('name','like','%'.$this->search.'%')->paginate(7);
        return view('livewire.admin.permissions.permissions' , compact('permissions'));
    }
}