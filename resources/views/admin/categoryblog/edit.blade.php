@extends('admin.layouts.admin')
@section('title')
    ویرایش دسته بندی مقاله
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">ویرایش دسته بندی مقاله</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">

                            <form action="{{ route('admin.categoryblog.update', ['categoryblog' => $categoryblog->id]) }}"
                                method="POST">
                                @csrf
                                @method('put')
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="name">نام</label>
                                        <input @error('name') style="border: 1px solid red;" @enderror
                                            @error('name') placeholder="نام الزامی است" @enderror class="form-control"
                                            name="name" type="text" value="{{ $categoryblog->name }}">
                                        @error('name')
                                            <p class="text-danger my-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="slug">نام انگلیسی</label>
                                        <input @error('slug') style="border: 1px solid red;" @enderror
                                            @error('slug') placeholder="نام انگلیسی الزامی است" @enderror
                                            class="form-control" name="slug" type="text"
                                            value="{{ $categoryblog->slug }}">
                                        @error('slug')
                                            <p class="text-danger my-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="parent_id">والد</label>
                                        <select class="form-control" id="parent_id" name="parent_id">
                                            <option value="0">بدون والد</option>
                                            @foreach ($parentCategories as $parentcategoryblog)
                                                <option value="{{ $parentcategoryblog->id }}"
                                                    {{ $categoryblog->parent_id == $parentcategoryblog->id ? 'selected' : '' }}>
                                                    {{ $parentcategoryblog->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="is_active">وضعیت</label>
                                        <select class="form-control" id="is_active" name="is_active">
                                            <option value="1"
                                                {{ $categoryblog->getRawOriginal('is_active') ? 'selected' : '' }}>فعال
                                            </option>
                                            <option value="0"
                                                {{ $categoryblog->getRawOriginal('is_active') ? 'selected' : '' }}>غیرفعال
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="name">آیکون</label>
                                        <input @error('icon') style="border: 1px solid red;" @enderror
                                            @error('icon') placeholder="نام الزامی است" @enderror class="form-control"
                                            name="icon" type="text" value="{{ $categoryblog->icon }}">
                                        @error('icon')
                                            <p class="text-danger my-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="name">توضیحات</label>
                                        <textarea class="form-control" id="description" name="description">{{ $categoryblog->description }}</textarea>
                                        @error('icon')
                                            <p class="text-danger my-2">{{ $message }}</p>
                                        @enderror
                                    </div>



                                </div>

                                <div class="form-actions">
                                    <button type="button" class="btn btn-danger mr-1">
                                        <a class="text-white" href="{{ route('admin.categoryblog.index') }}"><i
                                                class="icon-trash"></i> لغو</a>
                                    </button>
                                    <button type="submit" class="btn btn-warning">
                                        <i class="icon-note"></i> ویرایش
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


{{-- @extends('admin.layouts.admin')

@section('title')
    ویرایش دسته بندی
@endsection

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">ویرایش دسته بندی : {{ $categoryblog->name }}</h5>
            </div>
            <hr>


            <form action="{{ route('admin.categoryblog.update', ['categoryblog' => $categoryblog->id]) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="name">نام</label>
                        <input class="form-control" id="name" name="name" type="text" value="{{ $categoryblog->name }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="slug">نام انگلیسی</label>
                        <input class="form-control" id="slug" name="slug" type="text" value="{{ $categoryblog->slug }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="parent_id">والد</label>
                        <select class="form-control" id="parent_id" name="parent_id">
                            <option value="0">بدون والد</option>
                            @foreach ($parentCategories as $parentcategoryblog)
                                <option value="{{ $parentcategoryblog->id }}"
                                    {{ $categoryblog->parent_id == $parentcategoryblog->id ? 'selected' : '' }}
                                    >
                                    {{ $parentcategoryblog->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="is_active">وضعیت</label>
                        <select class="form-control" id="is_active" name="is_active">
                            <option value="1" {{ $categoryblog->getRawOriginal('is_active') ? 'selected' : '' }}>فعال</option>
                            <option value="0" {{ $categoryblog->getRawOriginal('is_active') ? 'selected' : '' }} >غیرفعال</option>
                        </select>
                    </div>


                    <div class="form-group col-md-3">
                        <label for="icon">آیکون</label>
                        <input class="form-control" id="icon" name="icon" type="text" value="{{ $categoryblog->icon }}">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="description">توضیحات</label>
                        <textarea class="form-control" id="description"
                            name="description">{{ $categoryblog->description }}</textarea>
                    </div>

                </div>

                <button class="btn btn-outline-primary mt-5" type="submit">ویرایش</button>
                <a href="{{ route('admin.categoryblog.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>

    </div>

@endsection --}}
