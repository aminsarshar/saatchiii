{{-- @extends('admin.layouts.admin')

@section('title')
    create roles
@endsection

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">ایجاد نقش</h5>
            </div>
            <hr>


            <form action="{{ route('admin.roles.store') }}" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="name">نام نمایشی</label>
                        <input class="form-control" name="display_name" type="text" {{ old('display_name') }}>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="name">نام</label>
                        <input class="form-control" name="name" type="text" {{ old('name') }}>
                    </div>

                    <div class="accordion col-md-12 mt-3" id="accordionPermission">
                        <div class="card">
                            <div class="card-header p-1" id="headingOne">
                                <h2 class="mb-0">
                                    <button style="display: flex;" class="btn btn-link btn-block text-right" type="button" data-toggle="collapse"
                                        data-target="#collapsePermission" aria-expanded="true" aria-controls="collapseOne">
                                        مجوز های دسترسی  <p style="color: rgb(105, 105, 105);font-size: 13px;padding-right: 10px;padding-top: 3px;">(کاربر چه مجوز هایی داشته باشه)</p>
                                    </button>
                                </h2>
                            </div>

                            <div id="collapsePermission" class="collapse" aria-labelledby="headingOne"
                                data-parent="#accordionPermission">
                                <div class="card-body row">
                                    @foreach ($permissions as $permission)
                                        <div class="form-group form-check col-md-3">
                                            <input type="checkbox" class="form-check-input" id="permission_{{$permission->id}}"
                                            name="{{$permission->name}}" value="{{$permission->name}}"
                                            >
                                            <label class="form-check-label mr-3" for="permission_{{$permission->id}}">{{ $permission->display_name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="btn btn-outline-primary mt-5" type="submit">ثبت</button>
                <a href="{{ route('admin.roles.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>

    </div>

@endsection --}}
@extends('admin.layouts.admin')
@section('title')
    ایجاد نقش
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">ساخت گارانتی</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" novalidate method="POST" action="{{ route('admin.roles.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">نام نقش</label>
                                                <input type="text" placeholder="نام نقش" name="name" type="text"
                                                    {{ old('name') }} class="form-control" required
                                                    data-validation-required-message="فیلد نام نقش الزامی است">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">نام نمایشی نقش</label>
                                                <input type="text" placeholder="نام نمایشی نقش" name="display_name"
                                                    type="text" {{ old('display_name') }} class="form-control" required
                                                    data-validation-required-message="فیلد نام نمایشی نقش الزامی است">
                                            </div>
                                        </div>

                                        <div class="accordion col-md-12 mt-3" id="accordionPermission">
                                            <div class="card">
                                                <div class="card-header p-1" id="headingOne">
                                                    <h2 class="mb-0">
                                                        <button style="display: flex;"
                                                            class="btn btn-link btn-block text-right" type="button"
                                                            data-toggle="collapse" data-target="#collapsePermission"
                                                            aria-expanded="true" aria-controls="collapseOne">
                                                            مجوز های دسترسی <p
                                                                style="color: rgb(105, 105, 105);font-size: 13px;padding-right: 10px;padding-top: 3px;">
                                                                (کاربر چه مجوز هایی داشته باشه)</p>
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapsePermission" class="collapse" aria-labelledby="headingOne"
                                                    data-parent="#accordionPermission">
                                                    <div class="card-body row">
                                                        @foreach ($permissions as $permission)
                                                            <div class="form-group form-check col-md-3">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="permission_{{ $permission->id }}"
                                                                    name="{{ $permission->name }}"
                                                                    value="{{ $permission->name }}">
                                                                <label class="form-check-label mr-3"
                                                                    for="permission_{{ $permission->id }}">{{ $permission->display_name }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="form-actions">
                                    <button type="button" class="btn btn-danger mr-1">
                                        <a class="text-white" href="{{ route('admin.roles.index') }}"><i
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
