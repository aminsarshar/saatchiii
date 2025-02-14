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
                                                    class="form-control" required
                                                    data-validation-required-message="فیلد شماره تماس الزامی است">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="form-group col-md-6 mb-2">
                                            <div class="custom-file">
                                                <div class="controls">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                                                        name="avatar" required
                                                        data-validation-required-message="فیلد لینک فایل الزامی است">
                                                    <label class="custom-file-label" for="inputGroupFile01">انتخاب
                                                        فایل</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <h4 class="form-section">
                                        <i class="icon-book-open"></i>مورد نیاز پروژه
                                    </h4>

                                    <div class="row">
                                        <div class="form-group col-12 mb-2">
                                            <label class="sr-only" for="projectinput5">شرکت</label>
                                            <input type="text" id="projectinput5" class="form-control"
                                                placeholder="نام شرکت" name="company">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="projectinput6">علاقه مند هستم</label>
                                            <select id="projectinput6" name="interested" class="form-control">
                                                <option value="none" selected="" disabled="">علاقه مند هستم</option>
                                                <option value="design">طرح</option>
                                                <option value="development">توسعه</option>
                                                <option value="illustration">تصویر</option>
                                                <option value="branding">نام تجاری</option>
                                                <option value="video">ویدئو</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6 mb-2">
                                            <label class="sr-only" for="projectinput7">بودجه</label>
                                            <select id="projectinput7" name="budget" class="form-control">
                                                <option value="0" selected="" disabled="">بودجه</option>
                                                <option value="less than 5000$">کمتر از 5000 ریال</option>
                                                <option value="5000$ - 10000$">5000 ریال 10000 - ریال</option>
                                                <option value="10000$ - 20000$">10000 ریال 20000 - ریال</option>
                                                <option value="more than 20000$">بیش از 20000 ریال </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-12 mb-2">
                                            <label class="sr-only">انتخاب فایل</label>
                                            <label id="projectinput8" class="file center-block">
                                                <input type="file" id="file">
                                                <span class="file-custom"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12 mb-2">
                                            <label class="sr-only" for="projectinput9">
                                                خلاصه پروژه</label>
                                            <textarea id="projectinput9" rows="5" class="form-control" name="comment" placeholder="خلاصه پروژه"></textarea>
                                        </div>
                                    </div> --}}
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
