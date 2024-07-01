<div class="card">
    <div class="card-header d-flex" style="justify-content: space-between;align-items: center;">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title">لیست ویژگی های محصول</h4>
        </div>
        <div class="input-group w-50">
            <input type="text" class="form-control" placeholder="جستجوی ویژگی های محصول" aria-label="Amount"
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
                        <th>نام ویژگی های محصول</th>
                        <th>تاریخ ایجاد</th>
                        <th>نمایش</th>
                        <th>ویرایش</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($attributes as $index => $attribute)
                        <tr>
                            <td>{{ $attributes->firstItem() + $index }}</td>

                            <td class="text-truncate">
                                @if (!empty($attribute->name))
                                    {{ $attribute->name }}
                                @else
                                    <div class="badge badge-warning">این فیلد وارد نشده</div>
                                @endif
                            </td>

                            <td>
                                <span class="badge badge-primary">
                                    {{ verta($attribute->created_at)->format('%d  %B   %Y') }}
                                </span>

                            </td>

                            <td>
                                <a class="btn btn-sm btn-outline-primary"
                                    href="{{ route('admin.attributes.show', ['attribute' => $attribute->id]) }}">
                                    نمایش <i class="fa fa-eye font-medium-3 mr-2"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-outline-warning mr-1"
                                    href="{{ route('admin.attributes.edit', ['attribute' => $attribute->id]) }}"
                                    style="color: #fcac00" class="p-0" data-original-title=""
                                    data-toggle="tooltip" data-placement="top" title="ویرایشششش">
                                    ویرایش <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $attributes->links() }}
        </div>
    </div>
</div>
