<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    public $search;

    public function ChangeUserStatus($id) {
        $user = User::query()->find($id);
        if($user->status == 1){
            $user->update([
                'status' => 0
            ]);
        }else{
            $user->update([
                'status' => 1
            ]);
        }
    }


    public function render()
    {
        $users = User::query()->
        where('name','like','%'.$this->search.'%')->paginate(7);
        return view('livewire.admin.users.users' , compact('users'));
    }
}