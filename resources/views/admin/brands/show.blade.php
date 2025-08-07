@extends('admin.layouts.admin')
@section('title')
    نمایش برند
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h5 class="font-weight-bold"> نمایش برند {{ $brand->name }}</h5>
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
                                                <label class="" for="projectinput2">نام برند</label>
                                                <input class="form-control" type="text" placeholder="نام برند"
                                                    name="name" type="text" value="{{ $brand->name }}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="" for="projectinput2">تاریخ ایجاد</label>
                                                <input class="form-control" type="text" placeholder="تاریخ ایجاد"
                                                    name="name" type="text" value="{{ verta($brand->created_at)->format('%d  %B   %Y') }}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="" for="projectinput2">وضعیت برند</label>
                                                <input class="form-control" type="text" value="{{ $brand->is_active }}" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="" for="projectinput2">لوگوی برند</label>
                                                <br>
                                                @if (!empty($brand->image))
                                                <img src="{{ asset(env('BRAND_IMAGES_UPLOAD_PATH') . $brand->image) }}" alt="{{ $brand->name }}" style="width: 27%;height:88px;object-fit: fill;">
                                                @else
                                                <div class="alert alert-danger">لوگوی وجود ندارد</div>
                                                @endif
                                            </div>


                                        </div>

                                    </div>


                                </div>

                                <div class="form-actions">
                                    <button type="button" class="btn btn-danger mr-1">
                                        <a class="text-white" href="{{ route('admin.brands.index') }}"><i
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
