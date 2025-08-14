<div class="card">
    <div class="card-header d-flex" style="justify-content: space-between;align-items: center;">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title">لیست برند ({{$brands->count()}})</h4>
        </div>
        <div class="input-group w-50">
            <input type="text" class="form-control" placeholder="جستجوی برند" aria-label="Amount"
                wire:model="search">
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
                        <th>نام برند</th>
                        <th>عکس برند</th>
                        <th>وضعیت</th>
                        <th>تاریخ ایحاد</th>
                        <th>نمایش</th>
                        <th>ویرایش</th>
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
                                <a class="btn btn-sm btn-outline-primary"
                                    href="{{ route('admin.brands.show', ['brand' => $brand->id]) }}">
                                    نمایش <i class="fa fa-eye font-medium-3 mr-2"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-outline-warning mr-1"
                                    href="{{ route('admin.brands.edit', ['brand' => $brand->id]) }}"
                                    style="color: #fcac00" class="p-0" data-original-title=""
                                    data-toggle="tooltip" data-placement="top" title="ویرایشششش">
                                    ویرایش <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $brands->links() }}
        </div>
    </div>
</div>
