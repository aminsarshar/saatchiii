<div class="card">
    @if ($blogs->isNotEmpty())
        <div class="card-header d-flex" style="justify-content: space-between;align-items: center;">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title">لیست مقالات ({{$blogs->count()}})</h4>
            </div>

            <div class="input-group w-50">
                <input type="text" class="form-control" placeholder="جستجوی مقالات" aria-label="Amount"
                    wire:model="search">
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="ft-search"></i>
                    </span>
                </div>
            </div>

            <div class="">
                <a class="btn-warning btn-sm" href="{{ route('admin.blogs.trashed_blog') }}">مقالات حذف شده</a>
            </div>
        </div>
        <div class="card-body">
            <div class="card-block">
                <table class="table table-responsive-md text-center">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>عنوان مقاله</th>
                            <th>دسته بندی مقاله</th>
                            <th>تصویر مقاله</th>
                            <th>وضعیت</th>
                            <th>نام نویسنده</th>
                            <th>تاریخ ایجاد</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($blogs as $index => $blog)
                            <tr>
                                <td>{{ $blogs->firstItem() + $index }}</td>

                                <td class="text-truncate">
                                    @if (!empty($blog->title))
                                        {{ $blog->title }}
                                    @else
                                        <div class="badge badge-warning">این فیلد وارد نشده</div>
                                    @endif
                                </td>

                                <td class="text-truncate">
                                    <div class="badge badge-secondary">
                                        {{ $blog->category->name }}
                                    </div>
                                </td>

                                <td class="text-truncate">
                                    <img src="{{ asset(env('BLOG_IMAGES_UPLOAD_PATH') . $blog->primary_image) }}"
                                        alt="{{ $blog->title }}" width="90px">
                                </td>


                                <td wire:click="ChangeBlogStatus({{ $blog->id }})" style="cursor: pointer">
                                    @if ($blog->is_active == 'فعال')
                                        <div class="badge badge-success text-white">فعال</div>
                                    @else
                                        <div class="badge badge-danger">غیر فعال</div>
                                    @endif
                                </td>

                                <td style="cursor: pointer">
                                    {{ $blog->user->name }}
                                </td>


                                <td>
                                    <span class="badge badge-primary">
                                        {{ verta($blog->created_at)->format('%d  %B   %Y') }}
                                    </span>

                                </td>

                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            عملیات
                                        </button>
                                        <div class="dropdown-menu">

                                            <a class="btn btn-sm btn-outline-primary" style="display:block;margin:10px"
                                                href="{{ route('admin.blogs.show', ['blog' => $blog->id]) }}">
                                                نمایش <i class="fa fa-eye font-medium-3 mr-2"></i>
                                            </a>

                                            <a class="btn btn-sm btn-outline-warning mr-1"
                                                href="{{ route('admin.blogs.edit', ['blog' => $blog->id]) }}"
                                                style="color: #fcac00;display:block;margin:10px" class="p-0"
                                                data-original-title="" data-toggle="tooltip" data-placement="top"
                                                title="ویرایشششش">
                                                ویرایش <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                            </a>

                                            <a style="display:block;margin:10px;color:rgb(255, 73, 97)"
                                                class="btn btn-sm btn-outline-danger"
                                                wire:click="deleteBlog({{ $blog->id }})" data-original-title=""
                                                data-toggle="tooltip" data-placement="top" title="حذف">
                                                حذف <i class="fa fa-trash-o font-medium-3 mr-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $blogs->links() }} --}}
                {{ $blogs->appends(Request::except('page'))->links('pagination::bootstrap-4') }}
            </div>
        </div>
    @else
        <div class="card-header d-block w-100" style="">
            <div class="alert alert-warning">مقاله ای وجود ندارد</div>
        </div>
    @endif
</div>
@section('script')
    <script>
        window.addEventListener('deleteBlog', event => {
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
                    Livewire.emit('destroyBlog', event.detail.id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })
    </script>
@endsection
