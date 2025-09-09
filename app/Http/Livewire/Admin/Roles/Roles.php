<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Models\Role;
use Livewire\Component;

class Roles extends Component
{
    public $search;

    public function render()
    {
        $roles = Role::query()->
        where('name','like','%'.$this->search.'%')->paginate(7);
        return view('livewire.admin.roles.roles' , compact('roles'));
    }
}