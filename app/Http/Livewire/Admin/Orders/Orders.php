<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use App\Models\User;
use Livewire\Component;

class Orders extends Component
{
    public $search;

    public function render()
    {
        $user = User::query()->get();

        $orders = Order::query()->
        where('user_id','like','%'.$this->search.'%')->orderBy('created_at', 'DESC')->paginate(7);
        return view('livewire.admin.orders.orders' , compact('orders'));
    }

}