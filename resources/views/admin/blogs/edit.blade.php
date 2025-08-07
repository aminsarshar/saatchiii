@extends('admin.layouts.admin')
@section('title')
    ویرایش مقاله
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">ویرایش مقاله</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">

                            <form action="{{ route('admin.blogs.update', ['blog' => $blog->id]) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="name">عنوان مقاله</label>
                                        <input @error('title') style="border: 1px solid red;" @enderror
                                            @error('title') placeholder="عنوان مقاله الزامی است" @enderror
                                            class="form-control" name="title" type="text" value="{{ $blog->title }}">
                                        @error('title')
                                            <p class="text-danger my-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="is_active">وضعیت</label>
                                        <select class="form-control" id="is_active" name="is_active">
                                            <option value="1" {{ $blog->is_active == '1' ? 'selected' : '' }}>فعال
                                            </option>
                                            <option value="0" {{ $blog->is_active == '0' ? 'selected' : '' }}>
                                                غیرفعال</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="primary_image"> تغییر تصویر اصلی </label>
                                        <div class="custom-file">
                                            <input type="file" name="primary_image" class="custom-file-input"
                                                id="primary_image">
                                            <label class="custom-file-label" for="primary_image"> انتخاب فایل </label>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="description">متن مقاله</label>
                                        <textarea name="description" id="my_editor" class="form-control">{{ $blog->description }}</textarea>
                                    </div>


                                    <div class="col-md-6 mb-2">
                                        {{-- <div class="controls"> --}}
                                        <label class="" for="projectinput2">تصویر فعلی مقاله</label>
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

                                <button class="btn btn-outline-primary mt-5" type="submit">ویرایش</button>
                                <a href="{{ route('admin.blogs.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection
