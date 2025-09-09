@extends('admin.layouts.admin')
@section('title')
    نمایش دسته بندی مقاله
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h5 class="font-weight-bold"> نمایش دسته بندی {{ $categoryblog->title }}</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div classZ="px-3">
                            <form class="form" novalidate method="POST" action="{{ route('admin.categoryblog.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row" style="margin: 10px">
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="" for="projectinput2">نام دسته بندی</label>
                                                <input class="form-control" type="text" placeholder="نام دسته بندی"
                                                    name="name" type="text" value="{{ $categoryblog->name }}"
                                                    disabled>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="" for="projectinput2">نام انگلیسی دسته بندی</label>
                                                <input class="form-control" type="text"
                                                    placeholder="نام انگلیسی دسته بندی" name="slug" type="text"
                                                    value="{{ $categoryblog->slug }}" disabled>
                                            </div>
                                        </div>


                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="" for="projectinput2">والد دسته بندی</label>
                                                <div class="form-control div-disabled" disabled>
                                                    @if ($categoryblog->parent_id == 0)
                                                        {{ $categoryblog->name }}
                                                    @else
                                                        {{ $categoryblog->parent->name }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="" for="projectinput2">وضعیت</label>
                                                <input class="form-control" type="text"
                                                    value="{{ $categoryblog->is_active }}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="" for="projectinput2">آیکون</label>
                                                <input class="form-control" type="text" value="{{ $categoryblog->icon }}"
                                                    disabled>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="" for="projectinput2">تاریخ ایجاد</label>
                                                <input class="form-control" type="text" placeholder="تاریخ ایجاد"
                                                    name="name" type="text"
                                                    value="{{ verta($categoryblog->created_at)->format('%d  %B   %Y') }}"
                                                    disabled>
                                            </div>
                                        </div>


                                    </div>


                                </div>

                                <div class="form-actions" style="margin: 10px">
                                    <button type="button" class="btn btn-danger mr-1">
                                        <a class="text-white" href="{{ route('admin.categoryblog.index') }}"><i
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
