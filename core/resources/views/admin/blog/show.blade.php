@extends('admin.layouts.admin')

@section('title')
    show blogs
@endsection

@section('script')

@endsection

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">ویژگی </h5>
            </div>
            <hr>

            <div class="row">
                <div class="form-group col-md-3">
                    <label>عنوان مقاله</label>
                    <input class="form-control" type="text" value="{{ $blog->title }}" disabled>
                </div>

                <div class="form-group col-md-3">
                    <label>وضعیت</label>
                    <input class="form-control" type="text" value="{{ $blog->is_active }}" disabled>
                </div>



                <div class="form-group col-md-3">
                    <label for="title">تصویر مقاله : </label>
                    <img src="{{ asset(env('BLOG_IMAGES_UPLOAD_PATH').$blog->primary_image) }}" alt="{{ $blog->title }}" width="140px" style="box-shadow: 0 7px 12px 5px rgba(0, 0, 0, 0.05)">
                </div>


                <div class="form-group col-md-3">
                    <label>تاریخ ایجاد</label>
                    <input class="form-control" type="text" value="{{ verta($blog->created_at) }}" disabled>
                </div>


                <div class="form-group col-md-12">
                    <label for="description">متن مقاله</label>
                    <textarea disabled name="description" id="my_editor" class="editor">
                        {{$blog->description}}
                    </textarea>
                </div>

            </div>

            <a href="{{ route('admin.blog.index') }}" class="btn btn-dark mt-5">بازگشت</a>

        </div>

    </div>

@endsection
