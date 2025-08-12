<div class="card">
    <div class="card-header d-flex" style="justify-content: space-between;align-items: center;">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title">لیست تگ ها حذف شده</h4>
        </div>

        <div class="input-group w-50">
            <input type="text" class="form-control" placeholder="جستجوی تگ ها حذف شده" aria-label="Amount"
                wire:model="search">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="ft-search"></i>
                </span>
            </div>
        </div>

        <div class="">
            <a class="btn-warning btn-sm" href="{{ route('admin.tags.index') }}">لیست تگ ها</a>
        </div>
    </div>
    <div class="card-body">
        <div class="card-block">
            <table class="table table-responsive-md text-center">
                <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>نام تگ</th>
                        <th>تاریخ ایجاد</th>
                        <th>نمایش</th>
                        <th>ویرایش</th>
                        <th>حذف</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tags as $index => $tag)
                        <tr>
                            <td>{{ $tags->firstItem() + $index }}</td>

                            <td class="text-truncate">
                                {{ $tag->name }}

                            </td>

                            <td>
                                <span class="badge badge-primary">
                                    {{ verta($tag->created_at)->format('%d  %B   %Y') }}
                                </span>

                            </td>

                            <td>
                                <a class="btn btn-sm btn-outline-primary"
                                    href="{{ route('admin.tags.show', ['tag' => $tag->id]) }}">
                                    نمایش <i class="fa fa-eye font-medium-3 mr-2"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-outline-warning mr-1"
                                    href="{{ route('admin.tags.restore', $tag->id) }}"><i
                                        class="fa fa-trash-o font-medium-3 mr-2"></i>بازگرداندن</a>
                            </td>

                            <td>
                                <a class="btn btn-sm btn-outline-danger mr-1"
                                    href="{{ route('admin.tags.delete', $tag->id) }}"><i
                                        class="fa fa-trash-o font-medium-3 mr-2"></i>حذف</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $tags->links() }}
        </div>
    </div>
</div>
