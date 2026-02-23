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
                                        <h4 style="text-align: center;padding-bottom: 30px;color:#6666ff">فراموشی رمز عبور
                                        </h4>
                                    </a>
                                    <div class="login-register-form">
                                        <form method="POST" action="{{ route('password.update') }}">
                                            @csrf
                                            <input type="hidden" name="token" value="{{ request()->route('token') }}">
                                            <input type="email" name="email">
                                            <input type="password" name="password">
                                            <input type="password" name="password_confirmation">
                                            <div class="button-box d-flex justify-content-between">
                                                <button type="submit">تغییر رمز عبور</button>
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
