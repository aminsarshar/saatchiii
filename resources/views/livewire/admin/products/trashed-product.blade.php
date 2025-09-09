<div class="card">
    @if ($products->isNotEmpty())
        <div class="card-header d-flex" style="justify-content: space-between;align-items: center;">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title">لیست محصولات</h4>
            </div>

            <div class="input-group w-50">
                <input type="text" class="form-control" placeholder="جستجوی محصولات" aria-label="Amount"
                    wire:model="search">
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="ft-search"></i>
                    </span>
                </div>
            </div>

            <div class="">
                <a class="btn-warning btn-sm" href="{{ route('admin.products.index') }}">لیست محصولات حذف شده</a>
            </div>
        </div>
        <div class="card-body">
            <div class="card-block">
                <table class="table table-responsive-md text-center">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>عنوان محصول</th>
                            <th>نام برند</th>
                            <th>دسته بندی</th>
                            <th>وضعیت</th>
                            <th>تاریخ ایجاد</th>
                            <th>عملیات</th>
                            <th>حذف</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($products as $index => $product)
                            <tr>
                                <td>{{ $products->firstItem() + $index }}</td>

                                <td class="text-truncate">
                                    <a href="{{ route('admin.products.show', ['product' => $product->id]) }}">
                                        {{ \Illuminate\Support\Str::limit($product->name, 30, '...') }}
                                    </a>
                                </td>

                                <td class="text-truncate">
                                    <div class="badge badge-secondary ">
                                        <a style="color: white"
                                            href="{{ route('admin.brands.show', ['brand' => $product->brand->id]) }}">
                                            {{ $product->brand->name }}
                                        </a>
                                    </div>
                                </td>

                                <td class="text-truncate">
                                    <div class="badge badge-secondary">
                                        <a style="color: white"
                                            href="{{ route('admin.categories.show', ['category' => $product->category->id]) }}">
                                            {{ $product->category->name }}
                                        </a>
                                    </div>
                                </td>


                                <td wire:click="ChangeProductStatus({{ $product->id }})" style="cursor: pointer">
                                    @if ($product->is_active == 'فعال')
                                        <div class="badge badge-success text-white">فعال</div>
                                    @else
                                        <div class="badge badge-danger">غیر فعال</div>
                                    @endif
                                </td>

                                <td>
                                    <span class="badge badge-primary">
                                        {{ verta($product->created_at)->format('%d  %B   %Y') }}
                                    </span>

                                </td>

                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            عملیات
                                        </button>
                                        <div class="dropdown-menu">

                                            <a href="{{ route('admin.products.edit', ['product' => $product->id]) }}"
                                                class="dropdown-item text-right"> ویرایش محصول </a>

                                            <a href="{{ route('admin.products.images.edit', ['product' => $product->id]) }}"
                                                class="dropdown-item text-right"> ویرایش تصاویر </a>

                                            <a href="{{ route('admin.products.category.edit', ['product' => $product->id]) }}"
                                                class="dropdown-item text-right"> ویرایش دسته بندی و ویژگی </a>

                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <a wire:click="restoreProduct({{ $product->id }})"
                                        class="btn btn-success">بازگردانی</a>
                                </td>

                                <td>
                                    <a class="btn btn-danger mr-2" wire:click="forceDeleteProduct({{ $product->id }})"
                                        data-original-title="" data-toggle="tooltip" data-placement="top"
                                        title="حذف کامل">
                                        حذف
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $products->links() }}
            </div>
        </div>
    @else
        <div class="card-header d-block w-100" style="">
            <div class="alert alert-warning">محصول حذف شده ای وجود ندارد</div>
        </div>
    @endif
</div>

@section('script')
    <script>
        window.addEventListener('forceDeleteProduct', event => {
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
                    Livewire.emit('forceDestroyProduct', event.detail.id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })
    </script>
@endsection
