<div class="card">
    <div class="card-header d-flex" style="justify-content: space-between;align-items: center;">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title">لیست مقالات</h4>
        </div>
        <div class="input-group w-50">
            <input type="text" class="form-control" placeholder="جستجوی مقالات" aria-label="Amount" wire:model="search">
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
                        <th>عنوان مقاله</th>
                        <th>محتوای مقاله</th>
                        <th>تصویر مقاله</th>
                        <th>وضعیت</th>
                        <th>نام نویسنده</th>
                        <th>تاریخ ایجاد</th>
                        <th>نمایش</th>
                        <th>ویرایش</th>
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
                                @if (!empty($blog->description))
                                    {{-- {!! $blog->description !!} --}}
                                @else
                                    <div class="badge badge-warning">این فیلد وارد نشده</div>
                                @endif
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
                                    href="{{ route('admin.blogs.edit', ['blog' => $blog->id]) }}" style="color: #fcac00"
                                    class="p-0" data-original-title="" data-toggle="tooltip" data-placement="top"
                                    title="ویرایشششش">
                                    ویرایش <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $blogs->links() }}
        </div>
    </div>
</div>
