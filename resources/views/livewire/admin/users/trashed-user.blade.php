<div class="card">
    <div class="card-header d-flex" style="justify-content: space-between;align-items: center;">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title">لیست کاربران حذف شده</h4>
        </div>
        <div class="input-group w-50">
            <input type="text" class="form-control" placeholder="جستجوی کاربر" aria-label="Amount" wire:model="search">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="ft-search"></i>
                </span>
            </div>
        </div>
        <div class="">
            <a class="btn-warning btn-sm" href="{{ route('admin.users.index') }}">لیست کاربران</a>
        </div>
    </div>
    <div class="card-body">
        <div class="card-block">
            <table class="table table-responsive-md text-center">
                <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>نام کاربر</th>
                        <th>ایمیل</th>
                        <th>شماره تماس</th>
                        <th>وضعیت</th>
                        <th>تاریخ عضویت</th>
                        <th>ویرایش</th>
                        <th>بازگرداندن </th>
                        <th>حذف</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $index => $user)
                        <tr>
                            <td>{{ $users->firstItem() + $index }}</td>

                            <td class="text-truncate">
                                @if (!empty($user->name))
                                    {{ $user->name }}
                                @else
                                    <div class="badge badge-warning">این فیلد وارد نشده</div>
                                @endif
                            </td>
                            <td>{{ $user->email }}</td>
                            <td class="text-truncate">
                                @if (!empty($user->cellphone))
                                    {{ $user->cellphone }}
                                @else
                                    <div class="badge badge-warning">این فیلد وارد نشده</div>
                                @endif
                            </td>

                            <td wire:click="ChangeUserStatus({{ $user->id }})" style="cursor: pointer">
                                @if ($user->status == 1)
                                    <div class="badge badge-success text-white">فعال</div>
                                @else
                                    <div class="badge badge-danger">غیر فعال</div>
                                @endif
                            </td>

                            <td>
                                {{ verta($user->created_at)->format('%d  %B   %Y') }}
                            </td>

                            <td>
                                <a class="btn btn-sm btn-outline-warning mr-1"
                                    href="{{ route('admin.users.edit', ['user' => $user->id]) }}" style="color: #fcac00"
                                    class="p-0" data-original-title="" data-toggle="tooltip" data-placement="top"
                                    title="ویرایشششش">
                                    ویرایش <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                </a>
                            </td>

                            <td>
                                <a style="color:  rgb(40, 208, 148);" class="btn btn-sm btn-outline-success mr-1"
                                    wire:click="restoreUser({{ $user->id }})" class="btn btn-success">بازگردانی <i
                                        class="fa fa-pencil font-medium-3 mr-2"></i></a>
                            </td>

                            <td>
                                <a style="color: #fc0000" class="btn btn-sm btn-outline-danger mr-1" wire:click="forceDeleteUser({{ $user->id }})"
                                    data-original-title="" data-toggle="tooltip" data-placement="top" title="حذف کامل">
                                    حذف <i class="fa fa-trash-o font-medium-3 mr-2"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}



            <style>
                ul.pagination {
                    display: flex;
                    justify-content: center
                }
            </style>
        </div>
    </div>
</div>
@section('script')
    <script>
        window.addEventListener('forceDeleteUser', event => {
            Swal.fire({
                title: 'آیا از حذف مطمئن هستید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله',
                cancelButtonText: 'خیر'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('forceDestroyUser', event.detail.id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })
    </script>
@endsection
