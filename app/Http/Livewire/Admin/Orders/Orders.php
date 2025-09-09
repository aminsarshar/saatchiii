<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use App\Models\User;
use Livewire\Component;

class Orders extends Component
{
    public $search;

    public function ChangePaymentStage($id) {
        $orders = Order::query()->find($id);
        if($orders->payment_stage=='waiting'){
            $orders->update([
                'payment_stage' => 'inprogress'
            ]);

        }elseif($orders->payment_stage=='inprogress'){
            $orders->update([
                'payment_stage' => 'completed'
            ]);
        }elseif($orders->payment_stage=='canceled'){
            $orders->update([
                'payment_stage' => 'waiting'
            ]);
        }elseif($orders->payment_stage=='completed'){
            $orders->update([
                'payment_stage' => 'canceled'
            ]);
        }
    }



    public function render()
    {
        $user = User::query()->get();

        $orders = Order::query()->
        where('user_id','like','%'.$this->search.'%')->orderBy('created_at', 'DESC')->paginate(7);
        return view('livewire.admin.orders.orders' , compact('orders'));
    }

}