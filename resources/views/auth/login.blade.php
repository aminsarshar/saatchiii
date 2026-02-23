@extends('home.layouts.home')
@section('script')
    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const passwordInput = document.querySelector("#password");
        const icon = togglePassword.querySelector("i");

        togglePassword.addEventListener("click", function() {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.remove("bi-eye");
                icon.classList.add("bi-eye-slash");
            } else {
                passwordInput.type = "password";
                icon.classList.remove("bi-eye-slash");
                icon.classList.add("bi-eye");
            }
        });
    </script>
@endsection
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
                                        <h4 style="text-align: center;padding-bottom: 30px;color:#6666ff">ورود به حساب
                                            کاربری</h4>
                                    </a>
                                    <div class="login-register-form">
                                        <form action="{{ route('login') }}" method="post">
                                            @csrf
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

                                            <div class="position-relative">
                                                <input id="password" type="password" class="form-control"
                                                    placeholder="رمز عبور"
                                                    @error('password')
                                                style="border: 1px solid #ff0000 !important"
                                            @enderror
                                                    name="password" value="{{ old('password') }}">

                                                <button type="button" id="togglePassword"
                                                    style="position:absolute; left:10px; top:50%; transform:translateY(-50%);
                   background:none; border:none; cursor:pointer; color:#666; font-size:24px;">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                            </div>
                                            @error('password')
                                                <div class="input-error-validation">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror


                                            <div style="text-align: right;margin-bottom: 30px;">
                                                <input name="remember" type="checkbox" style="width: 30px !important">
                                                <span>مرا بخاطر بسپار</span>
                                            </div>
                                            @error('remember')
                                                <div class="input-error-validation">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                            <div class="button-box d-flex justify-content-between">
                                                <button type="submit">ورود</button>
                                            </div>

                                            <div style="text-align:right;margin:20px">
                                                <a href="{{ route('register') }}">حساب کاربری ندارید؟ عضویت</a>
                                            </div>
                                            <div style="text-align:right;margin:20px">
                                                <a href="{{ route('password.request') }}">فراموشی رمز عبور</a>
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
