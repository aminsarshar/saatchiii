<div class="card">
    @if ($brands->isNotEmpty())
        <div class="card-header d-flex" style="justify-content: space-between;align-items: center;">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title">لیست مقالات حذف شده ({{ $brands->count() }})</h4>
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
                <a class="btn-warning btn-sm" href="{{ route('admin.brands.index') }}">لیست برند ها</a>
            </div>
        </div>
        <div class="card-body">
            <div class="card-block">
                <table class="table table-responsive-md text-center">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام برند</th>
                            <th>تصویر برند</th>
                            <th>وضعیت</th>
                            <th>تاریخ ایجاد</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($brands as $index => $brand)
                            <tr>
                                <td>{{ $brands->firstItem() + $index }}</td>

                                <td class="text-truncate">
                                    @if (!empty($brand->name))
                                        {{ $brand->name }}
                                    @else
                                        <div class="badge badge-warning">این فیلد وارد نشده</div>
                                    @endif
                                </td>


                                <td class="text-truncate">
                                    <img src="{{ asset(env('BRAND_IMAGES_UPLOAD_PATH') . $brand->image) }}"
                                        alt="{{ $brand->name }}" width="90px">
                                </td>


                                <td wire:click="ChangeBrandstatus({{ $brand->id }})" style="cursor: pointer">
                                    @if ($brand->status == 1)
                                        <div class="badge badge-success text-white">فعال</div>
                                    @else
                                        <div class="badge badge-danger">غیر فعال</div>
                                    @endif
                                </td>


                                <td>
                                    <span class="badge badge-primary">
                                        {{ verta($brand->created_at)->format('%d  %B   %Y') }}
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
                                                wire:click="restoreBrand({{ $brand->id }})"
                                                class="btn btn-success">بازگردانی</a>

                                            <a style="display:block;margin:10px" class="btn btn-danger mr-2"
                                                wire:click="forceDeleteBrand({{ $brand->id }})"
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
                {{-- {{ $brands->links() }} --}}
                {{ $brands->appends(Request::except('page'))->links('pagination::bootstrap-4') }}
            </div>
        </div>
    @else
        <div class="card-header d-block w-100" style="">
            <div class="alert alert-warning">برند حذف شده ای وجود ندارد</div>
        </div>
    @endif
</div>



@section('script')
    <script>
        window.addEventListener('forceDeleteBrand', event => {
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
                    Livewire.emit('forceDestroyBrand', event.detail.id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })
    </script>
@endsection
