@extends('home.layouts.home')
@section('content')
    <div class="login-register-area pt-100 pb-100" style="direction: rtl;padding-top:100px;padding-bottom:100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto" style="margin-right: auto;margin-left: auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">

                        </div>
                        <div class="tab-content" style="margin-top: 120px;margin-bottom: 120px;">

                            <div id="lg1" class="tab-pane active" style="margin-top: -112px;">

                                <div class="login-form-container" style="background: white">
                                    <a class="active" data-toggle="tab" href="#lg1">
                                        <h4 style="text-align: center;padding-bottom: 30px;color:#6666ff">عضویت در سایت</h4>
                                    </a>
                                    <div class="login-register-form">
                                        <form action="{{ route('register') }}" method="post">
                                            @csrf
                                            <input type="text" class="form-control" placeholder="نام کاربری"
                                                @error('name')
                                            style="border: 1px solid #ff0000 !important"
                                            @enderror
                                                name="name" value="{{ old('name') }}">
                                            @error('name')
                                                <div class="input-error-validation">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror

                                            <input type="email" class="form-control" placeholder="ایمیل"
                                                @error('email')
                                            style="border: 1px solid #ff0000 !important"
                                            @enderror
                                                name="email" value="{{ old('email') }}">
                                            @error('email')
                                                <div class="input-error-validation">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror

                                            <input type="password" class="form-control" placeholder="رمز عبور"
                                                @error('password')
                                            style="border: 1px solid #ff0000 !important"
                                            @enderror
                                                name="password" value="{{ old('password') }}">
                                            @error('password')
                                                <div class="input-error-validation">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror

                                            <input type="password" class="form-control" placeholder="تکرار رمز عبور"
                                                @error('password_confirmation')
                                            style="border: 1px solid #ff0000 !important"
                                            @enderror
                                                name="password_confirmation" value="{{ old('password_confirmation') }}">
                                            @error('password_confirmation')
                                                <div class="input-error-validation">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror

                                            <div class="button-box d-flex justify-content-between">
                                                <button type="submit">عضویت</button>
                                            </div>

                                            <div style="text-align:right;margin:20px">
                                                <a href="{{ route('login') }}">حساب کاربری دارید؟ ورود به حساب</a>
                                            </div>

                                            <div class="social mt-3">
                                                <a title="ورود با گوگل"
                                                    href="{{ route('provider.login', ['provider' => 'google']) }}"class="bi bi-google"
                                                    style="color: #EA4335"></a>
                                                <a href="" class="bi bi-facebook" style="color: #1877F2"></a>
                                                <a href="" class="bi bi-github" style="color: #4078c0"></a>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
