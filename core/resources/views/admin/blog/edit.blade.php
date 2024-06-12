@extends('admin.layouts.admin')

@section('title')
    edit attributes
@endsection

@section('script')
{{-- <script src="https://cdn.ckbox.io/CKBox/2.1.0/ckbox.js"></script>
<script src="{{asset('assets/ckjs/configuration-dialog.js')}}"></script> --}}
{{-- <script src="{{asset('assets/ckjs/script.js')}}"></script> --}}

@endsection

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="mb-4 text-center text-md-right">
            <h5 class="font-weight-bold"> ویرایش بلاگ: {{ $blog->title }}</h5>
            </div>
            <hr>

            @include('admin.sections.errors')

            <form action="{{ route('admin.blog.update' , ['blog' => $blog->id]) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="title">عنوان مقاله</label>
                        <input class="form-control" id="title" name="title" type="text" value="{{ $blog->title }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="primary_image"> تغییر تصویر اصلی </label>
                        <div class="custom-file">
                            <input type="file" name="primary_image" class="custom-file-input" id="primary_image">
                            <label class="custom-file-label" for="primary_image"> انتخاب فایل </label>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="is_active">وضعیت</label>
                        <select class="form-control" id="is_active" name="is_active">
                            <option value="1" {{ $blog->getRawOriginal('is_active') ? 'selected' : '' }}>فعال</option>
                            <option value="0" {{ $blog->getRawOriginal('is_active') ? 'selected' : '' }}>غیرفعال</option>
                        </select>
                    </div>

                    <div class="form-group col-md-5">
                        <label for="title">تصویر قبلی</label>
                        <img src="{{ asset(env('BLOG_IMAGES_UPLOAD_PATH').$blog->primary_image) }}" alt="{{ $blog->title }}" width="90px">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="description">متن مقاله</label>
                        <textarea name="description" id="my_editor" class="editor">
                            {{$blog->description }}
                        </textarea>
                    </div>
                </div>

                <button class="btn btn-outline-primary mt-5" type="submit">ویرایش</button>
                <a href="{{ route('admin.blog.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>

    </div>

    <style>
        .ck .ck-content{
            height: 200px;
        }
    </style>

@endsection
