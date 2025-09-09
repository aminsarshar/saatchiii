@extends('admin.layouts.admin')
@section('title')
    ایجاد دسته بندی
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">ساخت بندی</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" novalidate method="POST" action="{{ route('admin.categories.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group col-md-3 mb-2">
                                            <div class="controls">
                                                <label class="" for="projectinput2">نام دسته بندی</label>
                                                <input type="text" placeholder="نام دسته بندی" name="name"
                                                    type="text" {{ old('name') }} class="form-control" required
                                                    data-validation-required-message="فیلد نام دسته بندی الزامی است">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3 mb-2">
                                            <div class="controls">
                                                <label class="" for="projectinput2">نام انگلیسی دسته بندی</label>
                                                <input type="text" placeholder="نام انگلیسی دسته بندی" name="slug"
                                                    type="text" {{ old('slug') }} class="form-control" required
                                                    data-validation-required-message="فیلد نام انگلیسی دسته بندی الزامی است">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3 mb-2">
                                            <div class="controls">
                                                <label for="icon">آیکون دسته بندی</label>
                                                <input class="form-control" id="icon" name="icon" type="text"
                                                placeholder="آیکون دسته بندی" value="{{ old('icon') }}">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3 mb-2">
                                            <div class="controls">
                                                <label for="parent_id">والد</label>
                                                <select class="form-control" id="parent_id" name="parent_id">
                                                    <option value="0">بدون والد</option>
                                                    @foreach ($parentCategories as $parentCategory)
                                                        <option value="{{ $parentCategory->id }}">
                                                            {{ $parentCategory->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3 mb-2">
                                            <div class="controls">
                                                <label for="is_active">وضعیت</label>
                                                <select class="form-control" id="is_active" name="is_active">
                                                    <option value="1" selected>فعال</option>
                                                    <option value="0">غیرفعال</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3 mb-2">
                                            <div class="controls">
                                                <label for="attribute_ids">ویژگی</label>
                                                <select id="attributeSelect" name="attribute_ids[]" class="form-control"
                                                    multiple data-live-search="true">
                                                    @foreach ($attributes as $attribute)
                                                        <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3 mb-2">
                                            <div class="controls">
                                                <label for="attribute_is_filter_ids">انتخاب ویژگی های قابل فیلتر</label>
                                                <select id="attributeIsFilterSelect" name="attribute_is_filter_ids[]"
                                                    class="form-control" multiple data-live-search="true">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3 mb-2">
                                            <div class="controls">
                                                <label for="attribute_is_filter_ids">انتخاب ویژگی متغیر</label>
                                                <select id="variationSelect" name="variation_id" class="form-control"
                                                    data-live-search="true">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12 mb-2">
                                            <div class="controls">
                                                <label for="description">توضیحات</label>
                                                <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="form-actions">
                                    <button type="button" class="btn btn-danger mr-1">
                                        <a class="text-white" href="{{ route('admin.categories.index') }}"><i
                                                class="icon-back"></i> بازگشت</a>
                                    </button>
                                    <button type="submit" class="btn btn-success">
                                        <i class="icon-note"></i> ذخیره
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection

@section('script')
    <script>
        $('#attributeSelect').selectpicker({
            'title': 'انتخاب ویژگی'
        });

        $('#attributeSelect').on('changed.bs.select', function() {
            let attributesSelected = $(this).val();
            let attributes = @json($attributes);

            let attributeForFilter = [];

            attributes.map((attribute) => {
                $.each(attributesSelected , function(i,element){
                    if( attribute.id == element ){
                        attributeForFilter.push(attribute);
                    }
                });
            });

            $("#attributeIsFilterSelect").find("option").remove();
            $("#variationSelect").find("option").remove();
            attributeForFilter.forEach((element)=>{
                let attributeFilterOption = $("<option/>" , {
                    value : element.id,
                    text : element.name
                });

                let variationOption = $("<option/>" , {
                    value : element.id,
                    text : element.name
                });

                $("#attributeIsFilterSelect").append(attributeFilterOption);
                $("#attributeIsFilterSelect").selectpicker('refresh');

                $("#variationSelect").append(variationOption);
                $("#variationSelect").selectpicker('refresh');
            });


        });

        $("#attributeIsFilterSelect").selectpicker({
            'title': 'انتخاب ویژگی'
        });

        $("#variationSelect").selectpicker({
            'title': 'انتخاب متغیر'
        });

    </script>
@endsection
