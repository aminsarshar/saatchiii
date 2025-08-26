<div class="card">
    <div class="card-header d-flex" style="justify-content: space-between;align-items: center;">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title">لیست تراکنش</h4>
        </div>
        <div class="input-group w-50">
            <input type="text" class="form-control" placeholder="جستجوی تراکنش" aria-label="Amount" wire:model="search">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="ft-search"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="card-block">
            <table class="table table-responsive-md text-center">
                <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>نام کاربر</th>
                        <th>شماره سفارش</th>
                        <th>مبلغ</th>
                        <th>ref_id</th>
                        <th>نام درگاه پرداخت</th>
                        <th>وضعیت</th>
                        <th>تاریخ تراکنش</th>
                        <th>نمایش</th>
                        <th>ویرایش</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($transactions as $index => $transaction)
                        <tr>
                            <td>{{ $transactions->firstItem() + $index }}</td>

                            <td class="text-truncate">
                                {{ $transaction->user->name == null ? 'کاربر' : $transaction->user->name }}
                            </td>

                            <td>
                                {{ $transaction->order_id }}
                            </td>

                            <td class="text-truncate">
                                {{ number_format($transaction->amount) }}
                            </td>

                            <td>
                                {{ $transaction->ref_id }}
                            </td>

                            <td>
                                {{ $transaction->gateway_name }}
                            </td>

                            <td wire:click="ChangeTransactionStatus({{ $transaction->id }})" style="cursor: pointer">
                                @if ($transaction->status == 1)
                                    <div class="badge badge-success text-white">فعال</div>
                                @else
                                    <div class="badge badge-danger">غیر فعال</div>
                                @endif
                            </td>

                            <td>
                                <span
                                    class="badge badge-primary">{{ verta($transaction->created_at)->format('%d  %B   %Y') }}</span>
                            </td>

                            <td>
                                <a class="btn btn-sm btn-outline-primary"
                                    href="{{ route('admin.transactions.show', ['transaction' => $transaction->id]) }}">
                                    نمایش <i class="fa fa-eye font-medium-3 mr-2"></i>
                                </a>
                            </td>

                            <td>
                                <a class="btn btn-sm btn-outline-warning mr-1"
                                    href="{{ route('admin.transactions.edit', ['transaction' => $transaction->id]) }}"
                                    style="color: #fcac00" class="p-0" data-original-title="" data-toggle="tooltip"
                                    data-placement="top" title="ویرایشششش">
                                    ویرایش <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $transactions->links() }}



            <style>
                ul.pagination {
                    display: flex;
                    justify-content: center
                }
            </style>
        </div>
    </div>
</div>
