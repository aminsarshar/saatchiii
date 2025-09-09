<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;

class TrashedUser extends Component
{
    public $search;

    protected $listeners = [
        'forceDestroyUser',
        'refreshComponent' => '$refresh'
    ];

    public function forceDeleteUser($id)
    {
        $this->dispatchBrowserEvent('forceDeleteUser', ['id' => $id]);
    }

    public function forceDestroyUser($id)
    {
        User::query()->withTrashed()->find($id)->forceDelete();
        $this->emit('refreshComponent');
    }

    public function restoreUser($id)
    {
        User::query()->withTrashed()->find($id)->restore();
        $this->emit('refreshComponent');
    }
    public function render()
    {
        $users = User::query()->where('deleted_at', '!=', null)->onlyTrashed()->where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.admin.users.trashed-user' , compact('users'));
    }
}
