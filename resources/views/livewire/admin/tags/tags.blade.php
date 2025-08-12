<div class="card">
    <div class="card-header d-flex" style="justify-content: space-between;align-items: center;">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title">لیست تگ های محصول</h4>
        </div>
        <div class="input-group w-50">
            <input type="text" class="form-control" placeholder="جستجوی تگ های محصول" aria-label="Amount"
                wire:model="search">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="ft-search"></i>
                </span>
            </div>
        </div>

        <div class="">
            <a class="btn-warning btn-sm" href="{{ route('admin.tags.trashed_tag') }}">لیست تگ ها حذف شده</a>
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
                                    href="{{ route('admin.tags.edit', ['tag' => $tag->id]) }}" style="color: #fcac00"
                                    class="p-0" data-original-title="" data-toggle="tooltip" data-placement="top"
                                    title="ویرایشششش">
                                    ویرایش <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                </a>
                            </td>

                            <td>
                                <a class="p-0 text-danger" wire:click="deleteTag({{ $tag->id }})"
                                    data-original-title="" data-toggle="tooltip" data-placement="top" title="حذف">
                                    <i class="fa fa-trash-o font-medium-3 mr-2"></i>
                                </a>
                            </td>

                            {{-- <td>
                                <form action="{{ route('admin.tags.destroy', ['tag' => $tag->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-outline-danger mr-1" type="submit">حذف <i
                                            class="fa fa-trash-o font-medium-3 mr-2"></i></button>
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $tags->links() }} --}}
            {{ $tags->appends(Request::except('page'))->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

@section('script')
<script>
        window.addEventListener('deleteTag',event=>{
            Swal.fire({
                title: 'آیا از حذف مطمئن هستید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله',
                cancelButtonText:'خیر'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('destroyTag',event.detail.id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })
    </script>
@endsection
