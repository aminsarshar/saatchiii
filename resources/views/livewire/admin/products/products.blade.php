<div class="card">
    <div class="card-header d-flex" style="justify-content: space-between;align-items: center;">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title">لیست محصولات</h4>
        </div>

        <div class="input-group w-50">
            <input type="text" class="form-control" placeholder="جستجوی محصولات" aria-label="Amount" wire:model="search">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="ft-search"></i>
                </span>
            </div>
        </div>

        <div class="">
            <a class="btn-warning btn-sm" href="{{ route('admin.products.trashed_list') }}">محصولات حذف شده</a>
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
                                <form action="{{ route('admin.products.destroy', ['product' => $product->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-outline-danger mr-1" type="submit">حذف <i
                                            class="fa fa-trash-o font-medium-3 mr-2"></i></button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>
</div>
