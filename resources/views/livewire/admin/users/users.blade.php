<div class="card">
    <div class="card-header d-flex" style="justify-content: space-between;align-items: center;">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title">لیست کاربران</h4>
        </div>
        <div class="input-group w-50">
            <input type="text" class="form-control" placeholder="جستجوی کاربر" aria-label="Amount"
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
                        <th>ایمیل</th>
                        <th>شماره تماس</th>
                        <th>وضعیت</th>
                        <th>تاریخ عضویت</th>
                        <th>ویرایش</th>
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
                            <a class="btn btn-sm btn-outline-warning mr-1" href="{{ route('admin.users.edit', ['user' => $user->id]) }}" style="color: #fcac00" class="p-0"
                                data-original-title="" data-toggle="tooltip" data-placement="top" title="ویرایشششش">
                                ویرایش <i class="fa fa-pencil font-medium-3 mr-2"></i>
                            </a>
                            </td>

                            <td>

                            <form action="{{ route('admin.users.destroy', ['user' => $user->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-outline-danger mr-1" type="submit">حذف <i class="fa fa-trash-o font-medium-3 mr-2"></i></button>
                            </form>
                            </td>

                            {{-- <td style="display: flex">
                                <a href="{{ route('users.edit', $user->id) }}" style="color: #fcac00" class="p-0"
                                    data-original-title="" data-toggle="tooltip" data-placement="top" title="ویرایش">
                                    <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                </a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                    @csrf

                                    @method('delete')
                                    <button style="background: none;border:none" type="submit" class="danger p-0"
                                        data-original-title="" data-toggle="tooltip" data-placement="top"
                                        title="حذف"> <i class="fa fa-trash-o font-medium-3 mr-2"></i></button>
                                </form>

                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
            


            <style>
                ul.pagination{
                    display: flex;
                    justify-content: center
                }
            </style>
        </div>
    </div>
</div>
