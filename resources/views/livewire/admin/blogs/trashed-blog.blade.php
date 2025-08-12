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
            <a class="btn-warning btn-sm" href="{{ route('admin.tags.index') }}">لیست تگ ها حذف شده</a>
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






<div>
    {{-- Do your work, then step back. --}}
</div>
<div class="card">
    <div class="card-header d-flex" style="justify-content: space-between;align-items: center;">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title">لیست مقالات حذف شده</h4>
        </div>

        <div class="input-group w-50">
            <input type="text" class="form-control" placeholder="جستجوی مقالات حذف شده" aria-label="Amount" wire:model="search">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="ft-search"></i>
                </span>
            </div>
        </div>

        <div class="">
            <a class="btn-warning btn-sm" href="{{ route('admin.blogs.index') }}">لیست مقالات حذف شده</a>
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
                        <th>نمایش</th>
                        <th>ویرایش</th>
                        <th>حذف</th>
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
                                <a class="btn btn-sm btn-outline-primary"
                                    href="{{ route('admin.blogs.show', ['blog' => $blog->id]) }}">
                                    نمایش <i class="fa fa-eye font-medium-3 mr-2"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-outline-warning mr-1"
                                    href="{{ route('admin.blogs.restore', $blog->id) }}"><i
                                        class="fa fa-trash-o font-medium-3 mr-2"></i>بازگرداندن</a>
                            </td>

                            <td>
                                <a class="btn btn-sm btn-outline-danger mr-1"
                                    href="{{ route('admin.blogs.delete', $blog->id) }}"><i
                                        class="fa fa-trash-o font-medium-3 mr-2"></i>حذف</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $blogs->links() }}
        </div>
    </div>
</div>
