    <!-- login modal -->
    <div class="modal fade auth" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-5">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="loginModalLabel">ورود به سایت</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input name="email" type="text" class="form-control float-input" id="floatingInput"
                                value="{{ old('email') }}"placeholder="تلفن همراه / ایمیل">
                            <label for="floatingInput">تلفن همره / ایمیل</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="password" type="password" class="form-control float-input"
                                id="floatingPassword" value="{{ old('password') }}"placeholder="کلمه عبور">
                            <label for="floatingPassword">کلمه عبور</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between flex-wrap mb-3">
                            <div class="form-group">
                                <a href="{{ route('loginsms') }}" class="btn btn-login btn-g">ورود با رمز یکبار مصرف</a>
                            </div>
                            <div class="form-group">
                                <a href="" class="btn btn-login btn-g">فراموشی رمز عبور</a>
                            </div>

                            <div class="form-group">
                            <a href="{{ route('provider.login', ['provider' => 'google']) }}"
                                class="btn btn-login btn-g">
                                <i class="icon-google"></i>
                                ورود با حساب گوگل
                            </a>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit"
                                class="btn main-color-three-bg border-0 rounded-pill w-100 text-white waves-effect waves-light">ورود</button>
                        </div>
                    </form>
                    <div class="divider">
                        <span>یا</span>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('register') }}">عضو نیستی؟ ثبت نام در فروشگاه</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end login modal -->
