@extends('admin.layouts.admin')
@section('title')
    ایجاد کاربر
@endsection
@section('content')
    <section id="hidden-label-form-layouts">

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">ساخت کاربر</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" novalidate method="POST" action="{{ route('admin.users.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <h4 class="form-section">
                                        <i class="icon-user"></i> اطلاعات شخصی
                                    </h4>
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">نام کاربری</label>
                                                <input type="text" placeholder="نام کاربری" name="name"
                                                    class="form-control" required
                                                    data-validation-required-message="فیلد نام کاربری الزامی است">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">ایمیل</label>
                                                <input type="text" placeholder="ایمیل" name="email"
                                                    class="form-control" required
                                                    data-validation-required-message="فیلد ایمیل الزامی است">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">رمزعبور</label>
                                                <input type="text" placeholder="رمزعبور" name="password"
                                                    class="form-control" required
                                                    data-validation-required-message="فیلد رمزعبور الزامی است">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="controls">
                                                <label class="sr-only" for="projectinput2">شماره تماس</label>
                                                <input type="text" placeholder="شماره تماس" name="cellphone"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="custom-file">
                                                <div class="controls">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                                                        name="avatar">
                                                    <label class="custom-file-label" for="inputGroupFile01">انتخاب
                                                        فایل</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-actions">
                                    <button type="button" class="btn btn-danger mr-1">
                                        <a class="text-white" href="{{ route('admin.users.index') }}"><i
                                                class="icon-trash"></i> لغو</a>
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
