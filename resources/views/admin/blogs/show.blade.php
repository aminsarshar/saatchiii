@extends('admin.layouts.admin')
@section('title')
    نمایش مقاله
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h5 class="font-weight-bold"> نمایش مقاله {{ $blog->title }}</h5>
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
                                                <label class="" for="projectinput2">نام مقاله</label>
                                                <input class="form-control" type="text" placeholder="نام مقاله"
                                                    name="name" type="text" value="{{ $blog->title }}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="" for="projectinput2">تاریخ ایجاد</label>
                                                <input class="form-control" type="text" placeholder="تاریخ ایجاد"
                                                    name="name" type="text"
                                                    value="{{ verta($blog->created_at)->format('%d  %B   %Y') }}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="" for="projectinput2">وضعیت مقاله</label>
                                                <input class="form-control" type="text" value="{{ $blog->is_active }}"
                                                    disabled>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="" for="projectinput2">نویسنده</label>
                                                <input class="form-control" type="text" value="{{ $blog->user->name }}"
                                                    disabled>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12 mb-2">
                                            <div class="controls">
                                                <label class="" for="projectinput2">متن مقاله</label>
                                                <textarea disabled name="description" id="my_editor" class="form-control">{{ str_replace(' ', '', $blog->description) }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            {{-- <div class="controls"> --}}
                                            <label class="" for="projectinput2">تصویر مقاله</label>
                                            <br>
                                            @if (!empty($blog->primary_image))
                                                <div class="card">
                                                    <img class="card-img-top"
                                                        src="{{ asset(env('BLOG_IMAGES_UPLOAD_PATH') . $blog->primary_image) }}"
                                                        alt="{{ $blog->title }}">
                                                </div>
                                            @else
                                                <div class="alert alert-danger">تصویر وجود ندارد</div>
                                            @endif
                                            {{-- </div> --}}

                                            <style>
                                                .card {
                                                    border: 0;
                                                    margin: 15px 0;
                                                    -webkit-box-shadow: 0 6px 0 0 rgba(0, 0, 0, 0.01), 0 15px 32px 0 rgba(0, 0, 0, 0.06);
                                                    box-shadow: 0 6px 0 0 rgba(0, 0, 0, 0.01), 0 15px 32px 0 rgba(0, 0, 0, 0.06) !important;
                                                    border-radius: 8px;


                                                }

                                                .card-img-top {
                                                    width: 100%;
                                                    height: 250px;
                                                    object-fit: cover

                                                }
                                            </style>


                                        </div>

                                    </div>


                                </div>

                                <div class="form-actions">
                                    <button type="button" class="btn btn-danger mr-1">
                                        <a class="text-white" href="{{ route('admin.blogs.index') }}"><i
                                                class="icon-back"></i> بازگشت</a>
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







{{--
<div class="row">

    <div class="form-group col-md-3">
        <label>وضعیت</label>
        <input class="form-control" type="text" value="{{ $blog->is_active }}" disabled>
    </div>



    <div class="form-group col-md-3">
        <label for="title">تصویر مقاله : </label>
        <img src="{{ asset(env('BLOG_IMAGES_UPLOAD_PATH') . $blog->primary_image) }}" alt="{{ $blog->title }}"
            width="140px" style="box-shadow: 0 7px 12px 5px rgba(0, 0, 0, 0.05)">
    </div>


    <div class="form-group col-md-3">
        <label>تاریخ ایجاد</label>
        <input class="form-control" type="text" value="{{ verta($blog->created_at) }}" disabled>
    </div>


    <div class="form-group col-md-12">
        <label for="description">متن مقاله</label>
        <textarea disabled name="description" id="my_editor" class="editor">
                        {{ $blog->description }}
                    </textarea>
    </div>

</div> --}}
