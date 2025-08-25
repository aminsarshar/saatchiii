<div class="card">
    <div class="card-header d-flex" style="justify-content: space-between;align-items: center;">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title">لیست برند ({{ $brands->count() }})</h4>
        </div>
        <div class="input-group w-50">
            <input type="text" class="form-control" placeholder="جستجوی برند" aria-label="Amount" wire:model="search">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="ft-search"></i>
                </span>
            </div>
        </div>
        <div class="">
            <a class="btn-warning btn-sm" href="{{ route('admin.brands.trashed_brand') }}">برند های حذف شده</a>
        </div>
    </div>
    <div class="card-body">
        <div class="card-block">
            <table class="table table-responsive-md text-center">
                <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>نام برند</th>
                        <th>عکس برند</th>
                        <th>وضعیت</th>
                        <th>تاریخ ایحاد</th>
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



                            <td wire:click="ChangeBrandStatus({{ $brand->id }})" style="cursor: pointer">
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

                                        <a class="btn btn-sm btn-outline-primary" style="display:block;margin:10px"
                                            href="{{ route('admin.brands.show', ['brand' => $brand->id]) }}">
                                            نمایش <i class="fa fa-eye font-medium-3 mr-2"></i>
                                        </a>

                                        <a class="btn btn-sm btn-outline-warning mr-1"
                                            href="{{ route('admin.brands.edit', ['brand' => $brand->id]) }}"
                                            style="color: #fcac00;display:block;margin:10px" class="p-0"
                                            data-original-title="" data-toggle="tooltip" data-placement="top"
                                            title="ویرایشششش">
                                            ویرایش <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                        </a>

                                        <a style="display:block;margin:10px;color:rgb(255, 73, 97)"
                                            class="btn btn-sm btn-outline-danger"
                                            wire:click="deleteBrand({{ $brand->id }})" data-original-title=""
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
            {{ $brands->links() }}
        </div>
    </div>
</div>

@section('script')
    <script>
        window.addEventListener('deleteBrand', event => {
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
                    Livewire.emit('destroyBrand', event.detail.id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })
    </script>
@endsection
