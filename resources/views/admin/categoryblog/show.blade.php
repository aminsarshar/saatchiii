@extends('admin.layouts.admin')

@section('title')
   مقالات نمایش دسته بندی
@endsection

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">دسته بندی : {{ $categoryblog->name }}</h5>
            </div>
            <hr>

            <div class="row">
                <div class="form-group col-md-3">
                    <label>نام</label>
                    <input class="form-control" type="text" value="{{ $categoryblog->name }}" disabled>
                </div>

                <div class="form-group col-md-3">
                    <label>نام انگلیسی</label>
                    <input class="form-control" type="text" value="{{ $categoryblog->slug }}" disabled>
                </div>

                <div class="form-group col-md-3">
                    <label>والد</label>
                    <div class="form-control div-disabled" disabled>
                        @if ($categoryblog->parent_id == 0)
                            {{ $categoryblog->name }}
                        @else
                            {{ $categoryblog->parent->name }}
                        @endif
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <label>وضعیت</label>
                    <input class="form-control" type="text" value="{{ $categoryblog->is_active }}" disabled>
                </div>

                <div class="form-group col-md-3">
                    <label>آیکون</label>
                    <input class="form-control" type="text" value="{{ $categoryblog->icon }}" disabled>
                </div>

                <div class="form-group col-md-3">
                    <label>تاریخ ایجاد</label>
                    <input class="form-control" type="text" value="{{ verta($categoryblog->created_at) }}" disabled>
                </div>

                <div class="form-group col-md-12">
                    <label>توضیحات</label>
                    <textarea class="form-control" disabled>{{ $categoryblog->description }}</textarea>
                </div>

                <div class="col-md-12">
                    <hr>

                </div>

            </div>

            <a href="{{ route('admin.categoryblog.index') }}" class="btn btn-dark mt-5">بازگشت</a>

        </div>

    </div>

@endsection
