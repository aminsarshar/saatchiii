<?php

namespace App\Http\Livewire\Admin\Transactions;

use Livewire\Component;
use App\Models\Transaction;

class Transactions extends Component
{
    public $search;

    public function ChangeTransactionStatus($id) {
        $transactions = Transaction::query()->find($id);
        if($transactions->status == 1){
            $transactions->update([
                'status' => 0
            ]);
        }else{
            $transactions->update([
                'status' => 1
            ]);
        }
    }
    public function render()
    {

        $transactions = Transaction::query()->
        where('order_id','like','%'.$this->search.'%')->orderBy('created_at', 'DESC')->paginate(7);
        return view('livewire.admin.transactions.transactions' , compact('transactions'));
    }

}