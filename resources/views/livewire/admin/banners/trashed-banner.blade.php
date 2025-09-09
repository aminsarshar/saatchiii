<div class="card">
    @if ($banners->isNotEmpty())
        <div class="card-header d-flex" style="justify-content: space-between;align-items: center;">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title">لیست بنر های حذف شده</h4>
            </div>
            <div class="input-group w-50">
                <input type="text" class="form-control" placeholder="جستجوی بنر" aria-label="Amount" wire:model="search">
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="ft-search"></i>
                    </span>
                </div>
            </div>
            <div class="">
                <a class="btn btn-primary" href="{{ route('admin.banners.index') }}">لیست بنر</a>
            </div>
        </div>
        <div class="card-body">
            <div class="card-block">
                <table class="table table-responsive-md text-center">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>عنوان بنر</th>
                            <th>عکس بنر</th>
                            <th>متن</th>
                            <th>اولویت</th>
                            <th>نوع</th>
                            <th>متن دکمه</th>
                            <th>لینک دکمه</th>
                            <th>آیکون دکمه</th>
                            <th>وضعیت</th>
                            <th>تاریخ ایجاد</th>
                            <th>عملیات</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($banners as $index => $banner)
                            <tr>
                                <td>{{ $banners->firstItem() + $index }}</td>

                                <td class="text-truncate">
                                    @if (!empty($banner->title))
                                        {{ $banner->title }}
                                    @else
                                        <div class="badge badge-warning">این فیلد وارد نشده</div>
                                    @endif
                                </td>

                                <td class="text-truncate">
                                    <img src="{{ asset(env('BANNER_IMAGES_UPLOAD_PATH') . $banner->image) }}"
                                        alt="{{ $banner->name }}" width="90px">
                                </td>

                                <td class="text-truncate">
                                    @if (!empty($banner->text))
                                        {{ $banner->text }}
                                    @else
                                        <div class="badge badge-warning">این فیلد وارد نشده</div>
                                    @endif
                                </td>

                                <td class="text-truncate">
                                    @if (!empty($banner->priority))
                                        {{ $banner->priority }}
                                    @else
                                        <div class="badge badge-warning">این فیلد وارد نشده</div>
                                    @endif
                                </td>

                                <td class="text-truncate">
                                    @if (!empty($banner->type))
                                        {{ $banner->type }}
                                    @else
                                        <div class="badge badge-warning">این فیلد وارد نشده</div>
                                    @endif
                                </td>

                                <td class="text-truncate">
                                    @if (!empty($banner->button_text))
                                        {{ $banner->button_text }}
                                    @else
                                        <div class="badge badge-warning">این فیلد وارد نشده</div>
                                    @endif
                                </td>

                                <td class="text-truncate">
                                    @if (!empty($banner->button_link))
                                        {{ $banner->button_link }}
                                    @else
                                        <div class="badge badge-warning">این فیلد وارد نشده</div>
                                    @endif
                                </td>

                                <td class="text-truncate">
                                    @if (!empty($banner->button_icon))
                                        {{ $banner->button_icon }}
                                    @else
                                        <div class="badge badge-warning">این فیلد وارد نشده</div>
                                    @endif
                                </td>

                                <td wire:click="ChangeBannerStatus({{ $banner->id }})" style="cursor: pointer">
                                    @if ($banner->is_active == 'فعال')
                                        <div class="badge badge-success text-white">فعال</div>
                                    @else
                                        <div class="badge badge-danger">غیر فعال</div>
                                    @endif
                                </td>



                                <td>
                                    <span class="badge badge-primary">
                                        {{ verta($banner->created_at)->format('%d  %B   %Y') }}
                                    </span>

                                </td>


                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            عملیات
                                        </button>
                                        <div class="dropdown-menu">

                                            <a style="display:block;margin:10px"
                                                wire:click="restoreBanner({{ $banner->id }})"
                                                class="btn btn-success">بازگردانی</a>

                                            <a style="display:block;margin:10px" class="btn btn-danger mr-2"
                                                wire:click="forceDeleteBanner({{ $banner->id }})"
                                                data-original-title="" data-toggle="tooltip" data-placement="top"
                                                title="حذف کامل">
                                                حذف
                                            </a>
                                        </div>
                                    </div>
                                </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $banners->links() }} --}}
                {{ $banners->appends(Request::except('page'))->links('pagination::bootstrap-4') }}

            </div>
        </div>
    @else
        <div class="card-header d-block w-100" style="">
            <div class="alert alert-warning">بنر حذف شده ای وجود ندارد</div>
        </div>
    @endif
</div>

@section('script')
    <script>
        window.addEventListener('forceDeleteBanner', event => {
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
                    Livewire.emit('forceDestroyBanner', event.detail.id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })
    </script>
@endsection
