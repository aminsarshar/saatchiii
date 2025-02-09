<div class="card">
    <div class="card-header d-flex" style="justify-content: space-between;align-items: center;">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title">لیست سفارش</h4>
        </div>
        <div class="input-group w-50">
            <input type="text" class="form-control" placeholder="جستجوی سفارش" aria-label="Amount"
                wire:model="search">
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
                        <th>وضعیت</th>
                        <th>مبلغ سفارش</th>
                        <th>نوع پرداخت</th>
                        <th>وضعیت پرداخت</th>
                        <th>وضعیت سفارش</th>
                        <th>تاریخ سفارش</th>
                        <th>نمایش</th>
                        <th>ویرایش</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($orders as $index => $order)
                        <tr>
                            <td>{{ $orders->firstItem() + $index }}</td>

                            <td class="text-truncate">
                                {{ $order->user->name == null ? 'کاربر' : $order->user->name }}
                            </td>
                            <td>{{ $order->status }}</td>
                            <td class="text-truncate">
                                {{ number_format($order->total_amount) }}
                            </td>


                            <td>
                                {{ $order->payment_type }}
                            </td>

                            <td>
                                {{ $order->payment_status }}
                            </td>

                            <td wire:click="ChangePaymentStage({{$order->id}})" style="cursor: pointer" title="تغییر وضعیت کاربر">
                                @if ($order->payment_stage == 'waiting')
                                    <div class="badge badge-warning text-white">در انتظار بررسی</div>
                                @elseif($order->payment_stage == 'inprogress')
                                    <div class="badge badge-primary">در حال انجام</div>
                                @elseif($order->payment_stage == 'completed')
                                    <div class="badge badge-success">تکمیل شده</div>
                                @elseif($order->payment_stage == 'canceled')
                                    <div class="badge badge-danger">لغو شده</div>
                                @endif
                            </td>


                            <td>
                                {{ verta($order->created_at)->format('%d  %B   %Y') }}
                            </td>

                            <td>
                                <a class="btn btn-sm btn-outline-primary"
                                href="{{ route('admin.orders.show', ['order' => $order->id]) }}">
                                نمایش <i class="fa fa-eye font-medium-3 mr-2"></i>
                            </a>
                            </td>

                            <td>
                            <a class="btn btn-sm btn-outline-warning mr-1" href="{{ route('admin.orders.edit', ['order' => $order->id]) }}" style="color: #fcac00" class="p-0"
                                data-original-title="" data-toggle="tooltip" data-placement="top" title="ویرایشششش">
                                ویرایش <i class="fa fa-pencil font-medium-3 mr-2"></i>
                            </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $orders->links() }}



            <style>
                ul.pagination{
                    display: flex;
                    justify-content: center
                }
            </style>
        </div>
    </div>
</div>
