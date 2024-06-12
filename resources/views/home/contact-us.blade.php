@extends('home.layouts.home')
<link
rel="stylesheet"
href="{{asset('assets/css/home.css')}}"
/>
@section('title')
    صفحه ای تماس با ما
@endsection



@section('content')

    <!-- bread croumb -->
    <div class="content">
        <div class="container-fluid">
            <nav aria-label="breadcrumb" class="my-lg-0 my-2">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#" class="font-14 text-muted">خانه</a></li>
                    <li class="breadcrumb-item"><a href="#" class="font-14 text-muted">تماس با ما</a></li>

                </ol>
            </nav>
        </div>
    </div>

    <!-- start main-data -->
    <div class="content">
        <div class="container-fluid">
            <div class="content-box">
                <div class="contact-us">
                    <div>
                        <h3 class="h3 main-title">تماس با ما</h3>
                        <p class="font-16" style="line-height: 40px;">
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                            چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                            تکنولوژی
                            مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه
                            درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت
                            بیشتری
                            را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در
                            این
                            صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان
                            رسد
                            وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی
                            اساسا مورد استفاده قرار گیرد
                        </p>
                    </div>
                    <div class="row gy-3 my-3">
                        <div class="col-md-4">
                            <style>
                                .contact-box{
                                    transition: transform 0.2s; /* ترانزیشن برای تغییر transform در 0.2 ثانیه */
                                }

                                .contact-box:hover{
                                    transform: scale(1.05); /* تکوندن کارت با افزایش اندازه */
                                }
                            </style>
                            <div class="contact-box  p-4 bg-light shadow-inner">
                                <div class="icon text-center">
                                    <i class="bi bi-chat-dots fs-1"></i>
                                </div>
                                <div class="title my-3">
                                    <h4 class="h4">آدرس ها</h4>
                                </div>
                                <div class="desc">
                                    <p class="text-overflow-2 font-14">
                                        {{ $setting->address }}

                                    </p>
                                </div>
                                <div class="link mt-3">
                                    <a href="" class="btn border-0 main-color-one-bg waves-effect waves-light">بزن
                                        بریم</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="contact-box  p-4 bg-light shadow-inner">
                                <div class="icon text-center">
                                    <i class="bi bi-phone fs-1"></i>
                                </div>
                                <div class="title my-3">
                                    <h4 class="h4">تماس با ما</h4>
                                </div>
                                <div class="desc">
                                    <p class="text-overflow-2 font-14">
                                        {{ $setting->telephone }} <br> {{ $setting->telephone2 }}
                                    </p>
                                </div>
                                <div class="link mt-3">
                                    <a href="" class="btn border-0 main-color-one-bg waves-effect waves-light">بزن
                                        بریم</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="contact-box  p-4 bg-light shadow-inner">
                                <div class="icon text-center">
                                    <i class="bi bi-envelope fs-1"></i>
                                </div>
                                <div class="title my-3">
                                    <h4 class="h4">ایمیل و ارتباط بیشتر</h4>
                                </div>
                                <div class="desc">
                                    <p class="text-overflow-2 font-14">
                                        {{ $setting->email }}
                                    </p>
                                </div>
                                <div class="link mt-3">
                                    <a href="" class="btn border-0 main-color-one-bg waves-effect waves-light">بزن
                                        بریم</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-form py-20">
                        <h6 class="fs-3 text-center">فرم تماس با پشتیبانی</h6>
                        <p class="font-14 text-muted mt-2 text-center">اگر نظری انتقادی ، پیشنهادی داری از طریق فرم
                            پایین به ما بگو!</p>
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <form id="contact-form" action="{{route('home.contact-us.form')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-floating mb-3 form-group">
                                            <input
                                             type="email"
                                             class="form-control"
                                             id="floatingInputEmail"
                                             placeholder="ایمیل خود را وارد کنید"
                                             value="{{ old('email') }}"
                                             name="email"
                                             >
                                             @error('email')
                                             <p class="input-error-validation">
                                                 <strong>{{ $message }}</strong>
                                             </p>
                                             @enderror

                                            <label for="floatingInputEmail">ایمیل خود را وارد
                                                کنید</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating mb-3 form-group">
                                            <input
                                             type="text"
                                             class="form-control"
                                             id="floatingInputName"
                                             placeholder="نام خود را وارد کنید"
                                             value="{{ old('name') }}"
                                             name="name"

                                                >

                                            @error('name')
                                                <p class="input-error-validation">
                                                    <strong>{{ $message }}</strong>
                                                </p>
                                            @enderror
                                            <label for="floatingInputName">نام خود را وارد کنید مثلا : امین سرشار</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3 form-group">
                                            <input
                                             type="text"
                                             class="form-control"
                                             id="floatingInputName"
                                             placeholder="نام خود را وارد کنید"
                                             value="{{ old('subject') }}"
                                             name="subject"

                                                >

                                            @error('subject')
                                                <p class="input-error-validation">
                                                    <strong>{{ $message }}</strong>
                                                </p>
                                            @enderror
                                            <label for="floatingInputName">موضوع پیام را وارد کنید مثلا : خدمات</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here"
                                                id="floatingTextarea2" value="{{ old('text') }}"
                                                name="text" style="height: 150px"></textarea>

                                            @error('text')
                                                <p class="input-error-validation">
                                                    <strong>{{ $message }}</strong>
                                                </p>
                                            @enderror
                                            <label for="floatingTextarea2">متن پیام!</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit">ثبت</button>
                                    </div>
                                </div>
                            </form>
                            {!!  GoogleReCaptchaV3::render(['contact_us_id'=>'contact_us']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end main-data -->
                {{-- <div class="col-lg-7 col-md-6">
                    <div class="contact-from contact-shadow">
                        <form id="contact-form" action="{{route('home.contact-us.form')}}" method="post">
                            @csrf
                            <input name="name" type="text" placeholder="نام شما" value="{{ old('name') }}">
                            @error('name')
                                <p class="input-error-validation">
                                    <strong>{{ $message }}</strong>
                                </p>
                            @enderror
                            <input name="email" type="email" placeholder="ایمیل شما" value="{{ old('email') }}">
                            @error('email')
                                <p class="input-error-validation">
                                    <strong>{{ $message }}</strong>
                                </p>
                            @enderror
                            <input name="subject" type="text" placeholder="موضوع پیام" value="{{ old('subject') }}">
                            @error('subject')
                                <p class="input-error-validation">
                                    <strong>{{ $message }}</strong>
                                </p>
                            @enderror
                            <textarea name="text" placeholder="متن پیام">{{ old('text') }}</textarea>
                            @error('text')
                                <p class="input-error-validation">
                                    <strong>{{ $message }}</strong>
                                </p>
                            @enderror

                            <div id="contact_us_id"></div>
                            @error('g-recaptcha-response')
                            <p class="input-error-validation">
                                <strong>{{ $message }}</strong>
                            </p>
                        @enderror
                            <button class="submit" type="submit"> ارسال پیام </button>
                        </form>


                        {!!  GoogleReCaptchaV3::render(['contact_us_id'=>'contact_us']) !!}


                    </div>
                </div> --}}

@endsection
