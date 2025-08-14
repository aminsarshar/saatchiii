<div class="card">
    @if ($tags->isNotEmpty())
        <div class="card-header d-flex" style="justify-content: space-between;align-items: center;">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title">لیست تگ ها حذف شده ({{ $tags->count() }})</h4>
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
                                    <a wire:click="restoreTag({{ $tag->id }})"
                                        class="btn btn-success">بازگردانی</a>
                                </td>

                                <td>
                                    <a class="btn btn-danger mr-2" wire:click="forceDeleteTag({{ $tag->id }})"
                                        data-original-title="" data-toggle="tooltip" data-placement="top"
                                        title="حذف کامل">
                                        حذف
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $tags->links() }} --}}
                {{ $tags->appends(Request::except('page'))->links('pagination::bootstrap-4') }}
            </div>
        </div>
    @else
    <div class="card-header d-block w-100" style="justify-content: space-between;align-items: center;">
        <div class="alert alert-warning">تگ حذف شده ای وجود ندارد</div>
    </div>
    @endif
</div>

@section('script')
    <script>
        window.addEventListener('forceDeleteTag', event => {
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
                    Livewire.emit('forceDestroyTag', event.detail.id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })
    </script>
@endsection
