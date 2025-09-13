@extends('admin.layouts.admin')

@section('title')
    ایجاد محصول
@endsection



@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">ایجاد محصول</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" novalidate method="POST" action="{{ route('admin.products.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="" for="projectinput2">عنوان محصول</label>
                                                <input type="text" placeholder="عنوان محصول" name="name"
                                                    class="form-control" required
                                                    data-validation-required-message="فیلد عنوان محصول الزامی است">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="" for="projectinput2">نام خارجی</label>
                                                <input type="text" placeholder="نام خارجی" name="slug"
                                                    class="form-control" required
                                                    data-validation-required-message="فیلد نام خارجی الزامی است">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <label for="brand_id">برند</label>
                                            <select id="brandSelect" name="brand_id" class="form-control"required
                                                data-validation-required-message="فیلد برند الزامی است"
                                                data-live-search="true">
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <label for="tag_ids">تگ</label>
                                            <select id="tagSelect" name="tag_ids[]" class="form-control" multiple
                                                data-live-search="true">
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <label for="is_active">وضعیت</label>
                                            <select class="form-control" id="is_active" name="is_active">
                                                <option value="1" selected>فعال</option>
                                                <option value="0">غیرفعال</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <label for="description">نوع محصول</label>
                                            <select class="form-control" id="type" name="type">
                                                <option value="0" disabled>انتخاب کنید</option>
                                                <option value="1">عادی</option>
                                                <option value="2">تخفیف خورده</option>
                                                <option value="3">تخفیف روزانه</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">متن محصول</label>
                                                <textarea name="description" id="editor"></textarea>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <hr>
                                        <p>تصاویر محصول : </p>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="primary_image"> انتخاب تصویر اصلی </label>
                                        <div class="custom-file">
                                            <input type="file" name="primary_image" class="custom-file-input"
                                                id="primary_image">
                                            <label class="custom-file-label" for="primary_image"> انتخاب فایل </label>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="images"> انتخاب تصاویر </label>
                                        <div class="custom-file">
                                            <input type="file" name="images[]" multiple class="custom-file-input"
                                                id="images">
                                            <label class="custom-file-label" for="images"> انتخاب فایل ها </label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <hr>
                                        <p>دسته بندی و ویژگی ها : </p>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="row justify-content-center">
                                            <div class="form-group col-md-3">
                                                <label for="category_id">دسته بندی</label>
                                                <select id="categorySelect" name="category_id" class="form-control"
                                                    data-live-search="true">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }} -
                                                            {{ $category->parent->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="attributesContainer" class="col-md-12">
                                        <div id="attributes" class="row"></div>
                                        <div class="col-md-12">
                                            <hr>
                                            <p>افزودن قیمت و موجودی برای متغیر <span class="font-weight-bold"
                                                    id="variationName"></span> :
                                            </p>
                                        </div>

                                        <div id="czContainer">
                                            <div id="first">
                                                <div class="recordset">
                                                    <div class="row">
                                                        <div class="form-group col-md-3">
                                                            <label>نام</label>
                                                            <input class="form-control" name="variation_values[value][]"
                                                                type="text">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>قیمت</label>
                                                            <input class="form-control" name="variation_values[price][]"
                                                                type="text">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>تعداد</label>
                                                            <input class="form-control"
                                                                name="variation_values[quantity][]" type="text">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>شناسه انبار</label>
                                                            <input class="form-control" name="variation_values[sku][]"
                                                                type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <hr>
                                        <p>هزینه ارسال : </p>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="delivery_amount">هزینه ارسال</label>
                                        <input class="form-control" id="delivery_amount" name="delivery_amount"
                                            type="text" value="{{ old('delivery_amount') }}">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="delivery_amount_per_product">هزینه ارسال به ازای محصول اضافی</label>
                                        <input class="form-control" id="delivery_amount_per_product"
                                            name="delivery_amount_per_product" type="text"
                                            value="{{ old('delivery_amount_per_product') }}">
                                    </div>


                                </div>

                                <div class="form-actions">
                                    <button type="button" class="btn btn-danger mr-1">
                                        <a class="text-white" href="{{ route('admin.blogs.index') }}"><i
                                                class="icon-trash"></i> لغو</a>
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


    <style>
        /* ارتفاع ثابت برای ادیتور */
        .ck-editor__editable_inline {
            min-height: 500px;
        }

        /* راست‌چین پیش‌فرض */
        .ck-content {
            direction: rtl;
            text-align: right;
            font-family: tahoma, sans-serif;
        }
    </style>
@endsection

<!-- Content Row -->
{{-- <div class="row">

    <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white">
        <div class="mb-4">
            <h5 class="font-weight-bold">ایجاد محصول</h5>
        </div>
        <hr>

        @include('admin.sections.errors')

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="name">نام</label>
                    <input class="form-control" id="name" name="name" type="text" value="{{ old('name') }}">
                </div>

                <div class="form-group col-md-3">
                    <label for="name">نامک(نام خارجی)</label>
                    <input class="form-control" id="slug" name="slug" type="text" value="{{ old('slug') }}">
                </div>

                <div class="form-group col-md-3">
                    <label for="brand_id">برند</label>
                    <select id="brandSelect" name="brand_id" class="form-control" data-live-search="true">
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="is_active">وضعیت</label>
                    <select class="form-control" id="is_active" name="is_active">
                        <option value="1" selected>فعال</option>
                        <option value="0">غیرفعال</option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="tag_ids">تگ</label>
                    <select id="tagSelect" name="tag_ids[]" class="form-control" multiple data-live-search="true">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="description">توضیحات</label>
                    <textarea class="form-control" id="description"
                        name="description">{{ old('description') }}</textarea>
                </div>

                <div class="form-group col-md-6">
                    <label for="description">نوع محصول</label>
                    <select class="form-control" id="type" name="type">
                        <option value="0" disabled>انتخاب کنید</option>
                        <option value="1">عادی</option>
                        <option value="2">تخفیف خورده</option>
                        <option value="3">تخفیف روزانه</option>
                    </select>
                </div>

                <div class="col-md-12">
                    <hr>
                    <p>تصاویر محصول : </p>
                </div>

                <div class="form-group col-md-3">
                    <label for="primary_image"> انتخاب تصویر اصلی </label>
                    <div class="custom-file">
                        <input type="file" name="primary_image" class="custom-file-input" id="primary_image">
                        <label class="custom-file-label" for="primary_image"> انتخاب فایل </label>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <label for="images"> انتخاب تصاویر </label>
                    <div class="custom-file">
                        <input type="file" name="images[]" multiple class="custom-file-input" id="images">
                        <label class="custom-file-label" for="images"> انتخاب فایل ها </label>
                    </div>
                </div>

                <div class="col-md-12">
                    <hr>
                    <p>دسته بندی و ویژگی ها : </p>
                </div>


                <div class="col-md-12">
                    <div class="row justify-content-center">
                        <div class="form-group col-md-3">
                            <label for="category_id">دسته بندی</label>
                            <select id="categorySelect" name="category_id" class="form-control" data-live-search="true">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }} -
                                        {{ $category->parent->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div id="attributesContainer" class="col-md-12">
                    <div id="attributes" class="row"></div>
                    <div class="col-md-12">
                        <hr>
                        <p>افزودن قیمت و موجودی برای متغیر <span class="font-weight-bold" id="variationName"></span> :
                        </p>
                    </div>

                    <div id="czContainer">
                        <div id="first">
                            <div class="recordset">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>نام</label>
                                        <input class="form-control" name="variation_values[value][]" type="text">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>قیمت</label>
                                        <input class="form-control" name="variation_values[price][]" type="text">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>تعداد</label>
                                        <input class="form-control" name="variation_values[quantity][]" type="text">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>شناسه انبار</label>
                                        <input class="form-control" name="variation_values[sku][]" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-12">
                    <hr>
                    <p>هزینه ارسال : </p>
                </div>

                <div class="form-group col-md-3">
                    <label for="delivery_amount">هزینه ارسال</label>
                    <input class="form-control" id="delivery_amount" name="delivery_amount" type="text" value="{{ old('delivery_amount') }}">
                </div>

                <div class="form-group col-md-3">
                    <label for="delivery_amount_per_product">هزینه ارسال به ازای محصول اضافی</label>
                    <input class="form-control" id="delivery_amount_per_product" name="delivery_amount_per_product" type="text" value="{{ old('delivery_amount_per_product') }}">
                </div>

            </div>

            <button class="btn btn-outline-primary mt-5" type="submit">ثبت</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
        </form>
    </div>

</div> --}}
