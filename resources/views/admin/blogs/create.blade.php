@extends('admin.layouts.admin')
@section('title')
    ایجاد مقاله
@endsection


@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">ساخت مقاله</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" novalidate method="POST" action="{{ route('admin.blogs.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">عنوان مقاله</label>
                                                <input type="text" placeholder="عنوان مقاله" name="title"
                                                    class="form-control" required
                                                    data-validation-required-message="فیلد عنوان مقاله الزامی است">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">نام نمایشی</label>
                                                <input type="text" placeholder="نام نمایشی" name="slug"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <label for="category_id">دسته بندی</label>
                                            <select id="categorySelect" name="category_id" class="form-control"
                                                data-live-search="true">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }} -
                                                        {{-- {{ $category->parent->name }} --}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="custom-file">
                                                <div class="controls">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                                                        name="primary_image" required
                                                        data-validation-required-message="فیلد لینک فایل الزامی است">
                                                    <label class="custom-file-label" for="inputGroupFile01">انتخاب
                                                        فایل</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <select class="form-control" id="is_active" name="is_active">
                                                <option value="1" selected>فعال</option>
                                                <option value="0">غیرفعال</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">متن مقاله</label>
                                                <textarea name="description" id="editor"></textarea>
                                            </div>
                                        </div>
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
