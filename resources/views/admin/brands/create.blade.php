@extends('admin.layouts.admin')
@section('title')
ایجاد برند
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">ساخت برند</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" novalidate method="POST" action="{{ route('admin.brands.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                            <label class="sr-only" for="projectinput2">نام برند</label>
                                            <input type="text" placeholder="نام برند" name="name" type="text" {{ old('name') }} class="form-control" required data-validation-required-message="فیلد نام برند الزامی است">
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
                                                <label for="image"> انتخاب تصویر اصلی </label>
                                                <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input" id="primary_image">
                                                    <label class="custom-file-label" for="image"> انتخاب فایل </label>
                                                </div>
                                            </div>
                                        </div>



                                    </div>


                                </div>

                                <div class="form-actions">
                                    <button type="button" class="btn btn-danger mr-1">
                                        <a class="text-white" href="{{ route('admin.brands.index') }}"><i class="icon-back"></i> بازگشت</a>
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

