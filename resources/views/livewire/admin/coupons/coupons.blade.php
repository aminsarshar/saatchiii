<div class="card">
    <div class="card-header d-flex" style="justify-content: space-between;align-items: center;">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title">لیست کدهای تخفیف</h4>
        </div>
        <div class="input-group w-50">
            <input type="text" class="form-control" placeholder="جستجوی کد تخفیف" aria-label="Amount"
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
                        <th>نام کد</th>
                        <th>کد تخفیف</th>
                        <th>نوع کد</th>
                        <th>تاریخ انقضا</th>
                        <th>تاریخ ایجاد</th>
                        <th>نمایش</th>
                        <th>ویرایش</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($coupons as $index => $coupon)
                        <tr>
                            <td>{{ $coupons->firstItem() + $index }}</td>

                            <td class="text-truncate">
                                {{ $coupon->name }}
                            </td>
                            <td>{{ $coupon->code }}</td>

                            <td>{{ $coupon->type }}</td>

                            <td>
                                <span class="badge badge-primary">
                                    {{ verta($coupon->expired_at)->format('%d  %B   %Y') }}
                                </span>
                            </td>

                            <td>
                                <span class="badge badge-warning text-white">
                                    {{ verta($coupon->created_at)->format('%d  %B   %Y') }}
                                </span>
                            </td>

                            <td>
                                <a class="btn btn-sm btn-outline-primary"
                                    href="{{ route('admin.coupons.show', ['coupon' => $coupon->id]) }}">
                                    نمایش <i class="fa fa-eye font-medium-3 mr-2"></i>
                                </a>
                            </td>

                            <td>
                                <a class="btn btn-sm btn-outline-warning mr-1"
                                    href="{{ route('admin.coupons.edit', ['coupon' => $coupon->id]) }}"
                                    style="color: #fcac00" class="p-0" data-original-title="" data-toggle="tooltip"
                                    data-placement="top" title="ویرایشششش">
                                    ویرایش <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $coupons->links() }}



            <style>
                ul.pagination {
                    display: flex;
                    justify-content: center
                }
            </style>
        </div>
    </div>
</div>
