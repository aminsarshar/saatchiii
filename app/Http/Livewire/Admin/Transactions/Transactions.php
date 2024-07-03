<?php

namespace App\Http\Livewire\Admin\Transactions;

use Livewire\Component;
use App\Models\Transaction;

class Transactions extends Component
{
    public $search;
    public function render()
    {

        $transactions = Transaction::query()->
        where('order_id','like','%'.$this->search.'%')->orderBy('created_at', 'DESC')->paginate(7);
        return view('livewire.admin.transactions.transactions' , compact('transactions'));
    }
}