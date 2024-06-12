@extends('home.layouts.home')



@section('title')
    صفحه اصلی
@endsection

@section('script')

{{-- <script>
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



</script> --}}

@endsection

@section('content')


        <div class="form-box" style="margin-top: 19px;height: 566px;">
          <div class="form-tab">
            <ul
              class="nav nav-pills nav-fill nav-border-anim"
              role="tablist"
            >
              <li class="nav-item">
                <a
                  class="nav-link active"
                  id="signin-tab"
                  data-toggle="tab"
                  href="#signin"
                  role="tab"
                  aria-controls="signin"
                  aria-selected="true"
                  >ورود</a
                >
              </li>

            </ul>
            <div class="tab-content" id="tab-content-5">
              <div
                class="tab-pane fade show active"
                id="signin"
                role="tabpanel"
                aria-labelledby="signin-tab"
              >

              <form action="{{route('login')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">ایمیل</label>
                    <input
                      type="email"
                      class="form-control"
                      name="email"
                      value="{{old('name')}}"
                      placeholder="ایمیل"

                    />
                    @error('email')
                    <div class="input-error-validation">
                        <strong>{{$message}}</strong>
                    </div>

                    @enderror
                  </div>
                  <!-- End .form-group -->


                  <div class="form-group">
                    <label for="password">رمز عبور</label>
                    <input
                      type="password"
                      class="form-control"
                      name="password"
                      value="{{old('password')}}"
                      placeholder="رمز عبوز"

                    />
                    @error('password')
                    <div class="input-error-validation">
                        <strong>{{$message}}</strong>
                    </div>

                    @enderror
                  </div>
                  <!-- End .form-group -->

              <div class="form-footer">
                <button type="submit" class="btn btn-outline-primary-2" style="margin-right:1px !important">
                  <span>ورود</span>
                  <i class="icon-long-arrow-left"></i>

                </button>



                <a href="{{route('register')}}" class="btn btn-outline-primary-2" style="color: white !important;background: #6666ff !important;">

                  <span>ثبت نام</span>
                  <i class="icon-long-arrow-left"></i>

                </a>
              </div>

              <style>
                .btn-outline-primary-2{
                    margin-right: 184px !important;

                }

                @media only screen and (max-width: 500px)
                 {
                    .btn-outline-primary-2{
                    margin-right: 1px !important;
                }

                 }

              </style>
              <!-- End .form-footer -->
            </form>
            <div class="form-choice" style="margin-top: -12px !important;">
              <p class="text-center">یا ورود با</p>
              <div class="row">
                <div class="col-sm-6">
                  <a href="{{route('provider.login' , ['provider' => 'google'])}}" class="btn btn-login btn-g">
                    <i class="icon-google"></i>
                    حساب گوگل
                  </a>
                </div>

                <div class="col-sm-6">
                    <a href="{{route('loginsms')}}" class="btn btn-login btn-g">
                        <i class="fa-solid fa-comment-sms"></i>
                       رمز یکبار مصرف
                    </a>
                  </div>



                <!-- End .form-choice -->
              </div>

              <!-- .End .tab-pane -->
            </div>
            <!-- End .tab-content -->
          </div>
          <!-- End .form-tab -->
        </div>
        <!-- End .form-box -->
      </div>
        </div>


@endsection





 {{-- برای ورود با گوگل  --}}



