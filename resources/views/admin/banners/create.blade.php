@extends('admin.layouts.admin')
@section('title')
    ایجاد بنر
@endsection
@section('script')
    <script>
        // Show File Name
        $('#banner_image').change(function() {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        });
    </script>
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display:flex;justify-content: space-between;">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">ساخت بنر</h4>
                        </div>
                        <div class="">
                            <a class="btn btn-primary" href="{{ route('admin.banners.index') }}">لیست بنر ها</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" novalidate method="POST" action="{{ route('admin.banners.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                {{-- <label for="image"> انتخاب تصویر</label> --}}
                                                <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input"
                                                        id="banner_image">
                                                    <label class="custom-file-label" for="image"> انتخاب فایل </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">عنوان بنر</label>
                                                <input type="text" placeholder="عنوان بنر" name="title" type="text"
                                                    {{ old('title') }} class="form-control" required
                                                    data-validation-required-message="فیلد عنوان بنر الزامی است">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">متن بنر</label>
                                                <input type="text" placeholder="متن بنر" name="text" type="text"
                                                    {{ old('text') }} class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">اولویت</label>
                                                <input type="text" placeholder="اولویت" name="priority" type="text"
                                                    {{ old('priority') }} class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="is_active">وضعیت</label>
                                                <select class="form-control" id="is_active" name="is_active">
                                                    <option value="1" selected>فعال</option>
                                                    <option value="0">غیرفعال</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">نوع بنر</label>
                                                <input type="text" placeholder="نوع بنر" name="type" type="text"
                                                    {{ old('type') }} class="form-control" required
                                                    data-validation-required-message="فیلد نوع بنر الزامی است">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">متن دکمه</label>
                                                <input placeholder="متن دکمه" name="button_text" type="text"
                                                    {{ old('button_text') }} class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">لینک دکمه</label>
                                                <input placeholder="لینک دکمه" name="button_link" type="text"
                                                    {{ old('button_link') }} class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="button" class="btn btn-danger mr-1">
                                        <a class="text-white" href="{{ route('admin.banners.index') }}"><i
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
