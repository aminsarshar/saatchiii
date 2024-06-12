@extends('home.layouts.home')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/font/bootstrap-icon/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugin/waves/waves.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugin/swiper/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugin/timer/timer.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugin/hint-css/hint-css.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugin/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style-2.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <title>ثبت نام در فروشگاه</title>
</head>

@section('content')
<body>
    <style>
        .header-bottom{
            display: none !important;
        }

        @media only screen and (max-width:576px) {
            .header-bottom{
            display: block !important;
        }
}
    </style>

    <div class="auths" style="direction: rtl">
        <div class="container">
            <div class="auth shadow-box">
                <div class="row" style="min-height: inherit;">
                    <div class="col-lg-8">
                        <div class="auth-forms">
                            <div class="auth-forms-item">
                                <div class="auth-logo d-lg-none d-block">
                                    <a href="index.html"><img src="img/default-icon/logo.png" class="img-fluid" alt=""></a>
                                </div>
                                <div class="auth-title">
                                    <h3>ثبت نام در فروشگاه</h3>
                                    <p class="my-3 text-muted">اگر قبلا ثبت نام کرده اید وارد شوید</p>
                                </div>
                                <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="auth-form">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                                <input type="text" class="form-control" placeholder="نام کاربری" name="name" value="{{old('name')}}">
                                            </div>
                                            @error('name')
                                            <div class="input-error-validation">
                                                <strong>{{$message}}</strong>
                                            </div>


                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                                <input style="direction: rtl;" type="email" class="form-control" placeholder="ایمیل" name="email" value="{{old('email')}}">
                                            </div>
                                            @error('email')
                                            <div class="input-error-validation">
                                                <strong>{{$message}}</strong>
                                            </div>

                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                                <input type="password" class="form-control" placeholder="رمز عبور" name="password" value="{{old('password')}}">
                                            </div>
                                            @error('password')
                                            <div class="input-error-validation">
                                                <strong>{{$message}}</strong>
                                            </div>

                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                                <input type="password" class="form-control" placeholder="تکرار رمز عبور" name="password_confirmation" value="{{old('password_confirmation')}}">
                                            </div>
                                            @error('password_confirmation')
                                            <div class="input-error-validation">
                                                <strong>{{$message}}</strong>
                                            </div>

                                            @enderror
                                        </div>
                                        <div class="d-flex justify-content-center flex-column align-items-center flex-wrap">
                                            <button type="submit" class="btn-login w-50 waves-effect waves-light"><i class="bi bi-person"></i>
                                                 ثبت نام در سایت
                                            </button>
                                            {{-- <a href="{{route('provider.login' , ['provider' => 'google'])}}" class="btn btn-login btn-g" style="margin-right: 23px;">
                                                <i class="icon-google"></i>
                                                حساب گوگل
                                              </a> --}}
                                        </div>

                                    <div class="social mt-3">
                                        <a href="{{route('provider.login' , ['provider' => 'google'])}}" class="bi bi-google"></a>
                                        <a href="" class="bi bi-facebook"></a>
                                        <a href="" class="bi bi-github"></a>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="auth-side d-lg-block d-none">
                            <div class="background">
                                <div class="cube"></div>
                                <div class="cube"></div>
                                <div class="cube"></div>
                                <div class="cube"></div>
                                <div class="cube"></div>
                            </div>
                            <div class="auth-desc">
                                <div class="auth-logo">
                                    <a href="index.html"><img src="img/default-icon/logo.png" class="img-fluid" alt=""></a>
                                </div>
                                <h3 class="fw-bold">خوش آمدید</h3>
                                <p class="my-3">
                                    اگر قبلا ثبت نام کرده اید میتوانید از این قسمت وارد شوید
                                </p>
                                <a href="login.html" class="btn-login-page waves-effect waves-light">وارد شوید</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
         @media screen and (max-width: 572px) {
            .input-error-validation{
                text-align: center !important;
                padding-right: 0px !important;
                padding-top: 0px !important;

            }
         }
         .input-error-validation{
            padding-right: 149px;
            padding-top: 9px;
            color: red;

         }

    </style>

    <script>
        let loginToken;
        // $('#checkOTPForm').hide();


        $('#loginForm').submit(function(event){
            console.log( $('#cellphoneInput').val() );
            event.preventDefault();

            $.post("{{ url('/login') }}",
            {
                '_token' : "{{ csrf_token() }}",e
                'cellphone' : $('#cellphoneInput').val()

            } , function(response , status){
                console.log(response , status);
                loginToken = response.login_token;



                $('#loginForm').fadeOut();
                $('#checkOTPForm').fadeIn();

            }).fail(function(response){
                console.log(response.responseJSON);
                $('#cellphoneInput').addClass('mb-1');
                $('#cellphoneInputError').fadeIn();
                $('#cellphoneInputErrorText').html(response.responseJSON.errors.cellphone[0]);
            })
        });

        $('#checkOTPForm').submit(function(event){
                event.preventDefault();

                $.post("{{ url('/check-otp') }}",
                {
                    '_token' : "{{ csrf_token() }}",
                    'otp' : $('#checkOTPInput').val(),
                    'login_token' : loginToken

                } , function(response , status){
                    console.log(response , status);
                    $(location).attr('href' , "{{ route('home.index') }}");

                }).fail(function(response){
                    console.log(response.responseJSON);
                    $('#checkOTPInput').addClass('mb-1');
                    $('#checkOTPInputError').fadeIn();
                    $('#checkOTPInputErrorText').html(response.responseJSON.errors.otp[0]);
                })
            });



    </script>


</body>

@endsection
</html>
