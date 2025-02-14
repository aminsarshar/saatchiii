    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex" style="justify-content: space-between;align-items: center;">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">لیست دسته بندی</h4>
                        </div>
                        <div class="input-group w-50">
                            <input type="text" class="form-control" placeholder="جستجوی دسته بندی" aria-label="Amount"
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
                                        <th>نام</th>
                                        <th>نام انگلیسی</th>
                                        <th>والد</th>
                                        <th>وضعیت</th>
                                        <th>نمایش</th>
                                        <th>ویرایش</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($categories as $index => $category)
                                        <tr>
                                            <td>{{ $categories->firstItem() + $index }}</td>

                                            <td class="text-truncate">
                                                {{ $category->name }}
                                            </td>

                                            <td class="text-truncate">
                                                {{ $category->slug }}
                                            </td>

                                            <td>
                                                @if ($category->parent_id == 0)
                                                    بدون والد
                                                @else
                                                    {{-- {{ $category->parent->name }} --}}
                                                @endif
                                            </td>

                                            {{-- <td>
                                                <span
                                                    class="{{ $category->getRawOriginal('is_active') ? 'badge badge-success' : 'badge badge-danger' }}">
                                                    {{ $category->is_active }}
                                                </span>
                                            </td> --}}

                                            <td wire:click="ChangeCategoryStatus({{ $category->id }})" style="cursor: pointer">
                                                @if ($category->is_active == 1)
                                                    <div class="badge badge-success text-white">فعال</div>
                                                @else
                                                    <div class="badge badge-danger">غیر فعال</div>
                                                @endif
                                            </td>



                                            <td>
                                                <a class="btn btn-sm btn-outline-primary"
                                                    href="{{ route('admin.categories.show', ['category' => $category->id]) }}">
                                                    نمایش <i class="fa fa-eye font-medium-3 mr-2"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-outline-warning mr-1"
                                                    href="{{ route('admin.categories.edit', ['category' => $category->id]) }}"
                                                    style="color: #fcac00" class="p-0" data-original-title=""
                                                    data-toggle="tooltip" data-placement="top" title="ویرایشششش">
                                                    ویرایش <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $categories->links() }}

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
