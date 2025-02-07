@extends('home.layouts.home')



@section('title')
    فروشگاه ساعت چی 
@endsection

@section('script')
    <script>
        window.toPersianNum = function(num, dontTrim) {

            var i = 0,

                dontTrim = dontTrim || false,

                num = dontTrim ? num.toString() : num.toString().trim(),
                len = num.length,

                res = '',
                pos,

                persianNumbers = typeof persianNumber == 'undefined' ? ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸',
                    '۹'] :
                persianNumbers;

            for (; i < len; i++)
                if ((pos = persianNumbers[num.charAt(i)]))
                    res += pos;
                else
                    res += num.charAt(i);

            return res;
        }

        window.number_format = function(number, decimals, dec_point, thousands_point) {

            if (number == null || !isFinite(number)) {
                throw new TypeError("number is not valid");
            }

            if (!decimals) {
                var len = number.toString().split('.').length;
                decimals = len > 1 ? len : 0;
            }

            if (!dec_point) {
                dec_point = '.';
            }

            if (!thousands_point) {
                thousands_point = ',';
            }

            number = parseFloat(number).toFixed(decimals);

            number = number.replace(".", dec_point);

            var splitNum = number.split(dec_point);
            splitNum[0] = splitNum[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_point);
            number = splitNum.join(dec_point);

            return number;
        }

        $('.variation-select').on('change', function() {
            let variation = JSON.parse(this.value);
            let variationPriceDiv = $('.variation-price-' + $(this).data('id'));
            variationPriceDiv.empty();

            if (variation.is_sale) {
                let spanSale = $('<span />', {
                    class: 'new',
                    text: toPersianNum(number_format(variation.sale_price)) + ' تومان'
                });
                let spanPrice = $('<del />', {
                    class: 'old',
                    text: toPersianNum(number_format(variation.price)) + ' تومان'
                });

                variationPriceDiv.append(spanSale);
                variationPriceDiv.append(spanPrice);
            } else {
                let spanPrice = $('<span />', {
                    class: 'new',
                    text: toPersianNum(number_format(variation.price)) + ' تومان'
                });
                variationPriceDiv.append(spanPrice);
            }

            $('.quantity-input').attr('max', variation.quantity);
            $('.quantity-input').val(1);

        });
    </script>
@endsection

@section('content')
    <script>
        new WOW().init();
    </script>
    <style>
        .old {
            font-size: 18px !important;
            color: #a1a1a1 !important;
            padding-right: 5px !important;
        }
    </style>

    <!-- home-slider -->
    <div class="home-slider py-20" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="swiper" id="homeSlider">
                        <div class="swiper-wrapper">
                            @foreach ($sliders as $slider)
                                <div class="swiper-slide">
                                    <a href=""><img
                                            src="{{asset('/upload/files/banners/images/' . $slider->image )}}"
                                            class="d-sm-block d-none" alt=""></a>
                                    <a href=""><img
                                            src="{{asset('/upload/files/banners/images/' . $slider->image )}}"
                                            class="d-sm-none d-block" alt=""></a>
                                </div>
                            @endforeach

                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next d-md-flex d-none"></div>
                        <div class="swiper-button-prev d-md-flex d-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end home-slider -->

    <!-- feature -->
    <div class="feature py-20" style="overflow: hidden !important">
        <div class="container-fluid" style="overflow: hidden !important">
            <div class="swiper" id="feature">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="feature-item text-center active">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-coin" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z" />
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z" />
                                </svg>
                            </div>
                            <div class="title mt-2 d-flex align-items-center justify-content-center flex-column">
                                <h6 class="font-12 fw-bold">فقط کالاهای اصل</h6>
                                <h6 class="font-10 text-muted">همراه با گارانتی معتبر</h6>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="feature-item text-center">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-repeat" viewBox="0 0 16 16">
                                    <path
                                        d="M11 5.466V4H5a4 4 0 0 0-3.584 5.777.5.5 0 1 1-.896.446A5 5 0 0 1 5 3h6V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192Zm3.81.086a.5.5 0 0 1 .67.225A5 5 0 0 1 11 13H5v1.466a.25.25 0 0 1-.41.192l-2.36-1.966a.25.25 0 0 1 0-.384l2.36-1.966a.25.25 0 0 1 .41.192V12h6a4 4 0 0 0 3.585-5.777.5.5 0 0 1 .225-.67Z" />
                                </svg>
                            </div>
                            <div class="title mt-2 d-flex align-items-center justify-content-center flex-column">
                                <h6 class="font-12 fw-bold">بازگشت و تعویض کالا</h6>
                                <h6 class="font-10 text-muted">تا هفت روز به هر دلیل</h6>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="feature-item text-center">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-gift" viewBox="0 0 16 16">
                                    <path
                                        d="M3 2.5a2.5 2.5 0 0 1 5 0 2.5 2.5 0 0 1 5 0v.006c0 .07 0 .27-.038.494H15a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 14.5V7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h2.038A2.968 2.968 0 0 1 3 2.506V2.5zm1.068.5H7v-.5a1.5 1.5 0 1 0-3 0c0 .085.002.274.045.43a.522.522 0 0 0 .023.07zM9 3h2.932a.56.56 0 0 0 .023-.07c.043-.156.045-.345.045-.43a1.5 1.5 0 0 0-3 0V3zM1 4v2h6V4H1zm8 0v2h6V4H9zm5 3H9v8h4.5a.5.5 0 0 0 .5-.5V7zm-7 8V7H2v7.5a.5.5 0 0 0 .5.5H7z" />
                                </svg>
                            </div>
                            <div class="title mt-2 d-flex align-items-center justify-content-center flex-column">
                                <h6 class="font-12 fw-bold">دریافت امتیاز با سفارش</h6>
                                <h6 class="font-10 text-muted">برای خرید های بعدی</h6>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="feature-item text-center">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-car-front" viewBox="0 0 16 16">
                                    <path
                                        d="M4 9a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM4.862 4.276 3.906 6.19a.51.51 0 0 0 .497.731c.91-.073 2.35-.17 3.597-.17 1.247 0 2.688.097 3.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 10.691 4H5.309a.5.5 0 0 0-.447.276Z" />
                                    <path
                                        d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM4.82 3a1.5 1.5 0 0 0-1.379.91l-.792 1.847a1.8 1.8 0 0 1-.853.904.807.807 0 0 0-.43.564L1.03 8.904a1.5 1.5 0 0 0-.03.294v.413c0 .796.62 1.448 1.408 1.484 1.555.07 3.786.155 5.592.155 1.806 0 4.037-.084 5.592-.155A1.479 1.479 0 0 0 15 9.611v-.413c0-.099-.01-.197-.03-.294l-.335-1.68a.807.807 0 0 0-.43-.563 1.807 1.807 0 0 1-.853-.904l-.792-1.848A1.5 1.5 0 0 0 11.18 3H4.82Z" />
                                </svg>
                            </div>
                            <div class="title mt-2 d-flex align-items-center justify-content-center flex-column">
                                <h6 class="font-12 fw-bold">ارسال اکسپرس</h6>
                                <h6 class="font-10 text-muted">سوپر مارت در تهران</h6>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="feature-item text-center">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-headset" viewBox="0 0 16 16">
                                    <path
                                        d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5z" />
                                </svg>
                            </div>
                            <div class="title mt-2 d-flex align-items-center justify-content-center flex-column">
                                <h6 class="font-12 fw-bold">مشاور رایگان خرید</h6>
                                <h6 class="font-10 text-muted">برای تمامی خرید های شما</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end feature -->

    {{-- <div class="offers">
    <div class="container-fluid">
        <div class="offer">
            <div class="row">
                <div class="col-lg-8 col-xxl-9">
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper"
                        id="offerItem">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="offer-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="offer-discount">
                                                <span>٪48 تخفیف</span>
                                            </div>
                                            <div class="offer-img">
                                                <img src="assets/image/product/wach1.jpg" alt="" class="img-fluid">
                                                <div class='countdown' data-date="2028-01-01" data-time="18:30">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="offer-content">
                                                <div class="offer-title d-md-inline-block d-none">
                                                    <h4>پیشنهاد شگفت انگیز <span>فروشگاه</span></h4>
                                                </div>
                                                <div class="offer-desc">
                                                    <div class="se-title">
                                                        <h5 class="text-overflow-2">گوشی موبایل شیائومی مدل Poco M4
                                                            Pro 5G دو سیم کارت
                                                            ظرفیت 128/6 گیگابایت
                                                        </h5>
                                                        <h6 class="text-muted text-overflow-2">Xiaomi Poco M4 Pro 5G
                                                            Dual SIM
                                                            128GB, 6GB Ram Mobile Phone
                                                        </h6>
                                                    </div>
                                                    <div class="se-desc">
                                                        <h6>ویژگی محصول:</h6>
                                                        <ul>
                                                            <li>
                                                                <span class="title">سری پردازنده:</span>
                                                                <span class="desc">Core i7</span>
                                                            </li>
                                                            <li>
                                                                <span class="title">مقدار رم:</span>
                                                                <span class="desc">16 گیگابایت</span>
                                                            </li>
                                                            <li>
                                                                <span class="title">حافظه داخلی:</span>
                                                                <span class="desc">512 گیگابایت</span>
                                                            </li>
                                                        </ul>
                                                        <div class="order-progress py-3">
                                                            <h6 class="fw-bold mb-2">63% فروش رفته</h6>
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                                    role="progressbar" aria-valuenow="63"
                                                                    aria-valuemin="0" aria-valuemax="100"
                                                                    style="width: 63%;background-color: #007fee;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="offer-desc-price">
                                                        <span class="old">2,000,000 تومان</span>
                                                        <span class="new">1,300,000 تومان</span>
                                                    </div>
                                                </div>

                                                <div class="offer-btn">
                                                    <a class="btn border-0 rounded-pill main-color-one-bg"
                                                        href="product.html"><i class="bi bi-cart-plus"></i> بریم
                                                        واسه
                                                        خرید!</i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="offer-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="offer-discount">
                                                <span>٪48 تخفیف</span>
                                            </div>
                                            <div class="offer-img">
                                                <img src="assets/image/product/wach2.jpg" alt="" class="img-fluid">
                                                <div class='countdown' data-date="2028-01-01" data-time="18:30">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="offer-content">
                                                <div class="offer-title d-md-inline-block d-none">
                                                    <h4>پیشنهاد شگفت انگیز <span>فروشگاه</span></h4>
                                                </div>
                                                <div class="offer-desc">
                                                    <div class="se-title">
                                                        <h5 class="text-overflow-2">گوشی موبایل شیائومی مدل Poco M4
                                                            Pro 5G دو سیم کارت
                                                            ظرفیت 128/6 گیگابایت
                                                        </h5>
                                                        <h6 class="text-muted text-overflow-2">Xiaomi Poco M4 Pro 5G
                                                            Dual SIM
                                                            128GB, 6GB Ram Mobile Phone
                                                        </h6>
                                                    </div>
                                                    <div class="se-desc">
                                                        <h6>ویژگی محصول:</h6>
                                                        <ul>
                                                            <li>
                                                                <span class="title">سری پردازنده:</span>
                                                                <span class="desc">Core i7</span>
                                                            </li>
                                                            <li>
                                                                <span class="title">مقدار رم:</span>
                                                                <span class="desc">16 گیگابایت</span>
                                                            </li>
                                                            <li>
                                                                <span class="title">حافظه داخلی:</span>
                                                                <span class="desc">512 گیگابایت</span>
                                                            </li>
                                                        </ul>
                                                        <div class="order-progress py-3">
                                                            <h6 class="fw-bold mb-2">63% فروش رفته</h6>
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                                    role="progressbar" aria-valuenow="63"
                                                                    aria-valuemin="0" aria-valuemax="100"
                                                                    style="width: 63%;background-color: #007fee;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="offer-desc-price">
                                                        <span class="old">2,000,000 تومان</span>
                                                        <span class="new">1,300,000 تومان</span>
                                                    </div>
                                                </div>

                                                <div class="offer-btn">
                                                    <a class="btn border-0 rounded-pill main-color-one-bg"
                                                        href="product.html"><i class="bi bi-cart-plus"></i> بریم
                                                        واسه
                                                        خرید!</i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="offer-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="offer-discount">
                                                <span>٪48 تخفیف</span>
                                            </div>
                                            <div class="offer-img">
                                                <img src="assets/image/product/wach3.jpg" alt="" class="img-fluid">
                                                <div class='countdown' data-date="2028-01-01" data-time="18:30">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="offer-content">
                                                <div class="offer-title d-md-inline-block d-none">
                                                    <h4>پیشنهاد شگفت انگیز <span>فروشگاه</span></h4>
                                                </div>
                                                <div class="offer-desc">
                                                    <div class="se-title">
                                                        <h5 class="text-overflow-2">گوشی موبایل شیائومی مدل Poco M4
                                                            Pro 5G دو سیم کارت
                                                            ظرفیت 128/6 گیگابایت
                                                        </h5>
                                                        <h6 class="text-muted text-overflow-2">Xiaomi Poco M4 Pro 5G
                                                            Dual SIM
                                                            128GB, 6GB Ram Mobile Phone
                                                        </h6>
                                                    </div>
                                                    <div class="se-desc">
                                                        <h6>ویژگی محصول:</h6>
                                                        <ul>
                                                            <li>
                                                                <span class="title">سری پردازنده:</span>
                                                                <span class="desc">Core i7</span>
                                                            </li>
                                                            <li>
                                                                <span class="title">مقدار رم:</span>
                                                                <span class="desc">16 گیگابایت</span>
                                                            </li>
                                                            <li>
                                                                <span class="title">حافظه داخلی:</span>
                                                                <span class="desc">512 گیگابایت</span>
                                                            </li>
                                                        </ul>
                                                        <div class="order-progress py-3">
                                                            <h6 class="fw-bold mb-2">63% فروش رفته</h6>
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                                    role="progressbar" aria-valuenow="63"
                                                                    aria-valuemin="0" aria-valuemax="100"
                                                                    style="width: 63%;background-color: #007fee;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="offer-desc-price">
                                                        <span class="old">2,000,000 تومان</span>
                                                        <span class="new">1,300,000 تومان</span>
                                                    </div>
                                                </div>

                                                <div class="offer-btn">
                                                    <a class="btn border-0 rounded-pill main-color-one-bg"
                                                        href="product.html"><i class="bi bi-cart-plus"></i> بریم
                                                        واسه
                                                        خرید!</i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="offer-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="offer-discount">
                                                <span>٪48 تخفیف</span>
                                            </div>
                                            <div class="offer-img">
                                                <img src="assets/image/product/wach4.jpg" alt="" class="img-fluid">
                                                <div class='countdown' data-date="2028-01-01" data-time="18:30">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="offer-content">
                                                <div class="offer-title d-md-inline-block d-none">
                                                    <h4>پیشنهاد شگفت انگیز <span>فروشگاه</span></h4>
                                                </div>
                                                <div class="offer-desc">
                                                    <div class="se-title">
                                                        <h5 class="text-overflow-2">گوشی موبایل شیائومی مدل Poco M4
                                                            Pro 5G دو سیم کارت
                                                            ظرفیت 128/6 گیگابایت
                                                        </h5>
                                                        <h6 class="text-muted text-overflow-2">Xiaomi Poco M4 Pro 5G
                                                            Dual SIM
                                                            128GB, 6GB Ram Mobile Phone
                                                        </h6>
                                                    </div>
                                                    <div class="se-desc">
                                                        <h6>ویژگی محصول:</h6>
                                                        <ul>
                                                            <li>
                                                                <span class="title">سری پردازنده:</span>
                                                                <span class="desc">Core i7</span>
                                                            </li>
                                                            <li>
                                                                <span class="title">مقدار رم:</span>
                                                                <span class="desc">16 گیگابایت</span>
                                                            </li>
                                                            <li>
                                                                <span class="title">حافظه داخلی:</span>
                                                                <span class="desc">512 گیگابایت</span>
                                                            </li>
                                                        </ul>
                                                        <div class="order-progress py-3">
                                                            <h6 class="fw-bold mb-2">63% فروش رفته</h6>
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                                    role="progressbar" aria-valuenow="63"
                                                                    aria-valuemin="0" aria-valuemax="100"
                                                                    style="width: 63%;background-color: #007fee;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="offer-desc-price">
                                                        <span class="old">2,000,000 تومان</span>
                                                        <span class="new">1,300,000 تومان</span>
                                                    </div>
                                                </div>

                                                <div class="offer-btn">
                                                    <a class="btn border-0 rounded-pill main-color-one-bg"
                                                        href="product.html"><i class="bi bi-cart-plus"></i> بریم
                                                        واسه
                                                        خرید!</i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="offer-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="offer-discount">
                                                <span>٪48 تخفیف</span>
                                            </div>
                                            <div class="offer-img">
                                                <img src="assets/image/product/product-image1.jpg" alt=""
                                                    class="img-fluid">
                                                <div class='countdown' data-date="2028-01-01" data-time="18:30">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="offer-content">
                                                <div class="offer-title d-md-inline-block d-none">
                                                    <h4>پیشنهاد شگفت انگیز <span>فروشگاه</span></h4>
                                                </div>
                                                <div class="offer-desc">
                                                    <div class="se-title">
                                                        <h5 class="text-overflow-2">گوشی موبایل شیائومی مدل Poco M4
                                                            Pro 5G دو سیم کارت
                                                            ظرفیت 128/6 گیگابایت
                                                        </h5>
                                                        <h6 class="text-muted text-overflow-2">Xiaomi Poco M4 Pro 5G
                                                            Dual SIM
                                                            128GB, 6GB Ram Mobile Phone
                                                        </h6>
                                                    </div>
                                                    <div class="se-desc">
                                                        <h6>ویژگی محصول:</h6>
                                                        <ul>
                                                            <li>
                                                                <span class="title">سری پردازنده:</span>
                                                                <span class="desc">Core i7</span>
                                                            </li>
                                                            <li>
                                                                <span class="title">مقدار رم:</span>
                                                                <span class="desc">16 گیگابایت</span>
                                                            </li>
                                                            <li>
                                                                <span class="title">حافظه داخلی:</span>
                                                                <span class="desc">512 گیگابایت</span>
                                                            </li>
                                                        </ul>
                                                        <div class="order-progress py-3">
                                                            <h6 class="fw-bold mb-2">63% فروش رفته</h6>
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                                    role="progressbar" aria-valuenow="63"
                                                                    aria-valuemin="0" aria-valuemax="100"
                                                                    style="width: 63%;background-color: #007fee;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="offer-desc-price">
                                                        <span class="old">2,000,000 تومان</span>
                                                        <span class="new">1,300,000 تومان</span>
                                                    </div>
                                                </div>

                                                <div class="offer-btn">
                                                    <a class="btn border-0 rounded-pill main-color-one-bg"
                                                        href="product.html"><i class="bi bi-cart-plus"></i> بریم
                                                        واسه
                                                        خرید!</i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="offer-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="offer-discount">
                                                <span>٪48 تخفیف</span>
                                            </div>
                                            <div class="offer-img">
                                                <img src="assets/image/product/television1.jpg" alt=""
                                                    class="img-fluid">
                                                <div class='countdown' data-date="2028-01-01" data-time="18:30">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="offer-content">
                                                <div class="offer-title d-md-inline-block d-none">
                                                    <h4>پیشنهاد شگفت انگیز <span>فروشگاه</span></h4>
                                                </div>
                                                <div class="offer-desc">
                                                    <div class="se-title">
                                                        <h5 class="text-overflow-2">گوشی موبایل شیائومی مدل Poco M4
                                                            Pro 5G دو سیم کارت
                                                            ظرفیت 128/6 گیگابایت
                                                        </h5>
                                                        <h6 class="text-muted text-overflow-2">Xiaomi Poco M4 Pro 5G
                                                            Dual SIM
                                                            128GB, 6GB Ram Mobile Phone
                                                        </h6>
                                                    </div>
                                                    <div class="se-desc">
                                                        <h6>ویژگی محصول:</h6>
                                                        <ul>
                                                            <li>
                                                                <span class="title">سری پردازنده:</span>
                                                                <span class="desc">Core i7</span>
                                                            </li>
                                                            <li>
                                                                <span class="title">مقدار رم:</span>
                                                                <span class="desc">16 گیگابایت</span>
                                                            </li>
                                                            <li>
                                                                <span class="title">حافظه داخلی:</span>
                                                                <span class="desc">512 گیگابایت</span>
                                                            </li>
                                                        </ul>
                                                        <div class="order-progress py-3">
                                                            <h6 class="fw-bold mb-2">63% فروش رفته</h6>
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                                    role="progressbar" aria-valuenow="63"
                                                                    aria-valuemin="0" aria-valuemax="100"
                                                                    style="width: 63%;background-color: #007fee;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="offer-desc-price">
                                                        <span class="old">2,000,000 تومان</span>
                                                        <span class="new">1,300,000 تومان</span>
                                                    </div>
                                                </div>

                                                <div class="offer-btn">
                                                    <a class="btn border-0 rounded-pill main-color-one-bg"
                                                        href="product.html"><i class="bi bi-cart-plus"></i> بریم
                                                        واسه
                                                        خرید!</i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="offer-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="offer-discount">
                                                <span>٪48 تخفیف</span>
                                            </div>
                                            <div class="offer-img">
                                                <img src="assets/image/product/television2.jpg" alt=""
                                                    class="img-fluid">
                                                <div class='countdown' data-date="2028-01-01" data-time="18:30">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="offer-content">
                                                <div class="offer-title d-md-inline-block d-none">
                                                    <h4>پیشنهاد شگفت انگیز <span>فروشگاه</span></h4>
                                                </div>
                                                <div class="offer-desc">
                                                    <div class="se-title">
                                                        <h5 class="text-overflow-2">گوشی موبایل شیائومی مدل Poco M4
                                                            Pro 5G دو سیم کارت
                                                            ظرفیت 128/6 گیگابایت
                                                        </h5>
                                                        <h6 class="text-muted text-overflow-2">Xiaomi Poco M4 Pro 5G
                                                            Dual SIM
                                                            128GB, 6GB Ram Mobile Phone
                                                        </h6>
                                                    </div>
                                                    <div class="se-desc">
                                                        <h6>ویژگی محصول:</h6>
                                                        <ul>
                                                            <li>
                                                                <span class="title">سری پردازنده:</span>
                                                                <span class="desc">Core i7</span>
                                                            </li>
                                                            <li>
                                                                <span class="title">مقدار رم:</span>
                                                                <span class="desc">16 گیگابایت</span>
                                                            </li>
                                                            <li>
                                                                <span class="title">حافظه داخلی:</span>
                                                                <span class="desc">512 گیگابایت</span>
                                                            </li>
                                                        </ul>
                                                        <div class="order-progress py-3">
                                                            <h6 class="fw-bold mb-2">63% فروش رفته</h6>
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                                    role="progressbar" aria-valuenow="63"
                                                                    aria-valuemin="0" aria-valuemax="100"
                                                                    style="width: 63%;background-color: #007fee;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="offer-desc-price">
                                                        <span class="old">2,000,000 تومان</span>
                                                        <span class="new">1,300,000 تومان</span>
                                                    </div>
                                                </div>

                                                <div class="offer-btn">
                                                    <a class="btn border-0 rounded-pill main-color-one-bg"
                                                        href="product.html"><i class="bi bi-cart-plus"></i> بریم
                                                        واسه
                                                        خرید!</i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="offer-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="offer-discount">
                                                <span>٪48 تخفیف</span>
                                            </div>
                                            <div class="offer-img">
                                                <img src="assets/image/product/product-image3.jpg" alt=""
                                                    class="img-fluid">
                                                <div class='countdown' data-date="2028-01-01" data-time="18:30">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="offer-content">
                                                <div class="offer-title d-md-inline-block d-none">
                                                    <h4>پیشنهاد شگفت انگیز <span>فروشگاه</span></h4>
                                                </div>
                                                <div class="offer-desc">
                                                    <div class="se-title">
                                                        <h5 class="text-overflow-2">گوشی موبایل شیائومی مدل Poco M4
                                                            Pro 5G دو سیم کارت
                                                            ظرفیت 128/6 گیگابایت
                                                        </h5>
                                                        <h6 class="text-muted text-overflow-2">Xiaomi Poco M4 Pro 5G
                                                            Dual SIM
                                                            128GB, 6GB Ram Mobile Phone
                                                        </h6>
                                                    </div>
                                                    <div class="se-desc">
                                                        <h6>ویژگی محصول:</h6>
                                                        <ul>
                                                            <li>
                                                                <span class="title">سری پردازنده:</span>
                                                                <span class="desc">Core i7</span>
                                                            </li>
                                                            <li>
                                                                <span class="title">مقدار رم:</span>
                                                                <span class="desc">16 گیگابایت</span>
                                                            </li>
                                                            <li>
                                                                <span class="title">حافظه داخلی:</span>
                                                                <span class="desc">512 گیگابایت</span>
                                                            </li>
                                                        </ul>
                                                        <div class="order-progress py-3">
                                                            <h6 class="fw-bold mb-2">63% فروش رفته</h6>
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                                    role="progressbar" aria-valuenow="63"
                                                                    aria-valuemin="0" aria-valuemax="100"
                                                                    style="width: 63%;background-color: #007fee;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="offer-desc-price">
                                                        <span class="old">2,000,000 تومان</span>
                                                        <span class="new">1,300,000 تومان</span>
                                                    </div>
                                                </div>

                                                <div class="offer-btn">
                                                    <a class="btn border-0 rounded-pill main-color-one-bg"
                                                        href="product.html"><i class="bi bi-cart-plus"></i> بریم
                                                        واسه
                                                        خرید!</i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination d-lg-none d-block"></div>
                    </div>
                </div>
                <div class="col-lg-4 col-xxl-3 d-lg-block d-none">
                    <div class="offer-item-link">
                        <div thumbsSlider="" class="swiper" id="offerItemLink">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="offer-item-link-item shadow-sm">
                                        <h6>
                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
                                        </h6>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="offer-item-link-item shadow-sm">
                                        <h6>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</h6>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="offer-item-link-item shadow-sm">
                                        <h6>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</h6>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="offer-item-link-item shadow-sm">
                                        <h6>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</h6>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="offer-item-link-item shadow-sm">
                                        <h6>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</h6>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="offer-item-link-item shadow-sm">
                                        <h6>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</h6>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="offer-item-link-item shadow-sm">
                                        <h6>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</h6>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="offer-item-link-item shadow-sm">
                                        <h6>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
    <!-- end offers -->

    <!-- start amazing -->
    <div class="amazing py-20 shadow-box" style="height: 463px;">
        <div class="container-fluid">
            <div class="swiper free-mode" id="amazing">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide ml-0">
                        <div class="d-flex justify-content-center align-items-center flex-column" style="margin-top:63px ">
                            <img src="assets/image/amazingv2.png" class="img-fluid" width="150" alt="">
                            <a href="{{ route('home.special-offer') }}" class="mt-2 text-white">مشاهده همه <svg
                                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
                                </svg></a>
                        </div>
                    </div>
                    @foreach ($products_special_offers as $products_special_offer)
                        <div class="swiper-slide wow animate__animated animate__fadeInLeft">
                            <div class="product-box-item bg-white" style="height: 388px">
                                <div class="hover">
                                    <div class="hover-btn">



                                        <a href="{{ route('home.compare.add', ['product' => $products_special_offer]) }}"
                                            data-hint="مقایسه محصول" class="hint--right"><i
                                                class="bi bi-arrow-left-right"></i></a>

                                        @auth
                                            @if ($products_special_offer->checkUserWishlist(auth()->id()))
                                                <a href="{{ route('home.wishlist.remove', ['product' => $products_special_offer->id]) }}"
                                                    data-hint="افزوده شده" class="hint--right" style="background: red"><i
                                                        class="bi bi-heart"></i></a>
                                            @else
                                                <a href="{{ route('home.wishlist.add', ['product' => $products_special_offer->id]) }}"
                                                    data-hint="افزودن به علاقه مندی" class="hint--right"><i
                                                        class="bi bi-heart"></i></a>
                                            @endif

                                        @endauth


                                        <a href="#productModal-{{ $products_special_offer->id }}" data-hint="مشاهده سریع"
                                            class="hint--right" data-bs-toggle="modal"
                                            data-bs-target="#productModal-{{ $products_special_offer->id }}"><i
                                                class="bi bi-eye"></i></a>
                                    </div>
                                    <div class="hover-color">
                                        <span style="background-color: #10b663;" data-hint="رنگ سبز"
                                            class="hint--left"></span>
                                        <span style="background-color: #e2350a;" data-hint="رنگ قرمز"
                                            class="hint--left"></span>
                                        <span style="background-color: #fafafa;" data-hint="رنگ سفید"
                                            class="hint--left"></span>
                                    </div>
                                </div>
                                <a href="{{ route('home.products.show', ['product' => $products_special_offer->slug]) }}">
                                    <div class="image text-center">

                                        <img src="{{ asset('/upload/files/products/images/'. $products_special_offer->primary_image) }}"
                                            alt="توضیحات عکس" class="img-fluid one-image">
                                        {{-- hover image --}}
                                        @foreach ($products_special_offer->images as $image)
                                            <img src="{{ asset('/upload/files/products/images/'.$image->image) }}"
                                                alt="" class="img-fluid two-image">
                                        @endforeach
                                    </div>
                                    <div class="desc">
                                        <div class="title">
                                            <h6 class="title-fa def-color fw-bold text-overflow-2">
                                                {{ $products_special_offer->name }}
                                            </h6>
                                            <h6 class="title-en text-muted text-overflow-2">
                                                {{ $products_special_offer->category->name }}
                                            </h6>

                                        </div>
                                        <div class="foot d-flex justify-content-between align-items-center">
                                            <form action="{{ route('home.cart.add') }}" method="POST">
                                                <input type="hidden" name="product_id"
                                                    value="{{ $products_special_offer->id }}">
                                                @csrf
                                                @if ($products_special_offer->quantity_check)
                                                    @php
                                                        if ($products_special_offer->sale_check) {
                                                            $variationProductSelected =
                                                                $products_special_offer->sale_check;
                                                        } else {
                                                            $variationProductSelected =
                                                                $products_special_offer->price_check;
                                                        }
                                                    @endphp
                                                    <div class="pro-details-size-color text-right">
                                                        <div class="pro-details-size w-50" style="display: none">
                                                            <span>{{ App\Models\Attribute::find($products_special_offer->variations->first()->attribute_id)->name }}</span>
                                                            <select name="variation" class="form-control variation-select"
                                                                style="display: none">
                                                                @foreach ($products_special_offer->variations()->where('quantity', '>', 0)->get() as $variation)
                                                                    <option
                                                                        value="{{ json_encode($variation->only(['id', 'quantity', 'is_sale', 'sale_price', 'price'])) }}"
                                                                        {{ $variationProductSelected->id == $variation->id ? 'selected' : '' }}>
                                                                        {{ $variation->value }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                    </div>


                                                    <form action="{{ route('home.cart.add') }}" method="POST">
                                                        <input type="hidden" name="product_id"
                                                            value="{{ $products_special_offer->id }}">
                                                        @csrf
                                                        @if ($products_special_offer->quantity_check)
                                                            @php
                                                                if ($products_special_offer->sale_check) {
                                                                    $variationProductSelected =
                                                                        $products_special_offer->sale_check;
                                                                } else {
                                                                    $variationProductSelected =
                                                                        $products_special_offer->price_check;
                                                                }
                                                            @endphp
                                                            <div class="pro-details-size-color text-right">
                                                                <div class="pro-details-size w-50" style="display: none">
                                                                    <span>{{ App\Models\Attribute::find($products_special_offer->variations->first()->attribute_id)->name }}</span>
                                                                    <select name="variation"
                                                                        class="form-control variation-select"
                                                                        data-id="{{ $products_special_offer->id }}"
                                                                        style="    width: 160px;">
                                                                        @foreach ($products_special_offer->variations()->where('quantity', '>', 0)->get() as $variation)
                                                                            <option
                                                                                value="{{ json_encode($variation->only(['id', 'quantity', 'is_sale', 'sale_price', 'price'])) }}"
                                                                                {{ $variationProductSelected->id == $variation->id ? 'selected' : '' }}>
                                                                                {{ $variation->value }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                            </div>
                                                            <div class="pro-details-quality">
                                                                <div class="cart-plus-minus"
                                                                    style="text-align: -webkit-right;display:none">
                                                                    <span>تعداد</span>
                                                                    <input style="width: 160px"
                                                                        class="form-control cart-plus-minus-box quantity-input"
                                                                        type="text" name="qtybutton" value="1"
                                                                        data-max="5" />
                                                                </div>
                                                                <div
                                                                    class="d-flex align-items-center justify-content-center">
                                                                    <button type="submit"
                                                                        style="border: none;padding-left: 94px;background: no-repeat;">
                                                                        <div class="add" data-hint="افزودن به سبد خرید"
                                                                            class="hint--right">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="16" height="16"
                                                                                fill="currentColor" class="bi bi-bag"
                                                                                viewBox="0 0 16 16">
                                                                                <path
                                                                                    d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                                                            </svg>
                                                                        </div>
                                                                    </button>

                                                                </div>





                                                                <div class="pro-details-wishlist" style="display: none">
                                                                    @auth
                                                                        @if ($products_special_offer->checkUserWishlist(auth()->id()))
                                                                            <a
                                                                                href="{{ route('home.wishlist.remove', ['product' => $products_special_offer->id]) }}"><i
                                                                                    class="fas fa-heart"
                                                                                    style="color:red"></i>
                                                                            </a>
                                                                        @else
                                                                            <a
                                                                                href="{{ route('home.wishlist.add', ['product' => $products_special_offer->id]) }}"><i
                                                                                    class="sli sli-heart"></i>
                                                                            </a>
                                                                        @endif
                                                                    @else
                                                                        <a
                                                                            href="{{ route('home.wishlist.add', ['product' => $products_special_offer->id]) }}"><i
                                                                                class="sli sli-heart"></i>
                                                                        </a>
                                                                    @endauth
                                                                </div>
                                                                <div class="pro-details-compare" style="display:none">
                                                                    <a title="Add To Compare" href="#"><i
                                                                            class="sli sli-refresh"></i></a>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="not-in-stock">
                                                                <p class="text-white">ناموجود</p>
                                                            </div>
                                                        @endif
                                                    </form>
                                                @else
                                                    <div class="not-in-stock">
                                                        <p class="text-white" style="padding-right:56px">ناموجود</p>
                                                    </div>
                                                @endif
                                            </form>

                                            @if ($products_special_offer->quantity_check)
                                                @if ($products_special_offer->sale_check)
                                                    <div class="price d-flex flex-column justify-content-end">
                                                        <div>
                                                            <span class="fw-bold font-18 def-color">
                                                                {{ number_format($products_special_offer->quantity_check->sale_price) }}
                                                            </span>
                                                            <svg class="mr-1 " width="14" height="16"
                                                                viewBox="0 0 14 16" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path class="text-gray-880 dark:text-white"
                                                                    d="M1.14878 6.91843C1.44428 6.91843 1.70285 6.87142 1.92447 6.77739C2.15282 6.68337 2.34422 6.55577 2.49869 6.39458C2.65316 6.2334 2.77069 6.04535 2.85128 5.83044C2.93187 5.62224 2.97888 5.40062 2.99231 5.16556H1.98492C1.6424 5.16556 1.36033 5.12862 1.1387 5.05474C0.917077 4.98087 0.742461 4.87341 0.614858 4.73238C0.487254 4.59134 0.396588 4.42344 0.34286 4.22868C0.295849 4.0272 0.272343 3.80221 0.272343 3.55372C0.272343 3.29852 0.309281 3.05674 0.383156 2.8284C0.457032 2.60005 0.564488 2.39857 0.705523 2.22396C0.846559 2.04934 1.02117 1.91167 1.22937 1.81093C1.44428 1.70347 1.68941 1.64974 1.96477 1.64974C2.1864 1.64974 2.39795 1.68668 2.59943 1.76056C2.80091 1.83443 2.97888 1.95196 3.13335 2.11315C3.28782 2.26761 3.40871 2.47245 3.49601 2.72766C3.59004 2.97615 3.63705 3.27837 3.63705 3.63431V4.47045H4.60415C4.68474 4.47045 4.73847 4.50068 4.76533 4.56112C4.79891 4.61485 4.8157 4.6988 4.8157 4.81297C4.8157 4.93386 4.79891 5.02452 4.76533 5.08497C4.73847 5.13869 4.68474 5.16556 4.60415 5.16556H3.6169C3.60347 5.49464 3.53631 5.80693 3.41542 6.10244C3.30125 6.39794 3.14007 6.65651 2.93187 6.87813C2.72368 7.09976 2.47518 7.27438 2.1864 7.40198C1.89761 7.5363 1.57188 7.60346 1.20922 7.60346H0.141381L0.0809373 6.91843H1.14878ZM0.896929 3.51343C0.896929 3.68133 0.913719 3.82572 0.947299 3.94661C0.987594 4.0675 1.0514 4.16823 1.1387 4.24883C1.23273 4.3227 1.35697 4.37979 1.51144 4.42008C1.66591 4.45366 1.86067 4.47045 2.09573 4.47045H3.00239V3.71491C3.00239 3.21792 2.90501 2.86198 2.71024 2.64707C2.51548 2.43215 2.24684 2.3247 1.90433 2.3247C1.58196 2.3247 1.33347 2.43215 1.15885 2.64707C0.984237 2.86198 0.896929 3.15076 0.896929 3.51343ZM6.26895 4.47045C6.35626 4.47045 6.41335 4.50068 6.44021 4.56112C6.47379 4.61485 6.49058 4.6988 6.49058 4.81297C6.49058 4.93386 6.47379 5.02452 6.44021 5.08497C6.41335 5.13869 6.35626 5.16556 6.26895 5.16556H4.60675C4.51944 5.16556 4.46235 5.13869 4.43549 5.08497C4.40191 5.03124 4.38512 4.94729 4.38512 4.83312C4.38512 4.71223 4.40191 4.62156 4.43549 4.56112C4.46235 4.50068 4.51944 4.47045 4.60675 4.47045H6.26895ZM7.93155 4.47045C8.01886 4.47045 8.07594 4.50068 8.10281 4.56112C8.13639 4.61485 8.15318 4.6988 8.15318 4.81297C8.15318 4.93386 8.13639 5.02452 8.10281 5.08497C8.07594 5.13869 8.01886 5.16556 7.93155 5.16556H6.26935C6.18204 5.16556 6.12495 5.13869 6.09809 5.08497C6.06451 5.03124 6.04772 4.94729 6.04772 4.83312C6.04772 4.71223 6.06451 4.62156 6.09809 4.56112C6.12495 4.50068 6.18204 4.47045 6.26935 4.47045H7.93155ZM9.59415 4.47045C9.68146 4.47045 9.73854 4.50068 9.76541 4.56112C9.79899 4.61485 9.81578 4.6988 9.81578 4.81297C9.81578 4.93386 9.79899 5.02452 9.76541 5.08497C9.73854 5.13869 9.68146 5.16556 9.59415 5.16556H7.93194C7.84464 5.16556 7.78755 5.13869 7.76069 5.08497C7.72711 5.03124 7.71032 4.94729 7.71032 4.83312C7.71032 4.71223 7.72711 4.62156 7.76069 4.56112C7.78755 4.50068 7.84464 4.47045 7.93194 4.47045H9.59415ZM11.2567 4.47045C11.3441 4.47045 11.4011 4.50068 11.428 4.56112C11.4616 4.61485 11.4784 4.6988 11.4784 4.81297C11.4784 4.93386 11.4616 5.02452 11.428 5.08497C11.4011 5.13869 11.3441 5.16556 11.2567 5.16556H9.59454C9.50723 5.16556 9.45015 5.13869 9.42328 5.08497C9.3897 5.03124 9.37291 4.94729 9.37291 4.83312C9.37291 4.71223 9.3897 4.62156 9.42328 4.56112C9.45015 4.50068 9.50723 4.47045 9.59454 4.47045H11.2567ZM12.1638 4.47045C12.4257 4.47045 12.6339 4.39994 12.7884 4.2589C12.9496 4.11787 13.0302 3.9231 13.0302 3.67461V2.2844H13.685V3.67461C13.685 4.15144 13.5506 4.52082 13.282 4.78275C13.0201 5.03795 12.6608 5.16556 12.2041 5.16556H11.2571C11.1698 5.16556 11.1127 5.13869 11.0859 5.08497C11.0523 5.03124 11.0355 4.94729 11.0355 4.83312C11.0355 4.71223 11.0523 4.62156 11.0859 4.56112C11.1127 4.50068 11.1698 4.47045 11.2571 4.47045H12.1638ZM13.7857 0.994934H12.9798V0.279683H13.7857V0.994934ZM12.5063 0.994934H11.7004V0.279683H12.5063V0.994934ZM5.64177 12.9641C5.64177 13.3267 5.58468 13.6659 5.47051 13.9815C5.35634 14.3039 5.1918 14.5826 4.97689 14.8177C4.76198 15.0595 4.50005 15.2509 4.19112 15.3919C3.8889 15.5329 3.54638 15.6035 3.16357 15.6035H2.56921C1.81702 15.6035 1.23273 15.3718 0.816337 14.9084C0.399946 14.445 0.191751 13.8103 0.191751 13.0044V11.2414H0.836485V12.9842C0.836485 13.273 0.870065 13.5349 0.937225 13.77C1.0111 14.0051 1.12191 14.2065 1.26967 14.3744C1.42413 14.549 1.61554 14.6834 1.84388 14.7774C2.07223 14.8714 2.34758 14.9184 2.66995 14.9184H3.1132C3.42885 14.9184 3.70421 14.8647 3.93927 14.7572C4.17433 14.6565 4.36909 14.5188 4.52356 14.3442C4.68474 14.1696 4.80227 13.9648 4.87615 13.7297C4.95674 13.4946 4.99703 13.2495 4.99703 12.9943V10.2844H5.64177V12.9641ZM3.21394 10.0628H2.36773V9.32738H3.21394V10.0628ZM8.24526 13.1656C8.07064 13.1656 7.90274 13.1421 7.74156 13.095C7.58038 13.0413 7.43598 12.954 7.30838 12.8331C7.18749 12.7122 7.09011 12.5544 7.01624 12.3596C6.94236 12.1582 6.90542 11.9097 6.90542 11.6142V6.9197H7.56023V11.4933C7.56023 11.7754 7.62067 12.0104 7.74156 12.1985C7.86916 12.3798 8.074 12.4705 8.35607 12.4705H8.52733C8.67508 12.4705 8.74896 12.5846 8.74896 12.813C8.74896 13.048 8.67508 13.1656 8.52733 13.1656H8.24526ZM8.69324 12.4705C8.95516 12.4705 9.15328 12.4067 9.2876 12.279C9.42192 12.1514 9.48908 11.9802 9.48908 11.7653V11.3825C9.48908 10.7982 9.63683 10.3415 9.93233 10.0124C10.2346 9.68332 10.6509 9.51878 11.1815 9.51878C11.4569 9.51878 11.6986 9.56243 11.9068 9.64974C12.115 9.73705 12.2863 9.8613 12.4206 10.0225C12.5616 10.1837 12.6657 10.3751 12.7329 10.5967C12.8001 10.8183 12.8336 11.0635 12.8336 11.3321C12.8336 11.9097 12.6825 12.3596 12.3803 12.682C12.0781 13.0044 11.6651 13.1656 11.1412 13.1656C10.8726 13.1656 10.614 13.1152 10.3655 13.0144C10.117 12.907 9.92226 12.7189 9.78123 12.4503C9.72078 12.6048 9.64691 12.729 9.5596 12.823C9.47229 12.9171 9.38162 12.9909 9.2876 13.0447C9.19358 13.0917 9.09284 13.1253 8.98538 13.1454C8.88464 13.1588 8.78726 13.1656 8.69324 13.1656H8.53205C8.44475 13.1656 8.38766 13.1387 8.3608 13.085C8.32722 13.0312 8.31043 12.9473 8.31043 12.8331C8.31043 12.7122 8.32722 12.6216 8.3608 12.5611C8.38766 12.5007 8.44475 12.4705 8.53205 12.4705H8.69324ZM12.1889 11.3925C12.1889 11.0433 12.1117 10.7612 11.9572 10.5463C11.8027 10.3247 11.5375 10.2139 11.1614 10.2139C10.4629 10.2139 10.1137 10.6202 10.1137 11.4328C10.1137 11.7754 10.2077 12.0339 10.3957 12.2085C10.5905 12.3831 10.839 12.4705 11.1412 12.4705C11.4837 12.4705 11.7423 12.3764 11.9169 12.1884C12.0982 12.0003 12.1889 11.7351 12.1889 11.3925Z"
                                                                    fill="currentColor"></path>
                                                            </svg>
                                                        </div>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <span class="text-muted font-14 text-decoration-line-through">
                                                                {{ number_format($products_special_offer->quantity_check->price) }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div>
                                                        <span class="fw-bold font-18 def-color">
                                                            {{ number_format($products_special_offer->quantity_check->price) }}
                                                        </span>
                                                        <svg class="mr-1 " width="14" height="16"
                                                            viewBox="0 0 14 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path class="text-gray-880 dark:text-white"
                                                                d="M1.14878 6.91843C1.44428 6.91843 1.70285 6.87142 1.92447 6.77739C2.15282 6.68337 2.34422 6.55577 2.49869 6.39458C2.65316 6.2334 2.77069 6.04535 2.85128 5.83044C2.93187 5.62224 2.97888 5.40062 2.99231 5.16556H1.98492C1.6424 5.16556 1.36033 5.12862 1.1387 5.05474C0.917077 4.98087 0.742461 4.87341 0.614858 4.73238C0.487254 4.59134 0.396588 4.42344 0.34286 4.22868C0.295849 4.0272 0.272343 3.80221 0.272343 3.55372C0.272343 3.29852 0.309281 3.05674 0.383156 2.8284C0.457032 2.60005 0.564488 2.39857 0.705523 2.22396C0.846559 2.04934 1.02117 1.91167 1.22937 1.81093C1.44428 1.70347 1.68941 1.64974 1.96477 1.64974C2.1864 1.64974 2.39795 1.68668 2.59943 1.76056C2.80091 1.83443 2.97888 1.95196 3.13335 2.11315C3.28782 2.26761 3.40871 2.47245 3.49601 2.72766C3.59004 2.97615 3.63705 3.27837 3.63705 3.63431V4.47045H4.60415C4.68474 4.47045 4.73847 4.50068 4.76533 4.56112C4.79891 4.61485 4.8157 4.6988 4.8157 4.81297C4.8157 4.93386 4.79891 5.02452 4.76533 5.08497C4.73847 5.13869 4.68474 5.16556 4.60415 5.16556H3.6169C3.60347 5.49464 3.53631 5.80693 3.41542 6.10244C3.30125 6.39794 3.14007 6.65651 2.93187 6.87813C2.72368 7.09976 2.47518 7.27438 2.1864 7.40198C1.89761 7.5363 1.57188 7.60346 1.20922 7.60346H0.141381L0.0809373 6.91843H1.14878ZM0.896929 3.51343C0.896929 3.68133 0.913719 3.82572 0.947299 3.94661C0.987594 4.0675 1.0514 4.16823 1.1387 4.24883C1.23273 4.3227 1.35697 4.37979 1.51144 4.42008C1.66591 4.45366 1.86067 4.47045 2.09573 4.47045H3.00239V3.71491C3.00239 3.21792 2.90501 2.86198 2.71024 2.64707C2.51548 2.43215 2.24684 2.3247 1.90433 2.3247C1.58196 2.3247 1.33347 2.43215 1.15885 2.64707C0.984237 2.86198 0.896929 3.15076 0.896929 3.51343ZM6.26895 4.47045C6.35626 4.47045 6.41335 4.50068 6.44021 4.56112C6.47379 4.61485 6.49058 4.6988 6.49058 4.81297C6.49058 4.93386 6.47379 5.02452 6.44021 5.08497C6.41335 5.13869 6.35626 5.16556 6.26895 5.16556H4.60675C4.51944 5.16556 4.46235 5.13869 4.43549 5.08497C4.40191 5.03124 4.38512 4.94729 4.38512 4.83312C4.38512 4.71223 4.40191 4.62156 4.43549 4.56112C4.46235 4.50068 4.51944 4.47045 4.60675 4.47045H6.26895ZM7.93155 4.47045C8.01886 4.47045 8.07594 4.50068 8.10281 4.56112C8.13639 4.61485 8.15318 4.6988 8.15318 4.81297C8.15318 4.93386 8.13639 5.02452 8.10281 5.08497C8.07594 5.13869 8.01886 5.16556 7.93155 5.16556H6.26935C6.18204 5.16556 6.12495 5.13869 6.09809 5.08497C6.06451 5.03124 6.04772 4.94729 6.04772 4.83312C6.04772 4.71223 6.06451 4.62156 6.09809 4.56112C6.12495 4.50068 6.18204 4.47045 6.26935 4.47045H7.93155ZM9.59415 4.47045C9.68146 4.47045 9.73854 4.50068 9.76541 4.56112C9.79899 4.61485 9.81578 4.6988 9.81578 4.81297C9.81578 4.93386 9.79899 5.02452 9.76541 5.08497C9.73854 5.13869 9.68146 5.16556 9.59415 5.16556H7.93194C7.84464 5.16556 7.78755 5.13869 7.76069 5.08497C7.72711 5.03124 7.71032 4.94729 7.71032 4.83312C7.71032 4.71223 7.72711 4.62156 7.76069 4.56112C7.78755 4.50068 7.84464 4.47045 7.93194 4.47045H9.59415ZM11.2567 4.47045C11.3441 4.47045 11.4011 4.50068 11.428 4.56112C11.4616 4.61485 11.4784 4.6988 11.4784 4.81297C11.4784 4.93386 11.4616 5.02452 11.428 5.08497C11.4011 5.13869 11.3441 5.16556 11.2567 5.16556H9.59454C9.50723 5.16556 9.45015 5.13869 9.42328 5.08497C9.3897 5.03124 9.37291 4.94729 9.37291 4.83312C9.37291 4.71223 9.3897 4.62156 9.42328 4.56112C9.45015 4.50068 9.50723 4.47045 9.59454 4.47045H11.2567ZM12.1638 4.47045C12.4257 4.47045 12.6339 4.39994 12.7884 4.2589C12.9496 4.11787 13.0302 3.9231 13.0302 3.67461V2.2844H13.685V3.67461C13.685 4.15144 13.5506 4.52082 13.282 4.78275C13.0201 5.03795 12.6608 5.16556 12.2041 5.16556H11.2571C11.1698 5.16556 11.1127 5.13869 11.0859 5.08497C11.0523 5.03124 11.0355 4.94729 11.0355 4.83312C11.0355 4.71223 11.0523 4.62156 11.0859 4.56112C11.1127 4.50068 11.1698 4.47045 11.2571 4.47045H12.1638ZM13.7857 0.994934H12.9798V0.279683H13.7857V0.994934ZM12.5063 0.994934H11.7004V0.279683H12.5063V0.994934ZM5.64177 12.9641C5.64177 13.3267 5.58468 13.6659 5.47051 13.9815C5.35634 14.3039 5.1918 14.5826 4.97689 14.8177C4.76198 15.0595 4.50005 15.2509 4.19112 15.3919C3.8889 15.5329 3.54638 15.6035 3.16357 15.6035H2.56921C1.81702 15.6035 1.23273 15.3718 0.816337 14.9084C0.399946 14.445 0.191751 13.8103 0.191751 13.0044V11.2414H0.836485V12.9842C0.836485 13.273 0.870065 13.5349 0.937225 13.77C1.0111 14.0051 1.12191 14.2065 1.26967 14.3744C1.42413 14.549 1.61554 14.6834 1.84388 14.7774C2.07223 14.8714 2.34758 14.9184 2.66995 14.9184H3.1132C3.42885 14.9184 3.70421 14.8647 3.93927 14.7572C4.17433 14.6565 4.36909 14.5188 4.52356 14.3442C4.68474 14.1696 4.80227 13.9648 4.87615 13.7297C4.95674 13.4946 4.99703 13.2495 4.99703 12.9943V10.2844H5.64177V12.9641ZM3.21394 10.0628H2.36773V9.32738H3.21394V10.0628ZM8.24526 13.1656C8.07064 13.1656 7.90274 13.1421 7.74156 13.095C7.58038 13.0413 7.43598 12.954 7.30838 12.8331C7.18749 12.7122 7.09011 12.5544 7.01624 12.3596C6.94236 12.1582 6.90542 11.9097 6.90542 11.6142V6.9197H7.56023V11.4933C7.56023 11.7754 7.62067 12.0104 7.74156 12.1985C7.86916 12.3798 8.074 12.4705 8.35607 12.4705H8.52733C8.67508 12.4705 8.74896 12.5846 8.74896 12.813C8.74896 13.048 8.67508 13.1656 8.52733 13.1656H8.24526ZM8.69324 12.4705C8.95516 12.4705 9.15328 12.4067 9.2876 12.279C9.42192 12.1514 9.48908 11.9802 9.48908 11.7653V11.3825C9.48908 10.7982 9.63683 10.3415 9.93233 10.0124C10.2346 9.68332 10.6509 9.51878 11.1815 9.51878C11.4569 9.51878 11.6986 9.56243 11.9068 9.64974C12.115 9.73705 12.2863 9.8613 12.4206 10.0225C12.5616 10.1837 12.6657 10.3751 12.7329 10.5967C12.8001 10.8183 12.8336 11.0635 12.8336 11.3321C12.8336 11.9097 12.6825 12.3596 12.3803 12.682C12.0781 13.0044 11.6651 13.1656 11.1412 13.1656C10.8726 13.1656 10.614 13.1152 10.3655 13.0144C10.117 12.907 9.92226 12.7189 9.78123 12.4503C9.72078 12.6048 9.64691 12.729 9.5596 12.823C9.47229 12.9171 9.38162 12.9909 9.2876 13.0447C9.19358 13.0917 9.09284 13.1253 8.98538 13.1454C8.88464 13.1588 8.78726 13.1656 8.69324 13.1656H8.53205C8.44475 13.1656 8.38766 13.1387 8.3608 13.085C8.32722 13.0312 8.31043 12.9473 8.31043 12.8331C8.31043 12.7122 8.32722 12.6216 8.3608 12.5611C8.38766 12.5007 8.44475 12.4705 8.53205 12.4705H8.69324ZM12.1889 11.3925C12.1889 11.0433 12.1117 10.7612 11.9572 10.5463C11.8027 10.3247 11.5375 10.2139 11.1614 10.2139C10.4629 10.2139 10.1137 10.6202 10.1137 11.4328C10.1137 11.7754 10.2077 12.0339 10.3957 12.2085C10.5905 12.3831 10.839 12.4705 11.1412 12.4705C11.4837 12.4705 11.7423 12.3764 11.9169 12.1884C12.0982 12.0003 12.1889 11.7351 12.1889 11.3925Z"
                                                                fill="currentColor"></path>
                                                        </svg>


                                                    </div>
                                                @endif
                                            @else
                                                <div>
                                                    <span class="fw-bold font-18 def-color">
                                                        ناموجود
                                                    </span>

                                                </div>
                                            @endif


                                        </div>
                                        <div class="timer text-center mt-2">
                                            <div class='countdown' data-date="2023-09-28" data-time=":30">
                                            </div>
                                        </div>
                                        <div class="timer text-center mt-2">
                                            <div class='countdown' data-date="{{ $products_special_offer->daily_timer }}"
                                                data-time="17:30">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next d-sm-flex d-none"></div>
                <div class="swiper-button-prev d-sm-flex d-none"></div>
            </div>
        </div>
    </div>
    <!-- end amazing -->

    <!-- start amazing -->
    {{-- <div class="fresh py-20 mt-3">
    <div class="container-fluid">
        <div
            class="parent d-flex flex-wrap align-items-center justify-content-lg-between justify-content-center shadow-box p-3 rounded-4">
            <div class="right d-flex flex-wrap align-items-center justify-content-center">
                <img src="assets/image/fresh.png" class="img-fluid" alt="">
                <span class="fs-4 ms-2 fw-bold text-white title">پیشنهاد سوپر مارکتی</span>
                <span class="bg-white ms-2 fw-bold rounded-pill p-2 font-12 text-success">تا 35% تخفیف</span>
            </div>
            <div class="left d-flex align-items-center flex-wrap justify-content-center mt-sm-0 mt-3">
                <div class="item position-relative mx-1">
                    <a href="">
                        <img src="assets/image/product/laptop1.jpg" width="70" class="rounded-circle" alt="">
                        <span class="badge bg-danger rounded-pill position-absolute bottom-0 start-0">25%</span>
                    </a>
                </div>
                <div class="item position-relative mx-1">
                    <a href="">
                        <img src="assets/image/product/laptop2.jpg" width="70" class="rounded-circle" alt="">
                        <span class="badge bg-danger rounded-pill position-absolute bottom-0 start-0">25%</span>
                    </a>
                </div>
                <div class="item position-relative mx-1">
                    <a href="">
                        <img src="assets/image/product/laptop3.jpg" width="70" class="rounded-circle" alt="">
                        <span class="badge bg-danger rounded-pill position-absolute bottom-0 start-0">25%</span>
                    </a>
                </div>
                <div class="item position-relative mx-1 d-sm-flex d-none">
                    <a href="">
                        <img src="assets/image/product/laptop4.jpg" width="70" class="rounded-circle" alt="">
                        <span class="badge bg-danger rounded-pill position-absolute bottom-0 start-0">25%</span>
                    </a>
                </div>
                <div class="item position-relative mx-1 d-sm-flex d-none">
                    <a href="">
                        <img src="assets/image/product/wach1.jpg" width="70" class="rounded-circle" alt="">
                        <span class="badge bg-danger rounded-pill position-absolute bottom-0 start-0">25%</span>
                    </a>
                </div>

            </div>
            <div class="link mt-lg-0 mt-4">
                <a href="">
                    <span class="bg-white ms-2 fw-bold rounded-pill p-2 font-12">بیش از 100 کالا <svg
                            xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
                        </svg></span>
                </a>
            </div>
        </div>
    </div>
</div> --}}
    <!-- end amazing supermarket -->

    <div class="product-banner py-20" style="overflow: hidden ; ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 test" data-aos="fade-left" data-aos-duration="700" style="padding-left: 30px;">
                    <div class="d-flex justify-content-between align-items-center shadow-box bg-white prodcut-banner-item">
                        <div class="desc">
                            <div class="title-1">
                                <h6 class="font-14 text-muted">مجموعه محصولات</h6>
                            </div>
                            <div class="title-2">
                                <h6 class="fw-bold font-18 main-color-one-color">ساعت کلاسیک</h6>
                            </div>
                            <a href="" class="link font-14 mt-3 d-block text-muted"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-arrow-left-short main-color-one-color" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
                                </svg><span class="mct-hover">مشاهده محصولات</span></a>
                        </div>
                        <div class="image">
                            <img src="assets/image/classic.png" width="150" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 test" data-aos="fade-up" data-aos-duration="700" style="padding-left: 30px;">
                    <div
                        class="d-flex justify-content-between align-items-center shadow-box bg-white prodcut-banner-item mt-md-0 mt-2">
                        <div class="desc">
                            <div class="title-1">
                                <h6 class="font-14 text-muted">مجموعه محصولات</h6>
                            </div>
                            <div class="title-2">
                                <h6 class="fw-bold font-18 main-color-one-color">ساعت اسپرت</h6>
                            </div>
                            <a href="" class="link font-14 mt-3 d-block text-muted"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-arrow-left-short main-color-one-color" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
                                </svg><span class="mct-hover">مشاهده محصولات</span></a>
                        </div>
                        <div class="image">
                            <img src="assets/image/sport.png" width="150" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 test" data-aos="fade-right" data-aos-duration="700" style="padding-left: 30px;">
                    <div
                        class="d-flex justify-content-between align-items-center shadow-box bg-white prodcut-banner-item mt-md-0 mt-2">
                        <div class="desc">
                            <div class="title-1">
                                <h6 class="font-14 text-muted">مجموعه محصولات</h6>
                            </div>
                            <div class="title-2">
                                <h6 class="fw-bold font-18 main-color-one-color">ساعت هوشمند</h6>
                            </div>
                            <a href="" class="link font-14 mt-3 d-block text-muted"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-arrow-left-short main-color-one-color" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
                                </svg><span class="mct-hover">مشاهده محصولات</span></a>
                        </div>
                        <div class="image">
                            <img src="assets/image/smart.png" width="150" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end product banner -->

    <style>
        .test {
            transition: transform 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .test:hover {
            transform: scale(1.1) rotateX(-5deg);
        }
    </style>

    {{-- <div class="main-category py-20">
    <div class="container-fluid">
        <div class="parent">
            <div class="row justify-content-center">
                <div class="main-category-title">
                    <h4 class="main-title">دسته بندی های فروشگاه</h4>
                </div>
                <div class="col-lg-2 col-sm-4 col-6 mb-3">
                    <a href="category.html">
                        <div class="item">
                            <div class="image">
                                <img src="assets/image/cat/clothes1.png" alt="" class="img-fluid">
                            </div>
                            <div class="title mt-2">
                                <h6 class="font-14">لباس</h6>
                            </div>
                            <div class="hover">
                                <span class="badge rounded-pill bg-dark font-14">87</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-sm-4 col-6 mb-3">
                    <a href="category.html">
                        <div class="item">
                            <div class="image">
                                <img src="assets/image/cat/clothes1.png" alt="" class="img-fluid">
                            </div>
                            <div class="title mt-2">
                                <h6 class="font-14">لباس</h6>
                            </div>
                            <div class="hover">
                                <span class="badge rounded-pill bg-dark font-14">87</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-sm-4 col-6 mb-3">
                    <a href="category.html">
                        <div class="item">
                            <div class="image">
                                <img src="assets/image/cat/clothes1.png" alt="" class="img-fluid">
                            </div>
                            <div class="title mt-2">
                                <h6 class="font-14">لباس</h6>
                            </div>
                            <div class="hover">
                                <span class="badge rounded-pill bg-dark font-14">87</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-sm-4 col-6 mb-3">
                    <a href="category.html">
                        <div class="item">
                            <div class="image">
                                <img src="assets/image/cat/clothes1.png" alt="" class="img-fluid">
                            </div>
                            <div class="title mt-2">
                                <h6 class="font-14">لباس</h6>
                            </div>
                            <div class="hover">
                                <span class="badge rounded-pill bg-dark font-14">87</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-sm-4 col-6 mb-3">
                    <a href="category.html">
                        <div class="item">
                            <div class="image">
                                <img src="assets/image/cat/clothes1.png" alt="" class="img-fluid">
                            </div>
                            <div class="title mt-2">
                                <h6 class="font-14">لباس</h6>
                            </div>
                            <div class="hover">
                                <span class="badge rounded-pill bg-dark font-14">87</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-sm-4 col-6 mb-3">
                    <a href="category.html">
                        <div class="item">
                            <div class="image">
                                <img src="assets/image/cat/dress.png" alt="" class="img-fluid">
                            </div>
                            <div class="title mt-2">
                                <h6 class="font-14">لباس زنانه</h6>
                            </div>
                            <div class="hover">
                                <span class="badge rounded-pill bg-dark font-14">87</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-sm-4 col-6 mb-3">
                    <a href="category.html">
                        <div class="item">
                            <div class="image">
                                <img src="assets/image/cat/fashion.png" alt="" class="img-fluid">
                            </div>
                            <div class="title mt-2">
                                <h6 class="font-14">پیراهن</h6>
                            </div>
                            <div class="hover">
                                <span class="badge rounded-pill bg-dark font-14">87</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-sm-4 col-6 mb-3">
                    <a href="category.html">
                        <div class="item">
                            <div class="image">
                                <img src="assets/image/cat/tshirt.png" alt="" class="img-fluid">
                            </div>
                            <div class="title mt-2">
                                <h6 class="font-14">لیاس بچگانه</h6>
                            </div>
                            <div class="hover">
                                <span class="badge rounded-pill bg-dark font-14">87</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-sm-4 col-6 mb-3">
                    <a href="category.html">
                        <div class="item">
                            <div class="image">
                                <img src="assets/image/cat/denim-shorts.png" alt="" class="img-fluid">
                            </div>
                            <div class="title mt-2">
                                <h6 class="font-14">شورت</h6>
                            </div>
                            <div class="hover">
                                <span class="badge rounded-pill bg-dark font-14">23</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-sm-4 col-6 mb-3">
                    <a href="category.html">
                        <div class="item">
                            <div class="image">
                                <img src="assets/image/cat/shoes.png" alt="" class="img-fluid">
                            </div>
                            <div class="title mt-2">
                                <h6 class="font-14">لباس</h6>
                            </div>
                            <div class="hover">
                                <span class="badge rounded-pill bg-dark font-14">123</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-sm-4 col-6 mb-3">
                    <a href="category.html">
                        <div class="item">
                            <div class="image">
                                <img src="assets/image/cat/clothes2.png" alt="" class="img-fluid">
                            </div>
                            <div class="title mt-2">
                                <h6 class="font-14">لباس مجلسی</h6>
                            </div>
                            <div class="hover">
                                <span class="badge rounded-pill bg-dark font-14">87</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-sm-4 col-6 mb-3">
                    <a href="category.html">
                        <div class="item">
                            <div class="image">
                                <img src="assets/image/cat/clothes1.png" alt="" class="img-fluid">
                            </div>
                            <div class="title mt-2">
                                <h6 class="font-14">لباس</h6>
                            </div>
                            <div class="hover">
                                <span class="badge rounded-pill bg-dark font-14">87</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main category --> --}}


    <div class="product-box-three py-20">
        <div class="container-fluid">
            <div class="parent" style="height: 430px;">
                <div class="content-title">
                    <div class="item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-seam" viewBox="0 0 16 16">
                            <path
                                d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                        </svg>
                        <h5 class="title">بهترین های سال</h5>
                    </div>
                    <div class="item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z" />
                            <path fill-rule="evenodd"
                                d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                        </svg>
                        <a href="">
                            <h5 class="title">مشاهده همه</h5>
                        </a>
                    </div>
                </div>
                <div class="swiper py-3" id="swiper-box">
                    <div class="swiper-wrapper">
                        @foreach ($product_normal_mens as $product_normal_men)
                            {{-- <style>
                        @media screen and (max-width: 572px) {
                            .swiper-slide{
                                margin-left: 130px !important;
                            }
                        }

                        .product-box-item{
                            transition: transform 0.2s; /* ترانزیشن برای تغییر transform در 0.2 ثانیه */

                        }

                        .product-box-item:hover{
                            transform: scale(1.09); /* تکوندن کارت با افزایش اندازه */

                        }
                    </style> --}}

                            <style>
                                .swiper-slide.wow.animate__.animate__fadeInRight.animated {
                                    /* margin-left: 50px !important;
                            margin-right: 50px !important; */
                                }

                                /* .swiper-slide.swiper-slide{
                                margin-left: 30px !important;
                            margin-right: 30px !important;
                            } */
                            </style>
                            <div class="swiper-slide wow animate__animated animate__fadeInRight" style="">
                                <div class="product-box-item bg-white">
                                    <div class="hover">
                                        <div class="hover-btn">

                                            <a href="{{ route('home.compare.add', ['product' => $product_normal_men]) }}"
                                                data-hint="مقایسه محصول" class="hint--right"><i
                                                    class="bi bi-arrow-left-right"></i></a>

                                            @auth
                                                @if ($product_normal_men->checkUserWishlist(auth()->id()))
                                                    <a href="{{ route('home.wishlist.remove', ['product' => $product_normal_men->id]) }}"
                                                        data-hint="افزوده شده" class="hint--right" style="background: red"><i
                                                            class="bi bi-heart"></i></a>
                                                @else
                                                    <a href="{{ route('home.wishlist.add', ['product' => $product_normal_men->id]) }}"
                                                        data-hint="افزودن به علاقه مندی" class="hint--right"><i
                                                            class="bi bi-heart"></i></a>
                                                @endif

                                            @endauth


                                            <a href="#productModal-{{ $product_normal_men->id }}" data-hint="مشاهده سریع"
                                                class="hint--right" data-bs-toggle="modal"
                                                data-bs-target="#productModal-{{ $product_normal_men->id }}"><i
                                                    class="bi bi-eye"></i></a>
                                        </div>
                                        <div class="hover-color">
                                            <span style="background-color: #10b663;" data-hint="رنگ سبز"
                                                class="hint--left"></span>
                                            <span style="background-color: #e2350a;" data-hint="رنگ قرمز"
                                                class="hint--left"></span>
                                            <span style="background-color: #fafafa;" data-hint="رنگ سفید"
                                                class="hint--left"></span>
                                        </div>
                                    </div>




                                    <a
                                        href="{{ route('home.products.show', ['product' => $product_normal_men->slug]) }}">
                                        <div class="image text-center">
                                            <img src="{{ asset('/upload/files/products/images/' . $product_normal_men->primary_image) }}"
                                                alt="" class="img-fluid one-image">
                                            {{-- hover image --}}
                                            @foreach ($product_normal_men->images as $image)
                                                <img src="{{ asset('/upload/files/products/images/' . $image->image) }}"
                                                    alt="" class="img-fluid two-image">
                                            @endforeach
                                        </div>
                                        <div class="desc">
                                            <div class="title">
                                                <h6 class="title-fa def-color fw-bold text-overflow-2">
                                                    {{ $product_normal_men->name }}
                                                </h6>
                                                <h6 class="title-en text-muted text-overflow-2">
                                                    {{ $product_normal_men->category->name }}
                                                </h6>
                                            </div>
                                            <div class="foot d-flex justify-content-between align-items-center">
                                                <form action="{{ route('home.cart.add') }}" method="POST">
                                                    <input type="hidden" name="product_id"
                                                        value="{{ $product_normal_men->id }}">
                                                    @csrf
                                                    @if ($product_normal_men->quantity_check)
                                                        @php
                                                            if ($product_normal_men->sale_check) {
                                                                $variationProductSelected =
                                                                    $product_normal_men->sale_check;
                                                            } else {
                                                                $variationProductSelected =
                                                                    $product_normal_men->price_check;
                                                            }
                                                        @endphp
                                                        <div class="pro-details-size-color text-right">
                                                            <div class="pro-details-size w-50" style="display: none">
                                                                <span>{{ App\Models\Attribute::find($product_normal_men->variations->first()->attribute_id)->name }}</span>
                                                                <select name="variation"
                                                                    class="form-control variation-select"
                                                                    style="display: none">
                                                                    @foreach ($product_normal_men->variations()->where('quantity', '>', 0)->get() as $variation)
                                                                        <option
                                                                            value="{{ json_encode($variation->only(['id', 'quantity', 'is_sale', 'sale_price', 'price'])) }}"
                                                                            {{ $variationProductSelected->id == $variation->id ? 'selected' : '' }}>
                                                                            {{ $variation->value }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                        </div>


                                                        <form action="{{ route('home.cart.add') }}" method="POST">
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $product_normal_men->id }}">
                                                            @csrf
                                                            @if ($product_normal_men->quantity_check)
                                                                @php
                                                                    if ($product_normal_men->sale_check) {
                                                                        $variationProductSelected =
                                                                            $product_normal_men->sale_check;
                                                                    } else {
                                                                        $variationProductSelected =
                                                                            $product_normal_men->price_check;
                                                                    }
                                                                @endphp
                                                                <div class="pro-details-size-color text-right">
                                                                    <div class="pro-details-size w-50"
                                                                        style="display: none">
                                                                        <span>{{ App\Models\Attribute::find($product_normal_men->variations->first()->attribute_id)->name }}</span>
                                                                        <select name="variation"
                                                                            class="form-control variation-select"
                                                                            data-id="{{ $product_normal_men->id }}"
                                                                            style="    width: 160px;">
                                                                            @foreach ($product_normal_men->variations()->where('quantity', '>', 0)->get() as $variation)
                                                                                <option
                                                                                    value="{{ json_encode($variation->only(['id', 'quantity', 'is_sale', 'sale_price', 'price'])) }}"
                                                                                    {{ $variationProductSelected->id == $variation->id ? 'selected' : '' }}>
                                                                                    {{ $variation->value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                </div>
                                                                <div class="pro-details-quality">
                                                                    <div class="cart-plus-minus"
                                                                        style="text-align: -webkit-right;display:none">
                                                                        <span>تعداد</span>
                                                                        <input style="width: 160px"
                                                                            class="form-control cart-plus-minus-box quantity-input"
                                                                            type="text" name="qtybutton"
                                                                            value="1" data-max="5" />
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center justify-content-center">
                                                                        <button type="submit"
                                                                            style="border: none;padding-left: 94px;background: no-repeat;">
                                                                            <div class="add"
                                                                                data-hint="افزودن به سبد خرید"
                                                                                class="hint--right">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="16" height="16"
                                                                                    fill="currentColor" class="bi bi-bag"
                                                                                    viewBox="0 0 16 16">
                                                                                    <path
                                                                                        d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                                                                </svg>
                                                                            </div>
                                                                        </button>

                                                                    </div>





                                                                    <div class="pro-details-wishlist"
                                                                        style="display: none">
                                                                        @auth
                                                                            @if ($product_normal_men->checkUserWishlist(auth()->id()))
                                                                                <a
                                                                                    href="{{ route('home.wishlist.remove', ['product' => $product_normal_men->id]) }}"><i
                                                                                        class="fas fa-heart"
                                                                                        style="color:red"></i>
                                                                                </a>
                                                                            @else
                                                                                <a
                                                                                    href="{{ route('home.wishlist.add', ['product' => $product_normal_men->id]) }}"><i
                                                                                        class="sli sli-heart"></i>
                                                                                </a>
                                                                            @endif
                                                                        @else
                                                                            <a
                                                                                href="{{ route('home.wishlist.add', ['product' => $product_normal_men->id]) }}"><i
                                                                                    class="sli sli-heart"></i>
                                                                            </a>
                                                                        @endauth
                                                                    </div>
                                                                    <div class="pro-details-compare" style="display:none">
                                                                        <a title="Add To Compare" href="#"><i
                                                                                class="sli sli-refresh"></i></a>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="not-in-stock">
                                                                    <p class="text-white">ناموجود</p>
                                                                </div>
                                                            @endif
                                                        </form>
                                                    @else
                                                        <div class="not-in-stock">
                                                            <p class="text-white" style="padding-right:56px">ناموجود</p>
                                                        </div>
                                                    @endif
                                                </form>

                                                @if ($product_normal_men->quantity_check)
                                                    @if ($product_normal_men->sale_check)
                                                        <div class="price d-flex flex-column justify-content-end">
                                                            <div>
                                                                <span class="fw-bold font-18 def-color">
                                                                    {{ number_format($product_normal_men->quantity_check->sale_price) }}
                                                                </span>
                                                                <svg class="mr-1 " width="14" height="16"
                                                                    viewBox="0 0 14 16" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path class="text-gray-880 dark:text-white"
                                                                        d="M1.14878 6.91843C1.44428 6.91843 1.70285 6.87142 1.92447 6.77739C2.15282 6.68337 2.34422 6.55577 2.49869 6.39458C2.65316 6.2334 2.77069 6.04535 2.85128 5.83044C2.93187 5.62224 2.97888 5.40062 2.99231 5.16556H1.98492C1.6424 5.16556 1.36033 5.12862 1.1387 5.05474C0.917077 4.98087 0.742461 4.87341 0.614858 4.73238C0.487254 4.59134 0.396588 4.42344 0.34286 4.22868C0.295849 4.0272 0.272343 3.80221 0.272343 3.55372C0.272343 3.29852 0.309281 3.05674 0.383156 2.8284C0.457032 2.60005 0.564488 2.39857 0.705523 2.22396C0.846559 2.04934 1.02117 1.91167 1.22937 1.81093C1.44428 1.70347 1.68941 1.64974 1.96477 1.64974C2.1864 1.64974 2.39795 1.68668 2.59943 1.76056C2.80091 1.83443 2.97888 1.95196 3.13335 2.11315C3.28782 2.26761 3.40871 2.47245 3.49601 2.72766C3.59004 2.97615 3.63705 3.27837 3.63705 3.63431V4.47045H4.60415C4.68474 4.47045 4.73847 4.50068 4.76533 4.56112C4.79891 4.61485 4.8157 4.6988 4.8157 4.81297C4.8157 4.93386 4.79891 5.02452 4.76533 5.08497C4.73847 5.13869 4.68474 5.16556 4.60415 5.16556H3.6169C3.60347 5.49464 3.53631 5.80693 3.41542 6.10244C3.30125 6.39794 3.14007 6.65651 2.93187 6.87813C2.72368 7.09976 2.47518 7.27438 2.1864 7.40198C1.89761 7.5363 1.57188 7.60346 1.20922 7.60346H0.141381L0.0809373 6.91843H1.14878ZM0.896929 3.51343C0.896929 3.68133 0.913719 3.82572 0.947299 3.94661C0.987594 4.0675 1.0514 4.16823 1.1387 4.24883C1.23273 4.3227 1.35697 4.37979 1.51144 4.42008C1.66591 4.45366 1.86067 4.47045 2.09573 4.47045H3.00239V3.71491C3.00239 3.21792 2.90501 2.86198 2.71024 2.64707C2.51548 2.43215 2.24684 2.3247 1.90433 2.3247C1.58196 2.3247 1.33347 2.43215 1.15885 2.64707C0.984237 2.86198 0.896929 3.15076 0.896929 3.51343ZM6.26895 4.47045C6.35626 4.47045 6.41335 4.50068 6.44021 4.56112C6.47379 4.61485 6.49058 4.6988 6.49058 4.81297C6.49058 4.93386 6.47379 5.02452 6.44021 5.08497C6.41335 5.13869 6.35626 5.16556 6.26895 5.16556H4.60675C4.51944 5.16556 4.46235 5.13869 4.43549 5.08497C4.40191 5.03124 4.38512 4.94729 4.38512 4.83312C4.38512 4.71223 4.40191 4.62156 4.43549 4.56112C4.46235 4.50068 4.51944 4.47045 4.60675 4.47045H6.26895ZM7.93155 4.47045C8.01886 4.47045 8.07594 4.50068 8.10281 4.56112C8.13639 4.61485 8.15318 4.6988 8.15318 4.81297C8.15318 4.93386 8.13639 5.02452 8.10281 5.08497C8.07594 5.13869 8.01886 5.16556 7.93155 5.16556H6.26935C6.18204 5.16556 6.12495 5.13869 6.09809 5.08497C6.06451 5.03124 6.04772 4.94729 6.04772 4.83312C6.04772 4.71223 6.06451 4.62156 6.09809 4.56112C6.12495 4.50068 6.18204 4.47045 6.26935 4.47045H7.93155ZM9.59415 4.47045C9.68146 4.47045 9.73854 4.50068 9.76541 4.56112C9.79899 4.61485 9.81578 4.6988 9.81578 4.81297C9.81578 4.93386 9.79899 5.02452 9.76541 5.08497C9.73854 5.13869 9.68146 5.16556 9.59415 5.16556H7.93194C7.84464 5.16556 7.78755 5.13869 7.76069 5.08497C7.72711 5.03124 7.71032 4.94729 7.71032 4.83312C7.71032 4.71223 7.72711 4.62156 7.76069 4.56112C7.78755 4.50068 7.84464 4.47045 7.93194 4.47045H9.59415ZM11.2567 4.47045C11.3441 4.47045 11.4011 4.50068 11.428 4.56112C11.4616 4.61485 11.4784 4.6988 11.4784 4.81297C11.4784 4.93386 11.4616 5.02452 11.428 5.08497C11.4011 5.13869 11.3441 5.16556 11.2567 5.16556H9.59454C9.50723 5.16556 9.45015 5.13869 9.42328 5.08497C9.3897 5.03124 9.37291 4.94729 9.37291 4.83312C9.37291 4.71223 9.3897 4.62156 9.42328 4.56112C9.45015 4.50068 9.50723 4.47045 9.59454 4.47045H11.2567ZM12.1638 4.47045C12.4257 4.47045 12.6339 4.39994 12.7884 4.2589C12.9496 4.11787 13.0302 3.9231 13.0302 3.67461V2.2844H13.685V3.67461C13.685 4.15144 13.5506 4.52082 13.282 4.78275C13.0201 5.03795 12.6608 5.16556 12.2041 5.16556H11.2571C11.1698 5.16556 11.1127 5.13869 11.0859 5.08497C11.0523 5.03124 11.0355 4.94729 11.0355 4.83312C11.0355 4.71223 11.0523 4.62156 11.0859 4.56112C11.1127 4.50068 11.1698 4.47045 11.2571 4.47045H12.1638ZM13.7857 0.994934H12.9798V0.279683H13.7857V0.994934ZM12.5063 0.994934H11.7004V0.279683H12.5063V0.994934ZM5.64177 12.9641C5.64177 13.3267 5.58468 13.6659 5.47051 13.9815C5.35634 14.3039 5.1918 14.5826 4.97689 14.8177C4.76198 15.0595 4.50005 15.2509 4.19112 15.3919C3.8889 15.5329 3.54638 15.6035 3.16357 15.6035H2.56921C1.81702 15.6035 1.23273 15.3718 0.816337 14.9084C0.399946 14.445 0.191751 13.8103 0.191751 13.0044V11.2414H0.836485V12.9842C0.836485 13.273 0.870065 13.5349 0.937225 13.77C1.0111 14.0051 1.12191 14.2065 1.26967 14.3744C1.42413 14.549 1.61554 14.6834 1.84388 14.7774C2.07223 14.8714 2.34758 14.9184 2.66995 14.9184H3.1132C3.42885 14.9184 3.70421 14.8647 3.93927 14.7572C4.17433 14.6565 4.36909 14.5188 4.52356 14.3442C4.68474 14.1696 4.80227 13.9648 4.87615 13.7297C4.95674 13.4946 4.99703 13.2495 4.99703 12.9943V10.2844H5.64177V12.9641ZM3.21394 10.0628H2.36773V9.32738H3.21394V10.0628ZM8.24526 13.1656C8.07064 13.1656 7.90274 13.1421 7.74156 13.095C7.58038 13.0413 7.43598 12.954 7.30838 12.8331C7.18749 12.7122 7.09011 12.5544 7.01624 12.3596C6.94236 12.1582 6.90542 11.9097 6.90542 11.6142V6.9197H7.56023V11.4933C7.56023 11.7754 7.62067 12.0104 7.74156 12.1985C7.86916 12.3798 8.074 12.4705 8.35607 12.4705H8.52733C8.67508 12.4705 8.74896 12.5846 8.74896 12.813C8.74896 13.048 8.67508 13.1656 8.52733 13.1656H8.24526ZM8.69324 12.4705C8.95516 12.4705 9.15328 12.4067 9.2876 12.279C9.42192 12.1514 9.48908 11.9802 9.48908 11.7653V11.3825C9.48908 10.7982 9.63683 10.3415 9.93233 10.0124C10.2346 9.68332 10.6509 9.51878 11.1815 9.51878C11.4569 9.51878 11.6986 9.56243 11.9068 9.64974C12.115 9.73705 12.2863 9.8613 12.4206 10.0225C12.5616 10.1837 12.6657 10.3751 12.7329 10.5967C12.8001 10.8183 12.8336 11.0635 12.8336 11.3321C12.8336 11.9097 12.6825 12.3596 12.3803 12.682C12.0781 13.0044 11.6651 13.1656 11.1412 13.1656C10.8726 13.1656 10.614 13.1152 10.3655 13.0144C10.117 12.907 9.92226 12.7189 9.78123 12.4503C9.72078 12.6048 9.64691 12.729 9.5596 12.823C9.47229 12.9171 9.38162 12.9909 9.2876 13.0447C9.19358 13.0917 9.09284 13.1253 8.98538 13.1454C8.88464 13.1588 8.78726 13.1656 8.69324 13.1656H8.53205C8.44475 13.1656 8.38766 13.1387 8.3608 13.085C8.32722 13.0312 8.31043 12.9473 8.31043 12.8331C8.31043 12.7122 8.32722 12.6216 8.3608 12.5611C8.38766 12.5007 8.44475 12.4705 8.53205 12.4705H8.69324ZM12.1889 11.3925C12.1889 11.0433 12.1117 10.7612 11.9572 10.5463C11.8027 10.3247 11.5375 10.2139 11.1614 10.2139C10.4629 10.2139 10.1137 10.6202 10.1137 11.4328C10.1137 11.7754 10.2077 12.0339 10.3957 12.2085C10.5905 12.3831 10.839 12.4705 11.1412 12.4705C11.4837 12.4705 11.7423 12.3764 11.9169 12.1884C12.0982 12.0003 12.1889 11.7351 12.1889 11.3925Z"
                                                                        fill="currentColor"></path>
                                                                </svg>
                                                            </div>
                                                            <div class="d-flex justify-content-center align-items-center">
                                                                <span
                                                                    class="text-muted font-14 text-decoration-line-through">
                                                                    {{ number_format($product_normal_men->quantity_check->price) }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div>
                                                            <span class="fw-bold font-18 def-color">
                                                                {{ number_format($product_normal_men->quantity_check->price) }}
                                                            </span>
                                                            <svg class="mr-1 " width="14" height="16"
                                                                viewBox="0 0 14 16" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path class="text-gray-880 dark:text-white"
                                                                    d="M1.14878 6.91843C1.44428 6.91843 1.70285 6.87142 1.92447 6.77739C2.15282 6.68337 2.34422 6.55577 2.49869 6.39458C2.65316 6.2334 2.77069 6.04535 2.85128 5.83044C2.93187 5.62224 2.97888 5.40062 2.99231 5.16556H1.98492C1.6424 5.16556 1.36033 5.12862 1.1387 5.05474C0.917077 4.98087 0.742461 4.87341 0.614858 4.73238C0.487254 4.59134 0.396588 4.42344 0.34286 4.22868C0.295849 4.0272 0.272343 3.80221 0.272343 3.55372C0.272343 3.29852 0.309281 3.05674 0.383156 2.8284C0.457032 2.60005 0.564488 2.39857 0.705523 2.22396C0.846559 2.04934 1.02117 1.91167 1.22937 1.81093C1.44428 1.70347 1.68941 1.64974 1.96477 1.64974C2.1864 1.64974 2.39795 1.68668 2.59943 1.76056C2.80091 1.83443 2.97888 1.95196 3.13335 2.11315C3.28782 2.26761 3.40871 2.47245 3.49601 2.72766C3.59004 2.97615 3.63705 3.27837 3.63705 3.63431V4.47045H4.60415C4.68474 4.47045 4.73847 4.50068 4.76533 4.56112C4.79891 4.61485 4.8157 4.6988 4.8157 4.81297C4.8157 4.93386 4.79891 5.02452 4.76533 5.08497C4.73847 5.13869 4.68474 5.16556 4.60415 5.16556H3.6169C3.60347 5.49464 3.53631 5.80693 3.41542 6.10244C3.30125 6.39794 3.14007 6.65651 2.93187 6.87813C2.72368 7.09976 2.47518 7.27438 2.1864 7.40198C1.89761 7.5363 1.57188 7.60346 1.20922 7.60346H0.141381L0.0809373 6.91843H1.14878ZM0.896929 3.51343C0.896929 3.68133 0.913719 3.82572 0.947299 3.94661C0.987594 4.0675 1.0514 4.16823 1.1387 4.24883C1.23273 4.3227 1.35697 4.37979 1.51144 4.42008C1.66591 4.45366 1.86067 4.47045 2.09573 4.47045H3.00239V3.71491C3.00239 3.21792 2.90501 2.86198 2.71024 2.64707C2.51548 2.43215 2.24684 2.3247 1.90433 2.3247C1.58196 2.3247 1.33347 2.43215 1.15885 2.64707C0.984237 2.86198 0.896929 3.15076 0.896929 3.51343ZM6.26895 4.47045C6.35626 4.47045 6.41335 4.50068 6.44021 4.56112C6.47379 4.61485 6.49058 4.6988 6.49058 4.81297C6.49058 4.93386 6.47379 5.02452 6.44021 5.08497C6.41335 5.13869 6.35626 5.16556 6.26895 5.16556H4.60675C4.51944 5.16556 4.46235 5.13869 4.43549 5.08497C4.40191 5.03124 4.38512 4.94729 4.38512 4.83312C4.38512 4.71223 4.40191 4.62156 4.43549 4.56112C4.46235 4.50068 4.51944 4.47045 4.60675 4.47045H6.26895ZM7.93155 4.47045C8.01886 4.47045 8.07594 4.50068 8.10281 4.56112C8.13639 4.61485 8.15318 4.6988 8.15318 4.81297C8.15318 4.93386 8.13639 5.02452 8.10281 5.08497C8.07594 5.13869 8.01886 5.16556 7.93155 5.16556H6.26935C6.18204 5.16556 6.12495 5.13869 6.09809 5.08497C6.06451 5.03124 6.04772 4.94729 6.04772 4.83312C6.04772 4.71223 6.06451 4.62156 6.09809 4.56112C6.12495 4.50068 6.18204 4.47045 6.26935 4.47045H7.93155ZM9.59415 4.47045C9.68146 4.47045 9.73854 4.50068 9.76541 4.56112C9.79899 4.61485 9.81578 4.6988 9.81578 4.81297C9.81578 4.93386 9.79899 5.02452 9.76541 5.08497C9.73854 5.13869 9.68146 5.16556 9.59415 5.16556H7.93194C7.84464 5.16556 7.78755 5.13869 7.76069 5.08497C7.72711 5.03124 7.71032 4.94729 7.71032 4.83312C7.71032 4.71223 7.72711 4.62156 7.76069 4.56112C7.78755 4.50068 7.84464 4.47045 7.93194 4.47045H9.59415ZM11.2567 4.47045C11.3441 4.47045 11.4011 4.50068 11.428 4.56112C11.4616 4.61485 11.4784 4.6988 11.4784 4.81297C11.4784 4.93386 11.4616 5.02452 11.428 5.08497C11.4011 5.13869 11.3441 5.16556 11.2567 5.16556H9.59454C9.50723 5.16556 9.45015 5.13869 9.42328 5.08497C9.3897 5.03124 9.37291 4.94729 9.37291 4.83312C9.37291 4.71223 9.3897 4.62156 9.42328 4.56112C9.45015 4.50068 9.50723 4.47045 9.59454 4.47045H11.2567ZM12.1638 4.47045C12.4257 4.47045 12.6339 4.39994 12.7884 4.2589C12.9496 4.11787 13.0302 3.9231 13.0302 3.67461V2.2844H13.685V3.67461C13.685 4.15144 13.5506 4.52082 13.282 4.78275C13.0201 5.03795 12.6608 5.16556 12.2041 5.16556H11.2571C11.1698 5.16556 11.1127 5.13869 11.0859 5.08497C11.0523 5.03124 11.0355 4.94729 11.0355 4.83312C11.0355 4.71223 11.0523 4.62156 11.0859 4.56112C11.1127 4.50068 11.1698 4.47045 11.2571 4.47045H12.1638ZM13.7857 0.994934H12.9798V0.279683H13.7857V0.994934ZM12.5063 0.994934H11.7004V0.279683H12.5063V0.994934ZM5.64177 12.9641C5.64177 13.3267 5.58468 13.6659 5.47051 13.9815C5.35634 14.3039 5.1918 14.5826 4.97689 14.8177C4.76198 15.0595 4.50005 15.2509 4.19112 15.3919C3.8889 15.5329 3.54638 15.6035 3.16357 15.6035H2.56921C1.81702 15.6035 1.23273 15.3718 0.816337 14.9084C0.399946 14.445 0.191751 13.8103 0.191751 13.0044V11.2414H0.836485V12.9842C0.836485 13.273 0.870065 13.5349 0.937225 13.77C1.0111 14.0051 1.12191 14.2065 1.26967 14.3744C1.42413 14.549 1.61554 14.6834 1.84388 14.7774C2.07223 14.8714 2.34758 14.9184 2.66995 14.9184H3.1132C3.42885 14.9184 3.70421 14.8647 3.93927 14.7572C4.17433 14.6565 4.36909 14.5188 4.52356 14.3442C4.68474 14.1696 4.80227 13.9648 4.87615 13.7297C4.95674 13.4946 4.99703 13.2495 4.99703 12.9943V10.2844H5.64177V12.9641ZM3.21394 10.0628H2.36773V9.32738H3.21394V10.0628ZM8.24526 13.1656C8.07064 13.1656 7.90274 13.1421 7.74156 13.095C7.58038 13.0413 7.43598 12.954 7.30838 12.8331C7.18749 12.7122 7.09011 12.5544 7.01624 12.3596C6.94236 12.1582 6.90542 11.9097 6.90542 11.6142V6.9197H7.56023V11.4933C7.56023 11.7754 7.62067 12.0104 7.74156 12.1985C7.86916 12.3798 8.074 12.4705 8.35607 12.4705H8.52733C8.67508 12.4705 8.74896 12.5846 8.74896 12.813C8.74896 13.048 8.67508 13.1656 8.52733 13.1656H8.24526ZM8.69324 12.4705C8.95516 12.4705 9.15328 12.4067 9.2876 12.279C9.42192 12.1514 9.48908 11.9802 9.48908 11.7653V11.3825C9.48908 10.7982 9.63683 10.3415 9.93233 10.0124C10.2346 9.68332 10.6509 9.51878 11.1815 9.51878C11.4569 9.51878 11.6986 9.56243 11.9068 9.64974C12.115 9.73705 12.2863 9.8613 12.4206 10.0225C12.5616 10.1837 12.6657 10.3751 12.7329 10.5967C12.8001 10.8183 12.8336 11.0635 12.8336 11.3321C12.8336 11.9097 12.6825 12.3596 12.3803 12.682C12.0781 13.0044 11.6651 13.1656 11.1412 13.1656C10.8726 13.1656 10.614 13.1152 10.3655 13.0144C10.117 12.907 9.92226 12.7189 9.78123 12.4503C9.72078 12.6048 9.64691 12.729 9.5596 12.823C9.47229 12.9171 9.38162 12.9909 9.2876 13.0447C9.19358 13.0917 9.09284 13.1253 8.98538 13.1454C8.88464 13.1588 8.78726 13.1656 8.69324 13.1656H8.53205C8.44475 13.1656 8.38766 13.1387 8.3608 13.085C8.32722 13.0312 8.31043 12.9473 8.31043 12.8331C8.31043 12.7122 8.32722 12.6216 8.3608 12.5611C8.38766 12.5007 8.44475 12.4705 8.53205 12.4705H8.69324ZM12.1889 11.3925C12.1889 11.0433 12.1117 10.7612 11.9572 10.5463C11.8027 10.3247 11.5375 10.2139 11.1614 10.2139C10.4629 10.2139 10.1137 10.6202 10.1137 11.4328C10.1137 11.7754 10.2077 12.0339 10.3957 12.2085C10.5905 12.3831 10.839 12.4705 11.1412 12.4705C11.4837 12.4705 11.7423 12.3764 11.9169 12.1884C12.0982 12.0003 12.1889 11.7351 12.1889 11.3925Z"
                                                                    fill="currentColor"></path>
                                                            </svg>


                                                        </div>
                                                    @endif
                                                @else
                                                    <div>
                                                        <span class="fw-bold font-18 def-color">
                                                            ناموجود
                                                        </span>

                                                    </div>
                                                @endif


                                            </div>


                                            {{-- @if ($currentDate > $targetDate)

                                    <span style="color: blue">این قیمت</span>

                                    @else
                                    <span style="color: red">یه قیمت دیگه</span>
                                    @endif --}}
                                            {{-- <div class="timer text-center mt-2">
                                        <div class='countdown' data-date="{{$product_normal_men->daily_timer}}" data-time="17:30">
                                        </div>
                                    </div> --}}
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next d-sm-flex d-none"></div>
                    <div class="swiper-button-prev d-sm-flex d-none"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="product-box py-20">
    <div class="container-fluid">
        <div class="parent" style="height: 450px">
            <div class="content-title">
                <div class="item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-box-seam" viewBox="0 0 16 16">
                        <path
                            d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                    </svg>
                    <h5 class="title">جدیدترین محصولات مردانه</h5>
                </div>
                <div class="item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z" />
                        <path fill-rule="evenodd"
                            d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                    </svg>
                    <a href="">
                        <h5 class="title">مشاهده همه</h5>
                    </a>
                </div>
            </div>

            <div class="swiper py-3" id="swiper-box">
                <div class="swiper-wrapper">

                    @foreach ($product_normal_mens as $product_normal_men)

                    <style>
                        @media screen and (max-width: 572px) {
                            .swiper-slide{
                                margin-left: 130px !important;
                            }
                        }

                        .product-box-item{
                            transition: transform 0.2s; /* ترانزیشن برای تغییر transform در 0.2 ثانیه */

                        }

                        .product-box-item:hover{
                            transform: scale(1.09); /* تکوندن کارت با افزایش اندازه */

                        }
                    </style>
                    <div class="swiper-slide wow animate__animated animate__fadeInLeft">
                        <div class="product-box-item bg-white">
                            <div class="hover">
                                <div class="hover-btn">

                                    <a href="{{route('home.compare.add' , ['product' => $product_normal_men])}}" data-hint="مقایسه محصول" class="hint--right"><i
                                    class="bi bi-arrow-left-right"></i></a>

                                    @auth
                                    @if ($product_normal_men->checkUserWishlist(auth()->id()))
                                    <a href="{{route('home.wishlist.remove' , ['product' => $product_normal_men->id])}}" data-hint="افزوده شده" class="hint--right" style="background: red"><i
                                            class="bi bi-heart"></i></a>
                                    @else
                                    <a href="{{route('home.wishlist.add' , ['product' => $product_normal_men->id])}}" data-hint="افزودن به علاقه مندی" class="hint--right"><i
                                    class="bi bi-heart"></i></a>
                                    @endif

                                    @endauth


                                    <a href="#productModal-{{$product_normal_men->id}}" data-hint="مشاهده سریع" class="hint--right"
                                        data-bs-toggle="modal" data-bs-target="#productModal-{{$product_normal_men->id}}"><i
                                            class="bi bi-eye"></i></a>
                                </div>
                                <div class="hover-color">
                                    <span style="background-color: #10b663;" data-hint="رنگ سبز"
                                        class="hint--left"></span>
                                    <span style="background-color: #e2350a;" data-hint="رنگ قرمز"
                                        class="hint--left"></span>
                                    <span style="background-color: #fafafa;" data-hint="رنگ سفید"
                                        class="hint--left"></span>
                                </div>
                            </div>

                            <a href="{{ route('home.products.show' , ['product' => $product_normal_men->slug]) }}">
                                <div class="image text-center">
                                    <img src="{{asset('/upload/files/products/images/' . $product_normal_men->primary_image )}}" alt="" class="img-fluid one-image">
                                    {{-- hover image --}}
    {{-- @foreach ($product_normal_men->images as $image)
                                    <img src="{{ asset('/upload/files/products/images/' . $image->image) }}" alt="" class="img-fluid two-image">
                                    @endforeach
                                </div>
                                <div class="desc">
                                    <div class="title">
                                        <h6 class="title-fa def-color fw-bold text-overflow-2">
                                            {{$product_normal_men->name}}
                                        </h6>
                                        <h6 class="title-en text-muted text-overflow-2">
                                       {{$product_normal_men->category->name}}
                                        </h6>
                                    </div>
                                    <div class="foot d-flex justify-content-between align-items-center">
                                        <form action="{{ route('home.cart.add') }}" method="POST">
                                        <input type="hidden" name="product_id" value="{{ $product_normal_men->id }}">
                                        @csrf
                                        @if ($product_normal_men->quantity_check)
                                            @php
                                                if($product_normal_men->sale_check)
                                                {
                                                    $variationProductSelected = $product_normal_men->sale_check;
                                                }else{
                                                    $variationProductSelected = $product_normal_men->price_check;
                                                }
                                            @endphp
                                            <div class="pro-details-size-color text-right">
                                                <div class="pro-details-size w-50" style="display: none">
                                                    <span>{{ App\Models\Attribute::find($product_normal_men->variations->first()->attribute_id)->name }}</span>
                                                    <select name="variation" class="form-control variation-select" style="display: none">
                                                        @foreach ($product_normal_men->variations()->where('quantity', '>', 0)->get() as $variation)
                                                            <option
                                                            value="{{ json_encode($variation->only(['id' , 'quantity','is_sale' , 'sale_price' , 'price'])) }}"
                                                            {{ $variationProductSelected->id == $variation->id ? 'selected' : '' }}
                                                            >{{ $variation->value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>


                                        <form action="{{ route('home.cart.add') }}" method="POST">
                                            <input type="hidden" name="product_id" value="{{ $product_normal_men->id }}">
                                            @csrf
                                            @if ($product_normal_men->quantity_check)
                                                @php
                                                    if($product_normal_men->sale_check)
                                                    {
                                                        $variationProductSelected = $product_normal_men->sale_check;
                                                    }else{
                                                        $variationProductSelected = $product_normal_men->price_check;
                                                    }
                                                @endphp
                                                <div class="pro-details-size-color text-right">
                                                    <div class="pro-details-size w-50" style="display: none">
                                                        <span>{{ App\Models\Attribute::find($product_normal_men->variations->first()->attribute_id)->name }}</span>
                                                        <select  name="variation" class="form-control variation-select" data-id="{{$product_normal_men->id}}" style="    width: 160px;">
                                                            @foreach ($product_normal_men->variations()->where('quantity', '>', 0)->get() as $variation)
                                                                <option
                                                                value="{{ json_encode($variation->only(['id' , 'quantity','is_sale' , 'sale_price' , 'price'])) }}"
                                                                {{ $variationProductSelected->id == $variation->id ? 'selected' : '' }}
                                                                >{{ $variation->value }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="pro-details-quality">
                                                    <div class="cart-plus-minus" style="text-align: -webkit-right;display:none">
                                                        <span>تعداد</span>
                                                        <input style="width: 160px" class="form-control cart-plus-minus-box quantity-input" type="text" name="qtybutton" value="1" data-max="5" />
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <button type="submit" style="border: none;padding-left: 94px;background: no-repeat;">
                                                        <div class="add" data-hint="افزودن به سبد خرید" class="hint--right">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                                            </svg>
                                                        </div>
                                                    </button>

                                                    </div>





                                                    <div class="pro-details-wishlist" style="display: none">
                                                        @auth
                                                            @if ($product_normal_men->checkUserWishlist(auth()->id()))
                                                                <a href="{{ route('home.wishlist.remove' , ['product' => $product_normal_men->id]) }}"><i class="fas fa-heart" style="color:red"></i>
                                                                </a>
                                                            @else
                                                                <a href="{{ route('home.wishlist.add' , ['product' => $product_normal_men->id]) }}"><i class="sli sli-heart"></i>
                                                                </a>
                                                            @endif

                                                        @else
                                                            <a href="{{ route('home.wishlist.add' , ['product' => $product_normal_men->id]) }}"><i class="sli sli-heart"></i>
                                                            </a>
                                                        @endauth
                                                    </div>
                                                    <div class="pro-details-compare" style="display:none">
                                                        <a title="Add To Compare" href="#"><i class="sli sli-refresh"></i></a>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="not-in-stock">
                                                    <p class="text-white">ناموجود</p>
                                                </div>
                                            @endif
                                        </form>
                                        @else
                                        <div class="not-in-stock">
                                            <p class="text-white" style="padding-right:56px">ناموجود</p>
                                        </div>
                                    @endif
                                        </form>

                                        @if ($product_normal_men->quantity_check)
                                        @if ($product_normal_men->sale_check)
                                        <div class="price d-flex flex-column justify-content-end">
                                            <div>
                                                <span class="fw-bold font-18 def-color">
                                                  {{ number_format($product_normal_men->quantity_check->sale_price) }}
                                                </span>
                                                <svg class="mr-1 " width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path class="text-gray-880 dark:text-white" d="M1.14878 6.91843C1.44428 6.91843 1.70285 6.87142 1.92447 6.77739C2.15282 6.68337 2.34422 6.55577 2.49869 6.39458C2.65316 6.2334 2.77069 6.04535 2.85128 5.83044C2.93187 5.62224 2.97888 5.40062 2.99231 5.16556H1.98492C1.6424 5.16556 1.36033 5.12862 1.1387 5.05474C0.917077 4.98087 0.742461 4.87341 0.614858 4.73238C0.487254 4.59134 0.396588 4.42344 0.34286 4.22868C0.295849 4.0272 0.272343 3.80221 0.272343 3.55372C0.272343 3.29852 0.309281 3.05674 0.383156 2.8284C0.457032 2.60005 0.564488 2.39857 0.705523 2.22396C0.846559 2.04934 1.02117 1.91167 1.22937 1.81093C1.44428 1.70347 1.68941 1.64974 1.96477 1.64974C2.1864 1.64974 2.39795 1.68668 2.59943 1.76056C2.80091 1.83443 2.97888 1.95196 3.13335 2.11315C3.28782 2.26761 3.40871 2.47245 3.49601 2.72766C3.59004 2.97615 3.63705 3.27837 3.63705 3.63431V4.47045H4.60415C4.68474 4.47045 4.73847 4.50068 4.76533 4.56112C4.79891 4.61485 4.8157 4.6988 4.8157 4.81297C4.8157 4.93386 4.79891 5.02452 4.76533 5.08497C4.73847 5.13869 4.68474 5.16556 4.60415 5.16556H3.6169C3.60347 5.49464 3.53631 5.80693 3.41542 6.10244C3.30125 6.39794 3.14007 6.65651 2.93187 6.87813C2.72368 7.09976 2.47518 7.27438 2.1864 7.40198C1.89761 7.5363 1.57188 7.60346 1.20922 7.60346H0.141381L0.0809373 6.91843H1.14878ZM0.896929 3.51343C0.896929 3.68133 0.913719 3.82572 0.947299 3.94661C0.987594 4.0675 1.0514 4.16823 1.1387 4.24883C1.23273 4.3227 1.35697 4.37979 1.51144 4.42008C1.66591 4.45366 1.86067 4.47045 2.09573 4.47045H3.00239V3.71491C3.00239 3.21792 2.90501 2.86198 2.71024 2.64707C2.51548 2.43215 2.24684 2.3247 1.90433 2.3247C1.58196 2.3247 1.33347 2.43215 1.15885 2.64707C0.984237 2.86198 0.896929 3.15076 0.896929 3.51343ZM6.26895 4.47045C6.35626 4.47045 6.41335 4.50068 6.44021 4.56112C6.47379 4.61485 6.49058 4.6988 6.49058 4.81297C6.49058 4.93386 6.47379 5.02452 6.44021 5.08497C6.41335 5.13869 6.35626 5.16556 6.26895 5.16556H4.60675C4.51944 5.16556 4.46235 5.13869 4.43549 5.08497C4.40191 5.03124 4.38512 4.94729 4.38512 4.83312C4.38512 4.71223 4.40191 4.62156 4.43549 4.56112C4.46235 4.50068 4.51944 4.47045 4.60675 4.47045H6.26895ZM7.93155 4.47045C8.01886 4.47045 8.07594 4.50068 8.10281 4.56112C8.13639 4.61485 8.15318 4.6988 8.15318 4.81297C8.15318 4.93386 8.13639 5.02452 8.10281 5.08497C8.07594 5.13869 8.01886 5.16556 7.93155 5.16556H6.26935C6.18204 5.16556 6.12495 5.13869 6.09809 5.08497C6.06451 5.03124 6.04772 4.94729 6.04772 4.83312C6.04772 4.71223 6.06451 4.62156 6.09809 4.56112C6.12495 4.50068 6.18204 4.47045 6.26935 4.47045H7.93155ZM9.59415 4.47045C9.68146 4.47045 9.73854 4.50068 9.76541 4.56112C9.79899 4.61485 9.81578 4.6988 9.81578 4.81297C9.81578 4.93386 9.79899 5.02452 9.76541 5.08497C9.73854 5.13869 9.68146 5.16556 9.59415 5.16556H7.93194C7.84464 5.16556 7.78755 5.13869 7.76069 5.08497C7.72711 5.03124 7.71032 4.94729 7.71032 4.83312C7.71032 4.71223 7.72711 4.62156 7.76069 4.56112C7.78755 4.50068 7.84464 4.47045 7.93194 4.47045H9.59415ZM11.2567 4.47045C11.3441 4.47045 11.4011 4.50068 11.428 4.56112C11.4616 4.61485 11.4784 4.6988 11.4784 4.81297C11.4784 4.93386 11.4616 5.02452 11.428 5.08497C11.4011 5.13869 11.3441 5.16556 11.2567 5.16556H9.59454C9.50723 5.16556 9.45015 5.13869 9.42328 5.08497C9.3897 5.03124 9.37291 4.94729 9.37291 4.83312C9.37291 4.71223 9.3897 4.62156 9.42328 4.56112C9.45015 4.50068 9.50723 4.47045 9.59454 4.47045H11.2567ZM12.1638 4.47045C12.4257 4.47045 12.6339 4.39994 12.7884 4.2589C12.9496 4.11787 13.0302 3.9231 13.0302 3.67461V2.2844H13.685V3.67461C13.685 4.15144 13.5506 4.52082 13.282 4.78275C13.0201 5.03795 12.6608 5.16556 12.2041 5.16556H11.2571C11.1698 5.16556 11.1127 5.13869 11.0859 5.08497C11.0523 5.03124 11.0355 4.94729 11.0355 4.83312C11.0355 4.71223 11.0523 4.62156 11.0859 4.56112C11.1127 4.50068 11.1698 4.47045 11.2571 4.47045H12.1638ZM13.7857 0.994934H12.9798V0.279683H13.7857V0.994934ZM12.5063 0.994934H11.7004V0.279683H12.5063V0.994934ZM5.64177 12.9641C5.64177 13.3267 5.58468 13.6659 5.47051 13.9815C5.35634 14.3039 5.1918 14.5826 4.97689 14.8177C4.76198 15.0595 4.50005 15.2509 4.19112 15.3919C3.8889 15.5329 3.54638 15.6035 3.16357 15.6035H2.56921C1.81702 15.6035 1.23273 15.3718 0.816337 14.9084C0.399946 14.445 0.191751 13.8103 0.191751 13.0044V11.2414H0.836485V12.9842C0.836485 13.273 0.870065 13.5349 0.937225 13.77C1.0111 14.0051 1.12191 14.2065 1.26967 14.3744C1.42413 14.549 1.61554 14.6834 1.84388 14.7774C2.07223 14.8714 2.34758 14.9184 2.66995 14.9184H3.1132C3.42885 14.9184 3.70421 14.8647 3.93927 14.7572C4.17433 14.6565 4.36909 14.5188 4.52356 14.3442C4.68474 14.1696 4.80227 13.9648 4.87615 13.7297C4.95674 13.4946 4.99703 13.2495 4.99703 12.9943V10.2844H5.64177V12.9641ZM3.21394 10.0628H2.36773V9.32738H3.21394V10.0628ZM8.24526 13.1656C8.07064 13.1656 7.90274 13.1421 7.74156 13.095C7.58038 13.0413 7.43598 12.954 7.30838 12.8331C7.18749 12.7122 7.09011 12.5544 7.01624 12.3596C6.94236 12.1582 6.90542 11.9097 6.90542 11.6142V6.9197H7.56023V11.4933C7.56023 11.7754 7.62067 12.0104 7.74156 12.1985C7.86916 12.3798 8.074 12.4705 8.35607 12.4705H8.52733C8.67508 12.4705 8.74896 12.5846 8.74896 12.813C8.74896 13.048 8.67508 13.1656 8.52733 13.1656H8.24526ZM8.69324 12.4705C8.95516 12.4705 9.15328 12.4067 9.2876 12.279C9.42192 12.1514 9.48908 11.9802 9.48908 11.7653V11.3825C9.48908 10.7982 9.63683 10.3415 9.93233 10.0124C10.2346 9.68332 10.6509 9.51878 11.1815 9.51878C11.4569 9.51878 11.6986 9.56243 11.9068 9.64974C12.115 9.73705 12.2863 9.8613 12.4206 10.0225C12.5616 10.1837 12.6657 10.3751 12.7329 10.5967C12.8001 10.8183 12.8336 11.0635 12.8336 11.3321C12.8336 11.9097 12.6825 12.3596 12.3803 12.682C12.0781 13.0044 11.6651 13.1656 11.1412 13.1656C10.8726 13.1656 10.614 13.1152 10.3655 13.0144C10.117 12.907 9.92226 12.7189 9.78123 12.4503C9.72078 12.6048 9.64691 12.729 9.5596 12.823C9.47229 12.9171 9.38162 12.9909 9.2876 13.0447C9.19358 13.0917 9.09284 13.1253 8.98538 13.1454C8.88464 13.1588 8.78726 13.1656 8.69324 13.1656H8.53205C8.44475 13.1656 8.38766 13.1387 8.3608 13.085C8.32722 13.0312 8.31043 12.9473 8.31043 12.8331C8.31043 12.7122 8.32722 12.6216 8.3608 12.5611C8.38766 12.5007 8.44475 12.4705 8.53205 12.4705H8.69324ZM12.1889 11.3925C12.1889 11.0433 12.1117 10.7612 11.9572 10.5463C11.8027 10.3247 11.5375 10.2139 11.1614 10.2139C10.4629 10.2139 10.1137 10.6202 10.1137 11.4328C10.1137 11.7754 10.2077 12.0339 10.3957 12.2085C10.5905 12.3831 10.839 12.4705 11.1412 12.4705C11.4837 12.4705 11.7423 12.3764 11.9169 12.1884C12.0982 12.0003 12.1889 11.7351 12.1889 11.3925Z" fill="currentColor"></path>
                                                </svg>
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <span
                                                    class="text-muted font-14 text-decoration-line-through">
                                                    {{ number_format($product_normal_men->quantity_check->price) }}
                                                </span>
                                            </div>
                                        </div>
                                        @else
                                        <div>
                                            <span class="fw-bold font-18 def-color">
                                              {{ number_format($product_normal_men->quantity_check->price) }}
                                            </span>
                                            <svg class="mr-1 " width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path class="text-gray-880 dark:text-white" d="M1.14878 6.91843C1.44428 6.91843 1.70285 6.87142 1.92447 6.77739C2.15282 6.68337 2.34422 6.55577 2.49869 6.39458C2.65316 6.2334 2.77069 6.04535 2.85128 5.83044C2.93187 5.62224 2.97888 5.40062 2.99231 5.16556H1.98492C1.6424 5.16556 1.36033 5.12862 1.1387 5.05474C0.917077 4.98087 0.742461 4.87341 0.614858 4.73238C0.487254 4.59134 0.396588 4.42344 0.34286 4.22868C0.295849 4.0272 0.272343 3.80221 0.272343 3.55372C0.272343 3.29852 0.309281 3.05674 0.383156 2.8284C0.457032 2.60005 0.564488 2.39857 0.705523 2.22396C0.846559 2.04934 1.02117 1.91167 1.22937 1.81093C1.44428 1.70347 1.68941 1.64974 1.96477 1.64974C2.1864 1.64974 2.39795 1.68668 2.59943 1.76056C2.80091 1.83443 2.97888 1.95196 3.13335 2.11315C3.28782 2.26761 3.40871 2.47245 3.49601 2.72766C3.59004 2.97615 3.63705 3.27837 3.63705 3.63431V4.47045H4.60415C4.68474 4.47045 4.73847 4.50068 4.76533 4.56112C4.79891 4.61485 4.8157 4.6988 4.8157 4.81297C4.8157 4.93386 4.79891 5.02452 4.76533 5.08497C4.73847 5.13869 4.68474 5.16556 4.60415 5.16556H3.6169C3.60347 5.49464 3.53631 5.80693 3.41542 6.10244C3.30125 6.39794 3.14007 6.65651 2.93187 6.87813C2.72368 7.09976 2.47518 7.27438 2.1864 7.40198C1.89761 7.5363 1.57188 7.60346 1.20922 7.60346H0.141381L0.0809373 6.91843H1.14878ZM0.896929 3.51343C0.896929 3.68133 0.913719 3.82572 0.947299 3.94661C0.987594 4.0675 1.0514 4.16823 1.1387 4.24883C1.23273 4.3227 1.35697 4.37979 1.51144 4.42008C1.66591 4.45366 1.86067 4.47045 2.09573 4.47045H3.00239V3.71491C3.00239 3.21792 2.90501 2.86198 2.71024 2.64707C2.51548 2.43215 2.24684 2.3247 1.90433 2.3247C1.58196 2.3247 1.33347 2.43215 1.15885 2.64707C0.984237 2.86198 0.896929 3.15076 0.896929 3.51343ZM6.26895 4.47045C6.35626 4.47045 6.41335 4.50068 6.44021 4.56112C6.47379 4.61485 6.49058 4.6988 6.49058 4.81297C6.49058 4.93386 6.47379 5.02452 6.44021 5.08497C6.41335 5.13869 6.35626 5.16556 6.26895 5.16556H4.60675C4.51944 5.16556 4.46235 5.13869 4.43549 5.08497C4.40191 5.03124 4.38512 4.94729 4.38512 4.83312C4.38512 4.71223 4.40191 4.62156 4.43549 4.56112C4.46235 4.50068 4.51944 4.47045 4.60675 4.47045H6.26895ZM7.93155 4.47045C8.01886 4.47045 8.07594 4.50068 8.10281 4.56112C8.13639 4.61485 8.15318 4.6988 8.15318 4.81297C8.15318 4.93386 8.13639 5.02452 8.10281 5.08497C8.07594 5.13869 8.01886 5.16556 7.93155 5.16556H6.26935C6.18204 5.16556 6.12495 5.13869 6.09809 5.08497C6.06451 5.03124 6.04772 4.94729 6.04772 4.83312C6.04772 4.71223 6.06451 4.62156 6.09809 4.56112C6.12495 4.50068 6.18204 4.47045 6.26935 4.47045H7.93155ZM9.59415 4.47045C9.68146 4.47045 9.73854 4.50068 9.76541 4.56112C9.79899 4.61485 9.81578 4.6988 9.81578 4.81297C9.81578 4.93386 9.79899 5.02452 9.76541 5.08497C9.73854 5.13869 9.68146 5.16556 9.59415 5.16556H7.93194C7.84464 5.16556 7.78755 5.13869 7.76069 5.08497C7.72711 5.03124 7.71032 4.94729 7.71032 4.83312C7.71032 4.71223 7.72711 4.62156 7.76069 4.56112C7.78755 4.50068 7.84464 4.47045 7.93194 4.47045H9.59415ZM11.2567 4.47045C11.3441 4.47045 11.4011 4.50068 11.428 4.56112C11.4616 4.61485 11.4784 4.6988 11.4784 4.81297C11.4784 4.93386 11.4616 5.02452 11.428 5.08497C11.4011 5.13869 11.3441 5.16556 11.2567 5.16556H9.59454C9.50723 5.16556 9.45015 5.13869 9.42328 5.08497C9.3897 5.03124 9.37291 4.94729 9.37291 4.83312C9.37291 4.71223 9.3897 4.62156 9.42328 4.56112C9.45015 4.50068 9.50723 4.47045 9.59454 4.47045H11.2567ZM12.1638 4.47045C12.4257 4.47045 12.6339 4.39994 12.7884 4.2589C12.9496 4.11787 13.0302 3.9231 13.0302 3.67461V2.2844H13.685V3.67461C13.685 4.15144 13.5506 4.52082 13.282 4.78275C13.0201 5.03795 12.6608 5.16556 12.2041 5.16556H11.2571C11.1698 5.16556 11.1127 5.13869 11.0859 5.08497C11.0523 5.03124 11.0355 4.94729 11.0355 4.83312C11.0355 4.71223 11.0523 4.62156 11.0859 4.56112C11.1127 4.50068 11.1698 4.47045 11.2571 4.47045H12.1638ZM13.7857 0.994934H12.9798V0.279683H13.7857V0.994934ZM12.5063 0.994934H11.7004V0.279683H12.5063V0.994934ZM5.64177 12.9641C5.64177 13.3267 5.58468 13.6659 5.47051 13.9815C5.35634 14.3039 5.1918 14.5826 4.97689 14.8177C4.76198 15.0595 4.50005 15.2509 4.19112 15.3919C3.8889 15.5329 3.54638 15.6035 3.16357 15.6035H2.56921C1.81702 15.6035 1.23273 15.3718 0.816337 14.9084C0.399946 14.445 0.191751 13.8103 0.191751 13.0044V11.2414H0.836485V12.9842C0.836485 13.273 0.870065 13.5349 0.937225 13.77C1.0111 14.0051 1.12191 14.2065 1.26967 14.3744C1.42413 14.549 1.61554 14.6834 1.84388 14.7774C2.07223 14.8714 2.34758 14.9184 2.66995 14.9184H3.1132C3.42885 14.9184 3.70421 14.8647 3.93927 14.7572C4.17433 14.6565 4.36909 14.5188 4.52356 14.3442C4.68474 14.1696 4.80227 13.9648 4.87615 13.7297C4.95674 13.4946 4.99703 13.2495 4.99703 12.9943V10.2844H5.64177V12.9641ZM3.21394 10.0628H2.36773V9.32738H3.21394V10.0628ZM8.24526 13.1656C8.07064 13.1656 7.90274 13.1421 7.74156 13.095C7.58038 13.0413 7.43598 12.954 7.30838 12.8331C7.18749 12.7122 7.09011 12.5544 7.01624 12.3596C6.94236 12.1582 6.90542 11.9097 6.90542 11.6142V6.9197H7.56023V11.4933C7.56023 11.7754 7.62067 12.0104 7.74156 12.1985C7.86916 12.3798 8.074 12.4705 8.35607 12.4705H8.52733C8.67508 12.4705 8.74896 12.5846 8.74896 12.813C8.74896 13.048 8.67508 13.1656 8.52733 13.1656H8.24526ZM8.69324 12.4705C8.95516 12.4705 9.15328 12.4067 9.2876 12.279C9.42192 12.1514 9.48908 11.9802 9.48908 11.7653V11.3825C9.48908 10.7982 9.63683 10.3415 9.93233 10.0124C10.2346 9.68332 10.6509 9.51878 11.1815 9.51878C11.4569 9.51878 11.6986 9.56243 11.9068 9.64974C12.115 9.73705 12.2863 9.8613 12.4206 10.0225C12.5616 10.1837 12.6657 10.3751 12.7329 10.5967C12.8001 10.8183 12.8336 11.0635 12.8336 11.3321C12.8336 11.9097 12.6825 12.3596 12.3803 12.682C12.0781 13.0044 11.6651 13.1656 11.1412 13.1656C10.8726 13.1656 10.614 13.1152 10.3655 13.0144C10.117 12.907 9.92226 12.7189 9.78123 12.4503C9.72078 12.6048 9.64691 12.729 9.5596 12.823C9.47229 12.9171 9.38162 12.9909 9.2876 13.0447C9.19358 13.0917 9.09284 13.1253 8.98538 13.1454C8.88464 13.1588 8.78726 13.1656 8.69324 13.1656H8.53205C8.44475 13.1656 8.38766 13.1387 8.3608 13.085C8.32722 13.0312 8.31043 12.9473 8.31043 12.8331C8.31043 12.7122 8.32722 12.6216 8.3608 12.5611C8.38766 12.5007 8.44475 12.4705 8.53205 12.4705H8.69324ZM12.1889 11.3925C12.1889 11.0433 12.1117 10.7612 11.9572 10.5463C11.8027 10.3247 11.5375 10.2139 11.1614 10.2139C10.4629 10.2139 10.1137 10.6202 10.1137 11.4328C10.1137 11.7754 10.2077 12.0339 10.3957 12.2085C10.5905 12.3831 10.839 12.4705 11.1412 12.4705C11.4837 12.4705 11.7423 12.3764 11.9169 12.1884C12.0982 12.0003 12.1889 11.7351 12.1889 11.3925Z" fill="currentColor"></path>
                                            </svg>


                                        </div>
                                        @endif

                                        @else
                                        <div>
                                            <span class="fw-bold font-18 def-color">
                                             ناموجود
                                            </span>

                                        </div>


                                        @endif


                                    </div>
 --}}

    {{-- @if ($currentDate > $targetDate)

                                    <span style="color: blue">این قیمت</span>

                                    @else
                                    <span style="color: red">یه قیمت دیگه</span>
                                    @endif --}}
    {{-- <div class="timer text-center mt-2">
                                        <div class='countdown' data-date="{{$product_normal_men->daily_timer}}" data-time="17:30">
                                        </div>
                                    </div> --}}
    {{-- </div>
                            </a>
                        </div>
                    </div>
                    @endforeach --}}

    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-next d-sm-flex d-none"></div>
    <div class="swiper-button-prev d-sm-flex d-none"></div>
    </div>
    </div>
    </div>
    {{-- </div> --}}
    <!-- end product box -->


    <div class="banner py-20" style="overflow: hidden !important">
        <div class="container-fluid" style="overflow: hidden !important">
            <div class="row">
                @foreach ($indexTopBanners as $banner)
                    <div class="col-md-3 col-6 mt-md-0 mt-2" data-aos="fade-up" data-aos-duration="700">
                        <a href="">
                            <img src="{{ asset(env('BANNER_IMAGES_UPLOAD_PATH') . $banner->image) }}"
                                class="img-fluid rounded-3 shadow-box" alt="">
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- end banner -->



    <div class="product-box-two py-20">
        <div class="container-fluid">
            <div class="parents">
                <div class="row">
                    <div class="col-lg-3 col-12 mt-md-0 mt-3 order-2">
                        <div class="swiper sugget-slider">
                            <div class="swiper-wrapper">
                                @foreach ($product_daily_offers as $product_daily_offer)
                                @if ($product_daily_offer->sale_check)
                                <div class="swiper-slide">
                                    <style>

                                    </style>

                                    <div class="sugget-item">
                                        <div class="timer text-center">
                                            <div class='countdown' data-date="{{$product_daily_offer->variations->first()->date_on_sale_to}}">
                                            </div>
                                        </div>
                                        <div class="image">
                                            <a
                                                href="{{ route('home.products.show', ['product' => $product_daily_offer->slug]) }}">
                                                <img src="{{ asset('/upload/files/products/images/' . $product_daily_offer->primary_image) }}"
                                                    alt="" class="img-fluid">
                                            </a>


                                        </div>
                                        <div class="title">
                                            <h6 class="fw-bold font-14"><a
                                                    href="{{ route('home.products.show', ['product' => $product_daily_offer->slug]) }}">{{ $product_daily_offer->name }}</a>
                                            </h6>
                                        </div>
                                        <div class="foot d-flex justify-content-between align-items-center">
                                            <div class="foot d-flex justify-content-between align-items-center">
                                                <form action="{{ route('home.cart.add') }}" method="POST">
                                                    <input type="hidden" name="product_id"
                                                        value="{{ $product_daily_offer->id }}">
                                                    @csrf
                                                    @if ($product_daily_offer->quantity_check)
                                                        @php
                                                            if ($product_daily_offer->sale_check) {
                                                                $variationProductSelected =
                                                                    $product_daily_offer->sale_check;
                                                            } else {
                                                                $variationProductSelected =
                                                                    $product_daily_offer->price_check;
                                                            }
                                                        @endphp
                                                        <div class="pro-details-size-color text-right">
                                                            <div class="pro-details-size w-50" style="display: none">
                                                                <span>{{ App\Models\Attribute::find($product_daily_offer->variations->first()->attribute_id)->name }}</span>
                                                                <select name="variation"
                                                                    class="form-control variation-select"
                                                                    style="display: none">
                                                                    @foreach ($product_daily_offer->variations()->where('quantity', '>', 0)->get() as $variation)
                                                                        <option
                                                                            value="{{ json_encode($variation->only(['id', 'quantity', 'is_sale', 'sale_price', 'price'])) }}"
                                                                            {{ $variationProductSelected->id == $variation->id ? 'selected' : '' }}>
                                                                            {{ $variation->value }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                        </div>


                                                        <form action="{{ route('home.cart.add') }}" method="POST">
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $product_daily_offer->id }}">
                                                            @csrf
                                                            @if ($product_daily_offer->quantity_check)
                                                                @php
                                                                    if ($product_daily_offer->sale_check) {
                                                                        $variationProductSelected =
                                                                            $product_daily_offer->sale_check;
                                                                    } else {
                                                                        $variationProductSelected =
                                                                            $product_daily_offer->price_check;
                                                                    }
                                                                @endphp
                                                                <div class="pro-details-size-color text-right">
                                                                    <div class="pro-details-size w-50"
                                                                        style="display: none">
                                                                        <span>{{ App\Models\Attribute::find($product_daily_offer->variations->first()->attribute_id)->name }}</span>
                                                                        <select name="variation"
                                                                            class="form-control variation-select"
                                                                            data-id="{{ $product_daily_offer->id }}"
                                                                            style="    width: 160px;">
                                                                            @foreach ($product_daily_offer->variations()->where('quantity', '>', 0)->get() as $variation)
                                                                                <option
                                                                                    value="{{ json_encode($variation->only(['id', 'quantity', 'is_sale', 'sale_price', 'price'])) }}"
                                                                                    {{ $variationProductSelected->id == $variation->id ? 'selected' : '' }}>
                                                                                    {{ $variation->value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                </div>
                                                                <div class="pro-details-quality">
                                                                    <div class="cart-plus-minus"
                                                                        style="text-align: -webkit-right;display:none">
                                                                        <span>تعداد</span>
                                                                        <input style="width: 160px"
                                                                            class="form-control cart-plus-minus-box quantity-input"
                                                                            type="text" name="qtybutton"
                                                                            value="1" data-max="5" />
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center justify-content-center">
                                                                        <button type="submit"
                                                                            style="border: none;padding-left: 94px;background: no-repeat;">
                                                                            <div class="add"
                                                                                data-hint="افزودن به سبد خرید"
                                                                                class="hint--right">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="16" height="16"
                                                                                    fill="currentColor"
                                                                                    class="bi bi-bag"
                                                                                    viewBox="0 0 16 16">
                                                                                    <path
                                                                                        d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                                                                </svg>
                                                                            </div>
                                                                        </button>

                                                                    </div>





                                                                    <div class="pro-details-wishlist"
                                                                        style="display: none">
                                                                        @auth
                                                                            @if ($product_daily_offer->checkUserWishlist(auth()->id()))
                                                                                <a
                                                                                    href="{{ route('home.wishlist.remove', ['product' => $product_daily_offer->id]) }}"><i
                                                                                        class="fas fa-heart"
                                                                                        style="color:red"></i>
                                                                                </a>
                                                                            @else
                                                                                <a
                                                                                    href="{{ route('home.wishlist.add', ['product' => $product_daily_offer->id]) }}"><i
                                                                                        class="sli sli-heart"></i>
                                                                                </a>
                                                                            @endif
                                                                        @else
                                                                            <a
                                                                                href="{{ route('home.wishlist.add', ['product' => $product_daily_offer->id]) }}"><i
                                                                                    class="sli sli-heart"></i>
                                                                            </a>
                                                                        @endauth
                                                                    </div>
                                                                    <div class="pro-details-compare"
                                                                        style="display:none">
                                                                        <a title="Add To Compare" href="#"><i
                                                                                class="sli sli-refresh"></i></a>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="not-in-stock">
                                                                    <p class="text-white">ناموجود</p>
                                                                </div>
                                                            @endif
                                                        </form>
                                                    @else
                                                        <div class="not-in-stock">
                                                            <p class="text-white" style="padding-right:56px">ناموجود
                                                            </p>
                                                        </div>
                                                    @endif
                                                </form>

                                                @if ($product_daily_offer->quantity_check)
                                                    @if ($product_daily_offer->sale_check)
                                                        <div class="price d-flex flex-column justify-content-end">
                                                            <div>
                                                                <span class="fw-bold font-18 def-color">
                                                                    {{ number_format($product_daily_offer->quantity_check->sale_price) }}
                                                                </span>
                                                                <svg class="mr-1 " width="14" height="16"
                                                                    viewBox="0 0 14 16" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path class="text-gray-880 dark:text-white"
                                                                        d="M1.14878 6.91843C1.44428 6.91843 1.70285 6.87142 1.92447 6.77739C2.15282 6.68337 2.34422 6.55577 2.49869 6.39458C2.65316 6.2334 2.77069 6.04535 2.85128 5.83044C2.93187 5.62224 2.97888 5.40062 2.99231 5.16556H1.98492C1.6424 5.16556 1.36033 5.12862 1.1387 5.05474C0.917077 4.98087 0.742461 4.87341 0.614858 4.73238C0.487254 4.59134 0.396588 4.42344 0.34286 4.22868C0.295849 4.0272 0.272343 3.80221 0.272343 3.55372C0.272343 3.29852 0.309281 3.05674 0.383156 2.8284C0.457032 2.60005 0.564488 2.39857 0.705523 2.22396C0.846559 2.04934 1.02117 1.91167 1.22937 1.81093C1.44428 1.70347 1.68941 1.64974 1.96477 1.64974C2.1864 1.64974 2.39795 1.68668 2.59943 1.76056C2.80091 1.83443 2.97888 1.95196 3.13335 2.11315C3.28782 2.26761 3.40871 2.47245 3.49601 2.72766C3.59004 2.97615 3.63705 3.27837 3.63705 3.63431V4.47045H4.60415C4.68474 4.47045 4.73847 4.50068 4.76533 4.56112C4.79891 4.61485 4.8157 4.6988 4.8157 4.81297C4.8157 4.93386 4.79891 5.02452 4.76533 5.08497C4.73847 5.13869 4.68474 5.16556 4.60415 5.16556H3.6169C3.60347 5.49464 3.53631 5.80693 3.41542 6.10244C3.30125 6.39794 3.14007 6.65651 2.93187 6.87813C2.72368 7.09976 2.47518 7.27438 2.1864 7.40198C1.89761 7.5363 1.57188 7.60346 1.20922 7.60346H0.141381L0.0809373 6.91843H1.14878ZM0.896929 3.51343C0.896929 3.68133 0.913719 3.82572 0.947299 3.94661C0.987594 4.0675 1.0514 4.16823 1.1387 4.24883C1.23273 4.3227 1.35697 4.37979 1.51144 4.42008C1.66591 4.45366 1.86067 4.47045 2.09573 4.47045H3.00239V3.71491C3.00239 3.21792 2.90501 2.86198 2.71024 2.64707C2.51548 2.43215 2.24684 2.3247 1.90433 2.3247C1.58196 2.3247 1.33347 2.43215 1.15885 2.64707C0.984237 2.86198 0.896929 3.15076 0.896929 3.51343ZM6.26895 4.47045C6.35626 4.47045 6.41335 4.50068 6.44021 4.56112C6.47379 4.61485 6.49058 4.6988 6.49058 4.81297C6.49058 4.93386 6.47379 5.02452 6.44021 5.08497C6.41335 5.13869 6.35626 5.16556 6.26895 5.16556H4.60675C4.51944 5.16556 4.46235 5.13869 4.43549 5.08497C4.40191 5.03124 4.38512 4.94729 4.38512 4.83312C4.38512 4.71223 4.40191 4.62156 4.43549 4.56112C4.46235 4.50068 4.51944 4.47045 4.60675 4.47045H6.26895ZM7.93155 4.47045C8.01886 4.47045 8.07594 4.50068 8.10281 4.56112C8.13639 4.61485 8.15318 4.6988 8.15318 4.81297C8.15318 4.93386 8.13639 5.02452 8.10281 5.08497C8.07594 5.13869 8.01886 5.16556 7.93155 5.16556H6.26935C6.18204 5.16556 6.12495 5.13869 6.09809 5.08497C6.06451 5.03124 6.04772 4.94729 6.04772 4.83312C6.04772 4.71223 6.06451 4.62156 6.09809 4.56112C6.12495 4.50068 6.18204 4.47045 6.26935 4.47045H7.93155ZM9.59415 4.47045C9.68146 4.47045 9.73854 4.50068 9.76541 4.56112C9.79899 4.61485 9.81578 4.6988 9.81578 4.81297C9.81578 4.93386 9.79899 5.02452 9.76541 5.08497C9.73854 5.13869 9.68146 5.16556 9.59415 5.16556H7.93194C7.84464 5.16556 7.78755 5.13869 7.76069 5.08497C7.72711 5.03124 7.71032 4.94729 7.71032 4.83312C7.71032 4.71223 7.72711 4.62156 7.76069 4.56112C7.78755 4.50068 7.84464 4.47045 7.93194 4.47045H9.59415ZM11.2567 4.47045C11.3441 4.47045 11.4011 4.50068 11.428 4.56112C11.4616 4.61485 11.4784 4.6988 11.4784 4.81297C11.4784 4.93386 11.4616 5.02452 11.428 5.08497C11.4011 5.13869 11.3441 5.16556 11.2567 5.16556H9.59454C9.50723 5.16556 9.45015 5.13869 9.42328 5.08497C9.3897 5.03124 9.37291 4.94729 9.37291 4.83312C9.37291 4.71223 9.3897 4.62156 9.42328 4.56112C9.45015 4.50068 9.50723 4.47045 9.59454 4.47045H11.2567ZM12.1638 4.47045C12.4257 4.47045 12.6339 4.39994 12.7884 4.2589C12.9496 4.11787 13.0302 3.9231 13.0302 3.67461V2.2844H13.685V3.67461C13.685 4.15144 13.5506 4.52082 13.282 4.78275C13.0201 5.03795 12.6608 5.16556 12.2041 5.16556H11.2571C11.1698 5.16556 11.1127 5.13869 11.0859 5.08497C11.0523 5.03124 11.0355 4.94729 11.0355 4.83312C11.0355 4.71223 11.0523 4.62156 11.0859 4.56112C11.1127 4.50068 11.1698 4.47045 11.2571 4.47045H12.1638ZM13.7857 0.994934H12.9798V0.279683H13.7857V0.994934ZM12.5063 0.994934H11.7004V0.279683H12.5063V0.994934ZM5.64177 12.9641C5.64177 13.3267 5.58468 13.6659 5.47051 13.9815C5.35634 14.3039 5.1918 14.5826 4.97689 14.8177C4.76198 15.0595 4.50005 15.2509 4.19112 15.3919C3.8889 15.5329 3.54638 15.6035 3.16357 15.6035H2.56921C1.81702 15.6035 1.23273 15.3718 0.816337 14.9084C0.399946 14.445 0.191751 13.8103 0.191751 13.0044V11.2414H0.836485V12.9842C0.836485 13.273 0.870065 13.5349 0.937225 13.77C1.0111 14.0051 1.12191 14.2065 1.26967 14.3744C1.42413 14.549 1.61554 14.6834 1.84388 14.7774C2.07223 14.8714 2.34758 14.9184 2.66995 14.9184H3.1132C3.42885 14.9184 3.70421 14.8647 3.93927 14.7572C4.17433 14.6565 4.36909 14.5188 4.52356 14.3442C4.68474 14.1696 4.80227 13.9648 4.87615 13.7297C4.95674 13.4946 4.99703 13.2495 4.99703 12.9943V10.2844H5.64177V12.9641ZM3.21394 10.0628H2.36773V9.32738H3.21394V10.0628ZM8.24526 13.1656C8.07064 13.1656 7.90274 13.1421 7.74156 13.095C7.58038 13.0413 7.43598 12.954 7.30838 12.8331C7.18749 12.7122 7.09011 12.5544 7.01624 12.3596C6.94236 12.1582 6.90542 11.9097 6.90542 11.6142V6.9197H7.56023V11.4933C7.56023 11.7754 7.62067 12.0104 7.74156 12.1985C7.86916 12.3798 8.074 12.4705 8.35607 12.4705H8.52733C8.67508 12.4705 8.74896 12.5846 8.74896 12.813C8.74896 13.048 8.67508 13.1656 8.52733 13.1656H8.24526ZM8.69324 12.4705C8.95516 12.4705 9.15328 12.4067 9.2876 12.279C9.42192 12.1514 9.48908 11.9802 9.48908 11.7653V11.3825C9.48908 10.7982 9.63683 10.3415 9.93233 10.0124C10.2346 9.68332 10.6509 9.51878 11.1815 9.51878C11.4569 9.51878 11.6986 9.56243 11.9068 9.64974C12.115 9.73705 12.2863 9.8613 12.4206 10.0225C12.5616 10.1837 12.6657 10.3751 12.7329 10.5967C12.8001 10.8183 12.8336 11.0635 12.8336 11.3321C12.8336 11.9097 12.6825 12.3596 12.3803 12.682C12.0781 13.0044 11.6651 13.1656 11.1412 13.1656C10.8726 13.1656 10.614 13.1152 10.3655 13.0144C10.117 12.907 9.92226 12.7189 9.78123 12.4503C9.72078 12.6048 9.64691 12.729 9.5596 12.823C9.47229 12.9171 9.38162 12.9909 9.2876 13.0447C9.19358 13.0917 9.09284 13.1253 8.98538 13.1454C8.88464 13.1588 8.78726 13.1656 8.69324 13.1656H8.53205C8.44475 13.1656 8.38766 13.1387 8.3608 13.085C8.32722 13.0312 8.31043 12.9473 8.31043 12.8331C8.31043 12.7122 8.32722 12.6216 8.3608 12.5611C8.38766 12.5007 8.44475 12.4705 8.53205 12.4705H8.69324ZM12.1889 11.3925C12.1889 11.0433 12.1117 10.7612 11.9572 10.5463C11.8027 10.3247 11.5375 10.2139 11.1614 10.2139C10.4629 10.2139 10.1137 10.6202 10.1137 11.4328C10.1137 11.7754 10.2077 12.0339 10.3957 12.2085C10.5905 12.3831 10.839 12.4705 11.1412 12.4705C11.4837 12.4705 11.7423 12.3764 11.9169 12.1884C12.0982 12.0003 12.1889 11.7351 12.1889 11.3925Z"
                                                                        fill="currentColor"></path>
                                                                </svg>
                                                            </div>
                                                            <div
                                                                class="d-flex justify-content-center align-items-center">
                                                                <span
                                                                    class="text-muted font-14 text-decoration-line-through">
                                                                    {{ number_format($product_daily_offer->quantity_check->price) }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div>
                                                            <span class="fw-bold font-18 def-color">
                                                                {{ number_format($product_daily_offer->quantity_check->price) }}
                                                            </span>
                                                            <svg class="mr-1 " width="14" height="16"
                                                                viewBox="0 0 14 16" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path class="text-gray-880 dark:text-white"
                                                                    d="M1.14878 6.91843C1.44428 6.91843 1.70285 6.87142 1.92447 6.77739C2.15282 6.68337 2.34422 6.55577 2.49869 6.39458C2.65316 6.2334 2.77069 6.04535 2.85128 5.83044C2.93187 5.62224 2.97888 5.40062 2.99231 5.16556H1.98492C1.6424 5.16556 1.36033 5.12862 1.1387 5.05474C0.917077 4.98087 0.742461 4.87341 0.614858 4.73238C0.487254 4.59134 0.396588 4.42344 0.34286 4.22868C0.295849 4.0272 0.272343 3.80221 0.272343 3.55372C0.272343 3.29852 0.309281 3.05674 0.383156 2.8284C0.457032 2.60005 0.564488 2.39857 0.705523 2.22396C0.846559 2.04934 1.02117 1.91167 1.22937 1.81093C1.44428 1.70347 1.68941 1.64974 1.96477 1.64974C2.1864 1.64974 2.39795 1.68668 2.59943 1.76056C2.80091 1.83443 2.97888 1.95196 3.13335 2.11315C3.28782 2.26761 3.40871 2.47245 3.49601 2.72766C3.59004 2.97615 3.63705 3.27837 3.63705 3.63431V4.47045H4.60415C4.68474 4.47045 4.73847 4.50068 4.76533 4.56112C4.79891 4.61485 4.8157 4.6988 4.8157 4.81297C4.8157 4.93386 4.79891 5.02452 4.76533 5.08497C4.73847 5.13869 4.68474 5.16556 4.60415 5.16556H3.6169C3.60347 5.49464 3.53631 5.80693 3.41542 6.10244C3.30125 6.39794 3.14007 6.65651 2.93187 6.87813C2.72368 7.09976 2.47518 7.27438 2.1864 7.40198C1.89761 7.5363 1.57188 7.60346 1.20922 7.60346H0.141381L0.0809373 6.91843H1.14878ZM0.896929 3.51343C0.896929 3.68133 0.913719 3.82572 0.947299 3.94661C0.987594 4.0675 1.0514 4.16823 1.1387 4.24883C1.23273 4.3227 1.35697 4.37979 1.51144 4.42008C1.66591 4.45366 1.86067 4.47045 2.09573 4.47045H3.00239V3.71491C3.00239 3.21792 2.90501 2.86198 2.71024 2.64707C2.51548 2.43215 2.24684 2.3247 1.90433 2.3247C1.58196 2.3247 1.33347 2.43215 1.15885 2.64707C0.984237 2.86198 0.896929 3.15076 0.896929 3.51343ZM6.26895 4.47045C6.35626 4.47045 6.41335 4.50068 6.44021 4.56112C6.47379 4.61485 6.49058 4.6988 6.49058 4.81297C6.49058 4.93386 6.47379 5.02452 6.44021 5.08497C6.41335 5.13869 6.35626 5.16556 6.26895 5.16556H4.60675C4.51944 5.16556 4.46235 5.13869 4.43549 5.08497C4.40191 5.03124 4.38512 4.94729 4.38512 4.83312C4.38512 4.71223 4.40191 4.62156 4.43549 4.56112C4.46235 4.50068 4.51944 4.47045 4.60675 4.47045H6.26895ZM7.93155 4.47045C8.01886 4.47045 8.07594 4.50068 8.10281 4.56112C8.13639 4.61485 8.15318 4.6988 8.15318 4.81297C8.15318 4.93386 8.13639 5.02452 8.10281 5.08497C8.07594 5.13869 8.01886 5.16556 7.93155 5.16556H6.26935C6.18204 5.16556 6.12495 5.13869 6.09809 5.08497C6.06451 5.03124 6.04772 4.94729 6.04772 4.83312C6.04772 4.71223 6.06451 4.62156 6.09809 4.56112C6.12495 4.50068 6.18204 4.47045 6.26935 4.47045H7.93155ZM9.59415 4.47045C9.68146 4.47045 9.73854 4.50068 9.76541 4.56112C9.79899 4.61485 9.81578 4.6988 9.81578 4.81297C9.81578 4.93386 9.79899 5.02452 9.76541 5.08497C9.73854 5.13869 9.68146 5.16556 9.59415 5.16556H7.93194C7.84464 5.16556 7.78755 5.13869 7.76069 5.08497C7.72711 5.03124 7.71032 4.94729 7.71032 4.83312C7.71032 4.71223 7.72711 4.62156 7.76069 4.56112C7.78755 4.50068 7.84464 4.47045 7.93194 4.47045H9.59415ZM11.2567 4.47045C11.3441 4.47045 11.4011 4.50068 11.428 4.56112C11.4616 4.61485 11.4784 4.6988 11.4784 4.81297C11.4784 4.93386 11.4616 5.02452 11.428 5.08497C11.4011 5.13869 11.3441 5.16556 11.2567 5.16556H9.59454C9.50723 5.16556 9.45015 5.13869 9.42328 5.08497C9.3897 5.03124 9.37291 4.94729 9.37291 4.83312C9.37291 4.71223 9.3897 4.62156 9.42328 4.56112C9.45015 4.50068 9.50723 4.47045 9.59454 4.47045H11.2567ZM12.1638 4.47045C12.4257 4.47045 12.6339 4.39994 12.7884 4.2589C12.9496 4.11787 13.0302 3.9231 13.0302 3.67461V2.2844H13.685V3.67461C13.685 4.15144 13.5506 4.52082 13.282 4.78275C13.0201 5.03795 12.6608 5.16556 12.2041 5.16556H11.2571C11.1698 5.16556 11.1127 5.13869 11.0859 5.08497C11.0523 5.03124 11.0355 4.94729 11.0355 4.83312C11.0355 4.71223 11.0523 4.62156 11.0859 4.56112C11.1127 4.50068 11.1698 4.47045 11.2571 4.47045H12.1638ZM13.7857 0.994934H12.9798V0.279683H13.7857V0.994934ZM12.5063 0.994934H11.7004V0.279683H12.5063V0.994934ZM5.64177 12.9641C5.64177 13.3267 5.58468 13.6659 5.47051 13.9815C5.35634 14.3039 5.1918 14.5826 4.97689 14.8177C4.76198 15.0595 4.50005 15.2509 4.19112 15.3919C3.8889 15.5329 3.54638 15.6035 3.16357 15.6035H2.56921C1.81702 15.6035 1.23273 15.3718 0.816337 14.9084C0.399946 14.445 0.191751 13.8103 0.191751 13.0044V11.2414H0.836485V12.9842C0.836485 13.273 0.870065 13.5349 0.937225 13.77C1.0111 14.0051 1.12191 14.2065 1.26967 14.3744C1.42413 14.549 1.61554 14.6834 1.84388 14.7774C2.07223 14.8714 2.34758 14.9184 2.66995 14.9184H3.1132C3.42885 14.9184 3.70421 14.8647 3.93927 14.7572C4.17433 14.6565 4.36909 14.5188 4.52356 14.3442C4.68474 14.1696 4.80227 13.9648 4.87615 13.7297C4.95674 13.4946 4.99703 13.2495 4.99703 12.9943V10.2844H5.64177V12.9641ZM3.21394 10.0628H2.36773V9.32738H3.21394V10.0628ZM8.24526 13.1656C8.07064 13.1656 7.90274 13.1421 7.74156 13.095C7.58038 13.0413 7.43598 12.954 7.30838 12.8331C7.18749 12.7122 7.09011 12.5544 7.01624 12.3596C6.94236 12.1582 6.90542 11.9097 6.90542 11.6142V6.9197H7.56023V11.4933C7.56023 11.7754 7.62067 12.0104 7.74156 12.1985C7.86916 12.3798 8.074 12.4705 8.35607 12.4705H8.52733C8.67508 12.4705 8.74896 12.5846 8.74896 12.813C8.74896 13.048 8.67508 13.1656 8.52733 13.1656H8.24526ZM8.69324 12.4705C8.95516 12.4705 9.15328 12.4067 9.2876 12.279C9.42192 12.1514 9.48908 11.9802 9.48908 11.7653V11.3825C9.48908 10.7982 9.63683 10.3415 9.93233 10.0124C10.2346 9.68332 10.6509 9.51878 11.1815 9.51878C11.4569 9.51878 11.6986 9.56243 11.9068 9.64974C12.115 9.73705 12.2863 9.8613 12.4206 10.0225C12.5616 10.1837 12.6657 10.3751 12.7329 10.5967C12.8001 10.8183 12.8336 11.0635 12.8336 11.3321C12.8336 11.9097 12.6825 12.3596 12.3803 12.682C12.0781 13.0044 11.6651 13.1656 11.1412 13.1656C10.8726 13.1656 10.614 13.1152 10.3655 13.0144C10.117 12.907 9.92226 12.7189 9.78123 12.4503C9.72078 12.6048 9.64691 12.729 9.5596 12.823C9.47229 12.9171 9.38162 12.9909 9.2876 13.0447C9.19358 13.0917 9.09284 13.1253 8.98538 13.1454C8.88464 13.1588 8.78726 13.1656 8.69324 13.1656H8.53205C8.44475 13.1656 8.38766 13.1387 8.3608 13.085C8.32722 13.0312 8.31043 12.9473 8.31043 12.8331C8.31043 12.7122 8.32722 12.6216 8.3608 12.5611C8.38766 12.5007 8.44475 12.4705 8.53205 12.4705H8.69324ZM12.1889 11.3925C12.1889 11.0433 12.1117 10.7612 11.9572 10.5463C11.8027 10.3247 11.5375 10.2139 11.1614 10.2139C10.4629 10.2139 10.1137 10.6202 10.1137 11.4328C10.1137 11.7754 10.2077 12.0339 10.3957 12.2085C10.5905 12.3831 10.839 12.4705 11.1412 12.4705C11.4837 12.4705 11.7423 12.3764 11.9169 12.1884C12.0982 12.0003 12.1889 11.7351 12.1889 11.3925Z"
                                                                    fill="currentColor"></path>
                                                            </svg>


                                                        </div>
                                                    @endif
                                                @else
                                                    <div>
                                                        <span class="fw-bold font-18 def-color">
                                                            ناموجود
                                                        </span>

                                                    </div>
                                                @endif


                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach

                            </div>
                        </div>
                    </div>



                    <div class="col-lg-9 order-1">
                        <div class="parent">
                            <div class="content-title d-flex align-items-center justify-content-between pb-4">
                                <div class="item d-flex align-items-center justify-content-between">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-box-seam me-2" viewBox="0 0 16 16">
                                        <path
                                            d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                                    </svg>
                                    <h5 class="title font-16">پرفروش ترین محصولات</h5>
                                </div>
                                <div class="item d-flex align-items-center justify-content-between">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-box-arrow-in-left me-2" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z" />
                                        <path fill-rule="evenodd"
                                            d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                                    </svg>
                                    <a href="" class="text-white">
                                        <h5 class="title font-14">مشاهده همه</h5>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                @foreach ($product_daily_offers as $product_daily_offer)
                                @if ($product_daily_offer->sale_check)
                                <div class="col-lg-4 col-sm-6 wow animate__animated animate__slideInUp"
                                    data-wow-offset="100" data-wow-duration="1.5s"
                                    style="overflow: hidden !important">
                                    <a
                                        href="{{ route('home.products.show', ['product' => $product_daily_offer->slug]) }}">
                                        <div
                                            class="product-row bg-white d-flex align-items-center justify-content-between rounded-4 shadow-md">
                                            <div class="image">
                                                <img src="{{ asset('/upload/files/products/images/' . $product_daily_offer->primary_image) }}"
                                                    class="img-fluid" width="100" alt="">
                                            </div>
                                            <div class="desc">
                                                <h6 class="font-14 title text-overflow">
                                                    {{ $product_daily_offer->name }}</h6>
                                                <div class="price d-flex flex-column justify-content-end mt-2">
                                                    <div class="text-end">
                                                        @if ($product_daily_offer->quantity_check)
                                                            @if ($product_daily_offer->sale_check)
                                                                <div
                                                                    class="price d-flex flex-column justify-content-end">
                                                                    <div>
                                                                        <span class="fw-bold font-18 def-color">
                                                                            {{ number_format($product_daily_offer->quantity_check->sale_price) }}
                                                                        </span>
                                                                        <svg class="mr-1 " width="14"
                                                                            height="16" viewBox="0 0 14 16"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path class="text-gray-880 dark:text-white"
                                                                                d="M1.14878 6.91843C1.44428 6.91843 1.70285 6.87142 1.92447 6.77739C2.15282 6.68337 2.34422 6.55577 2.49869 6.39458C2.65316 6.2334 2.77069 6.04535 2.85128 5.83044C2.93187 5.62224 2.97888 5.40062 2.99231 5.16556H1.98492C1.6424 5.16556 1.36033 5.12862 1.1387 5.05474C0.917077 4.98087 0.742461 4.87341 0.614858 4.73238C0.487254 4.59134 0.396588 4.42344 0.34286 4.22868C0.295849 4.0272 0.272343 3.80221 0.272343 3.55372C0.272343 3.29852 0.309281 3.05674 0.383156 2.8284C0.457032 2.60005 0.564488 2.39857 0.705523 2.22396C0.846559 2.04934 1.02117 1.91167 1.22937 1.81093C1.44428 1.70347 1.68941 1.64974 1.96477 1.64974C2.1864 1.64974 2.39795 1.68668 2.59943 1.76056C2.80091 1.83443 2.97888 1.95196 3.13335 2.11315C3.28782 2.26761 3.40871 2.47245 3.49601 2.72766C3.59004 2.97615 3.63705 3.27837 3.63705 3.63431V4.47045H4.60415C4.68474 4.47045 4.73847 4.50068 4.76533 4.56112C4.79891 4.61485 4.8157 4.6988 4.8157 4.81297C4.8157 4.93386 4.79891 5.02452 4.76533 5.08497C4.73847 5.13869 4.68474 5.16556 4.60415 5.16556H3.6169C3.60347 5.49464 3.53631 5.80693 3.41542 6.10244C3.30125 6.39794 3.14007 6.65651 2.93187 6.87813C2.72368 7.09976 2.47518 7.27438 2.1864 7.40198C1.89761 7.5363 1.57188 7.60346 1.20922 7.60346H0.141381L0.0809373 6.91843H1.14878ZM0.896929 3.51343C0.896929 3.68133 0.913719 3.82572 0.947299 3.94661C0.987594 4.0675 1.0514 4.16823 1.1387 4.24883C1.23273 4.3227 1.35697 4.37979 1.51144 4.42008C1.66591 4.45366 1.86067 4.47045 2.09573 4.47045H3.00239V3.71491C3.00239 3.21792 2.90501 2.86198 2.71024 2.64707C2.51548 2.43215 2.24684 2.3247 1.90433 2.3247C1.58196 2.3247 1.33347 2.43215 1.15885 2.64707C0.984237 2.86198 0.896929 3.15076 0.896929 3.51343ZM6.26895 4.47045C6.35626 4.47045 6.41335 4.50068 6.44021 4.56112C6.47379 4.61485 6.49058 4.6988 6.49058 4.81297C6.49058 4.93386 6.47379 5.02452 6.44021 5.08497C6.41335 5.13869 6.35626 5.16556 6.26895 5.16556H4.60675C4.51944 5.16556 4.46235 5.13869 4.43549 5.08497C4.40191 5.03124 4.38512 4.94729 4.38512 4.83312C4.38512 4.71223 4.40191 4.62156 4.43549 4.56112C4.46235 4.50068 4.51944 4.47045 4.60675 4.47045H6.26895ZM7.93155 4.47045C8.01886 4.47045 8.07594 4.50068 8.10281 4.56112C8.13639 4.61485 8.15318 4.6988 8.15318 4.81297C8.15318 4.93386 8.13639 5.02452 8.10281 5.08497C8.07594 5.13869 8.01886 5.16556 7.93155 5.16556H6.26935C6.18204 5.16556 6.12495 5.13869 6.09809 5.08497C6.06451 5.03124 6.04772 4.94729 6.04772 4.83312C6.04772 4.71223 6.06451 4.62156 6.09809 4.56112C6.12495 4.50068 6.18204 4.47045 6.26935 4.47045H7.93155ZM9.59415 4.47045C9.68146 4.47045 9.73854 4.50068 9.76541 4.56112C9.79899 4.61485 9.81578 4.6988 9.81578 4.81297C9.81578 4.93386 9.79899 5.02452 9.76541 5.08497C9.73854 5.13869 9.68146 5.16556 9.59415 5.16556H7.93194C7.84464 5.16556 7.78755 5.13869 7.76069 5.08497C7.72711 5.03124 7.71032 4.94729 7.71032 4.83312C7.71032 4.71223 7.72711 4.62156 7.76069 4.56112C7.78755 4.50068 7.84464 4.47045 7.93194 4.47045H9.59415ZM11.2567 4.47045C11.3441 4.47045 11.4011 4.50068 11.428 4.56112C11.4616 4.61485 11.4784 4.6988 11.4784 4.81297C11.4784 4.93386 11.4616 5.02452 11.428 5.08497C11.4011 5.13869 11.3441 5.16556 11.2567 5.16556H9.59454C9.50723 5.16556 9.45015 5.13869 9.42328 5.08497C9.3897 5.03124 9.37291 4.94729 9.37291 4.83312C9.37291 4.71223 9.3897 4.62156 9.42328 4.56112C9.45015 4.50068 9.50723 4.47045 9.59454 4.47045H11.2567ZM12.1638 4.47045C12.4257 4.47045 12.6339 4.39994 12.7884 4.2589C12.9496 4.11787 13.0302 3.9231 13.0302 3.67461V2.2844H13.685V3.67461C13.685 4.15144 13.5506 4.52082 13.282 4.78275C13.0201 5.03795 12.6608 5.16556 12.2041 5.16556H11.2571C11.1698 5.16556 11.1127 5.13869 11.0859 5.08497C11.0523 5.03124 11.0355 4.94729 11.0355 4.83312C11.0355 4.71223 11.0523 4.62156 11.0859 4.56112C11.1127 4.50068 11.1698 4.47045 11.2571 4.47045H12.1638ZM13.7857 0.994934H12.9798V0.279683H13.7857V0.994934ZM12.5063 0.994934H11.7004V0.279683H12.5063V0.994934ZM5.64177 12.9641C5.64177 13.3267 5.58468 13.6659 5.47051 13.9815C5.35634 14.3039 5.1918 14.5826 4.97689 14.8177C4.76198 15.0595 4.50005 15.2509 4.19112 15.3919C3.8889 15.5329 3.54638 15.6035 3.16357 15.6035H2.56921C1.81702 15.6035 1.23273 15.3718 0.816337 14.9084C0.399946 14.445 0.191751 13.8103 0.191751 13.0044V11.2414H0.836485V12.9842C0.836485 13.273 0.870065 13.5349 0.937225 13.77C1.0111 14.0051 1.12191 14.2065 1.26967 14.3744C1.42413 14.549 1.61554 14.6834 1.84388 14.7774C2.07223 14.8714 2.34758 14.9184 2.66995 14.9184H3.1132C3.42885 14.9184 3.70421 14.8647 3.93927 14.7572C4.17433 14.6565 4.36909 14.5188 4.52356 14.3442C4.68474 14.1696 4.80227 13.9648 4.87615 13.7297C4.95674 13.4946 4.99703 13.2495 4.99703 12.9943V10.2844H5.64177V12.9641ZM3.21394 10.0628H2.36773V9.32738H3.21394V10.0628ZM8.24526 13.1656C8.07064 13.1656 7.90274 13.1421 7.74156 13.095C7.58038 13.0413 7.43598 12.954 7.30838 12.8331C7.18749 12.7122 7.09011 12.5544 7.01624 12.3596C6.94236 12.1582 6.90542 11.9097 6.90542 11.6142V6.9197H7.56023V11.4933C7.56023 11.7754 7.62067 12.0104 7.74156 12.1985C7.86916 12.3798 8.074 12.4705 8.35607 12.4705H8.52733C8.67508 12.4705 8.74896 12.5846 8.74896 12.813C8.74896 13.048 8.67508 13.1656 8.52733 13.1656H8.24526ZM8.69324 12.4705C8.95516 12.4705 9.15328 12.4067 9.2876 12.279C9.42192 12.1514 9.48908 11.9802 9.48908 11.7653V11.3825C9.48908 10.7982 9.63683 10.3415 9.93233 10.0124C10.2346 9.68332 10.6509 9.51878 11.1815 9.51878C11.4569 9.51878 11.6986 9.56243 11.9068 9.64974C12.115 9.73705 12.2863 9.8613 12.4206 10.0225C12.5616 10.1837 12.6657 10.3751 12.7329 10.5967C12.8001 10.8183 12.8336 11.0635 12.8336 11.3321C12.8336 11.9097 12.6825 12.3596 12.3803 12.682C12.0781 13.0044 11.6651 13.1656 11.1412 13.1656C10.8726 13.1656 10.614 13.1152 10.3655 13.0144C10.117 12.907 9.92226 12.7189 9.78123 12.4503C9.72078 12.6048 9.64691 12.729 9.5596 12.823C9.47229 12.9171 9.38162 12.9909 9.2876 13.0447C9.19358 13.0917 9.09284 13.1253 8.98538 13.1454C8.88464 13.1588 8.78726 13.1656 8.69324 13.1656H8.53205C8.44475 13.1656 8.38766 13.1387 8.3608 13.085C8.32722 13.0312 8.31043 12.9473 8.31043 12.8331C8.31043 12.7122 8.32722 12.6216 8.3608 12.5611C8.38766 12.5007 8.44475 12.4705 8.53205 12.4705H8.69324ZM12.1889 11.3925C12.1889 11.0433 12.1117 10.7612 11.9572 10.5463C11.8027 10.3247 11.5375 10.2139 11.1614 10.2139C10.4629 10.2139 10.1137 10.6202 10.1137 11.4328C10.1137 11.7754 10.2077 12.0339 10.3957 12.2085C10.5905 12.3831 10.839 12.4705 11.1412 12.4705C11.4837 12.4705 11.7423 12.3764 11.9169 12.1884C12.0982 12.0003 12.1889 11.7351 12.1889 11.3925Z"
                                                                                fill="currentColor"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex justify-content-center align-items-center">
                                                                        <span
                                                                            class="text-muted font-14 text-decoration-line-through">
                                                                            {{ number_format($product_daily_offer->quantity_check->price) }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div>
                                                                    <span class="fw-bold font-18 def-color">
                                                                        {{ number_format($product_daily_offer->quantity_check->price) }}
                                                                    </span>
                                                                    <svg class="mr-1 " width="14" height="16"
                                                                        viewBox="0 0 14 16" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path class="text-gray-880 dark:text-white"
                                                                            d="M1.14878 6.91843C1.44428 6.91843 1.70285 6.87142 1.92447 6.77739C2.15282 6.68337 2.34422 6.55577 2.49869 6.39458C2.65316 6.2334 2.77069 6.04535 2.85128 5.83044C2.93187 5.62224 2.97888 5.40062 2.99231 5.16556H1.98492C1.6424 5.16556 1.36033 5.12862 1.1387 5.05474C0.917077 4.98087 0.742461 4.87341 0.614858 4.73238C0.487254 4.59134 0.396588 4.42344 0.34286 4.22868C0.295849 4.0272 0.272343 3.80221 0.272343 3.55372C0.272343 3.29852 0.309281 3.05674 0.383156 2.8284C0.457032 2.60005 0.564488 2.39857 0.705523 2.22396C0.846559 2.04934 1.02117 1.91167 1.22937 1.81093C1.44428 1.70347 1.68941 1.64974 1.96477 1.64974C2.1864 1.64974 2.39795 1.68668 2.59943 1.76056C2.80091 1.83443 2.97888 1.95196 3.13335 2.11315C3.28782 2.26761 3.40871 2.47245 3.49601 2.72766C3.59004 2.97615 3.63705 3.27837 3.63705 3.63431V4.47045H4.60415C4.68474 4.47045 4.73847 4.50068 4.76533 4.56112C4.79891 4.61485 4.8157 4.6988 4.8157 4.81297C4.8157 4.93386 4.79891 5.02452 4.76533 5.08497C4.73847 5.13869 4.68474 5.16556 4.60415 5.16556H3.6169C3.60347 5.49464 3.53631 5.80693 3.41542 6.10244C3.30125 6.39794 3.14007 6.65651 2.93187 6.87813C2.72368 7.09976 2.47518 7.27438 2.1864 7.40198C1.89761 7.5363 1.57188 7.60346 1.20922 7.60346H0.141381L0.0809373 6.91843H1.14878ZM0.896929 3.51343C0.896929 3.68133 0.913719 3.82572 0.947299 3.94661C0.987594 4.0675 1.0514 4.16823 1.1387 4.24883C1.23273 4.3227 1.35697 4.37979 1.51144 4.42008C1.66591 4.45366 1.86067 4.47045 2.09573 4.47045H3.00239V3.71491C3.00239 3.21792 2.90501 2.86198 2.71024 2.64707C2.51548 2.43215 2.24684 2.3247 1.90433 2.3247C1.58196 2.3247 1.33347 2.43215 1.15885 2.64707C0.984237 2.86198 0.896929 3.15076 0.896929 3.51343ZM6.26895 4.47045C6.35626 4.47045 6.41335 4.50068 6.44021 4.56112C6.47379 4.61485 6.49058 4.6988 6.49058 4.81297C6.49058 4.93386 6.47379 5.02452 6.44021 5.08497C6.41335 5.13869 6.35626 5.16556 6.26895 5.16556H4.60675C4.51944 5.16556 4.46235 5.13869 4.43549 5.08497C4.40191 5.03124 4.38512 4.94729 4.38512 4.83312C4.38512 4.71223 4.40191 4.62156 4.43549 4.56112C4.46235 4.50068 4.51944 4.47045 4.60675 4.47045H6.26895ZM7.93155 4.47045C8.01886 4.47045 8.07594 4.50068 8.10281 4.56112C8.13639 4.61485 8.15318 4.6988 8.15318 4.81297C8.15318 4.93386 8.13639 5.02452 8.10281 5.08497C8.07594 5.13869 8.01886 5.16556 7.93155 5.16556H6.26935C6.18204 5.16556 6.12495 5.13869 6.09809 5.08497C6.06451 5.03124 6.04772 4.94729 6.04772 4.83312C6.04772 4.71223 6.06451 4.62156 6.09809 4.56112C6.12495 4.50068 6.18204 4.47045 6.26935 4.47045H7.93155ZM9.59415 4.47045C9.68146 4.47045 9.73854 4.50068 9.76541 4.56112C9.79899 4.61485 9.81578 4.6988 9.81578 4.81297C9.81578 4.93386 9.79899 5.02452 9.76541 5.08497C9.73854 5.13869 9.68146 5.16556 9.59415 5.16556H7.93194C7.84464 5.16556 7.78755 5.13869 7.76069 5.08497C7.72711 5.03124 7.71032 4.94729 7.71032 4.83312C7.71032 4.71223 7.72711 4.62156 7.76069 4.56112C7.78755 4.50068 7.84464 4.47045 7.93194 4.47045H9.59415ZM11.2567 4.47045C11.3441 4.47045 11.4011 4.50068 11.428 4.56112C11.4616 4.61485 11.4784 4.6988 11.4784 4.81297C11.4784 4.93386 11.4616 5.02452 11.428 5.08497C11.4011 5.13869 11.3441 5.16556 11.2567 5.16556H9.59454C9.50723 5.16556 9.45015 5.13869 9.42328 5.08497C9.3897 5.03124 9.37291 4.94729 9.37291 4.83312C9.37291 4.71223 9.3897 4.62156 9.42328 4.56112C9.45015 4.50068 9.50723 4.47045 9.59454 4.47045H11.2567ZM12.1638 4.47045C12.4257 4.47045 12.6339 4.39994 12.7884 4.2589C12.9496 4.11787 13.0302 3.9231 13.0302 3.67461V2.2844H13.685V3.67461C13.685 4.15144 13.5506 4.52082 13.282 4.78275C13.0201 5.03795 12.6608 5.16556 12.2041 5.16556H11.2571C11.1698 5.16556 11.1127 5.13869 11.0859 5.08497C11.0523 5.03124 11.0355 4.94729 11.0355 4.83312C11.0355 4.71223 11.0523 4.62156 11.0859 4.56112C11.1127 4.50068 11.1698 4.47045 11.2571 4.47045H12.1638ZM13.7857 0.994934H12.9798V0.279683H13.7857V0.994934ZM12.5063 0.994934H11.7004V0.279683H12.5063V0.994934ZM5.64177 12.9641C5.64177 13.3267 5.58468 13.6659 5.47051 13.9815C5.35634 14.3039 5.1918 14.5826 4.97689 14.8177C4.76198 15.0595 4.50005 15.2509 4.19112 15.3919C3.8889 15.5329 3.54638 15.6035 3.16357 15.6035H2.56921C1.81702 15.6035 1.23273 15.3718 0.816337 14.9084C0.399946 14.445 0.191751 13.8103 0.191751 13.0044V11.2414H0.836485V12.9842C0.836485 13.273 0.870065 13.5349 0.937225 13.77C1.0111 14.0051 1.12191 14.2065 1.26967 14.3744C1.42413 14.549 1.61554 14.6834 1.84388 14.7774C2.07223 14.8714 2.34758 14.9184 2.66995 14.9184H3.1132C3.42885 14.9184 3.70421 14.8647 3.93927 14.7572C4.17433 14.6565 4.36909 14.5188 4.52356 14.3442C4.68474 14.1696 4.80227 13.9648 4.87615 13.7297C4.95674 13.4946 4.99703 13.2495 4.99703 12.9943V10.2844H5.64177V12.9641ZM3.21394 10.0628H2.36773V9.32738H3.21394V10.0628ZM8.24526 13.1656C8.07064 13.1656 7.90274 13.1421 7.74156 13.095C7.58038 13.0413 7.43598 12.954 7.30838 12.8331C7.18749 12.7122 7.09011 12.5544 7.01624 12.3596C6.94236 12.1582 6.90542 11.9097 6.90542 11.6142V6.9197H7.56023V11.4933C7.56023 11.7754 7.62067 12.0104 7.74156 12.1985C7.86916 12.3798 8.074 12.4705 8.35607 12.4705H8.52733C8.67508 12.4705 8.74896 12.5846 8.74896 12.813C8.74896 13.048 8.67508 13.1656 8.52733 13.1656H8.24526ZM8.69324 12.4705C8.95516 12.4705 9.15328 12.4067 9.2876 12.279C9.42192 12.1514 9.48908 11.9802 9.48908 11.7653V11.3825C9.48908 10.7982 9.63683 10.3415 9.93233 10.0124C10.2346 9.68332 10.6509 9.51878 11.1815 9.51878C11.4569 9.51878 11.6986 9.56243 11.9068 9.64974C12.115 9.73705 12.2863 9.8613 12.4206 10.0225C12.5616 10.1837 12.6657 10.3751 12.7329 10.5967C12.8001 10.8183 12.8336 11.0635 12.8336 11.3321C12.8336 11.9097 12.6825 12.3596 12.3803 12.682C12.0781 13.0044 11.6651 13.1656 11.1412 13.1656C10.8726 13.1656 10.614 13.1152 10.3655 13.0144C10.117 12.907 9.92226 12.7189 9.78123 12.4503C9.72078 12.6048 9.64691 12.729 9.5596 12.823C9.47229 12.9171 9.38162 12.9909 9.2876 13.0447C9.19358 13.0917 9.09284 13.1253 8.98538 13.1454C8.88464 13.1588 8.78726 13.1656 8.69324 13.1656H8.53205C8.44475 13.1656 8.38766 13.1387 8.3608 13.085C8.32722 13.0312 8.31043 12.9473 8.31043 12.8331C8.31043 12.7122 8.32722 12.6216 8.3608 12.5611C8.38766 12.5007 8.44475 12.4705 8.53205 12.4705H8.69324ZM12.1889 11.3925C12.1889 11.0433 12.1117 10.7612 11.9572 10.5463C11.8027 10.3247 11.5375 10.2139 11.1614 10.2139C10.4629 10.2139 10.1137 10.6202 10.1137 11.4328C10.1137 11.7754 10.2077 12.0339 10.3957 12.2085C10.5905 12.3831 10.839 12.4705 11.1412 12.4705C11.4837 12.4705 11.7423 12.3764 11.9169 12.1884C12.0982 12.0003 12.1889 11.7351 12.1889 11.3925Z"
                                                                            fill="currentColor"></path>
                                                                    </svg>


                                                                </div>
                                                            @endif
                                                        @else
                                                            <div>
                                                                <span class="fw-bold font-18 def-color">
                                                                    ناموجود
                                                                </span>

                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="text-end">

                                                        <span <span class="text-muted font-14"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endif
                                @endforeach
                                {{-- <div class="col-lg-4 col-sm-6">
                                <a href="">
                                    <div
                                        class="product-row bg-white d-flex align-items-center justify-content-between rounded-4 shadow-md">
                                        <div class="image">
                                            <img src="assets/image/product/product-image2.jpg" class="img-fluid"
                                                width="100" alt="">
                                        </div>
                                        <div class="desc">
                                            <h6 class="font-14 title text-overflow">گوشی موبایل سامسونگ مدل Galaxy
                                                A32 SM-A325F/DS دو سیم‌کارت ظرفیت 128 گیگابایت </h6>
                                            <div class="price d-flex flex-column justify-content-end mt-2">
                                                <div class="text-end">
                                                    <span class="fw-bold font-18 def-color">299,000</span>
                                                    <span class="badge main-color-two-bg rounded-pill">25%</span>
                                                </div>
                                                <div class="text-end">
                                                    <span
                                                        class="text-muted font-14 text-decoration-line-through">150,000</span>
                                                    <span class="text-muted font-14">تومان</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <a href="">
                                    <div
                                        class="product-row bg-white d-flex align-items-center justify-content-between rounded-4 shadow-md">
                                        <div class="image">
                                            <img src="assets/image/product/product-image3.jpg" class="img-fluid"
                                                width="100" alt="">
                                        </div>
                                        <div class="desc">
                                            <h6 class="font-14 title text-overflow">گوشی موبایل سامسونگ مدل Galaxy
                                                A32 SM-A325F/DS دو سیم‌کارت ظرفیت 128 گیگابایت </h6>
                                            <div class="price d-flex flex-column justify-content-end mt-2">
                                                <div class="text-end">
                                                    <span class="fw-bold font-18 def-color">299,000</span>
                                                    <span class="badge main-color-two-bg rounded-pill">25%</span>
                                                </div>
                                                <div class="text-end">
                                                    <span
                                                        class="text-muted font-14 text-decoration-line-through">150,000</span>
                                                    <span class="text-muted font-14">تومان</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <a href="">
                                    <div
                                        class="product-row bg-white d-flex align-items-center justify-content-between rounded-4 shadow-md">
                                        <div class="image">
                                            <img src="assets/image/product/product-image4.jpg" class="img-fluid"
                                                width="100" alt="">
                                        </div>
                                        <div class="desc">
                                            <h6 class="font-14 title text-overflow">گوشی موبایل سامسونگ مدل Galaxy
                                                A32 SM-A325F/DS دو سیم‌کارت ظرفیت 128 گیگابایت </h6>
                                            <div class="price d-flex flex-column justify-content-end mt-2">
                                                <div class="text-end">
                                                    <span class="fw-bold font-18 def-color">299,000</span>
                                                    <span class="badge main-color-two-bg rounded-pill">25%</span>
                                                </div>
                                                <div class="text-end">
                                                    <span
                                                        class="text-muted font-14 text-decoration-line-through">150,000</span>
                                                    <span class="text-muted font-14">تومان</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <a href="">
                                    <div
                                        class="product-row bg-white d-flex align-items-center justify-content-between rounded-4 shadow-md">
                                        <div class="image">
                                            <img src="assets/image/product/product-image5.jpg" class="img-fluid"
                                                width="100" alt="">
                                        </div>
                                        <div class="desc">
                                            <h6 class="font-14 title text-overflow">گوشی موبایل سامسونگ مدل Galaxy
                                                A32 SM-A325F/DS دو سیم‌کارت ظرفیت 128 گیگابایت </h6>
                                            <div class="price d-flex flex-column justify-content-end mt-2">
                                                <div class="text-end">
                                                    <span class="fw-bold font-18 def-color">299,000</span>
                                                    <span class="badge main-color-two-bg rounded-pill">25%</span>
                                                </div>
                                                <div class="text-end">
                                                    <span
                                                        class="text-muted font-14 text-decoration-line-through">150,000</span>
                                                    <span class="text-muted font-14">تومان</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <a href="">
                                    <div
                                        class="product-row bg-white d-flex align-items-center justify-content-between rounded-4 shadow-md">
                                        <div class="image">
                                            <img src="assets/image/product/product-image6.jpg" class="img-fluid"
                                                width="100" alt="">
                                        </div>
                                        <div class="desc">
                                            <h6 class="font-14 title text-overflow">گوشی موبایل سامسونگ مدل Galaxy
                                                A32 SM-A325F/DS دو سیم‌کارت ظرفیت 128 گیگابایت </h6>
                                            <div class="price d-flex flex-column justify-content-end mt-2">
                                                <div class="text-end">
                                                    <span class="fw-bold font-18 def-color">299,000</span>
                                                    <span class="badge main-color-two-bg rounded-pill">25%</span>
                                                </div>
                                                <div class="text-end">
                                                    <span
                                                        class="text-muted font-14 text-decoration-line-through">150,000</span>
                                                    <span class="text-muted font-14">تومان</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end product box two -->

    <div class="product-box-three py-20">
        <div class="container-fluid">
            <div class="parent" style="height: 430px;">
                <div class="content-title">
                    <div class="item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-seam" viewBox="0 0 16 16">
                            <path
                                d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                        </svg>
                        <h5 class="title">بهترین های سال</h5>
                    </div>
                    <div class="item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z" />
                            <path fill-rule="evenodd"
                                d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                        </svg>
                        <a href="">
                            <h5 class="title">مشاهده همه</h5>
                        </a>
                    </div>
                </div>
                <div class="swiper py-3" id="swiper-box">
                    <div class="swiper-wrapper">
                        @foreach ($product_normal_womens as $product_normal_women)
                            <div class="swiper-slide wow animate__animated animate__fadeInRight">
                                <div class="product-box-item bg-white">
                                    <div class="hover">
                                        <div class="hover-btn">

                                            <a href="{{ route('home.compare.add', ['product' => $product_normal_women]) }}"
                                                data-hint="مقایسه محصول" class="hint--right"><i
                                                    class="bi bi-arrow-left-right"></i></a>

                                            @auth
                                                @if ($product_normal_women->checkUserWishlist(auth()->id()))
                                                    <a href="{{ route('home.wishlist.remove', ['product' => $product_normal_women->id]) }}"
                                                        data-hint="افزوده شده" class="hint--right" style="background: red"><i
                                                            class="bi bi-heart"></i></a>
                                                @else
                                                    <a href="{{ route('home.wishlist.add', ['product' => $product_normal_women->id]) }}"
                                                        data-hint="افزودن به علاقه مندی" class="hint--right"><i
                                                            class="bi bi-heart"></i></a>
                                                @endif

                                            @endauth


                                            <a href="#productModal-{{ $product_normal_women->id }}"
                                                data-hint="مشاهده سریع" class="hint--right" data-bs-toggle="modal"
                                                data-bs-target="#productModal-{{ $product_normal_women->id }}"><i
                                                    class="bi bi-eye"></i></a>
                                        </div>
                                        <div class="hover-color">
                                            <span style="background-color: #10b663;" data-hint="رنگ سبز"
                                                class="hint--left"></span>
                                            <span style="background-color: #e2350a;" data-hint="رنگ قرمز"
                                                class="hint--left"></span>
                                            <span style="background-color: #fafafa;" data-hint="رنگ سفید"
                                                class="hint--left"></span>
                                        </div>
                                    </div>

                                    <a
                                        href="{{ route('home.products.show', ['product' => $product_normal_women->slug]) }}">
                                        <div class="image text-center">
                                            <img src="{{ asset('/upload/files/products/images/' . $product_normal_women->primary_image) }}"
                                                alt="" class="img-fluid one-image">
                                            {{-- hover image --}}
                                            @foreach ($product_normal_women->images as $image)
                                                <img src="{{ asset('/upload/files/products/images/' . $image->image) }}"
                                                    alt="" class="img-fluid two-image">
                                            @endforeach
                                        </div>
                                        <div class="desc">
                                            <div class="title">
                                                <h6 class="title-fa def-color fw-bold text-overflow-2">
                                                    {{ $product_normal_women->name }}
                                                </h6>
                                                <h6 class="title-en text-muted text-overflow-2">
                                                    {{ $product_normal_women->category->name }}
                                                </h6>
                                            </div>
                                            <div class="foot d-flex justify-content-between align-items-center">
                                                <form action="{{ route('home.cart.add') }}" method="POST">
                                                    <input type="hidden" name="product_id"
                                                        value="{{ $product_normal_women->id }}">
                                                    @csrf
                                                    @if ($product_normal_women->quantity_check)
                                                        @php
                                                            if ($product_normal_women->sale_check) {
                                                                $variationProductSelected =
                                                                    $product_normal_women->sale_check;
                                                            } else {
                                                                $variationProductSelected =
                                                                    $product_normal_women->price_check;
                                                            }
                                                        @endphp
                                                        <div class="pro-details-size-color text-right">
                                                            <div class="pro-details-size w-50" style="display: none">
                                                                <span>{{ App\Models\Attribute::find($product_normal_women->variations->first()->attribute_id)->name }}</span>
                                                                <select name="variation"
                                                                    class="form-control variation-select"
                                                                    style="display: none">
                                                                    @foreach ($product_normal_women->variations()->where('quantity', '>', 0)->get() as $variation)
                                                                        <option
                                                                            value="{{ json_encode($variation->only(['id', 'quantity', 'is_sale', 'sale_price', 'price'])) }}"
                                                                            {{ $variationProductSelected->id == $variation->id ? 'selected' : '' }}>
                                                                            {{ $variation->value }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                        </div>


                                                        <form action="{{ route('home.cart.add') }}" method="POST">
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $product_normal_women->id }}">
                                                            @csrf
                                                            @if ($product_normal_women->quantity_check)
                                                                @php
                                                                    if ($product_normal_women->sale_check) {
                                                                        $variationProductSelected =
                                                                            $product_normal_women->sale_check;
                                                                    } else {
                                                                        $variationProductSelected =
                                                                            $product_normal_women->price_check;
                                                                    }
                                                                @endphp
                                                                <div class="pro-details-size-color text-right">
                                                                    <div class="pro-details-size w-50"
                                                                        style="display: none">
                                                                        <span>{{ App\Models\Attribute::find($product_normal_women->variations->first()->attribute_id)->name }}</span>
                                                                        <select name="variation"
                                                                            class="form-control variation-select"
                                                                            data-id="{{ $product_normal_women->id }}"
                                                                            style="    width: 160px;">
                                                                            @foreach ($product_normal_women->variations()->where('quantity', '>', 0)->get() as $variation)
                                                                                <option
                                                                                    value="{{ json_encode($variation->only(['id', 'quantity', 'is_sale', 'sale_price', 'price'])) }}"
                                                                                    {{ $variationProductSelected->id == $variation->id ? 'selected' : '' }}>
                                                                                    {{ $variation->value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                </div>
                                                                <div class="pro-details-quality">
                                                                    <div class="cart-plus-minus"
                                                                        style="text-align: -webkit-right;display:none">
                                                                        <span>تعداد</span>
                                                                        <input style="width: 160px"
                                                                            class="form-control cart-plus-minus-box quantity-input"
                                                                            type="text" name="qtybutton"
                                                                            value="1" data-max="5" />
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center justify-content-center">
                                                                        <button type="submit"
                                                                            style="border: none;padding-left: 94px;background: no-repeat;">
                                                                            <div class="add"
                                                                                data-hint="افزودن به سبد خرید"
                                                                                class="hint--right">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="16" height="16"
                                                                                    fill="currentColor" class="bi bi-bag"
                                                                                    viewBox="0 0 16 16">
                                                                                    <path
                                                                                        d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                                                                </svg>
                                                                            </div>
                                                                        </button>

                                                                    </div>





                                                                    <div class="pro-details-wishlist"
                                                                        style="display: none">
                                                                        @auth
                                                                            @if ($product_normal_women->checkUserWishlist(auth()->id()))
                                                                                <a
                                                                                    href="{{ route('home.wishlist.remove', ['product' => $product_normal_women->id]) }}"><i
                                                                                        class="fas fa-heart"
                                                                                        style="color:red"></i>
                                                                                </a>
                                                                            @else
                                                                                <a
                                                                                    href="{{ route('home.wishlist.add', ['product' => $product_normal_women->id]) }}"><i
                                                                                        class="sli sli-heart"></i>
                                                                                </a>
                                                                            @endif
                                                                        @else
                                                                            <a
                                                                                href="{{ route('home.wishlist.add', ['product' => $product_normal_women->id]) }}"><i
                                                                                    class="sli sli-heart"></i>
                                                                            </a>
                                                                        @endauth
                                                                    </div>
                                                                    <div class="pro-details-compare" style="display:none">
                                                                        <a title="Add To Compare" href="#"><i
                                                                                class="sli sli-refresh"></i></a>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="not-in-stock">
                                                                    <p class="text-white">ناموجود</p>
                                                                </div>
                                                            @endif
                                                        </form>
                                                    @else
                                                        <div class="not-in-stock">
                                                            <p class="text-white" style="padding-right:56px">ناموجود</p>
                                                        </div>
                                                    @endif
                                                </form>

                                                @if ($product_normal_women->quantity_check)
                                                    @if ($product_normal_women->sale_check)
                                                        <div class="price d-flex flex-column justify-content-end">
                                                            <div>
                                                                <span class="fw-bold font-18 def-color">
                                                                    {{ number_format($product_normal_women->quantity_check->sale_price) }}
                                                                </span>
                                                                <svg class="mr-1 " width="14" height="16"
                                                                    viewBox="0 0 14 16" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path class="text-gray-880 dark:text-white"
                                                                        d="M1.14878 6.91843C1.44428 6.91843 1.70285 6.87142 1.92447 6.77739C2.15282 6.68337 2.34422 6.55577 2.49869 6.39458C2.65316 6.2334 2.77069 6.04535 2.85128 5.83044C2.93187 5.62224 2.97888 5.40062 2.99231 5.16556H1.98492C1.6424 5.16556 1.36033 5.12862 1.1387 5.05474C0.917077 4.98087 0.742461 4.87341 0.614858 4.73238C0.487254 4.59134 0.396588 4.42344 0.34286 4.22868C0.295849 4.0272 0.272343 3.80221 0.272343 3.55372C0.272343 3.29852 0.309281 3.05674 0.383156 2.8284C0.457032 2.60005 0.564488 2.39857 0.705523 2.22396C0.846559 2.04934 1.02117 1.91167 1.22937 1.81093C1.44428 1.70347 1.68941 1.64974 1.96477 1.64974C2.1864 1.64974 2.39795 1.68668 2.59943 1.76056C2.80091 1.83443 2.97888 1.95196 3.13335 2.11315C3.28782 2.26761 3.40871 2.47245 3.49601 2.72766C3.59004 2.97615 3.63705 3.27837 3.63705 3.63431V4.47045H4.60415C4.68474 4.47045 4.73847 4.50068 4.76533 4.56112C4.79891 4.61485 4.8157 4.6988 4.8157 4.81297C4.8157 4.93386 4.79891 5.02452 4.76533 5.08497C4.73847 5.13869 4.68474 5.16556 4.60415 5.16556H3.6169C3.60347 5.49464 3.53631 5.80693 3.41542 6.10244C3.30125 6.39794 3.14007 6.65651 2.93187 6.87813C2.72368 7.09976 2.47518 7.27438 2.1864 7.40198C1.89761 7.5363 1.57188 7.60346 1.20922 7.60346H0.141381L0.0809373 6.91843H1.14878ZM0.896929 3.51343C0.896929 3.68133 0.913719 3.82572 0.947299 3.94661C0.987594 4.0675 1.0514 4.16823 1.1387 4.24883C1.23273 4.3227 1.35697 4.37979 1.51144 4.42008C1.66591 4.45366 1.86067 4.47045 2.09573 4.47045H3.00239V3.71491C3.00239 3.21792 2.90501 2.86198 2.71024 2.64707C2.51548 2.43215 2.24684 2.3247 1.90433 2.3247C1.58196 2.3247 1.33347 2.43215 1.15885 2.64707C0.984237 2.86198 0.896929 3.15076 0.896929 3.51343ZM6.26895 4.47045C6.35626 4.47045 6.41335 4.50068 6.44021 4.56112C6.47379 4.61485 6.49058 4.6988 6.49058 4.81297C6.49058 4.93386 6.47379 5.02452 6.44021 5.08497C6.41335 5.13869 6.35626 5.16556 6.26895 5.16556H4.60675C4.51944 5.16556 4.46235 5.13869 4.43549 5.08497C4.40191 5.03124 4.38512 4.94729 4.38512 4.83312C4.38512 4.71223 4.40191 4.62156 4.43549 4.56112C4.46235 4.50068 4.51944 4.47045 4.60675 4.47045H6.26895ZM7.93155 4.47045C8.01886 4.47045 8.07594 4.50068 8.10281 4.56112C8.13639 4.61485 8.15318 4.6988 8.15318 4.81297C8.15318 4.93386 8.13639 5.02452 8.10281 5.08497C8.07594 5.13869 8.01886 5.16556 7.93155 5.16556H6.26935C6.18204 5.16556 6.12495 5.13869 6.09809 5.08497C6.06451 5.03124 6.04772 4.94729 6.04772 4.83312C6.04772 4.71223 6.06451 4.62156 6.09809 4.56112C6.12495 4.50068 6.18204 4.47045 6.26935 4.47045H7.93155ZM9.59415 4.47045C9.68146 4.47045 9.73854 4.50068 9.76541 4.56112C9.79899 4.61485 9.81578 4.6988 9.81578 4.81297C9.81578 4.93386 9.79899 5.02452 9.76541 5.08497C9.73854 5.13869 9.68146 5.16556 9.59415 5.16556H7.93194C7.84464 5.16556 7.78755 5.13869 7.76069 5.08497C7.72711 5.03124 7.71032 4.94729 7.71032 4.83312C7.71032 4.71223 7.72711 4.62156 7.76069 4.56112C7.78755 4.50068 7.84464 4.47045 7.93194 4.47045H9.59415ZM11.2567 4.47045C11.3441 4.47045 11.4011 4.50068 11.428 4.56112C11.4616 4.61485 11.4784 4.6988 11.4784 4.81297C11.4784 4.93386 11.4616 5.02452 11.428 5.08497C11.4011 5.13869 11.3441 5.16556 11.2567 5.16556H9.59454C9.50723 5.16556 9.45015 5.13869 9.42328 5.08497C9.3897 5.03124 9.37291 4.94729 9.37291 4.83312C9.37291 4.71223 9.3897 4.62156 9.42328 4.56112C9.45015 4.50068 9.50723 4.47045 9.59454 4.47045H11.2567ZM12.1638 4.47045C12.4257 4.47045 12.6339 4.39994 12.7884 4.2589C12.9496 4.11787 13.0302 3.9231 13.0302 3.67461V2.2844H13.685V3.67461C13.685 4.15144 13.5506 4.52082 13.282 4.78275C13.0201 5.03795 12.6608 5.16556 12.2041 5.16556H11.2571C11.1698 5.16556 11.1127 5.13869 11.0859 5.08497C11.0523 5.03124 11.0355 4.94729 11.0355 4.83312C11.0355 4.71223 11.0523 4.62156 11.0859 4.56112C11.1127 4.50068 11.1698 4.47045 11.2571 4.47045H12.1638ZM13.7857 0.994934H12.9798V0.279683H13.7857V0.994934ZM12.5063 0.994934H11.7004V0.279683H12.5063V0.994934ZM5.64177 12.9641C5.64177 13.3267 5.58468 13.6659 5.47051 13.9815C5.35634 14.3039 5.1918 14.5826 4.97689 14.8177C4.76198 15.0595 4.50005 15.2509 4.19112 15.3919C3.8889 15.5329 3.54638 15.6035 3.16357 15.6035H2.56921C1.81702 15.6035 1.23273 15.3718 0.816337 14.9084C0.399946 14.445 0.191751 13.8103 0.191751 13.0044V11.2414H0.836485V12.9842C0.836485 13.273 0.870065 13.5349 0.937225 13.77C1.0111 14.0051 1.12191 14.2065 1.26967 14.3744C1.42413 14.549 1.61554 14.6834 1.84388 14.7774C2.07223 14.8714 2.34758 14.9184 2.66995 14.9184H3.1132C3.42885 14.9184 3.70421 14.8647 3.93927 14.7572C4.17433 14.6565 4.36909 14.5188 4.52356 14.3442C4.68474 14.1696 4.80227 13.9648 4.87615 13.7297C4.95674 13.4946 4.99703 13.2495 4.99703 12.9943V10.2844H5.64177V12.9641ZM3.21394 10.0628H2.36773V9.32738H3.21394V10.0628ZM8.24526 13.1656C8.07064 13.1656 7.90274 13.1421 7.74156 13.095C7.58038 13.0413 7.43598 12.954 7.30838 12.8331C7.18749 12.7122 7.09011 12.5544 7.01624 12.3596C6.94236 12.1582 6.90542 11.9097 6.90542 11.6142V6.9197H7.56023V11.4933C7.56023 11.7754 7.62067 12.0104 7.74156 12.1985C7.86916 12.3798 8.074 12.4705 8.35607 12.4705H8.52733C8.67508 12.4705 8.74896 12.5846 8.74896 12.813C8.74896 13.048 8.67508 13.1656 8.52733 13.1656H8.24526ZM8.69324 12.4705C8.95516 12.4705 9.15328 12.4067 9.2876 12.279C9.42192 12.1514 9.48908 11.9802 9.48908 11.7653V11.3825C9.48908 10.7982 9.63683 10.3415 9.93233 10.0124C10.2346 9.68332 10.6509 9.51878 11.1815 9.51878C11.4569 9.51878 11.6986 9.56243 11.9068 9.64974C12.115 9.73705 12.2863 9.8613 12.4206 10.0225C12.5616 10.1837 12.6657 10.3751 12.7329 10.5967C12.8001 10.8183 12.8336 11.0635 12.8336 11.3321C12.8336 11.9097 12.6825 12.3596 12.3803 12.682C12.0781 13.0044 11.6651 13.1656 11.1412 13.1656C10.8726 13.1656 10.614 13.1152 10.3655 13.0144C10.117 12.907 9.92226 12.7189 9.78123 12.4503C9.72078 12.6048 9.64691 12.729 9.5596 12.823C9.47229 12.9171 9.38162 12.9909 9.2876 13.0447C9.19358 13.0917 9.09284 13.1253 8.98538 13.1454C8.88464 13.1588 8.78726 13.1656 8.69324 13.1656H8.53205C8.44475 13.1656 8.38766 13.1387 8.3608 13.085C8.32722 13.0312 8.31043 12.9473 8.31043 12.8331C8.31043 12.7122 8.32722 12.6216 8.3608 12.5611C8.38766 12.5007 8.44475 12.4705 8.53205 12.4705H8.69324ZM12.1889 11.3925C12.1889 11.0433 12.1117 10.7612 11.9572 10.5463C11.8027 10.3247 11.5375 10.2139 11.1614 10.2139C10.4629 10.2139 10.1137 10.6202 10.1137 11.4328C10.1137 11.7754 10.2077 12.0339 10.3957 12.2085C10.5905 12.3831 10.839 12.4705 11.1412 12.4705C11.4837 12.4705 11.7423 12.3764 11.9169 12.1884C12.0982 12.0003 12.1889 11.7351 12.1889 11.3925Z"
                                                                        fill="currentColor"></path>
                                                                </svg>
                                                            </div>
                                                            <div class="d-flex justify-content-center align-items-center">
                                                                <span
                                                                    class="text-muted font-14 text-decoration-line-through">
                                                                    {{ number_format($product_normal_women->quantity_check->price) }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div>
                                                            <span class="fw-bold font-18 def-color">
                                                                {{ number_format($product_normal_women->quantity_check->price) }}
                                                            </span>
                                                            <svg class="mr-1 " width="14" height="16"
                                                                viewBox="0 0 14 16" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path class="text-gray-880 dark:text-white"
                                                                    d="M1.14878 6.91843C1.44428 6.91843 1.70285 6.87142 1.92447 6.77739C2.15282 6.68337 2.34422 6.55577 2.49869 6.39458C2.65316 6.2334 2.77069 6.04535 2.85128 5.83044C2.93187 5.62224 2.97888 5.40062 2.99231 5.16556H1.98492C1.6424 5.16556 1.36033 5.12862 1.1387 5.05474C0.917077 4.98087 0.742461 4.87341 0.614858 4.73238C0.487254 4.59134 0.396588 4.42344 0.34286 4.22868C0.295849 4.0272 0.272343 3.80221 0.272343 3.55372C0.272343 3.29852 0.309281 3.05674 0.383156 2.8284C0.457032 2.60005 0.564488 2.39857 0.705523 2.22396C0.846559 2.04934 1.02117 1.91167 1.22937 1.81093C1.44428 1.70347 1.68941 1.64974 1.96477 1.64974C2.1864 1.64974 2.39795 1.68668 2.59943 1.76056C2.80091 1.83443 2.97888 1.95196 3.13335 2.11315C3.28782 2.26761 3.40871 2.47245 3.49601 2.72766C3.59004 2.97615 3.63705 3.27837 3.63705 3.63431V4.47045H4.60415C4.68474 4.47045 4.73847 4.50068 4.76533 4.56112C4.79891 4.61485 4.8157 4.6988 4.8157 4.81297C4.8157 4.93386 4.79891 5.02452 4.76533 5.08497C4.73847 5.13869 4.68474 5.16556 4.60415 5.16556H3.6169C3.60347 5.49464 3.53631 5.80693 3.41542 6.10244C3.30125 6.39794 3.14007 6.65651 2.93187 6.87813C2.72368 7.09976 2.47518 7.27438 2.1864 7.40198C1.89761 7.5363 1.57188 7.60346 1.20922 7.60346H0.141381L0.0809373 6.91843H1.14878ZM0.896929 3.51343C0.896929 3.68133 0.913719 3.82572 0.947299 3.94661C0.987594 4.0675 1.0514 4.16823 1.1387 4.24883C1.23273 4.3227 1.35697 4.37979 1.51144 4.42008C1.66591 4.45366 1.86067 4.47045 2.09573 4.47045H3.00239V3.71491C3.00239 3.21792 2.90501 2.86198 2.71024 2.64707C2.51548 2.43215 2.24684 2.3247 1.90433 2.3247C1.58196 2.3247 1.33347 2.43215 1.15885 2.64707C0.984237 2.86198 0.896929 3.15076 0.896929 3.51343ZM6.26895 4.47045C6.35626 4.47045 6.41335 4.50068 6.44021 4.56112C6.47379 4.61485 6.49058 4.6988 6.49058 4.81297C6.49058 4.93386 6.47379 5.02452 6.44021 5.08497C6.41335 5.13869 6.35626 5.16556 6.26895 5.16556H4.60675C4.51944 5.16556 4.46235 5.13869 4.43549 5.08497C4.40191 5.03124 4.38512 4.94729 4.38512 4.83312C4.38512 4.71223 4.40191 4.62156 4.43549 4.56112C4.46235 4.50068 4.51944 4.47045 4.60675 4.47045H6.26895ZM7.93155 4.47045C8.01886 4.47045 8.07594 4.50068 8.10281 4.56112C8.13639 4.61485 8.15318 4.6988 8.15318 4.81297C8.15318 4.93386 8.13639 5.02452 8.10281 5.08497C8.07594 5.13869 8.01886 5.16556 7.93155 5.16556H6.26935C6.18204 5.16556 6.12495 5.13869 6.09809 5.08497C6.06451 5.03124 6.04772 4.94729 6.04772 4.83312C6.04772 4.71223 6.06451 4.62156 6.09809 4.56112C6.12495 4.50068 6.18204 4.47045 6.26935 4.47045H7.93155ZM9.59415 4.47045C9.68146 4.47045 9.73854 4.50068 9.76541 4.56112C9.79899 4.61485 9.81578 4.6988 9.81578 4.81297C9.81578 4.93386 9.79899 5.02452 9.76541 5.08497C9.73854 5.13869 9.68146 5.16556 9.59415 5.16556H7.93194C7.84464 5.16556 7.78755 5.13869 7.76069 5.08497C7.72711 5.03124 7.71032 4.94729 7.71032 4.83312C7.71032 4.71223 7.72711 4.62156 7.76069 4.56112C7.78755 4.50068 7.84464 4.47045 7.93194 4.47045H9.59415ZM11.2567 4.47045C11.3441 4.47045 11.4011 4.50068 11.428 4.56112C11.4616 4.61485 11.4784 4.6988 11.4784 4.81297C11.4784 4.93386 11.4616 5.02452 11.428 5.08497C11.4011 5.13869 11.3441 5.16556 11.2567 5.16556H9.59454C9.50723 5.16556 9.45015 5.13869 9.42328 5.08497C9.3897 5.03124 9.37291 4.94729 9.37291 4.83312C9.37291 4.71223 9.3897 4.62156 9.42328 4.56112C9.45015 4.50068 9.50723 4.47045 9.59454 4.47045H11.2567ZM12.1638 4.47045C12.4257 4.47045 12.6339 4.39994 12.7884 4.2589C12.9496 4.11787 13.0302 3.9231 13.0302 3.67461V2.2844H13.685V3.67461C13.685 4.15144 13.5506 4.52082 13.282 4.78275C13.0201 5.03795 12.6608 5.16556 12.2041 5.16556H11.2571C11.1698 5.16556 11.1127 5.13869 11.0859 5.08497C11.0523 5.03124 11.0355 4.94729 11.0355 4.83312C11.0355 4.71223 11.0523 4.62156 11.0859 4.56112C11.1127 4.50068 11.1698 4.47045 11.2571 4.47045H12.1638ZM13.7857 0.994934H12.9798V0.279683H13.7857V0.994934ZM12.5063 0.994934H11.7004V0.279683H12.5063V0.994934ZM5.64177 12.9641C5.64177 13.3267 5.58468 13.6659 5.47051 13.9815C5.35634 14.3039 5.1918 14.5826 4.97689 14.8177C4.76198 15.0595 4.50005 15.2509 4.19112 15.3919C3.8889 15.5329 3.54638 15.6035 3.16357 15.6035H2.56921C1.81702 15.6035 1.23273 15.3718 0.816337 14.9084C0.399946 14.445 0.191751 13.8103 0.191751 13.0044V11.2414H0.836485V12.9842C0.836485 13.273 0.870065 13.5349 0.937225 13.77C1.0111 14.0051 1.12191 14.2065 1.26967 14.3744C1.42413 14.549 1.61554 14.6834 1.84388 14.7774C2.07223 14.8714 2.34758 14.9184 2.66995 14.9184H3.1132C3.42885 14.9184 3.70421 14.8647 3.93927 14.7572C4.17433 14.6565 4.36909 14.5188 4.52356 14.3442C4.68474 14.1696 4.80227 13.9648 4.87615 13.7297C4.95674 13.4946 4.99703 13.2495 4.99703 12.9943V10.2844H5.64177V12.9641ZM3.21394 10.0628H2.36773V9.32738H3.21394V10.0628ZM8.24526 13.1656C8.07064 13.1656 7.90274 13.1421 7.74156 13.095C7.58038 13.0413 7.43598 12.954 7.30838 12.8331C7.18749 12.7122 7.09011 12.5544 7.01624 12.3596C6.94236 12.1582 6.90542 11.9097 6.90542 11.6142V6.9197H7.56023V11.4933C7.56023 11.7754 7.62067 12.0104 7.74156 12.1985C7.86916 12.3798 8.074 12.4705 8.35607 12.4705H8.52733C8.67508 12.4705 8.74896 12.5846 8.74896 12.813C8.74896 13.048 8.67508 13.1656 8.52733 13.1656H8.24526ZM8.69324 12.4705C8.95516 12.4705 9.15328 12.4067 9.2876 12.279C9.42192 12.1514 9.48908 11.9802 9.48908 11.7653V11.3825C9.48908 10.7982 9.63683 10.3415 9.93233 10.0124C10.2346 9.68332 10.6509 9.51878 11.1815 9.51878C11.4569 9.51878 11.6986 9.56243 11.9068 9.64974C12.115 9.73705 12.2863 9.8613 12.4206 10.0225C12.5616 10.1837 12.6657 10.3751 12.7329 10.5967C12.8001 10.8183 12.8336 11.0635 12.8336 11.3321C12.8336 11.9097 12.6825 12.3596 12.3803 12.682C12.0781 13.0044 11.6651 13.1656 11.1412 13.1656C10.8726 13.1656 10.614 13.1152 10.3655 13.0144C10.117 12.907 9.92226 12.7189 9.78123 12.4503C9.72078 12.6048 9.64691 12.729 9.5596 12.823C9.47229 12.9171 9.38162 12.9909 9.2876 13.0447C9.19358 13.0917 9.09284 13.1253 8.98538 13.1454C8.88464 13.1588 8.78726 13.1656 8.69324 13.1656H8.53205C8.44475 13.1656 8.38766 13.1387 8.3608 13.085C8.32722 13.0312 8.31043 12.9473 8.31043 12.8331C8.31043 12.7122 8.32722 12.6216 8.3608 12.5611C8.38766 12.5007 8.44475 12.4705 8.53205 12.4705H8.69324ZM12.1889 11.3925C12.1889 11.0433 12.1117 10.7612 11.9572 10.5463C11.8027 10.3247 11.5375 10.2139 11.1614 10.2139C10.4629 10.2139 10.1137 10.6202 10.1137 11.4328C10.1137 11.7754 10.2077 12.0339 10.3957 12.2085C10.5905 12.3831 10.839 12.4705 11.1412 12.4705C11.4837 12.4705 11.7423 12.3764 11.9169 12.1884C12.0982 12.0003 12.1889 11.7351 12.1889 11.3925Z"
                                                                    fill="currentColor"></path>
                                                            </svg>


                                                        </div>
                                                    @endif
                                                @else
                                                    <div>
                                                        <span class="fw-bold font-18 def-color">
                                                            ناموجود
                                                        </span>

                                                    </div>
                                                @endif


                                            </div>


                                            {{-- @if ($currentDate > $targetDate)

                                    <span style="color: blue">این قیمت</span>

                                    @else
                                    <span style="color: red">یه قیمت دیگه</span>
                                    @endif --}}
                                            {{-- <div class="timer text-center mt-2">
                                        <div class='countdown' data-date="{{$product_normal_women->daily_timer}}" data-time="17:30">
                                        </div>
                                    </div> --}}
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next d-sm-flex d-none"></div>
                    <div class="swiper-button-prev d-sm-flex d-none"></div>
                </div>
            </div>
        </div>
    </div>



    <div class="banner py-20">
        <div class="container-fluid">
            <div class="row">
                @foreach ($indexSpecialBanners as $sbanner)
                    <div class="col-md-6 mt-md-0 mt-2">
                        <a href="">
                            <img src="{{ asset(env('BANNER_IMAGES_UPLOAD_PATH') . $sbanner->image) }}"
                                class="img-fluid rounded-3 shadow-box" alt="">
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- end banner -->


    <!-- end product box -->

    <div class="product-box brand-box py-20">
        <div class="container-fluid">
            <div class="parent" style="height: 209px;">
                <div class="content-title">
                    <div class="item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-seam" viewBox="0 0 16 16">
                            <path
                                d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                        </svg>
                        <h5 class="title">برند ها</h5>
                    </div>
                    <div class="item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z" />
                            <path fill-rule="evenodd"
                                d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                        </svg>
                        <a href="">
                            <h5 class="title">مشاهده همه</h5>
                        </a>
                    </div>
                </div>
                <div class="swiper py-3" id="swiper-box">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="">
                                <div class="image text-center">
                                    <img src="assets/image/brand1-1.png" class="img-fluid" alt="">
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="">
                                <div class="image text-center">
                                    <img src="assets/image/brand1-2.png" class="img-fluid" alt="">
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="">
                                <div class="image text-center">
                                    <img src="assets/image/brand1-3.png" class="img-fluid" alt="">
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="">
                                <div class="image text-center">
                                    <img src="assets/image/brand1-4.png" class="img-fluid" alt="">
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="">
                                <div class="image text-center">
                                    <img src="assets/image/brand1-5.png" class="img-fluid" alt="">
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="">
                                <div class="image text-center">
                                    <img src="assets/image/brand1-6.png" class="img-fluid" alt="">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next d-sm-flex d-none" style="margin-top: -60px"></div>
                    <div class="swiper-button-prev d-sm-flex d-none" style="margin-top: -60px"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- end product box --brand -->



    <div class="product-box py-20">
        <div class="container-fluid">
            <div class="parent" style="height: 450px">
                <div class="content-title">
                    <div class="item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-seam" viewBox="0 0 16 16">
                            <path
                                d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                        </svg>
                        <h5 class="title">جدیدترین محصولات زنانه</h5>
                    </div>
                    <div class="item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z" />
                            <path fill-rule="evenodd"
                                d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                        </svg>
                        <a href="">
                            <h5 class="title">مشاهده همه</h5>
                        </a>
                    </div>
                </div>

                <div class="swiper py-3" id="swiper-box">
                    <div class="swiper-wrapper">

                        @foreach ($product_normal_womens as $product_normal_women)
                            <div class="swiper-slide">
                                <div class="product-box-item bg-white">
                                    <div class="hover">
                                        <div class="hover-btn">

                                            <a href="{{ route('home.compare.add', ['product' => $product_normal_women]) }}"
                                                data-hint="مقایسه محصول" class="hint--right"><i
                                                    class="bi bi-arrow-left-right"></i></a>

                                            @auth
                                                @if ($product_normal_women->checkUserWishlist(auth()->id()))
                                                    <a href="{{ route('home.wishlist.remove', ['product' => $product_normal_women->id]) }}"
                                                        data-hint="افزوده شده" class="hint--right" style="background: red"><i
                                                            class="bi bi-heart"></i></a>
                                                @else
                                                    <a href="{{ route('home.wishlist.add', ['product' => $product_normal_women->id]) }}"
                                                        data-hint="افزودن به علاقه مندی" class="hint--right"><i
                                                            class="bi bi-heart"></i></a>
                                                @endif

                                            @endauth


                                            <a href="#productModal-{{ $product_normal_women->id }}"
                                                data-hint="مشاهده سریع" class="hint--right" data-bs-toggle="modal"
                                                data-bs-target="#productModal-{{ $product_normal_women->id }}"><i
                                                    class="bi bi-eye"></i></a>
                                        </div>
                                        <div class="hover-color">
                                            <span style="background-color: #10b663;" data-hint="رنگ سبز"
                                                class="hint--left"></span>
                                            <span style="background-color: #e2350a;" data-hint="رنگ قرمز"
                                                class="hint--left"></span>
                                            <span style="background-color: #fafafa;" data-hint="رنگ سفید"
                                                class="hint--left"></span>
                                        </div>
                                    </div>

                                    <a
                                        href="{{ route('home.products.show', ['product' => $product_normal_women->slug]) }}">
                                        <div class="image text-center">
                                            <img src="{{ asset('/upload/files/products/images/' . $product_normal_women->primary_image) }}"
                                                alt="" class="img-fluid one-image">
                                            {{-- hover image --}}
                                            @foreach ($product_normal_women->images as $image)
                                                <img src="{{ asset('/upload/files/products/images/' . $image->image) }}"
                                                    alt="" class="img-fluid two-image">
                                            @endforeach
                                        </div>
                                        <div class="desc">
                                            <div class="title">
                                                <h6 class="title-fa def-color fw-bold text-overflow-2">
                                                    {{ $product_normal_women->name }}
                                                </h6>
                                                <h6 class="title-en text-muted text-overflow-2">
                                                    {{ $product_normal_women->category->name }}
                                                </h6>
                                            </div>
                                            <div class="foot d-flex justify-content-between align-items-center">
                                                <form action="{{ route('home.cart.add') }}" method="POST">
                                                    <input type="hidden" name="product_id"
                                                        value="{{ $product_normal_women->id }}">
                                                    @csrf
                                                    @if ($product_normal_women->quantity_check)
                                                        @php
                                                            if ($product_normal_women->sale_check) {
                                                                $variationProductSelected =
                                                                    $product_normal_women->sale_check;
                                                            } else {
                                                                $variationProductSelected =
                                                                    $product_normal_women->price_check;
                                                            }
                                                        @endphp
                                                        <div class="pro-details-size-color text-right">
                                                            <div class="pro-details-size w-50" style="display: none">
                                                                <span>{{ App\Models\Attribute::find($product_normal_women->variations->first()->attribute_id)->name }}</span>
                                                                <select name="variation"
                                                                    class="form-control variation-select"
                                                                    style="display: none">
                                                                    @foreach ($product_normal_women->variations()->where('quantity', '>', 0)->get() as $variation)
                                                                        <option
                                                                            value="{{ json_encode($variation->only(['id', 'quantity', 'is_sale', 'sale_price', 'price'])) }}"
                                                                            {{ $variationProductSelected->id == $variation->id ? 'selected' : '' }}>
                                                                            {{ $variation->value }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                        </div>


                                                        <form action="{{ route('home.cart.add') }}" method="POST">
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $product_normal_women->id }}">
                                                            @csrf
                                                            @if ($product_normal_women->quantity_check)
                                                                @php
                                                                    if ($product_normal_women->sale_check) {
                                                                        $variationProductSelected =
                                                                            $product_normal_women->sale_check;
                                                                    } else {
                                                                        $variationProductSelected =
                                                                            $product_normal_women->price_check;
                                                                    }
                                                                @endphp
                                                                <div class="pro-details-size-color text-right">
                                                                    <div class="pro-details-size w-50"
                                                                        style="display: none">
                                                                        <span>{{ App\Models\Attribute::find($product_normal_women->variations->first()->attribute_id)->name }}</span>
                                                                        <select name="variation"
                                                                            class="form-control variation-select"
                                                                            data-id="{{ $product_normal_women->id }}"
                                                                            style="    width: 160px;">
                                                                            @foreach ($product_normal_women->variations()->where('quantity', '>', 0)->get() as $variation)
                                                                                <option
                                                                                    value="{{ json_encode($variation->only(['id', 'quantity', 'is_sale', 'sale_price', 'price'])) }}"
                                                                                    {{ $variationProductSelected->id == $variation->id ? 'selected' : '' }}>
                                                                                    {{ $variation->value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                </div>
                                                                <div class="pro-details-quality">
                                                                    <div class="cart-plus-minus"
                                                                        style="text-align: -webkit-right;display:none">
                                                                        <span>تعداد</span>
                                                                        <input style="width: 160px"
                                                                            class="form-control cart-plus-minus-box quantity-input"
                                                                            type="text" name="qtybutton"
                                                                            value="1" data-max="5" />
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center justify-content-center">
                                                                        <button type="submit"
                                                                            style="border: none;padding-left: 94px;background: no-repeat;">
                                                                            <div class="add"
                                                                                data-hint="افزودن به سبد خرید"
                                                                                class="hint--right">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="16" height="16"
                                                                                    fill="currentColor"
                                                                                    class="bi bi-bag"
                                                                                    viewBox="0 0 16 16">
                                                                                    <path
                                                                                        d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                                                                </svg>
                                                                            </div>
                                                                        </button>

                                                                    </div>





                                                                    <div class="pro-details-wishlist"
                                                                        style="display: none">
                                                                        @auth
                                                                            @if ($product_normal_women->checkUserWishlist(auth()->id()))
                                                                                <a
                                                                                    href="{{ route('home.wishlist.remove', ['product' => $product_normal_women->id]) }}"><i
                                                                                        class="fas fa-heart"
                                                                                        style="color:red"></i>
                                                                                </a>
                                                                            @else
                                                                                <a
                                                                                    href="{{ route('home.wishlist.add', ['product' => $product_normal_women->id]) }}"><i
                                                                                        class="sli sli-heart"></i>
                                                                                </a>
                                                                            @endif
                                                                        @else
                                                                            <a
                                                                                href="{{ route('home.wishlist.add', ['product' => $product_normal_women->id]) }}"><i
                                                                                    class="sli sli-heart"></i>
                                                                            </a>
                                                                        @endauth
                                                                    </div>
                                                                    <div class="pro-details-compare"
                                                                        style="display:none">
                                                                        <a title="Add To Compare" href="#"><i
                                                                                class="sli sli-refresh"></i></a>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="not-in-stock">
                                                                    <p class="text-white">ناموجود</p>
                                                                </div>
                                                            @endif
                                                        </form>
                                                    @else
                                                        <div class="not-in-stock">
                                                            <p class="text-white" style="padding-right:56px">ناموجود</p>
                                                        </div>
                                                    @endif
                                                </form>

                                                @if ($product_normal_women->quantity_check)
                                                    @if ($product_normal_women->sale_check)
                                                        <div class="price d-flex flex-column justify-content-end">
                                                            <div>
                                                                <span class="fw-bold font-18 def-color">
                                                                    {{ number_format($product_normal_women->quantity_check->sale_price) }}
                                                                </span>
                                                                <svg class="mr-1 " width="14" height="16"
                                                                    viewBox="0 0 14 16" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path class="text-gray-880 dark:text-white"
                                                                        d="M1.14878 6.91843C1.44428 6.91843 1.70285 6.87142 1.92447 6.77739C2.15282 6.68337 2.34422 6.55577 2.49869 6.39458C2.65316 6.2334 2.77069 6.04535 2.85128 5.83044C2.93187 5.62224 2.97888 5.40062 2.99231 5.16556H1.98492C1.6424 5.16556 1.36033 5.12862 1.1387 5.05474C0.917077 4.98087 0.742461 4.87341 0.614858 4.73238C0.487254 4.59134 0.396588 4.42344 0.34286 4.22868C0.295849 4.0272 0.272343 3.80221 0.272343 3.55372C0.272343 3.29852 0.309281 3.05674 0.383156 2.8284C0.457032 2.60005 0.564488 2.39857 0.705523 2.22396C0.846559 2.04934 1.02117 1.91167 1.22937 1.81093C1.44428 1.70347 1.68941 1.64974 1.96477 1.64974C2.1864 1.64974 2.39795 1.68668 2.59943 1.76056C2.80091 1.83443 2.97888 1.95196 3.13335 2.11315C3.28782 2.26761 3.40871 2.47245 3.49601 2.72766C3.59004 2.97615 3.63705 3.27837 3.63705 3.63431V4.47045H4.60415C4.68474 4.47045 4.73847 4.50068 4.76533 4.56112C4.79891 4.61485 4.8157 4.6988 4.8157 4.81297C4.8157 4.93386 4.79891 5.02452 4.76533 5.08497C4.73847 5.13869 4.68474 5.16556 4.60415 5.16556H3.6169C3.60347 5.49464 3.53631 5.80693 3.41542 6.10244C3.30125 6.39794 3.14007 6.65651 2.93187 6.87813C2.72368 7.09976 2.47518 7.27438 2.1864 7.40198C1.89761 7.5363 1.57188 7.60346 1.20922 7.60346H0.141381L0.0809373 6.91843H1.14878ZM0.896929 3.51343C0.896929 3.68133 0.913719 3.82572 0.947299 3.94661C0.987594 4.0675 1.0514 4.16823 1.1387 4.24883C1.23273 4.3227 1.35697 4.37979 1.51144 4.42008C1.66591 4.45366 1.86067 4.47045 2.09573 4.47045H3.00239V3.71491C3.00239 3.21792 2.90501 2.86198 2.71024 2.64707C2.51548 2.43215 2.24684 2.3247 1.90433 2.3247C1.58196 2.3247 1.33347 2.43215 1.15885 2.64707C0.984237 2.86198 0.896929 3.15076 0.896929 3.51343ZM6.26895 4.47045C6.35626 4.47045 6.41335 4.50068 6.44021 4.56112C6.47379 4.61485 6.49058 4.6988 6.49058 4.81297C6.49058 4.93386 6.47379 5.02452 6.44021 5.08497C6.41335 5.13869 6.35626 5.16556 6.26895 5.16556H4.60675C4.51944 5.16556 4.46235 5.13869 4.43549 5.08497C4.40191 5.03124 4.38512 4.94729 4.38512 4.83312C4.38512 4.71223 4.40191 4.62156 4.43549 4.56112C4.46235 4.50068 4.51944 4.47045 4.60675 4.47045H6.26895ZM7.93155 4.47045C8.01886 4.47045 8.07594 4.50068 8.10281 4.56112C8.13639 4.61485 8.15318 4.6988 8.15318 4.81297C8.15318 4.93386 8.13639 5.02452 8.10281 5.08497C8.07594 5.13869 8.01886 5.16556 7.93155 5.16556H6.26935C6.18204 5.16556 6.12495 5.13869 6.09809 5.08497C6.06451 5.03124 6.04772 4.94729 6.04772 4.83312C6.04772 4.71223 6.06451 4.62156 6.09809 4.56112C6.12495 4.50068 6.18204 4.47045 6.26935 4.47045H7.93155ZM9.59415 4.47045C9.68146 4.47045 9.73854 4.50068 9.76541 4.56112C9.79899 4.61485 9.81578 4.6988 9.81578 4.81297C9.81578 4.93386 9.79899 5.02452 9.76541 5.08497C9.73854 5.13869 9.68146 5.16556 9.59415 5.16556H7.93194C7.84464 5.16556 7.78755 5.13869 7.76069 5.08497C7.72711 5.03124 7.71032 4.94729 7.71032 4.83312C7.71032 4.71223 7.72711 4.62156 7.76069 4.56112C7.78755 4.50068 7.84464 4.47045 7.93194 4.47045H9.59415ZM11.2567 4.47045C11.3441 4.47045 11.4011 4.50068 11.428 4.56112C11.4616 4.61485 11.4784 4.6988 11.4784 4.81297C11.4784 4.93386 11.4616 5.02452 11.428 5.08497C11.4011 5.13869 11.3441 5.16556 11.2567 5.16556H9.59454C9.50723 5.16556 9.45015 5.13869 9.42328 5.08497C9.3897 5.03124 9.37291 4.94729 9.37291 4.83312C9.37291 4.71223 9.3897 4.62156 9.42328 4.56112C9.45015 4.50068 9.50723 4.47045 9.59454 4.47045H11.2567ZM12.1638 4.47045C12.4257 4.47045 12.6339 4.39994 12.7884 4.2589C12.9496 4.11787 13.0302 3.9231 13.0302 3.67461V2.2844H13.685V3.67461C13.685 4.15144 13.5506 4.52082 13.282 4.78275C13.0201 5.03795 12.6608 5.16556 12.2041 5.16556H11.2571C11.1698 5.16556 11.1127 5.13869 11.0859 5.08497C11.0523 5.03124 11.0355 4.94729 11.0355 4.83312C11.0355 4.71223 11.0523 4.62156 11.0859 4.56112C11.1127 4.50068 11.1698 4.47045 11.2571 4.47045H12.1638ZM13.7857 0.994934H12.9798V0.279683H13.7857V0.994934ZM12.5063 0.994934H11.7004V0.279683H12.5063V0.994934ZM5.64177 12.9641C5.64177 13.3267 5.58468 13.6659 5.47051 13.9815C5.35634 14.3039 5.1918 14.5826 4.97689 14.8177C4.76198 15.0595 4.50005 15.2509 4.19112 15.3919C3.8889 15.5329 3.54638 15.6035 3.16357 15.6035H2.56921C1.81702 15.6035 1.23273 15.3718 0.816337 14.9084C0.399946 14.445 0.191751 13.8103 0.191751 13.0044V11.2414H0.836485V12.9842C0.836485 13.273 0.870065 13.5349 0.937225 13.77C1.0111 14.0051 1.12191 14.2065 1.26967 14.3744C1.42413 14.549 1.61554 14.6834 1.84388 14.7774C2.07223 14.8714 2.34758 14.9184 2.66995 14.9184H3.1132C3.42885 14.9184 3.70421 14.8647 3.93927 14.7572C4.17433 14.6565 4.36909 14.5188 4.52356 14.3442C4.68474 14.1696 4.80227 13.9648 4.87615 13.7297C4.95674 13.4946 4.99703 13.2495 4.99703 12.9943V10.2844H5.64177V12.9641ZM3.21394 10.0628H2.36773V9.32738H3.21394V10.0628ZM8.24526 13.1656C8.07064 13.1656 7.90274 13.1421 7.74156 13.095C7.58038 13.0413 7.43598 12.954 7.30838 12.8331C7.18749 12.7122 7.09011 12.5544 7.01624 12.3596C6.94236 12.1582 6.90542 11.9097 6.90542 11.6142V6.9197H7.56023V11.4933C7.56023 11.7754 7.62067 12.0104 7.74156 12.1985C7.86916 12.3798 8.074 12.4705 8.35607 12.4705H8.52733C8.67508 12.4705 8.74896 12.5846 8.74896 12.813C8.74896 13.048 8.67508 13.1656 8.52733 13.1656H8.24526ZM8.69324 12.4705C8.95516 12.4705 9.15328 12.4067 9.2876 12.279C9.42192 12.1514 9.48908 11.9802 9.48908 11.7653V11.3825C9.48908 10.7982 9.63683 10.3415 9.93233 10.0124C10.2346 9.68332 10.6509 9.51878 11.1815 9.51878C11.4569 9.51878 11.6986 9.56243 11.9068 9.64974C12.115 9.73705 12.2863 9.8613 12.4206 10.0225C12.5616 10.1837 12.6657 10.3751 12.7329 10.5967C12.8001 10.8183 12.8336 11.0635 12.8336 11.3321C12.8336 11.9097 12.6825 12.3596 12.3803 12.682C12.0781 13.0044 11.6651 13.1656 11.1412 13.1656C10.8726 13.1656 10.614 13.1152 10.3655 13.0144C10.117 12.907 9.92226 12.7189 9.78123 12.4503C9.72078 12.6048 9.64691 12.729 9.5596 12.823C9.47229 12.9171 9.38162 12.9909 9.2876 13.0447C9.19358 13.0917 9.09284 13.1253 8.98538 13.1454C8.88464 13.1588 8.78726 13.1656 8.69324 13.1656H8.53205C8.44475 13.1656 8.38766 13.1387 8.3608 13.085C8.32722 13.0312 8.31043 12.9473 8.31043 12.8331C8.31043 12.7122 8.32722 12.6216 8.3608 12.5611C8.38766 12.5007 8.44475 12.4705 8.53205 12.4705H8.69324ZM12.1889 11.3925C12.1889 11.0433 12.1117 10.7612 11.9572 10.5463C11.8027 10.3247 11.5375 10.2139 11.1614 10.2139C10.4629 10.2139 10.1137 10.6202 10.1137 11.4328C10.1137 11.7754 10.2077 12.0339 10.3957 12.2085C10.5905 12.3831 10.839 12.4705 11.1412 12.4705C11.4837 12.4705 11.7423 12.3764 11.9169 12.1884C12.0982 12.0003 12.1889 11.7351 12.1889 11.3925Z"
                                                                        fill="currentColor"></path>
                                                                </svg>
                                                            </div>
                                                            <div class="d-flex justify-content-center align-items-center">
                                                                <span
                                                                    class="text-muted font-14 text-decoration-line-through">
                                                                    {{ number_format($product_normal_women->quantity_check->price) }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div>
                                                            <span class="fw-bold font-18 def-color">
                                                                {{ number_format($product_normal_women->quantity_check->price) }}
                                                            </span>
                                                            <svg class="mr-1 " width="14" height="16"
                                                                viewBox="0 0 14 16" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path class="text-gray-880 dark:text-white"
                                                                    d="M1.14878 6.91843C1.44428 6.91843 1.70285 6.87142 1.92447 6.77739C2.15282 6.68337 2.34422 6.55577 2.49869 6.39458C2.65316 6.2334 2.77069 6.04535 2.85128 5.83044C2.93187 5.62224 2.97888 5.40062 2.99231 5.16556H1.98492C1.6424 5.16556 1.36033 5.12862 1.1387 5.05474C0.917077 4.98087 0.742461 4.87341 0.614858 4.73238C0.487254 4.59134 0.396588 4.42344 0.34286 4.22868C0.295849 4.0272 0.272343 3.80221 0.272343 3.55372C0.272343 3.29852 0.309281 3.05674 0.383156 2.8284C0.457032 2.60005 0.564488 2.39857 0.705523 2.22396C0.846559 2.04934 1.02117 1.91167 1.22937 1.81093C1.44428 1.70347 1.68941 1.64974 1.96477 1.64974C2.1864 1.64974 2.39795 1.68668 2.59943 1.76056C2.80091 1.83443 2.97888 1.95196 3.13335 2.11315C3.28782 2.26761 3.40871 2.47245 3.49601 2.72766C3.59004 2.97615 3.63705 3.27837 3.63705 3.63431V4.47045H4.60415C4.68474 4.47045 4.73847 4.50068 4.76533 4.56112C4.79891 4.61485 4.8157 4.6988 4.8157 4.81297C4.8157 4.93386 4.79891 5.02452 4.76533 5.08497C4.73847 5.13869 4.68474 5.16556 4.60415 5.16556H3.6169C3.60347 5.49464 3.53631 5.80693 3.41542 6.10244C3.30125 6.39794 3.14007 6.65651 2.93187 6.87813C2.72368 7.09976 2.47518 7.27438 2.1864 7.40198C1.89761 7.5363 1.57188 7.60346 1.20922 7.60346H0.141381L0.0809373 6.91843H1.14878ZM0.896929 3.51343C0.896929 3.68133 0.913719 3.82572 0.947299 3.94661C0.987594 4.0675 1.0514 4.16823 1.1387 4.24883C1.23273 4.3227 1.35697 4.37979 1.51144 4.42008C1.66591 4.45366 1.86067 4.47045 2.09573 4.47045H3.00239V3.71491C3.00239 3.21792 2.90501 2.86198 2.71024 2.64707C2.51548 2.43215 2.24684 2.3247 1.90433 2.3247C1.58196 2.3247 1.33347 2.43215 1.15885 2.64707C0.984237 2.86198 0.896929 3.15076 0.896929 3.51343ZM6.26895 4.47045C6.35626 4.47045 6.41335 4.50068 6.44021 4.56112C6.47379 4.61485 6.49058 4.6988 6.49058 4.81297C6.49058 4.93386 6.47379 5.02452 6.44021 5.08497C6.41335 5.13869 6.35626 5.16556 6.26895 5.16556H4.60675C4.51944 5.16556 4.46235 5.13869 4.43549 5.08497C4.40191 5.03124 4.38512 4.94729 4.38512 4.83312C4.38512 4.71223 4.40191 4.62156 4.43549 4.56112C4.46235 4.50068 4.51944 4.47045 4.60675 4.47045H6.26895ZM7.93155 4.47045C8.01886 4.47045 8.07594 4.50068 8.10281 4.56112C8.13639 4.61485 8.15318 4.6988 8.15318 4.81297C8.15318 4.93386 8.13639 5.02452 8.10281 5.08497C8.07594 5.13869 8.01886 5.16556 7.93155 5.16556H6.26935C6.18204 5.16556 6.12495 5.13869 6.09809 5.08497C6.06451 5.03124 6.04772 4.94729 6.04772 4.83312C6.04772 4.71223 6.06451 4.62156 6.09809 4.56112C6.12495 4.50068 6.18204 4.47045 6.26935 4.47045H7.93155ZM9.59415 4.47045C9.68146 4.47045 9.73854 4.50068 9.76541 4.56112C9.79899 4.61485 9.81578 4.6988 9.81578 4.81297C9.81578 4.93386 9.79899 5.02452 9.76541 5.08497C9.73854 5.13869 9.68146 5.16556 9.59415 5.16556H7.93194C7.84464 5.16556 7.78755 5.13869 7.76069 5.08497C7.72711 5.03124 7.71032 4.94729 7.71032 4.83312C7.71032 4.71223 7.72711 4.62156 7.76069 4.56112C7.78755 4.50068 7.84464 4.47045 7.93194 4.47045H9.59415ZM11.2567 4.47045C11.3441 4.47045 11.4011 4.50068 11.428 4.56112C11.4616 4.61485 11.4784 4.6988 11.4784 4.81297C11.4784 4.93386 11.4616 5.02452 11.428 5.08497C11.4011 5.13869 11.3441 5.16556 11.2567 5.16556H9.59454C9.50723 5.16556 9.45015 5.13869 9.42328 5.08497C9.3897 5.03124 9.37291 4.94729 9.37291 4.83312C9.37291 4.71223 9.3897 4.62156 9.42328 4.56112C9.45015 4.50068 9.50723 4.47045 9.59454 4.47045H11.2567ZM12.1638 4.47045C12.4257 4.47045 12.6339 4.39994 12.7884 4.2589C12.9496 4.11787 13.0302 3.9231 13.0302 3.67461V2.2844H13.685V3.67461C13.685 4.15144 13.5506 4.52082 13.282 4.78275C13.0201 5.03795 12.6608 5.16556 12.2041 5.16556H11.2571C11.1698 5.16556 11.1127 5.13869 11.0859 5.08497C11.0523 5.03124 11.0355 4.94729 11.0355 4.83312C11.0355 4.71223 11.0523 4.62156 11.0859 4.56112C11.1127 4.50068 11.1698 4.47045 11.2571 4.47045H12.1638ZM13.7857 0.994934H12.9798V0.279683H13.7857V0.994934ZM12.5063 0.994934H11.7004V0.279683H12.5063V0.994934ZM5.64177 12.9641C5.64177 13.3267 5.58468 13.6659 5.47051 13.9815C5.35634 14.3039 5.1918 14.5826 4.97689 14.8177C4.76198 15.0595 4.50005 15.2509 4.19112 15.3919C3.8889 15.5329 3.54638 15.6035 3.16357 15.6035H2.56921C1.81702 15.6035 1.23273 15.3718 0.816337 14.9084C0.399946 14.445 0.191751 13.8103 0.191751 13.0044V11.2414H0.836485V12.9842C0.836485 13.273 0.870065 13.5349 0.937225 13.77C1.0111 14.0051 1.12191 14.2065 1.26967 14.3744C1.42413 14.549 1.61554 14.6834 1.84388 14.7774C2.07223 14.8714 2.34758 14.9184 2.66995 14.9184H3.1132C3.42885 14.9184 3.70421 14.8647 3.93927 14.7572C4.17433 14.6565 4.36909 14.5188 4.52356 14.3442C4.68474 14.1696 4.80227 13.9648 4.87615 13.7297C4.95674 13.4946 4.99703 13.2495 4.99703 12.9943V10.2844H5.64177V12.9641ZM3.21394 10.0628H2.36773V9.32738H3.21394V10.0628ZM8.24526 13.1656C8.07064 13.1656 7.90274 13.1421 7.74156 13.095C7.58038 13.0413 7.43598 12.954 7.30838 12.8331C7.18749 12.7122 7.09011 12.5544 7.01624 12.3596C6.94236 12.1582 6.90542 11.9097 6.90542 11.6142V6.9197H7.56023V11.4933C7.56023 11.7754 7.62067 12.0104 7.74156 12.1985C7.86916 12.3798 8.074 12.4705 8.35607 12.4705H8.52733C8.67508 12.4705 8.74896 12.5846 8.74896 12.813C8.74896 13.048 8.67508 13.1656 8.52733 13.1656H8.24526ZM8.69324 12.4705C8.95516 12.4705 9.15328 12.4067 9.2876 12.279C9.42192 12.1514 9.48908 11.9802 9.48908 11.7653V11.3825C9.48908 10.7982 9.63683 10.3415 9.93233 10.0124C10.2346 9.68332 10.6509 9.51878 11.1815 9.51878C11.4569 9.51878 11.6986 9.56243 11.9068 9.64974C12.115 9.73705 12.2863 9.8613 12.4206 10.0225C12.5616 10.1837 12.6657 10.3751 12.7329 10.5967C12.8001 10.8183 12.8336 11.0635 12.8336 11.3321C12.8336 11.9097 12.6825 12.3596 12.3803 12.682C12.0781 13.0044 11.6651 13.1656 11.1412 13.1656C10.8726 13.1656 10.614 13.1152 10.3655 13.0144C10.117 12.907 9.92226 12.7189 9.78123 12.4503C9.72078 12.6048 9.64691 12.729 9.5596 12.823C9.47229 12.9171 9.38162 12.9909 9.2876 13.0447C9.19358 13.0917 9.09284 13.1253 8.98538 13.1454C8.88464 13.1588 8.78726 13.1656 8.69324 13.1656H8.53205C8.44475 13.1656 8.38766 13.1387 8.3608 13.085C8.32722 13.0312 8.31043 12.9473 8.31043 12.8331C8.31043 12.7122 8.32722 12.6216 8.3608 12.5611C8.38766 12.5007 8.44475 12.4705 8.53205 12.4705H8.69324ZM12.1889 11.3925C12.1889 11.0433 12.1117 10.7612 11.9572 10.5463C11.8027 10.3247 11.5375 10.2139 11.1614 10.2139C10.4629 10.2139 10.1137 10.6202 10.1137 11.4328C10.1137 11.7754 10.2077 12.0339 10.3957 12.2085C10.5905 12.3831 10.839 12.4705 11.1412 12.4705C11.4837 12.4705 11.7423 12.3764 11.9169 12.1884C12.0982 12.0003 12.1889 11.7351 12.1889 11.3925Z"
                                                                    fill="currentColor"></path>
                                                            </svg>


                                                        </div>
                                                    @endif
                                                @else
                                                    <div>
                                                        <span class="fw-bold font-18 def-color">
                                                            ناموجود
                                                        </span>

                                                    </div>
                                                @endif


                                            </div>


                                            {{-- @if ($currentDate > $targetDate)

                                    <span style="color: blue">این قیمت</span>

                                    @else
                                    <span style="color: red">یه قیمت دیگه</span>
                                    @endif --}}
                                            {{-- <div class="timer text-center mt-2">
                                        <div class='countdown' data-date="{{$product_normal_women->daily_timer}}" data-time="17:30">
                                        </div>
                                    </div> --}}
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next d-sm-flex d-none"></div>
                    <div class="swiper-button-prev d-sm-flex d-none"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- end product box -->

    <div class="product-box blog-box py-20">
        <div class="container-fluid">
            <div class="parent" style="height: 440px">
                <div class="content-title">
                    <div class="item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-seam" viewBox="0 0 16 16">
                            <path
                                d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                        </svg>
                        <h5 class="title">آخرین مطالب وبلاگ</h5>
                    </div>
                    <div class="item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z" />
                            <path fill-rule="evenodd"
                                d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                        </svg>
                        <a href="{{ route('home.blog.index') }}">
                            <h5 class="title">مشاهده همه</h5>
                        </a>
                    </div>
                </div>
                <div class="swiper py-5" id="swiper-box-two">
                    <div class="swiper-wrapper">

                        @foreach ($blog as $blogs)
                            <div class="swiper-slide">
                                <a href="{{ route('home.blogs.show', ['blogs' => $blogs->id]) }}">
                                    <div class="image-blog text-center">
                                        <img style="max-height: 277px;"
                                            src="{{ asset(env('BLOG_IMAGES_UPLOAD_PATH') . $blogs->primary_image) }}"
                                            alt="{{ $blogs->title }}" class="img-fluid">
                                        <div class="blog-desc position-absolute bottom-0">
                                            <h6 class="font-14">{{ $blogs->title }}
                                            </h6>
                                            <div class="d-flex justify-content-between align-items-center my-2">
                                                <div class="like">
                                                    <span class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-heart"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                                        </svg>
                                                    </span>
                                                    <span class="counter font-12">25</span>
                                                </div>
                                                <div class="date">
                                                    <span class="font-12">3 روز پیش</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        <div class="swiper-slide">
                            <a href="">
                                <div class="image-blog text-center">
                                    <img src="assets/image/blog-2.jpg" class="img-fluid" alt="">
                                    <div class="blog-desc position-absolute bottom-0">
                                        <h6 class="font-14">راهنمای خرید هارد اکسترنال هر آنچه قبل از خرید باید بدانید
                                        </h6>
                                        <div class="d-flex justify-content-between align-items-center my-2">
                                            <div class="like">
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-heart"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                                    </svg>
                                                </span>
                                                <span class="counter font-12">25</span>
                                            </div>
                                            <div class="date">
                                                <span class="font-12">3 روز پیش</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="">
                                <div class="image-blog text-center">
                                    <img src="assets/image/blog-3.jpg" class="img-fluid" alt="">
                                    <div class="blog-desc position-absolute bottom-0">
                                        <h6 class="font-14">راهنمای خرید هارد اکسترنال هر آنچه قبل از خرید باید بدانید
                                        </h6>
                                        <div class="d-flex justify-content-between align-items-center my-2">
                                            <div class="like">
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-heart"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                                    </svg>
                                                </span>
                                                <span class="counter font-12">25</span>
                                            </div>
                                            <div class="date">
                                                <span class="font-12">3 روز پیش</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="">
                                <div class="image-blog text-center">
                                    <img src="assets/image/blog-4.jpg" class="img-fluid" alt="">
                                    <div class="blog-desc position-absolute bottom-0">
                                        <h6 class="font-14">راهنمای خرید هارد اکسترنال هر آنچه قبل از خرید باید بدانید
                                        </h6>
                                        <div class="d-flex justify-content-between align-items-center my-2">
                                            <div class="like">
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-heart"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                                    </svg>
                                                </span>
                                                <span class="counter font-12">25</span>
                                            </div>
                                            <div class="date">
                                                <span class="font-12">3 روز پیش</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="">
                                <div class="image-blog text-center">
                                    <img src="assets/image/blog-5.jpg" class="img-fluid" alt="">
                                    <div class="blog-desc position-absolute bottom-0">
                                        <h6 class="font-14">راهنمای خرید هارد اکسترنال هر آنچه قبل از خرید باید بدانید
                                        </h6>
                                        <div class="d-flex justify-content-between align-items-center my-2">
                                            <div class="like">
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-heart"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                                    </svg>
                                                </span>
                                                <span class="counter font-12">25</span>
                                            </div>
                                            <div class="date">
                                                <span class="font-12">3 روز پیش</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="">
                                <div class="image-blog text-center">
                                    <img src="assets/image/blog-6.jpg" class="img-fluid" alt="">
                                    <div class="blog-desc position-absolute bottom-0">
                                        <h6 class="font-14">راهنمای خرید هارد اکسترنال هر آنچه قبل از خرید باید بدانید
                                        </h6>
                                        <div class="d-flex justify-content-between align-items-center my-2">
                                            <div class="like">
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-heart"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                                    </svg>
                                                </span>
                                                <span class="counter font-12">25</span>
                                            </div>
                                            <div class="date">
                                                <span class="font-12">3 روز پیش</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="">
                                <div class="image-blog text-center">
                                    <img src="assets/image/blog-7.jpg" class="img-fluid" alt="">
                                    <div class="blog-desc position-absolute bottom-0">
                                        <h6 class="font-14">راهنمای خرید هارد اکسترنال هر آنچه قبل از خرید باید بدانید
                                        </h6>
                                        <div class="d-flex justify-content-between align-items-center my-2">
                                            <div class="like">
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-heart"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                                    </svg>
                                                </span>
                                                <span class="counter font-12">25</span>
                                            </div>
                                            <div class="date">
                                                <span class="font-12">3 روز پیش</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="">
                                <div class="image-blog text-center">
                                    <img src="assets/image/blog-8.jpg" class="img-fluid" alt="">
                                    <div class="blog-desc position-absolute bottom-0">
                                        <h6 class="font-14">راهنمای خرید هارد اکسترنال هر آنچه قبل از خرید باید بدانید
                                        </h6>
                                        <div class="d-flex justify-content-between align-items-center my-2">
                                            <div class="like">
                                                <span class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-heart"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                                    </svg>
                                                </span>
                                                <span class="counter font-12">25</span>
                                            </div>
                                            <div class="date">
                                                <span class="font-12">3 روز پیش</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-pagination" style="height: 125px"></div>
                    <div class="swiper-button-next d-sm-flex d-none"></div>
                    <div class="swiper-button-prev d-sm-flex d-none"></div>
                </div>
            </div>
        </div>
    </div>



    <script>
        window.toPersianNum = function(num, dontTrim) {

            var i = 0,

                dontTrim = dontTrim || false,

                num = dontTrim ? num.toString() : num.toString().trim(),
                len = num.length,

                res = '',
                pos,

                persianNumbers = typeof persianNumber == 'undefined' ? ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸',
                    '۹'] :
                persianNumbers;

            for (; i < len; i++)
                if ((pos = persianNumbers[num.charAt(i)]))
                    res += pos;
                else
                    res += num.charAt(i);

            return res;
        }

        window.number_format = function(number, decimals, dec_point, thousands_point) {

            if (number == null || !isFinite(number)) {
                throw new TypeError("number is not valid");
            }

            if (!decimals) {
                var len = number.toString().split('.').length;
                decimals = len > 1 ? len : 0;
            }

            if (!dec_point) {
                dec_point = '.';
            }

            if (!thousands_point) {
                thousands_point = ',';
            }

            number = parseFloat(number).toFixed(decimals);

            number = number.replace(".", dec_point);

            var splitNum = number.split(dec_point);
            splitNum[0] = splitNum[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_point);
            number = splitNum.join(dec_point);

            return number;
        }

        $('.variation-select').on('change', function() {
            let variation = JSON.parse(this.value);
            let variationPriceDiv = $('.variation-price-' + $(this).data('id'));
            variationPriceDiv.empty();

            if (variation.is_sale) {
                let spanSale = $('<span />', {
                    class: 'new',
                    text: toPersianNum(number_format(variation.sale_price)) + ' تومان'
                });
                let spanPrice = $('<span />', {
                    class: 'old',
                    text: toPersianNum(number_format(variation.price)) + ' تومان'
                });

                variationPriceDiv.append(spanSale);
                variationPriceDiv.append(spanPrice);
            } else {
                let spanPrice = $('<span />', {
                    class: 'new',
                    text: toPersianNum(number_format(variation.price)) + ' تومان'
                });
                variationPriceDiv.append(spanPrice);
            }

            $('.quantity-input').attr('max', variation.quantity);
            $('.quantity-input').val(1);

        });
    </script>

    <!-- product modal -->
    @foreach ($products_special_offers as $products_special_offer)
        <div class="modal fade modal-lg product-modal" id="productModal-{{ $products_special_offer->id }}"
            tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title">
                            <a href="">
                                <div class="d-flex">
                                    <i class="bi bi-bag-plus me-1"></i>
                                    <h4>{{ $products_special_offer->name }}
                                    </h4>
                                </div>
                            </a>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5 mb-md-0 mb-2">
                                <div class="swiper product-modal">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="{{ asset('/upload/files/products/images/' . $products_special_offer->primary_image) }}"
                                                alt="" class="img-fluid">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ asset('/upload/files/products/images/' . $products_special_offer->primary_image) }}"
                                                alt="" class="img-fluid">
                                        </div>

                                    </div>
                                    <div class="swiper-button-next sb"></div>
                                    <div class="swiper-button-prev sb"></div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="product-modal-detail">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <span class="product-meta-item text-muted">
                                                <i class="bi bi-tag"></i>
                                                دسته بندی:
                                                {{-- <a href="">{{$products_special_offer->category->parent->name}}</a>, --}}
                                                <a href="">{{ $products_special_offer->category->name }}</a>,


                                            </span>
                                        </div>

                                        <div class="col-md-6">
                                            <span class="product-meta-item text-muted">
                                                <i class="bi bi-tag"></i>
                                                برچسب:
                                                @foreach ($products_special_offer->tags as $tag)
                                                    <a href="">{{ $tag->name }}
                                                        {{ $loop->last ? '' : ',' }}</a>,
                                                @endforeach
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-modal-feature">
                                    <strong>ویژگی های محصول:</strong>
                                    <ul>
                                        {{-- @foreach ($product_normal_women->attributes()->with('attribute')->get()->take(5) as $attribute)
                                            <li>
                                                <span class="title">{{ $attribute->attribute->name }} :</span>
                                                <span class="desc">{{ $attribute->value }}</span>
                                            </li>
                                        @endforeach --}}

                                    </ul>
                                    <label for="post-2" class="read-more-trigger"></label>
                                </div>
                                <div class="variation-price-{{ $products_special_offer->id }}"
                                    style="color: #6666ff;text-align: right;font-size: 21px;margin: 9px;">
                                    @if ($products_special_offer->quantity_check)
                                        @if ($products_special_offer->sale_check)
                                            <style>
                                                .variation-price {
                                                    display: flex
                                                }

                                                .new {
                                                    color: #6666ff;
                                                    font-size: 20px;

                                                }
                                            </style>
                                            <span class="new">
                                                {{ number_format($products_special_offer->sale_check->sale_price) }}
                                                <svg class="mr-2" width="20" height="22"
                                                    viewBox="0 0 25 27" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.52917 11.5828C3.03731 11.5828 3.48194 11.502 3.86304 11.3403C4.2557 11.1786 4.58484 10.9592 4.85046 10.682C5.11608 10.4048 5.31818 10.0815 5.45677 9.71193C5.59535 9.35392 5.67619 8.97281 5.69929 8.5686H3.96698C3.378 8.5686 2.89295 8.50509 2.51184 8.37805C2.13074 8.25101 1.83047 8.06623 1.61105 7.82371C1.39162 7.58119 1.23571 7.29247 1.14332 6.95756C1.06248 6.6111 1.02206 6.22422 1.02206 5.79691C1.02206 5.35806 1.08558 4.94231 1.21261 4.54965C1.33965 4.157 1.52443 3.81053 1.76695 3.51027C2.00948 3.21 2.30974 2.97325 2.66775 2.80002C3.03731 2.61524 3.45884 2.52285 3.93234 2.52285C4.31344 2.52285 4.67723 2.58637 5.02369 2.71341C5.37015 2.84044 5.67619 3.04254 5.94181 3.31971C6.20743 3.58533 6.41531 3.93757 6.56544 4.37642C6.72712 4.80372 6.80797 5.32342 6.80797 5.9355V7.37331H8.47098C8.60956 7.37331 8.70195 7.42528 8.74815 7.52922C8.80589 7.62161 8.83476 7.76597 8.83476 7.9623C8.83476 8.17017 8.80589 8.32608 8.74815 8.43002C8.70195 8.52241 8.60956 8.5686 8.47098 8.5686H6.77332C6.75022 9.13449 6.63474 9.67151 6.42686 10.1796C6.23053 10.6878 5.95336 11.1324 5.59535 11.5135C5.23734 11.8946 4.81004 12.1949 4.31344 12.4143C3.81685 12.6453 3.25674 12.7608 2.63311 12.7608H0.796861L0.692923 11.5828H2.52917ZM2.09609 5.72762C2.09609 6.01634 2.12496 6.26464 2.18271 6.47251C2.252 6.68039 2.36171 6.85362 2.51184 6.9922C2.67353 7.11924 2.88718 7.2174 3.1528 7.2867C3.41842 7.34444 3.75333 7.37331 4.15754 7.37331H5.71661V6.07408C5.71661 5.21948 5.54916 4.6074 5.21424 4.23784C4.87933 3.86828 4.41738 3.6835 3.8284 3.6835C3.27406 3.6835 2.84676 3.86828 2.54649 4.23784C2.24622 4.6074 2.09609 5.10399 2.09609 5.72762ZM11.3338 7.37331C11.4839 7.37331 11.582 7.42528 11.6282 7.52922C11.686 7.62161 11.7149 7.76597 11.7149 7.9623C11.7149 8.17017 11.686 8.32608 11.6282 8.43002C11.582 8.52241 11.4839 8.5686 11.3338 8.5686H8.47545C8.32531 8.5686 8.22715 8.52241 8.18095 8.43002C8.12321 8.33763 8.09434 8.19327 8.09434 7.99694C8.09434 7.78907 8.12321 7.63316 8.18095 7.52922C8.22715 7.42528 8.32531 7.37331 8.47545 7.37331H11.3338ZM14.1927 7.37331C14.3429 7.37331 14.441 7.42528 14.4872 7.52922C14.545 7.62161 14.5738 7.76597 14.5738 7.9623C14.5738 8.17017 14.545 8.32608 14.4872 8.43002C14.441 8.52241 14.3429 8.5686 14.1927 8.5686H11.3344C11.1843 8.5686 11.0861 8.52241 11.0399 8.43002C10.9822 8.33763 10.9533 8.19327 10.9533 7.99694C10.9533 7.78907 10.9822 7.63316 11.0399 7.52922C11.0861 7.42528 11.1843 7.37331 11.3344 7.37331H14.1927ZM17.0517 7.37331C17.2019 7.37331 17.3 7.42528 17.3462 7.52922C17.404 7.62161 17.4328 7.76597 17.4328 7.9623C17.4328 8.17017 17.404 8.32608 17.3462 8.43002C17.3 8.52241 17.2019 8.5686 17.0517 8.5686H14.1934C14.0433 8.5686 13.9451 8.52241 13.8989 8.43002C13.8412 8.33763 13.8123 8.19327 13.8123 7.99694C13.8123 7.78907 13.8412 7.63316 13.8989 7.52922C13.9451 7.42528 14.0433 7.37331 14.1934 7.37331H17.0517ZM19.9107 7.37331C20.0608 7.37331 20.159 7.42528 20.2052 7.52922C20.2629 7.62161 20.2918 7.76597 20.2918 7.9623C20.2918 8.17017 20.2629 8.32608 20.2052 8.43002C20.159 8.52241 20.0608 8.5686 19.9107 8.5686H17.0524C16.9023 8.5686 16.8041 8.52241 16.7579 8.43002C16.7002 8.33763 16.6713 8.19327 16.6713 7.99694C16.6713 7.78907 16.7002 7.63316 16.7579 7.52922C16.8041 7.42528 16.9023 7.37331 17.0524 7.37331H19.9107ZM21.4705 7.37331C21.9209 7.37331 22.2789 7.25205 22.5445 7.00953C22.8217 6.767 22.9602 6.43209 22.9602 6.00479V3.61421H24.0862V6.00479C24.0862 6.82475 23.8553 7.45993 23.3933 7.91033C22.9429 8.34918 22.3251 8.5686 21.5397 8.5686H19.9114C19.7612 8.5686 19.6631 8.52241 19.6169 8.43002C19.5591 8.33763 19.5303 8.19327 19.5303 7.99694C19.5303 7.78907 19.5591 7.63316 19.6169 7.52922C19.6631 7.42528 19.7612 7.37331 19.9114 7.37331H21.4705ZM24.2595 1.39685H22.8736V0.166916H24.2595V1.39685ZM22.0594 1.39685H20.6736V0.166916H22.0594V1.39685ZM10.2553 22.2221C10.2553 22.8458 10.1571 23.429 9.96076 23.9718C9.76444 24.5261 9.48149 25.0054 9.11193 25.4096C8.74237 25.8253 8.29197 26.1545 7.76073 26.397C7.24104 26.6395 6.65206 26.7608 5.99378 26.7608H4.97172C3.67826 26.7608 2.67353 26.3624 1.95751 25.5655C1.24149 24.7686 0.883476 23.6773 0.883476 22.2914V19.2599H1.99215V22.2568C1.99215 22.7534 2.0499 23.2038 2.16538 23.608C2.29242 24.0122 2.48297 24.3587 2.73704 24.6474C3.00267 24.9476 3.3318 25.1786 3.72446 25.3403C4.11712 25.502 4.59061 25.5828 5.14495 25.5828H5.90717C6.44996 25.5828 6.92345 25.4904 7.32766 25.3056C7.73186 25.1324 8.06678 24.8957 8.3324 24.5954C8.60956 24.2951 8.81167 23.9429 8.9387 23.5387C9.07729 23.1345 9.14658 22.713 9.14658 22.2741V17.6142H10.2553V22.2221ZM6.0804 17.2331H4.62526V15.9685H6.0804V17.2331ZM14.7322 22.5686C14.4319 22.5686 14.1432 22.5282 13.866 22.4473C13.5889 22.355 13.3406 22.2048 13.1211 21.9969C12.9133 21.7891 12.7458 21.5177 12.6188 21.1828C12.4917 20.8363 12.4282 20.409 12.4282 19.9009V11.8283H13.5542V19.693C13.5542 20.178 13.6582 20.5822 13.866 20.9056C14.0855 21.2174 14.4377 21.3733 14.9227 21.3733H15.2172C15.4713 21.3733 15.5983 21.5696 15.5983 21.9623C15.5983 22.3665 15.4713 22.5686 15.2172 22.5686H14.7322ZM15.5025 21.3733C15.9529 21.3733 16.2936 21.2636 16.5246 21.0442C16.7556 20.8247 16.871 20.5303 16.871 20.1607V19.5024C16.871 18.4977 17.1251 17.7124 17.6333 17.1465C18.1529 16.5806 18.869 16.2977 19.7813 16.2977C20.2548 16.2977 20.6706 16.3727 21.0286 16.5229C21.3866 16.673 21.6811 16.8866 21.9121 17.1638C22.1546 17.441 22.3336 17.7701 22.4491 18.1512C22.5646 18.5323 22.6223 18.9539 22.6223 19.4158C22.6223 20.409 22.3625 21.1828 21.8428 21.7371C21.3231 22.2914 20.6128 22.5686 19.712 22.5686C19.2501 22.5686 18.8055 22.482 18.3781 22.3088C17.9508 22.124 17.6159 21.8006 17.3734 21.3387C17.2695 21.6043 17.1424 21.8179 16.9923 21.9796C16.8422 22.1413 16.6863 22.2683 16.5246 22.3607C16.3629 22.4416 16.1897 22.4993 16.0049 22.534C15.8317 22.5571 15.6642 22.5686 15.5025 22.5686H15.2254C15.0752 22.5686 14.9771 22.5224 14.9309 22.43C14.8731 22.3376 14.8442 22.1933 14.8442 21.9969C14.8442 21.7891 14.8731 21.6332 14.9309 21.5292C14.9771 21.4253 15.0752 21.3733 15.2254 21.3733H15.5025ZM21.5136 19.5197C21.5136 18.9192 21.3808 18.4342 21.1152 18.0646C20.8496 17.6835 20.3934 17.4929 19.7467 17.4929C18.5456 17.4929 17.9451 18.1916 17.9451 19.589C17.9451 20.178 18.1068 20.6226 18.4301 20.9229C18.765 21.2232 19.1923 21.3733 19.712 21.3733C20.301 21.3733 20.7456 21.2116 21.0459 20.8883C21.3577 20.5649 21.5136 20.1087 21.5136 19.5197Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <del>
                                                <span class="old"
                                                    style="font-size: 18px;color: #a1a1a1;padding-right: 5px;">
                                                    {{ number_format($products_special_offer->sale_check->price) }}
                                                    <svg class="mr-2" width="20" height="22"
                                                        viewBox="0 0 25 27" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M2.52917 11.5828C3.03731 11.5828 3.48194 11.502 3.86304 11.3403C4.2557 11.1786 4.58484 10.9592 4.85046 10.682C5.11608 10.4048 5.31818 10.0815 5.45677 9.71193C5.59535 9.35392 5.67619 8.97281 5.69929 8.5686H3.96698C3.378 8.5686 2.89295 8.50509 2.51184 8.37805C2.13074 8.25101 1.83047 8.06623 1.61105 7.82371C1.39162 7.58119 1.23571 7.29247 1.14332 6.95756C1.06248 6.6111 1.02206 6.22422 1.02206 5.79691C1.02206 5.35806 1.08558 4.94231 1.21261 4.54965C1.33965 4.157 1.52443 3.81053 1.76695 3.51027C2.00948 3.21 2.30974 2.97325 2.66775 2.80002C3.03731 2.61524 3.45884 2.52285 3.93234 2.52285C4.31344 2.52285 4.67723 2.58637 5.02369 2.71341C5.37015 2.84044 5.67619 3.04254 5.94181 3.31971C6.20743 3.58533 6.41531 3.93757 6.56544 4.37642C6.72712 4.80372 6.80797 5.32342 6.80797 5.9355V7.37331H8.47098C8.60956 7.37331 8.70195 7.42528 8.74815 7.52922C8.80589 7.62161 8.83476 7.76597 8.83476 7.9623C8.83476 8.17017 8.80589 8.32608 8.74815 8.43002C8.70195 8.52241 8.60956 8.5686 8.47098 8.5686H6.77332C6.75022 9.13449 6.63474 9.67151 6.42686 10.1796C6.23053 10.6878 5.95336 11.1324 5.59535 11.5135C5.23734 11.8946 4.81004 12.1949 4.31344 12.4143C3.81685 12.6453 3.25674 12.7608 2.63311 12.7608H0.796861L0.692923 11.5828H2.52917ZM2.09609 5.72762C2.09609 6.01634 2.12496 6.26464 2.18271 6.47251C2.252 6.68039 2.36171 6.85362 2.51184 6.9922C2.67353 7.11924 2.88718 7.2174 3.1528 7.2867C3.41842 7.34444 3.75333 7.37331 4.15754 7.37331H5.71661V6.07408C5.71661 5.21948 5.54916 4.6074 5.21424 4.23784C4.87933 3.86828 4.41738 3.6835 3.8284 3.6835C3.27406 3.6835 2.84676 3.86828 2.54649 4.23784C2.24622 4.6074 2.09609 5.10399 2.09609 5.72762ZM11.3338 7.37331C11.4839 7.37331 11.582 7.42528 11.6282 7.52922C11.686 7.62161 11.7149 7.76597 11.7149 7.9623C11.7149 8.17017 11.686 8.32608 11.6282 8.43002C11.582 8.52241 11.4839 8.5686 11.3338 8.5686H8.47545C8.32531 8.5686 8.22715 8.52241 8.18095 8.43002C8.12321 8.33763 8.09434 8.19327 8.09434 7.99694C8.09434 7.78907 8.12321 7.63316 8.18095 7.52922C8.22715 7.42528 8.32531 7.37331 8.47545 7.37331H11.3338ZM14.1927 7.37331C14.3429 7.37331 14.441 7.42528 14.4872 7.52922C14.545 7.62161 14.5738 7.76597 14.5738 7.9623C14.5738 8.17017 14.545 8.32608 14.4872 8.43002C14.441 8.52241 14.3429 8.5686 14.1927 8.5686H11.3344C11.1843 8.5686 11.0861 8.52241 11.0399 8.43002C10.9822 8.33763 10.9533 8.19327 10.9533 7.99694C10.9533 7.78907 10.9822 7.63316 11.0399 7.52922C11.0861 7.42528 11.1843 7.37331 11.3344 7.37331H14.1927ZM17.0517 7.37331C17.2019 7.37331 17.3 7.42528 17.3462 7.52922C17.404 7.62161 17.4328 7.76597 17.4328 7.9623C17.4328 8.17017 17.404 8.32608 17.3462 8.43002C17.3 8.52241 17.2019 8.5686 17.0517 8.5686H14.1934C14.0433 8.5686 13.9451 8.52241 13.8989 8.43002C13.8412 8.33763 13.8123 8.19327 13.8123 7.99694C13.8123 7.78907 13.8412 7.63316 13.8989 7.52922C13.9451 7.42528 14.0433 7.37331 14.1934 7.37331H17.0517ZM19.9107 7.37331C20.0608 7.37331 20.159 7.42528 20.2052 7.52922C20.2629 7.62161 20.2918 7.76597 20.2918 7.9623C20.2918 8.17017 20.2629 8.32608 20.2052 8.43002C20.159 8.52241 20.0608 8.5686 19.9107 8.5686H17.0524C16.9023 8.5686 16.8041 8.52241 16.7579 8.43002C16.7002 8.33763 16.6713 8.19327 16.6713 7.99694C16.6713 7.78907 16.7002 7.63316 16.7579 7.52922C16.8041 7.42528 16.9023 7.37331 17.0524 7.37331H19.9107ZM21.4705 7.37331C21.9209 7.37331 22.2789 7.25205 22.5445 7.00953C22.8217 6.767 22.9602 6.43209 22.9602 6.00479V3.61421H24.0862V6.00479C24.0862 6.82475 23.8553 7.45993 23.3933 7.91033C22.9429 8.34918 22.3251 8.5686 21.5397 8.5686H19.9114C19.7612 8.5686 19.6631 8.52241 19.6169 8.43002C19.5591 8.33763 19.5303 8.19327 19.5303 7.99694C19.5303 7.78907 19.5591 7.63316 19.6169 7.52922C19.6631 7.42528 19.7612 7.37331 19.9114 7.37331H21.4705ZM24.2595 1.39685H22.8736V0.166916H24.2595V1.39685ZM22.0594 1.39685H20.6736V0.166916H22.0594V1.39685ZM10.2553 22.2221C10.2553 22.8458 10.1571 23.429 9.96076 23.9718C9.76444 24.5261 9.48149 25.0054 9.11193 25.4096C8.74237 25.8253 8.29197 26.1545 7.76073 26.397C7.24104 26.6395 6.65206 26.7608 5.99378 26.7608H4.97172C3.67826 26.7608 2.67353 26.3624 1.95751 25.5655C1.24149 24.7686 0.883476 23.6773 0.883476 22.2914V19.2599H1.99215V22.2568C1.99215 22.7534 2.0499 23.2038 2.16538 23.608C2.29242 24.0122 2.48297 24.3587 2.73704 24.6474C3.00267 24.9476 3.3318 25.1786 3.72446 25.3403C4.11712 25.502 4.59061 25.5828 5.14495 25.5828H5.90717C6.44996 25.5828 6.92345 25.4904 7.32766 25.3056C7.73186 25.1324 8.06678 24.8957 8.3324 24.5954C8.60956 24.2951 8.81167 23.9429 8.9387 23.5387C9.07729 23.1345 9.14658 22.713 9.14658 22.2741V17.6142H10.2553V22.2221ZM6.0804 17.2331H4.62526V15.9685H6.0804V17.2331ZM14.7322 22.5686C14.4319 22.5686 14.1432 22.5282 13.866 22.4473C13.5889 22.355 13.3406 22.2048 13.1211 21.9969C12.9133 21.7891 12.7458 21.5177 12.6188 21.1828C12.4917 20.8363 12.4282 20.409 12.4282 19.9009V11.8283H13.5542V19.693C13.5542 20.178 13.6582 20.5822 13.866 20.9056C14.0855 21.2174 14.4377 21.3733 14.9227 21.3733H15.2172C15.4713 21.3733 15.5983 21.5696 15.5983 21.9623C15.5983 22.3665 15.4713 22.5686 15.2172 22.5686H14.7322ZM15.5025 21.3733C15.9529 21.3733 16.2936 21.2636 16.5246 21.0442C16.7556 20.8247 16.871 20.5303 16.871 20.1607V19.5024C16.871 18.4977 17.1251 17.7124 17.6333 17.1465C18.1529 16.5806 18.869 16.2977 19.7813 16.2977C20.2548 16.2977 20.6706 16.3727 21.0286 16.5229C21.3866 16.673 21.6811 16.8866 21.9121 17.1638C22.1546 17.441 22.3336 17.7701 22.4491 18.1512C22.5646 18.5323 22.6223 18.9539 22.6223 19.4158C22.6223 20.409 22.3625 21.1828 21.8428 21.7371C21.3231 22.2914 20.6128 22.5686 19.712 22.5686C19.2501 22.5686 18.8055 22.482 18.3781 22.3088C17.9508 22.124 17.6159 21.8006 17.3734 21.3387C17.2695 21.6043 17.1424 21.8179 16.9923 21.9796C16.8422 22.1413 16.6863 22.2683 16.5246 22.3607C16.3629 22.4416 16.1897 22.4993 16.0049 22.534C15.8317 22.5571 15.6642 22.5686 15.5025 22.5686H15.2254C15.0752 22.5686 14.9771 22.5224 14.9309 22.43C14.8731 22.3376 14.8442 22.1933 14.8442 21.9969C14.8442 21.7891 14.8731 21.6332 14.9309 21.5292C14.9771 21.4253 15.0752 21.3733 15.2254 21.3733H15.5025ZM21.5136 19.5197C21.5136 18.9192 21.3808 18.4342 21.1152 18.0646C20.8496 17.6835 20.3934 17.4929 19.7467 17.4929C18.5456 17.4929 17.9451 18.1916 17.9451 19.589C17.9451 20.178 18.1068 20.6226 18.4301 20.9229C18.765 21.2232 19.1923 21.3733 19.712 21.3733C20.301 21.3733 20.7456 21.2116 21.0459 20.8883C21.3577 20.5649 21.5136 20.1087 21.5136 19.5197Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                            </del>
                                        @else
                                            <span class="new">
                                                {{ number_format($products_special_offer->quantity_check->price) }}
                                                <svg class="mr-2" width="20" height="22"
                                                    viewBox="0 0 25 27" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.52917 11.5828C3.03731 11.5828 3.48194 11.502 3.86304 11.3403C4.2557 11.1786 4.58484 10.9592 4.85046 10.682C5.11608 10.4048 5.31818 10.0815 5.45677 9.71193C5.59535 9.35392 5.67619 8.97281 5.69929 8.5686H3.96698C3.378 8.5686 2.89295 8.50509 2.51184 8.37805C2.13074 8.25101 1.83047 8.06623 1.61105 7.82371C1.39162 7.58119 1.23571 7.29247 1.14332 6.95756C1.06248 6.6111 1.02206 6.22422 1.02206 5.79691C1.02206 5.35806 1.08558 4.94231 1.21261 4.54965C1.33965 4.157 1.52443 3.81053 1.76695 3.51027C2.00948 3.21 2.30974 2.97325 2.66775 2.80002C3.03731 2.61524 3.45884 2.52285 3.93234 2.52285C4.31344 2.52285 4.67723 2.58637 5.02369 2.71341C5.37015 2.84044 5.67619 3.04254 5.94181 3.31971C6.20743 3.58533 6.41531 3.93757 6.56544 4.37642C6.72712 4.80372 6.80797 5.32342 6.80797 5.9355V7.37331H8.47098C8.60956 7.37331 8.70195 7.42528 8.74815 7.52922C8.80589 7.62161 8.83476 7.76597 8.83476 7.9623C8.83476 8.17017 8.80589 8.32608 8.74815 8.43002C8.70195 8.52241 8.60956 8.5686 8.47098 8.5686H6.77332C6.75022 9.13449 6.63474 9.67151 6.42686 10.1796C6.23053 10.6878 5.95336 11.1324 5.59535 11.5135C5.23734 11.8946 4.81004 12.1949 4.31344 12.4143C3.81685 12.6453 3.25674 12.7608 2.63311 12.7608H0.796861L0.692923 11.5828H2.52917ZM2.09609 5.72762C2.09609 6.01634 2.12496 6.26464 2.18271 6.47251C2.252 6.68039 2.36171 6.85362 2.51184 6.9922C2.67353 7.11924 2.88718 7.2174 3.1528 7.2867C3.41842 7.34444 3.75333 7.37331 4.15754 7.37331H5.71661V6.07408C5.71661 5.21948 5.54916 4.6074 5.21424 4.23784C4.87933 3.86828 4.41738 3.6835 3.8284 3.6835C3.27406 3.6835 2.84676 3.86828 2.54649 4.23784C2.24622 4.6074 2.09609 5.10399 2.09609 5.72762ZM11.3338 7.37331C11.4839 7.37331 11.582 7.42528 11.6282 7.52922C11.686 7.62161 11.7149 7.76597 11.7149 7.9623C11.7149 8.17017 11.686 8.32608 11.6282 8.43002C11.582 8.52241 11.4839 8.5686 11.3338 8.5686H8.47545C8.32531 8.5686 8.22715 8.52241 8.18095 8.43002C8.12321 8.33763 8.09434 8.19327 8.09434 7.99694C8.09434 7.78907 8.12321 7.63316 8.18095 7.52922C8.22715 7.42528 8.32531 7.37331 8.47545 7.37331H11.3338ZM14.1927 7.37331C14.3429 7.37331 14.441 7.42528 14.4872 7.52922C14.545 7.62161 14.5738 7.76597 14.5738 7.9623C14.5738 8.17017 14.545 8.32608 14.4872 8.43002C14.441 8.52241 14.3429 8.5686 14.1927 8.5686H11.3344C11.1843 8.5686 11.0861 8.52241 11.0399 8.43002C10.9822 8.33763 10.9533 8.19327 10.9533 7.99694C10.9533 7.78907 10.9822 7.63316 11.0399 7.52922C11.0861 7.42528 11.1843 7.37331 11.3344 7.37331H14.1927ZM17.0517 7.37331C17.2019 7.37331 17.3 7.42528 17.3462 7.52922C17.404 7.62161 17.4328 7.76597 17.4328 7.9623C17.4328 8.17017 17.404 8.32608 17.3462 8.43002C17.3 8.52241 17.2019 8.5686 17.0517 8.5686H14.1934C14.0433 8.5686 13.9451 8.52241 13.8989 8.43002C13.8412 8.33763 13.8123 8.19327 13.8123 7.99694C13.8123 7.78907 13.8412 7.63316 13.8989 7.52922C13.9451 7.42528 14.0433 7.37331 14.1934 7.37331H17.0517ZM19.9107 7.37331C20.0608 7.37331 20.159 7.42528 20.2052 7.52922C20.2629 7.62161 20.2918 7.76597 20.2918 7.9623C20.2918 8.17017 20.2629 8.32608 20.2052 8.43002C20.159 8.52241 20.0608 8.5686 19.9107 8.5686H17.0524C16.9023 8.5686 16.8041 8.52241 16.7579 8.43002C16.7002 8.33763 16.6713 8.19327 16.6713 7.99694C16.6713 7.78907 16.7002 7.63316 16.7579 7.52922C16.8041 7.42528 16.9023 7.37331 17.0524 7.37331H19.9107ZM21.4705 7.37331C21.9209 7.37331 22.2789 7.25205 22.5445 7.00953C22.8217 6.767 22.9602 6.43209 22.9602 6.00479V3.61421H24.0862V6.00479C24.0862 6.82475 23.8553 7.45993 23.3933 7.91033C22.9429 8.34918 22.3251 8.5686 21.5397 8.5686H19.9114C19.7612 8.5686 19.6631 8.52241 19.6169 8.43002C19.5591 8.33763 19.5303 8.19327 19.5303 7.99694C19.5303 7.78907 19.5591 7.63316 19.6169 7.52922C19.6631 7.42528 19.7612 7.37331 19.9114 7.37331H21.4705ZM24.2595 1.39685H22.8736V0.166916H24.2595V1.39685ZM22.0594 1.39685H20.6736V0.166916H22.0594V1.39685ZM10.2553 22.2221C10.2553 22.8458 10.1571 23.429 9.96076 23.9718C9.76444 24.5261 9.48149 25.0054 9.11193 25.4096C8.74237 25.8253 8.29197 26.1545 7.76073 26.397C7.24104 26.6395 6.65206 26.7608 5.99378 26.7608H4.97172C3.67826 26.7608 2.67353 26.3624 1.95751 25.5655C1.24149 24.7686 0.883476 23.6773 0.883476 22.2914V19.2599H1.99215V22.2568C1.99215 22.7534 2.0499 23.2038 2.16538 23.608C2.29242 24.0122 2.48297 24.3587 2.73704 24.6474C3.00267 24.9476 3.3318 25.1786 3.72446 25.3403C4.11712 25.502 4.59061 25.5828 5.14495 25.5828H5.90717C6.44996 25.5828 6.92345 25.4904 7.32766 25.3056C7.73186 25.1324 8.06678 24.8957 8.3324 24.5954C8.60956 24.2951 8.81167 23.9429 8.9387 23.5387C9.07729 23.1345 9.14658 22.713 9.14658 22.2741V17.6142H10.2553V22.2221ZM6.0804 17.2331H4.62526V15.9685H6.0804V17.2331ZM14.7322 22.5686C14.4319 22.5686 14.1432 22.5282 13.866 22.4473C13.5889 22.355 13.3406 22.2048 13.1211 21.9969C12.9133 21.7891 12.7458 21.5177 12.6188 21.1828C12.4917 20.8363 12.4282 20.409 12.4282 19.9009V11.8283H13.5542V19.693C13.5542 20.178 13.6582 20.5822 13.866 20.9056C14.0855 21.2174 14.4377 21.3733 14.9227 21.3733H15.2172C15.4713 21.3733 15.5983 21.5696 15.5983 21.9623C15.5983 22.3665 15.4713 22.5686 15.2172 22.5686H14.7322ZM15.5025 21.3733C15.9529 21.3733 16.2936 21.2636 16.5246 21.0442C16.7556 20.8247 16.871 20.5303 16.871 20.1607V19.5024C16.871 18.4977 17.1251 17.7124 17.6333 17.1465C18.1529 16.5806 18.869 16.2977 19.7813 16.2977C20.2548 16.2977 20.6706 16.3727 21.0286 16.5229C21.3866 16.673 21.6811 16.8866 21.9121 17.1638C22.1546 17.441 22.3336 17.7701 22.4491 18.1512C22.5646 18.5323 22.6223 18.9539 22.6223 19.4158C22.6223 20.409 22.3625 21.1828 21.8428 21.7371C21.3231 22.2914 20.6128 22.5686 19.712 22.5686C19.2501 22.5686 18.8055 22.482 18.3781 22.3088C17.9508 22.124 17.6159 21.8006 17.3734 21.3387C17.2695 21.6043 17.1424 21.8179 16.9923 21.9796C16.8422 22.1413 16.6863 22.2683 16.5246 22.3607C16.3629 22.4416 16.1897 22.4993 16.0049 22.534C15.8317 22.5571 15.6642 22.5686 15.5025 22.5686H15.2254C15.0752 22.5686 14.9771 22.5224 14.9309 22.43C14.8731 22.3376 14.8442 22.1933 14.8442 21.9969C14.8442 21.7891 14.8731 21.6332 14.9309 21.5292C14.9771 21.4253 15.0752 21.3733 15.2254 21.3733H15.5025ZM21.5136 19.5197C21.5136 18.9192 21.3808 18.4342 21.1152 18.0646C20.8496 17.6835 20.3934 17.4929 19.7467 17.4929C18.5456 17.4929 17.9451 18.1916 17.9451 19.589C17.9451 20.178 18.1068 20.6226 18.4301 20.9229C18.765 21.2232 19.1923 21.3733 19.712 21.3733C20.301 21.3733 20.7456 21.2116 21.0459 20.8883C21.3577 20.5649 21.5136 20.1087 21.5136 19.5197Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        @endif
                                    @else
                                        <div class="not-in-stock">
                                            <p class="text-danger">ناموجود</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="product-modal-link">
                                    {{-- <form action="">
                                <div class="row align-items-center">
                                    <div class="col-sm-6">
                                        <div class="cart-counter">
                                            <input type="text" name="count" class="counter"
                                                value="1">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <button
                                            class="shadow-sm fw-bold btn-add-to-cart mt-sm-0 mt-2 waves-effect waves-light">افزودن
                                            به سبد
                                            خرید</button>
                                    </div>
                                </div>
                            </form> --}}

                                    <form action="{{ route('home.cart.add') }}" method="POST">
                                        <input type="hidden" name="product_id"
                                            value="{{ $products_special_offer->id }}">
                                        @csrf
                                        @if ($products_special_offer->quantity_check)
                                            @php
                                                if ($products_special_offer->sale_check) {
                                                    $variationProductSelected = $products_special_offer->sale_check;
                                                } else {
                                                    $variationProductSelected = $products_special_offer->price_check;
                                                }
                                            @endphp
                                            <div class="pro-details-size-color text-right" style="display: flex">
                                                <div class="pro-details-size w-50">
                                                    <span>{{ App\Models\Attribute::find($products_special_offer->variations->first()->attribute_id)->name }}</span>
                                                    <select name="variation" class="form-control variation-select"
                                                        data-id="{{ $products_special_offer->id }}">
                                                        @foreach ($products_special_offer->variations()->where('quantity', '>', 0)->get() as $variation)
                                                            <option
                                                                value="{{ json_encode($variation->only(['id', 'quantity', 'is_sale', 'sale_price', 'price'])) }}"
                                                                {{ $variationProductSelected->id == $variation->id ? 'selected' : '' }}>
                                                                {{ $variation->value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="cart-plus-minus"
                                                    style="text-align: -webkit-right;padding-right:10px">
                                                    <span>تعداد</span>
                                                    <input style="width: 100px"
                                                        class="form-control cart-plus-minus-box quantity-input"
                                                        type="text" name="qtybutton" value="1"
                                                        data-max="5" />
                                                </div>

                                            </div>
                                            <div class="pro-details-quality">

                                                <div class="pro-details-cart"
                                                    style="text-align: center;margin-right: 62px;margin-top: 12px;">
                                                    <button class="but-btn" type="submit">افزودن به سبد خرید</button>
                                                </div>

                                                <style>
                                                    .but-btn {
                                                        margin-bottom: 14px;
                                                        margin-top: 13px;
                                                        border: 1px solid #6666ff;
                                                        background: #6666ff !important;
                                                        color: white !important;
                                                        padding: 5px;
                                                        width: 160px;
                                                        transition: all .3s ease-in-out;
                                                        border-radius: 50px;
                                                        box-shadow: 1px 2px 13px rgba(101, 72, 164, 0.5);
                                                    }

                                                    .but-btn:hover {
                                                        margin-bottom: 14px;
                                                        margin-top: 13px;
                                                        border: 1px solid #6666ff;
                                                        background: white !important;
                                                        padding: 5px;
                                                        width: 160px;
                                                        color: rgb(68, 68, 68) !important;
                                                        transition: all .3s ease-in-out;

                                                    }
                                                </style>




                                                <div class="pro-details-wishlist">
                                                    @auth
                                                        @if ($products_special_offer->checkUserWishlist(auth()->id()))
                                                            <a
                                                                href="{{ route('home.wishlist.remove', ['product' => $products_special_offer->id]) }}"><i
                                                                    class="fas fa-heart" style="color:red"></i>
                                                            </a>
                                                        @else
                                                            <a
                                                                href="{{ route('home.wishlist.add', ['product' => $products_special_offer->id]) }}"><i
                                                                    class="sli sli-heart"></i>
                                                            </a>
                                                        @endif
                                                    @else
                                                        <a
                                                            href="{{ route('home.wishlist.add', ['product' => $products_special_offer->id]) }}"><i
                                                                class="sli sli-heart"></i>
                                                        </a>
                                                    @endauth
                                                </div>
                                                <div class="pro-details-compare">
                                                    <a title="Add To Compare" href="#"><i
                                                            class="sli sli-refresh"></i></a>
                                                </div>
                                            </div>
                                        @else
                                            <div class="not-in-stock">
                                                <p class="text-white">ناموجود</p>
                                            </div>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    @foreach ($product_normal_mens as $product_normal_men)
        <div class="modal fade modal-lg product-modal" id="productModal-{{ $product_normal_men->id }}"
            tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title">
                            <a href="">
                                <div class="d-flex">
                                    <i class="bi bi-bag-plus me-1"></i>
                                    <h4>{{ $product_normal_men->name }}
                                    </h4>
                                </div>
                            </a>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5 mb-md-0 mb-2">
                                <div class="swiper product-modal">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="{{ asset('/upload/files/products/images/' . $product_normal_men->primary_image) }}"
                                                alt="" class="img-fluid">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ asset('/upload/files/products/images/' . $product_normal_men->primary_image) }}"
                                                alt="" class="img-fluid">
                                        </div>

                                    </div>
                                    <div class="swiper-button-next sb"></div>
                                    <div class="swiper-button-prev sb"></div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="product-modal-detail">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <span class="product-meta-item text-muted">
                                                <i class="bi bi-tag"></i>
                                                دسته بندی:
                                                <a href="">{{ $product_normal_men->category->parent->name }}</a>,
                                                <a href="">{{ $product_normal_men->category->name }}</a>,


                                            </span>
                                        </div>

                                        <div class="col-md-6">
                                            <span class="product-meta-item text-muted">
                                                <i class="bi bi-tag"></i>
                                                برچسب:
                                                @foreach ($product_normal_men->tags as $tag)
                                                    <a href="">{{ $tag->name }}
                                                        {{ $loop->last ? '' : ',' }}</a>,
                                                @endforeach
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-modal-feature">
                                    <strong>ویژگی های محصول:</strong>
                                    <ul>
                                        @foreach ($product_normal_women->attributes()->with('attribute')->get()->take(5) as $attribute)
                                            <li>
                                                <span class="title">{{ $attribute->attribute->name }} :</span>
                                                <span class="desc">{{ $attribute->value }}</span>
                                            </li>
                                        @endforeach

                                    </ul>
                                    <label for="post-2" class="read-more-trigger"></label>
                                </div>
                                <div class="variation-price-{{ $product_normal_men->id }}"
                                    style="color: #6666ff;text-align: right;font-size: 21px;margin: 9px;">
                                    @if ($product_normal_men->quantity_check)
                                        @if ($product_normal_men->sale_check)
                                            <style>
                                                .variation-price {
                                                    display: flex
                                                }

                                                .new {
                                                    color: #6666ff;
                                                    font-size: 20px;

                                                }
                                            </style>
                                            <span class="new">
                                                {{ number_format($product_normal_men->sale_check->sale_price) }}
                                                <svg class="mr-2" width="20" height="22"
                                                    viewBox="0 0 25 27" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.52917 11.5828C3.03731 11.5828 3.48194 11.502 3.86304 11.3403C4.2557 11.1786 4.58484 10.9592 4.85046 10.682C5.11608 10.4048 5.31818 10.0815 5.45677 9.71193C5.59535 9.35392 5.67619 8.97281 5.69929 8.5686H3.96698C3.378 8.5686 2.89295 8.50509 2.51184 8.37805C2.13074 8.25101 1.83047 8.06623 1.61105 7.82371C1.39162 7.58119 1.23571 7.29247 1.14332 6.95756C1.06248 6.6111 1.02206 6.22422 1.02206 5.79691C1.02206 5.35806 1.08558 4.94231 1.21261 4.54965C1.33965 4.157 1.52443 3.81053 1.76695 3.51027C2.00948 3.21 2.30974 2.97325 2.66775 2.80002C3.03731 2.61524 3.45884 2.52285 3.93234 2.52285C4.31344 2.52285 4.67723 2.58637 5.02369 2.71341C5.37015 2.84044 5.67619 3.04254 5.94181 3.31971C6.20743 3.58533 6.41531 3.93757 6.56544 4.37642C6.72712 4.80372 6.80797 5.32342 6.80797 5.9355V7.37331H8.47098C8.60956 7.37331 8.70195 7.42528 8.74815 7.52922C8.80589 7.62161 8.83476 7.76597 8.83476 7.9623C8.83476 8.17017 8.80589 8.32608 8.74815 8.43002C8.70195 8.52241 8.60956 8.5686 8.47098 8.5686H6.77332C6.75022 9.13449 6.63474 9.67151 6.42686 10.1796C6.23053 10.6878 5.95336 11.1324 5.59535 11.5135C5.23734 11.8946 4.81004 12.1949 4.31344 12.4143C3.81685 12.6453 3.25674 12.7608 2.63311 12.7608H0.796861L0.692923 11.5828H2.52917ZM2.09609 5.72762C2.09609 6.01634 2.12496 6.26464 2.18271 6.47251C2.252 6.68039 2.36171 6.85362 2.51184 6.9922C2.67353 7.11924 2.88718 7.2174 3.1528 7.2867C3.41842 7.34444 3.75333 7.37331 4.15754 7.37331H5.71661V6.07408C5.71661 5.21948 5.54916 4.6074 5.21424 4.23784C4.87933 3.86828 4.41738 3.6835 3.8284 3.6835C3.27406 3.6835 2.84676 3.86828 2.54649 4.23784C2.24622 4.6074 2.09609 5.10399 2.09609 5.72762ZM11.3338 7.37331C11.4839 7.37331 11.582 7.42528 11.6282 7.52922C11.686 7.62161 11.7149 7.76597 11.7149 7.9623C11.7149 8.17017 11.686 8.32608 11.6282 8.43002C11.582 8.52241 11.4839 8.5686 11.3338 8.5686H8.47545C8.32531 8.5686 8.22715 8.52241 8.18095 8.43002C8.12321 8.33763 8.09434 8.19327 8.09434 7.99694C8.09434 7.78907 8.12321 7.63316 8.18095 7.52922C8.22715 7.42528 8.32531 7.37331 8.47545 7.37331H11.3338ZM14.1927 7.37331C14.3429 7.37331 14.441 7.42528 14.4872 7.52922C14.545 7.62161 14.5738 7.76597 14.5738 7.9623C14.5738 8.17017 14.545 8.32608 14.4872 8.43002C14.441 8.52241 14.3429 8.5686 14.1927 8.5686H11.3344C11.1843 8.5686 11.0861 8.52241 11.0399 8.43002C10.9822 8.33763 10.9533 8.19327 10.9533 7.99694C10.9533 7.78907 10.9822 7.63316 11.0399 7.52922C11.0861 7.42528 11.1843 7.37331 11.3344 7.37331H14.1927ZM17.0517 7.37331C17.2019 7.37331 17.3 7.42528 17.3462 7.52922C17.404 7.62161 17.4328 7.76597 17.4328 7.9623C17.4328 8.17017 17.404 8.32608 17.3462 8.43002C17.3 8.52241 17.2019 8.5686 17.0517 8.5686H14.1934C14.0433 8.5686 13.9451 8.52241 13.8989 8.43002C13.8412 8.33763 13.8123 8.19327 13.8123 7.99694C13.8123 7.78907 13.8412 7.63316 13.8989 7.52922C13.9451 7.42528 14.0433 7.37331 14.1934 7.37331H17.0517ZM19.9107 7.37331C20.0608 7.37331 20.159 7.42528 20.2052 7.52922C20.2629 7.62161 20.2918 7.76597 20.2918 7.9623C20.2918 8.17017 20.2629 8.32608 20.2052 8.43002C20.159 8.52241 20.0608 8.5686 19.9107 8.5686H17.0524C16.9023 8.5686 16.8041 8.52241 16.7579 8.43002C16.7002 8.33763 16.6713 8.19327 16.6713 7.99694C16.6713 7.78907 16.7002 7.63316 16.7579 7.52922C16.8041 7.42528 16.9023 7.37331 17.0524 7.37331H19.9107ZM21.4705 7.37331C21.9209 7.37331 22.2789 7.25205 22.5445 7.00953C22.8217 6.767 22.9602 6.43209 22.9602 6.00479V3.61421H24.0862V6.00479C24.0862 6.82475 23.8553 7.45993 23.3933 7.91033C22.9429 8.34918 22.3251 8.5686 21.5397 8.5686H19.9114C19.7612 8.5686 19.6631 8.52241 19.6169 8.43002C19.5591 8.33763 19.5303 8.19327 19.5303 7.99694C19.5303 7.78907 19.5591 7.63316 19.6169 7.52922C19.6631 7.42528 19.7612 7.37331 19.9114 7.37331H21.4705ZM24.2595 1.39685H22.8736V0.166916H24.2595V1.39685ZM22.0594 1.39685H20.6736V0.166916H22.0594V1.39685ZM10.2553 22.2221C10.2553 22.8458 10.1571 23.429 9.96076 23.9718C9.76444 24.5261 9.48149 25.0054 9.11193 25.4096C8.74237 25.8253 8.29197 26.1545 7.76073 26.397C7.24104 26.6395 6.65206 26.7608 5.99378 26.7608H4.97172C3.67826 26.7608 2.67353 26.3624 1.95751 25.5655C1.24149 24.7686 0.883476 23.6773 0.883476 22.2914V19.2599H1.99215V22.2568C1.99215 22.7534 2.0499 23.2038 2.16538 23.608C2.29242 24.0122 2.48297 24.3587 2.73704 24.6474C3.00267 24.9476 3.3318 25.1786 3.72446 25.3403C4.11712 25.502 4.59061 25.5828 5.14495 25.5828H5.90717C6.44996 25.5828 6.92345 25.4904 7.32766 25.3056C7.73186 25.1324 8.06678 24.8957 8.3324 24.5954C8.60956 24.2951 8.81167 23.9429 8.9387 23.5387C9.07729 23.1345 9.14658 22.713 9.14658 22.2741V17.6142H10.2553V22.2221ZM6.0804 17.2331H4.62526V15.9685H6.0804V17.2331ZM14.7322 22.5686C14.4319 22.5686 14.1432 22.5282 13.866 22.4473C13.5889 22.355 13.3406 22.2048 13.1211 21.9969C12.9133 21.7891 12.7458 21.5177 12.6188 21.1828C12.4917 20.8363 12.4282 20.409 12.4282 19.9009V11.8283H13.5542V19.693C13.5542 20.178 13.6582 20.5822 13.866 20.9056C14.0855 21.2174 14.4377 21.3733 14.9227 21.3733H15.2172C15.4713 21.3733 15.5983 21.5696 15.5983 21.9623C15.5983 22.3665 15.4713 22.5686 15.2172 22.5686H14.7322ZM15.5025 21.3733C15.9529 21.3733 16.2936 21.2636 16.5246 21.0442C16.7556 20.8247 16.871 20.5303 16.871 20.1607V19.5024C16.871 18.4977 17.1251 17.7124 17.6333 17.1465C18.1529 16.5806 18.869 16.2977 19.7813 16.2977C20.2548 16.2977 20.6706 16.3727 21.0286 16.5229C21.3866 16.673 21.6811 16.8866 21.9121 17.1638C22.1546 17.441 22.3336 17.7701 22.4491 18.1512C22.5646 18.5323 22.6223 18.9539 22.6223 19.4158C22.6223 20.409 22.3625 21.1828 21.8428 21.7371C21.3231 22.2914 20.6128 22.5686 19.712 22.5686C19.2501 22.5686 18.8055 22.482 18.3781 22.3088C17.9508 22.124 17.6159 21.8006 17.3734 21.3387C17.2695 21.6043 17.1424 21.8179 16.9923 21.9796C16.8422 22.1413 16.6863 22.2683 16.5246 22.3607C16.3629 22.4416 16.1897 22.4993 16.0049 22.534C15.8317 22.5571 15.6642 22.5686 15.5025 22.5686H15.2254C15.0752 22.5686 14.9771 22.5224 14.9309 22.43C14.8731 22.3376 14.8442 22.1933 14.8442 21.9969C14.8442 21.7891 14.8731 21.6332 14.9309 21.5292C14.9771 21.4253 15.0752 21.3733 15.2254 21.3733H15.5025ZM21.5136 19.5197C21.5136 18.9192 21.3808 18.4342 21.1152 18.0646C20.8496 17.6835 20.3934 17.4929 19.7467 17.4929C18.5456 17.4929 17.9451 18.1916 17.9451 19.589C17.9451 20.178 18.1068 20.6226 18.4301 20.9229C18.765 21.2232 19.1923 21.3733 19.712 21.3733C20.301 21.3733 20.7456 21.2116 21.0459 20.8883C21.3577 20.5649 21.5136 20.1087 21.5136 19.5197Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <del>
                                                <span class="old"
                                                    style="font-size: 18px;color: #a1a1a1;padding-right: 5px;">
                                                    {{ number_format($product_normal_men->sale_check->price) }}
                                                    <svg class="mr-2" width="20" height="22"
                                                        viewBox="0 0 25 27" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M2.52917 11.5828C3.03731 11.5828 3.48194 11.502 3.86304 11.3403C4.2557 11.1786 4.58484 10.9592 4.85046 10.682C5.11608 10.4048 5.31818 10.0815 5.45677 9.71193C5.59535 9.35392 5.67619 8.97281 5.69929 8.5686H3.96698C3.378 8.5686 2.89295 8.50509 2.51184 8.37805C2.13074 8.25101 1.83047 8.06623 1.61105 7.82371C1.39162 7.58119 1.23571 7.29247 1.14332 6.95756C1.06248 6.6111 1.02206 6.22422 1.02206 5.79691C1.02206 5.35806 1.08558 4.94231 1.21261 4.54965C1.33965 4.157 1.52443 3.81053 1.76695 3.51027C2.00948 3.21 2.30974 2.97325 2.66775 2.80002C3.03731 2.61524 3.45884 2.52285 3.93234 2.52285C4.31344 2.52285 4.67723 2.58637 5.02369 2.71341C5.37015 2.84044 5.67619 3.04254 5.94181 3.31971C6.20743 3.58533 6.41531 3.93757 6.56544 4.37642C6.72712 4.80372 6.80797 5.32342 6.80797 5.9355V7.37331H8.47098C8.60956 7.37331 8.70195 7.42528 8.74815 7.52922C8.80589 7.62161 8.83476 7.76597 8.83476 7.9623C8.83476 8.17017 8.80589 8.32608 8.74815 8.43002C8.70195 8.52241 8.60956 8.5686 8.47098 8.5686H6.77332C6.75022 9.13449 6.63474 9.67151 6.42686 10.1796C6.23053 10.6878 5.95336 11.1324 5.59535 11.5135C5.23734 11.8946 4.81004 12.1949 4.31344 12.4143C3.81685 12.6453 3.25674 12.7608 2.63311 12.7608H0.796861L0.692923 11.5828H2.52917ZM2.09609 5.72762C2.09609 6.01634 2.12496 6.26464 2.18271 6.47251C2.252 6.68039 2.36171 6.85362 2.51184 6.9922C2.67353 7.11924 2.88718 7.2174 3.1528 7.2867C3.41842 7.34444 3.75333 7.37331 4.15754 7.37331H5.71661V6.07408C5.71661 5.21948 5.54916 4.6074 5.21424 4.23784C4.87933 3.86828 4.41738 3.6835 3.8284 3.6835C3.27406 3.6835 2.84676 3.86828 2.54649 4.23784C2.24622 4.6074 2.09609 5.10399 2.09609 5.72762ZM11.3338 7.37331C11.4839 7.37331 11.582 7.42528 11.6282 7.52922C11.686 7.62161 11.7149 7.76597 11.7149 7.9623C11.7149 8.17017 11.686 8.32608 11.6282 8.43002C11.582 8.52241 11.4839 8.5686 11.3338 8.5686H8.47545C8.32531 8.5686 8.22715 8.52241 8.18095 8.43002C8.12321 8.33763 8.09434 8.19327 8.09434 7.99694C8.09434 7.78907 8.12321 7.63316 8.18095 7.52922C8.22715 7.42528 8.32531 7.37331 8.47545 7.37331H11.3338ZM14.1927 7.37331C14.3429 7.37331 14.441 7.42528 14.4872 7.52922C14.545 7.62161 14.5738 7.76597 14.5738 7.9623C14.5738 8.17017 14.545 8.32608 14.4872 8.43002C14.441 8.52241 14.3429 8.5686 14.1927 8.5686H11.3344C11.1843 8.5686 11.0861 8.52241 11.0399 8.43002C10.9822 8.33763 10.9533 8.19327 10.9533 7.99694C10.9533 7.78907 10.9822 7.63316 11.0399 7.52922C11.0861 7.42528 11.1843 7.37331 11.3344 7.37331H14.1927ZM17.0517 7.37331C17.2019 7.37331 17.3 7.42528 17.3462 7.52922C17.404 7.62161 17.4328 7.76597 17.4328 7.9623C17.4328 8.17017 17.404 8.32608 17.3462 8.43002C17.3 8.52241 17.2019 8.5686 17.0517 8.5686H14.1934C14.0433 8.5686 13.9451 8.52241 13.8989 8.43002C13.8412 8.33763 13.8123 8.19327 13.8123 7.99694C13.8123 7.78907 13.8412 7.63316 13.8989 7.52922C13.9451 7.42528 14.0433 7.37331 14.1934 7.37331H17.0517ZM19.9107 7.37331C20.0608 7.37331 20.159 7.42528 20.2052 7.52922C20.2629 7.62161 20.2918 7.76597 20.2918 7.9623C20.2918 8.17017 20.2629 8.32608 20.2052 8.43002C20.159 8.52241 20.0608 8.5686 19.9107 8.5686H17.0524C16.9023 8.5686 16.8041 8.52241 16.7579 8.43002C16.7002 8.33763 16.6713 8.19327 16.6713 7.99694C16.6713 7.78907 16.7002 7.63316 16.7579 7.52922C16.8041 7.42528 16.9023 7.37331 17.0524 7.37331H19.9107ZM21.4705 7.37331C21.9209 7.37331 22.2789 7.25205 22.5445 7.00953C22.8217 6.767 22.9602 6.43209 22.9602 6.00479V3.61421H24.0862V6.00479C24.0862 6.82475 23.8553 7.45993 23.3933 7.91033C22.9429 8.34918 22.3251 8.5686 21.5397 8.5686H19.9114C19.7612 8.5686 19.6631 8.52241 19.6169 8.43002C19.5591 8.33763 19.5303 8.19327 19.5303 7.99694C19.5303 7.78907 19.5591 7.63316 19.6169 7.52922C19.6631 7.42528 19.7612 7.37331 19.9114 7.37331H21.4705ZM24.2595 1.39685H22.8736V0.166916H24.2595V1.39685ZM22.0594 1.39685H20.6736V0.166916H22.0594V1.39685ZM10.2553 22.2221C10.2553 22.8458 10.1571 23.429 9.96076 23.9718C9.76444 24.5261 9.48149 25.0054 9.11193 25.4096C8.74237 25.8253 8.29197 26.1545 7.76073 26.397C7.24104 26.6395 6.65206 26.7608 5.99378 26.7608H4.97172C3.67826 26.7608 2.67353 26.3624 1.95751 25.5655C1.24149 24.7686 0.883476 23.6773 0.883476 22.2914V19.2599H1.99215V22.2568C1.99215 22.7534 2.0499 23.2038 2.16538 23.608C2.29242 24.0122 2.48297 24.3587 2.73704 24.6474C3.00267 24.9476 3.3318 25.1786 3.72446 25.3403C4.11712 25.502 4.59061 25.5828 5.14495 25.5828H5.90717C6.44996 25.5828 6.92345 25.4904 7.32766 25.3056C7.73186 25.1324 8.06678 24.8957 8.3324 24.5954C8.60956 24.2951 8.81167 23.9429 8.9387 23.5387C9.07729 23.1345 9.14658 22.713 9.14658 22.2741V17.6142H10.2553V22.2221ZM6.0804 17.2331H4.62526V15.9685H6.0804V17.2331ZM14.7322 22.5686C14.4319 22.5686 14.1432 22.5282 13.866 22.4473C13.5889 22.355 13.3406 22.2048 13.1211 21.9969C12.9133 21.7891 12.7458 21.5177 12.6188 21.1828C12.4917 20.8363 12.4282 20.409 12.4282 19.9009V11.8283H13.5542V19.693C13.5542 20.178 13.6582 20.5822 13.866 20.9056C14.0855 21.2174 14.4377 21.3733 14.9227 21.3733H15.2172C15.4713 21.3733 15.5983 21.5696 15.5983 21.9623C15.5983 22.3665 15.4713 22.5686 15.2172 22.5686H14.7322ZM15.5025 21.3733C15.9529 21.3733 16.2936 21.2636 16.5246 21.0442C16.7556 20.8247 16.871 20.5303 16.871 20.1607V19.5024C16.871 18.4977 17.1251 17.7124 17.6333 17.1465C18.1529 16.5806 18.869 16.2977 19.7813 16.2977C20.2548 16.2977 20.6706 16.3727 21.0286 16.5229C21.3866 16.673 21.6811 16.8866 21.9121 17.1638C22.1546 17.441 22.3336 17.7701 22.4491 18.1512C22.5646 18.5323 22.6223 18.9539 22.6223 19.4158C22.6223 20.409 22.3625 21.1828 21.8428 21.7371C21.3231 22.2914 20.6128 22.5686 19.712 22.5686C19.2501 22.5686 18.8055 22.482 18.3781 22.3088C17.9508 22.124 17.6159 21.8006 17.3734 21.3387C17.2695 21.6043 17.1424 21.8179 16.9923 21.9796C16.8422 22.1413 16.6863 22.2683 16.5246 22.3607C16.3629 22.4416 16.1897 22.4993 16.0049 22.534C15.8317 22.5571 15.6642 22.5686 15.5025 22.5686H15.2254C15.0752 22.5686 14.9771 22.5224 14.9309 22.43C14.8731 22.3376 14.8442 22.1933 14.8442 21.9969C14.8442 21.7891 14.8731 21.6332 14.9309 21.5292C14.9771 21.4253 15.0752 21.3733 15.2254 21.3733H15.5025ZM21.5136 19.5197C21.5136 18.9192 21.3808 18.4342 21.1152 18.0646C20.8496 17.6835 20.3934 17.4929 19.7467 17.4929C18.5456 17.4929 17.9451 18.1916 17.9451 19.589C17.9451 20.178 18.1068 20.6226 18.4301 20.9229C18.765 21.2232 19.1923 21.3733 19.712 21.3733C20.301 21.3733 20.7456 21.2116 21.0459 20.8883C21.3577 20.5649 21.5136 20.1087 21.5136 19.5197Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                            </del>
                                        @else
                                            <span class="new">
                                                {{ number_format($product_normal_men->quantity_check->price) }}
                                                <svg class="mr-2" width="20" height="22"
                                                    viewBox="0 0 25 27" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.52917 11.5828C3.03731 11.5828 3.48194 11.502 3.86304 11.3403C4.2557 11.1786 4.58484 10.9592 4.85046 10.682C5.11608 10.4048 5.31818 10.0815 5.45677 9.71193C5.59535 9.35392 5.67619 8.97281 5.69929 8.5686H3.96698C3.378 8.5686 2.89295 8.50509 2.51184 8.37805C2.13074 8.25101 1.83047 8.06623 1.61105 7.82371C1.39162 7.58119 1.23571 7.29247 1.14332 6.95756C1.06248 6.6111 1.02206 6.22422 1.02206 5.79691C1.02206 5.35806 1.08558 4.94231 1.21261 4.54965C1.33965 4.157 1.52443 3.81053 1.76695 3.51027C2.00948 3.21 2.30974 2.97325 2.66775 2.80002C3.03731 2.61524 3.45884 2.52285 3.93234 2.52285C4.31344 2.52285 4.67723 2.58637 5.02369 2.71341C5.37015 2.84044 5.67619 3.04254 5.94181 3.31971C6.20743 3.58533 6.41531 3.93757 6.56544 4.37642C6.72712 4.80372 6.80797 5.32342 6.80797 5.9355V7.37331H8.47098C8.60956 7.37331 8.70195 7.42528 8.74815 7.52922C8.80589 7.62161 8.83476 7.76597 8.83476 7.9623C8.83476 8.17017 8.80589 8.32608 8.74815 8.43002C8.70195 8.52241 8.60956 8.5686 8.47098 8.5686H6.77332C6.75022 9.13449 6.63474 9.67151 6.42686 10.1796C6.23053 10.6878 5.95336 11.1324 5.59535 11.5135C5.23734 11.8946 4.81004 12.1949 4.31344 12.4143C3.81685 12.6453 3.25674 12.7608 2.63311 12.7608H0.796861L0.692923 11.5828H2.52917ZM2.09609 5.72762C2.09609 6.01634 2.12496 6.26464 2.18271 6.47251C2.252 6.68039 2.36171 6.85362 2.51184 6.9922C2.67353 7.11924 2.88718 7.2174 3.1528 7.2867C3.41842 7.34444 3.75333 7.37331 4.15754 7.37331H5.71661V6.07408C5.71661 5.21948 5.54916 4.6074 5.21424 4.23784C4.87933 3.86828 4.41738 3.6835 3.8284 3.6835C3.27406 3.6835 2.84676 3.86828 2.54649 4.23784C2.24622 4.6074 2.09609 5.10399 2.09609 5.72762ZM11.3338 7.37331C11.4839 7.37331 11.582 7.42528 11.6282 7.52922C11.686 7.62161 11.7149 7.76597 11.7149 7.9623C11.7149 8.17017 11.686 8.32608 11.6282 8.43002C11.582 8.52241 11.4839 8.5686 11.3338 8.5686H8.47545C8.32531 8.5686 8.22715 8.52241 8.18095 8.43002C8.12321 8.33763 8.09434 8.19327 8.09434 7.99694C8.09434 7.78907 8.12321 7.63316 8.18095 7.52922C8.22715 7.42528 8.32531 7.37331 8.47545 7.37331H11.3338ZM14.1927 7.37331C14.3429 7.37331 14.441 7.42528 14.4872 7.52922C14.545 7.62161 14.5738 7.76597 14.5738 7.9623C14.5738 8.17017 14.545 8.32608 14.4872 8.43002C14.441 8.52241 14.3429 8.5686 14.1927 8.5686H11.3344C11.1843 8.5686 11.0861 8.52241 11.0399 8.43002C10.9822 8.33763 10.9533 8.19327 10.9533 7.99694C10.9533 7.78907 10.9822 7.63316 11.0399 7.52922C11.0861 7.42528 11.1843 7.37331 11.3344 7.37331H14.1927ZM17.0517 7.37331C17.2019 7.37331 17.3 7.42528 17.3462 7.52922C17.404 7.62161 17.4328 7.76597 17.4328 7.9623C17.4328 8.17017 17.404 8.32608 17.3462 8.43002C17.3 8.52241 17.2019 8.5686 17.0517 8.5686H14.1934C14.0433 8.5686 13.9451 8.52241 13.8989 8.43002C13.8412 8.33763 13.8123 8.19327 13.8123 7.99694C13.8123 7.78907 13.8412 7.63316 13.8989 7.52922C13.9451 7.42528 14.0433 7.37331 14.1934 7.37331H17.0517ZM19.9107 7.37331C20.0608 7.37331 20.159 7.42528 20.2052 7.52922C20.2629 7.62161 20.2918 7.76597 20.2918 7.9623C20.2918 8.17017 20.2629 8.32608 20.2052 8.43002C20.159 8.52241 20.0608 8.5686 19.9107 8.5686H17.0524C16.9023 8.5686 16.8041 8.52241 16.7579 8.43002C16.7002 8.33763 16.6713 8.19327 16.6713 7.99694C16.6713 7.78907 16.7002 7.63316 16.7579 7.52922C16.8041 7.42528 16.9023 7.37331 17.0524 7.37331H19.9107ZM21.4705 7.37331C21.9209 7.37331 22.2789 7.25205 22.5445 7.00953C22.8217 6.767 22.9602 6.43209 22.9602 6.00479V3.61421H24.0862V6.00479C24.0862 6.82475 23.8553 7.45993 23.3933 7.91033C22.9429 8.34918 22.3251 8.5686 21.5397 8.5686H19.9114C19.7612 8.5686 19.6631 8.52241 19.6169 8.43002C19.5591 8.33763 19.5303 8.19327 19.5303 7.99694C19.5303 7.78907 19.5591 7.63316 19.6169 7.52922C19.6631 7.42528 19.7612 7.37331 19.9114 7.37331H21.4705ZM24.2595 1.39685H22.8736V0.166916H24.2595V1.39685ZM22.0594 1.39685H20.6736V0.166916H22.0594V1.39685ZM10.2553 22.2221C10.2553 22.8458 10.1571 23.429 9.96076 23.9718C9.76444 24.5261 9.48149 25.0054 9.11193 25.4096C8.74237 25.8253 8.29197 26.1545 7.76073 26.397C7.24104 26.6395 6.65206 26.7608 5.99378 26.7608H4.97172C3.67826 26.7608 2.67353 26.3624 1.95751 25.5655C1.24149 24.7686 0.883476 23.6773 0.883476 22.2914V19.2599H1.99215V22.2568C1.99215 22.7534 2.0499 23.2038 2.16538 23.608C2.29242 24.0122 2.48297 24.3587 2.73704 24.6474C3.00267 24.9476 3.3318 25.1786 3.72446 25.3403C4.11712 25.502 4.59061 25.5828 5.14495 25.5828H5.90717C6.44996 25.5828 6.92345 25.4904 7.32766 25.3056C7.73186 25.1324 8.06678 24.8957 8.3324 24.5954C8.60956 24.2951 8.81167 23.9429 8.9387 23.5387C9.07729 23.1345 9.14658 22.713 9.14658 22.2741V17.6142H10.2553V22.2221ZM6.0804 17.2331H4.62526V15.9685H6.0804V17.2331ZM14.7322 22.5686C14.4319 22.5686 14.1432 22.5282 13.866 22.4473C13.5889 22.355 13.3406 22.2048 13.1211 21.9969C12.9133 21.7891 12.7458 21.5177 12.6188 21.1828C12.4917 20.8363 12.4282 20.409 12.4282 19.9009V11.8283H13.5542V19.693C13.5542 20.178 13.6582 20.5822 13.866 20.9056C14.0855 21.2174 14.4377 21.3733 14.9227 21.3733H15.2172C15.4713 21.3733 15.5983 21.5696 15.5983 21.9623C15.5983 22.3665 15.4713 22.5686 15.2172 22.5686H14.7322ZM15.5025 21.3733C15.9529 21.3733 16.2936 21.2636 16.5246 21.0442C16.7556 20.8247 16.871 20.5303 16.871 20.1607V19.5024C16.871 18.4977 17.1251 17.7124 17.6333 17.1465C18.1529 16.5806 18.869 16.2977 19.7813 16.2977C20.2548 16.2977 20.6706 16.3727 21.0286 16.5229C21.3866 16.673 21.6811 16.8866 21.9121 17.1638C22.1546 17.441 22.3336 17.7701 22.4491 18.1512C22.5646 18.5323 22.6223 18.9539 22.6223 19.4158C22.6223 20.409 22.3625 21.1828 21.8428 21.7371C21.3231 22.2914 20.6128 22.5686 19.712 22.5686C19.2501 22.5686 18.8055 22.482 18.3781 22.3088C17.9508 22.124 17.6159 21.8006 17.3734 21.3387C17.2695 21.6043 17.1424 21.8179 16.9923 21.9796C16.8422 22.1413 16.6863 22.2683 16.5246 22.3607C16.3629 22.4416 16.1897 22.4993 16.0049 22.534C15.8317 22.5571 15.6642 22.5686 15.5025 22.5686H15.2254C15.0752 22.5686 14.9771 22.5224 14.9309 22.43C14.8731 22.3376 14.8442 22.1933 14.8442 21.9969C14.8442 21.7891 14.8731 21.6332 14.9309 21.5292C14.9771 21.4253 15.0752 21.3733 15.2254 21.3733H15.5025ZM21.5136 19.5197C21.5136 18.9192 21.3808 18.4342 21.1152 18.0646C20.8496 17.6835 20.3934 17.4929 19.7467 17.4929C18.5456 17.4929 17.9451 18.1916 17.9451 19.589C17.9451 20.178 18.1068 20.6226 18.4301 20.9229C18.765 21.2232 19.1923 21.3733 19.712 21.3733C20.301 21.3733 20.7456 21.2116 21.0459 20.8883C21.3577 20.5649 21.5136 20.1087 21.5136 19.5197Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        @endif
                                    @else
                                        <div class="not-in-stock">
                                            <p class="text-danger">ناموجود</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="product-modal-link">
                                    {{-- <form action="">
                                <div class="row align-items-center">
                                    <div class="col-sm-6">
                                        <div class="cart-counter">
                                            <input type="text" name="count" class="counter"
                                                value="1">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <button
                                            class="shadow-sm fw-bold btn-add-to-cart mt-sm-0 mt-2 waves-effect waves-light">افزودن
                                            به سبد
                                            خرید</button>
                                    </div>
                                </div>
                            </form> --}}

                                    <form action="{{ route('home.cart.add') }}" method="POST">
                                        <input type="hidden" name="product_id"
                                            value="{{ $product_normal_men->id }}">
                                        @csrf
                                        @if ($product_normal_men->quantity_check)
                                            @php
                                                if ($product_normal_men->sale_check) {
                                                    $variationProductSelected = $product_normal_men->sale_check;
                                                } else {
                                                    $variationProductSelected = $product_normal_men->price_check;
                                                }
                                            @endphp
                                            <div class="pro-details-size-color text-right" style="display: flex">
                                                <div class="pro-details-size w-50">
                                                    <span>{{ App\Models\Attribute::find($product_normal_men->variations->first()->attribute_id)->name }}</span>
                                                    <select name="variation" class="form-control variation-select"
                                                        data-id="{{ $product_normal_men->id }}">
                                                        @foreach ($product_normal_men->variations()->where('quantity', '>', 0)->get() as $variation)
                                                            <option
                                                                value="{{ json_encode($variation->only(['id', 'quantity', 'is_sale', 'sale_price', 'price'])) }}"
                                                                {{ $variationProductSelected->id == $variation->id ? 'selected' : '' }}>
                                                                {{ $variation->value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="cart-plus-minus"
                                                    style="text-align: -webkit-right;padding-right:10px">
                                                    <span>تعداد</span>
                                                    <input style="width: 100px"
                                                        class="form-control cart-plus-minus-box quantity-input"
                                                        type="text" name="qtybutton" value="1"
                                                        data-max="5" />
                                                </div>

                                            </div>
                                            <div class="pro-details-quality">

                                                <div class="pro-details-cart"
                                                    style="text-align: center;margin-right: 62px;margin-top: 12px;">
                                                    <button class="but-btn" type="submit">افزودن به سبد خرید</button>
                                                </div>

                                                <style>
                                                    .but-btn {
                                                        margin-bottom: 14px;
                                                        margin-top: 13px;
                                                        border: 1px solid #6666ff;
                                                        background: #6666ff !important;
                                                        color: white !important;
                                                        padding: 5px;
                                                        width: 160px;
                                                        transition: all .3s ease-in-out;
                                                        border-radius: 50px;
                                                        box-shadow: 1px 2px 13px rgba(101, 72, 164, 0.5);
                                                    }

                                                    .but-btn:hover {
                                                        margin-bottom: 14px;
                                                        margin-top: 13px;
                                                        border: 1px solid #6666ff;
                                                        background: white !important;
                                                        padding: 5px;
                                                        width: 160px;
                                                        color: rgb(68, 68, 68) !important;
                                                        transition: all .3s ease-in-out;

                                                    }
                                                </style>




                                                <div class="pro-details-wishlist">
                                                    @auth
                                                        @if ($product_normal_men->checkUserWishlist(auth()->id()))
                                                            <a
                                                                href="{{ route('home.wishlist.remove', ['product' => $product_normal_men->id]) }}"><i
                                                                    class="fas fa-heart" style="color:red"></i>
                                                            </a>
                                                        @else
                                                            <a
                                                                href="{{ route('home.wishlist.add', ['product' => $product_normal_men->id]) }}"><i
                                                                    class="sli sli-heart"></i>
                                                            </a>
                                                        @endif
                                                    @else
                                                        <a
                                                            href="{{ route('home.wishlist.add', ['product' => $product_normal_men->id]) }}"><i
                                                                class="sli sli-heart"></i>
                                                        </a>
                                                    @endauth
                                                </div>
                                                <div class="pro-details-compare">
                                                    <a title="Add To Compare" href="#"><i
                                                            class="sli sli-refresh"></i></a>
                                                </div>
                                            </div>
                                        @else
                                            <div class="not-in-stock">
                                                <p class="text-white">ناموجود</p>
                                            </div>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    @foreach ($product_normal_womens as $product_normal_women)
        <div class="modal fade modal-lg product-modal" id="productModal-{{ $product_normal_women->id }}"
            tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title">
                            <a href="">
                                <div class="d-flex">
                                    <i class="bi bi-bag-plus me-1"></i>
                                    <h4>{{ $product_normal_women->name }}
                                    </h4>
                                </div>
                            </a>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5 mb-md-0 mb-2">
                                <div class="swiper product-modal">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="{{ asset('/upload/files/products/images/' . $product_normal_women->primary_image) }}"
                                                alt="" class="img-fluid">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ asset('/upload/files/products/images/' . $product_normal_women->primary_image) }}"
                                                alt="" class="img-fluid">
                                        </div>

                                    </div>
                                    <div class="swiper-button-next sb"></div>
                                    <div class="swiper-button-prev sb"></div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="product-modal-detail">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <span class="product-meta-item text-muted">
                                                <i class="bi bi-tag"></i>
                                                دسته بندی:
                                                <a
                                                    href="">{{ $product_normal_women->category->parent->name }}</a>,
                                                <a href="">{{ $product_normal_women->category->name }}</a>,


                                            </span>
                                        </div>

                                        <div class="col-md-6">
                                            <span class="product-meta-item text-muted">
                                                <i class="bi bi-tag"></i>
                                                برچسب:
                                                @foreach ($product_normal_women->tags as $tag)
                                                    <a href="">{{ $tag->name }}
                                                        {{ $loop->last ? '' : ',' }}</a>,
                                                @endforeach
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-modal-feature">
                                    <strong>ویژگی های محصول:</strong>
                                    <ul>
                                        @foreach ($product_normal_women->attributes()->with('attribute')->get()->take(5) as $attribute)
                                            <li>
                                                <span class="title">{{ $attribute->attribute->name }} :</span>
                                                <span class="desc">{{ $attribute->value }}</span>
                                            </li>
                                        @endforeach

                                    </ul>
                                    <label for="post-2" class="read-more-trigger"></label>
                                </div>
                                <div class="variation-price-{{ $product_normal_women->id }}"
                                    style="color: #6666ff;text-align: right;font-size: 21px;margin: 9px;">
                                    @if ($product_normal_women->quantity_check)
                                        @if ($product_normal_women->sale_check)
                                            <style>
                                                .variation-price {
                                                    display: flex
                                                }

                                                .new {
                                                    color: #6666ff;
                                                    font-size: 20px;

                                                }
                                            </style>
                                            <span class="new">
                                                {{ number_format($product_normal_women->sale_check->sale_price) }}
                                                <svg class="mr-2" width="20" height="22"
                                                    viewBox="0 0 25 27" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.52917 11.5828C3.03731 11.5828 3.48194 11.502 3.86304 11.3403C4.2557 11.1786 4.58484 10.9592 4.85046 10.682C5.11608 10.4048 5.31818 10.0815 5.45677 9.71193C5.59535 9.35392 5.67619 8.97281 5.69929 8.5686H3.96698C3.378 8.5686 2.89295 8.50509 2.51184 8.37805C2.13074 8.25101 1.83047 8.06623 1.61105 7.82371C1.39162 7.58119 1.23571 7.29247 1.14332 6.95756C1.06248 6.6111 1.02206 6.22422 1.02206 5.79691C1.02206 5.35806 1.08558 4.94231 1.21261 4.54965C1.33965 4.157 1.52443 3.81053 1.76695 3.51027C2.00948 3.21 2.30974 2.97325 2.66775 2.80002C3.03731 2.61524 3.45884 2.52285 3.93234 2.52285C4.31344 2.52285 4.67723 2.58637 5.02369 2.71341C5.37015 2.84044 5.67619 3.04254 5.94181 3.31971C6.20743 3.58533 6.41531 3.93757 6.56544 4.37642C6.72712 4.80372 6.80797 5.32342 6.80797 5.9355V7.37331H8.47098C8.60956 7.37331 8.70195 7.42528 8.74815 7.52922C8.80589 7.62161 8.83476 7.76597 8.83476 7.9623C8.83476 8.17017 8.80589 8.32608 8.74815 8.43002C8.70195 8.52241 8.60956 8.5686 8.47098 8.5686H6.77332C6.75022 9.13449 6.63474 9.67151 6.42686 10.1796C6.23053 10.6878 5.95336 11.1324 5.59535 11.5135C5.23734 11.8946 4.81004 12.1949 4.31344 12.4143C3.81685 12.6453 3.25674 12.7608 2.63311 12.7608H0.796861L0.692923 11.5828H2.52917ZM2.09609 5.72762C2.09609 6.01634 2.12496 6.26464 2.18271 6.47251C2.252 6.68039 2.36171 6.85362 2.51184 6.9922C2.67353 7.11924 2.88718 7.2174 3.1528 7.2867C3.41842 7.34444 3.75333 7.37331 4.15754 7.37331H5.71661V6.07408C5.71661 5.21948 5.54916 4.6074 5.21424 4.23784C4.87933 3.86828 4.41738 3.6835 3.8284 3.6835C3.27406 3.6835 2.84676 3.86828 2.54649 4.23784C2.24622 4.6074 2.09609 5.10399 2.09609 5.72762ZM11.3338 7.37331C11.4839 7.37331 11.582 7.42528 11.6282 7.52922C11.686 7.62161 11.7149 7.76597 11.7149 7.9623C11.7149 8.17017 11.686 8.32608 11.6282 8.43002C11.582 8.52241 11.4839 8.5686 11.3338 8.5686H8.47545C8.32531 8.5686 8.22715 8.52241 8.18095 8.43002C8.12321 8.33763 8.09434 8.19327 8.09434 7.99694C8.09434 7.78907 8.12321 7.63316 8.18095 7.52922C8.22715 7.42528 8.32531 7.37331 8.47545 7.37331H11.3338ZM14.1927 7.37331C14.3429 7.37331 14.441 7.42528 14.4872 7.52922C14.545 7.62161 14.5738 7.76597 14.5738 7.9623C14.5738 8.17017 14.545 8.32608 14.4872 8.43002C14.441 8.52241 14.3429 8.5686 14.1927 8.5686H11.3344C11.1843 8.5686 11.0861 8.52241 11.0399 8.43002C10.9822 8.33763 10.9533 8.19327 10.9533 7.99694C10.9533 7.78907 10.9822 7.63316 11.0399 7.52922C11.0861 7.42528 11.1843 7.37331 11.3344 7.37331H14.1927ZM17.0517 7.37331C17.2019 7.37331 17.3 7.42528 17.3462 7.52922C17.404 7.62161 17.4328 7.76597 17.4328 7.9623C17.4328 8.17017 17.404 8.32608 17.3462 8.43002C17.3 8.52241 17.2019 8.5686 17.0517 8.5686H14.1934C14.0433 8.5686 13.9451 8.52241 13.8989 8.43002C13.8412 8.33763 13.8123 8.19327 13.8123 7.99694C13.8123 7.78907 13.8412 7.63316 13.8989 7.52922C13.9451 7.42528 14.0433 7.37331 14.1934 7.37331H17.0517ZM19.9107 7.37331C20.0608 7.37331 20.159 7.42528 20.2052 7.52922C20.2629 7.62161 20.2918 7.76597 20.2918 7.9623C20.2918 8.17017 20.2629 8.32608 20.2052 8.43002C20.159 8.52241 20.0608 8.5686 19.9107 8.5686H17.0524C16.9023 8.5686 16.8041 8.52241 16.7579 8.43002C16.7002 8.33763 16.6713 8.19327 16.6713 7.99694C16.6713 7.78907 16.7002 7.63316 16.7579 7.52922C16.8041 7.42528 16.9023 7.37331 17.0524 7.37331H19.9107ZM21.4705 7.37331C21.9209 7.37331 22.2789 7.25205 22.5445 7.00953C22.8217 6.767 22.9602 6.43209 22.9602 6.00479V3.61421H24.0862V6.00479C24.0862 6.82475 23.8553 7.45993 23.3933 7.91033C22.9429 8.34918 22.3251 8.5686 21.5397 8.5686H19.9114C19.7612 8.5686 19.6631 8.52241 19.6169 8.43002C19.5591 8.33763 19.5303 8.19327 19.5303 7.99694C19.5303 7.78907 19.5591 7.63316 19.6169 7.52922C19.6631 7.42528 19.7612 7.37331 19.9114 7.37331H21.4705ZM24.2595 1.39685H22.8736V0.166916H24.2595V1.39685ZM22.0594 1.39685H20.6736V0.166916H22.0594V1.39685ZM10.2553 22.2221C10.2553 22.8458 10.1571 23.429 9.96076 23.9718C9.76444 24.5261 9.48149 25.0054 9.11193 25.4096C8.74237 25.8253 8.29197 26.1545 7.76073 26.397C7.24104 26.6395 6.65206 26.7608 5.99378 26.7608H4.97172C3.67826 26.7608 2.67353 26.3624 1.95751 25.5655C1.24149 24.7686 0.883476 23.6773 0.883476 22.2914V19.2599H1.99215V22.2568C1.99215 22.7534 2.0499 23.2038 2.16538 23.608C2.29242 24.0122 2.48297 24.3587 2.73704 24.6474C3.00267 24.9476 3.3318 25.1786 3.72446 25.3403C4.11712 25.502 4.59061 25.5828 5.14495 25.5828H5.90717C6.44996 25.5828 6.92345 25.4904 7.32766 25.3056C7.73186 25.1324 8.06678 24.8957 8.3324 24.5954C8.60956 24.2951 8.81167 23.9429 8.9387 23.5387C9.07729 23.1345 9.14658 22.713 9.14658 22.2741V17.6142H10.2553V22.2221ZM6.0804 17.2331H4.62526V15.9685H6.0804V17.2331ZM14.7322 22.5686C14.4319 22.5686 14.1432 22.5282 13.866 22.4473C13.5889 22.355 13.3406 22.2048 13.1211 21.9969C12.9133 21.7891 12.7458 21.5177 12.6188 21.1828C12.4917 20.8363 12.4282 20.409 12.4282 19.9009V11.8283H13.5542V19.693C13.5542 20.178 13.6582 20.5822 13.866 20.9056C14.0855 21.2174 14.4377 21.3733 14.9227 21.3733H15.2172C15.4713 21.3733 15.5983 21.5696 15.5983 21.9623C15.5983 22.3665 15.4713 22.5686 15.2172 22.5686H14.7322ZM15.5025 21.3733C15.9529 21.3733 16.2936 21.2636 16.5246 21.0442C16.7556 20.8247 16.871 20.5303 16.871 20.1607V19.5024C16.871 18.4977 17.1251 17.7124 17.6333 17.1465C18.1529 16.5806 18.869 16.2977 19.7813 16.2977C20.2548 16.2977 20.6706 16.3727 21.0286 16.5229C21.3866 16.673 21.6811 16.8866 21.9121 17.1638C22.1546 17.441 22.3336 17.7701 22.4491 18.1512C22.5646 18.5323 22.6223 18.9539 22.6223 19.4158C22.6223 20.409 22.3625 21.1828 21.8428 21.7371C21.3231 22.2914 20.6128 22.5686 19.712 22.5686C19.2501 22.5686 18.8055 22.482 18.3781 22.3088C17.9508 22.124 17.6159 21.8006 17.3734 21.3387C17.2695 21.6043 17.1424 21.8179 16.9923 21.9796C16.8422 22.1413 16.6863 22.2683 16.5246 22.3607C16.3629 22.4416 16.1897 22.4993 16.0049 22.534C15.8317 22.5571 15.6642 22.5686 15.5025 22.5686H15.2254C15.0752 22.5686 14.9771 22.5224 14.9309 22.43C14.8731 22.3376 14.8442 22.1933 14.8442 21.9969C14.8442 21.7891 14.8731 21.6332 14.9309 21.5292C14.9771 21.4253 15.0752 21.3733 15.2254 21.3733H15.5025ZM21.5136 19.5197C21.5136 18.9192 21.3808 18.4342 21.1152 18.0646C20.8496 17.6835 20.3934 17.4929 19.7467 17.4929C18.5456 17.4929 17.9451 18.1916 17.9451 19.589C17.9451 20.178 18.1068 20.6226 18.4301 20.9229C18.765 21.2232 19.1923 21.3733 19.712 21.3733C20.301 21.3733 20.7456 21.2116 21.0459 20.8883C21.3577 20.5649 21.5136 20.1087 21.5136 19.5197Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <del>
                                                <span class="old"
                                                    style="font-size: 18px;color: #a1a1a1;padding-right: 5px;">
                                                    {{ number_format($product_normal_women->sale_check->price) }}
                                                    <svg class="mr-2" width="20" height="22"
                                                        viewBox="0 0 25 27" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M2.52917 11.5828C3.03731 11.5828 3.48194 11.502 3.86304 11.3403C4.2557 11.1786 4.58484 10.9592 4.85046 10.682C5.11608 10.4048 5.31818 10.0815 5.45677 9.71193C5.59535 9.35392 5.67619 8.97281 5.69929 8.5686H3.96698C3.378 8.5686 2.89295 8.50509 2.51184 8.37805C2.13074 8.25101 1.83047 8.06623 1.61105 7.82371C1.39162 7.58119 1.23571 7.29247 1.14332 6.95756C1.06248 6.6111 1.02206 6.22422 1.02206 5.79691C1.02206 5.35806 1.08558 4.94231 1.21261 4.54965C1.33965 4.157 1.52443 3.81053 1.76695 3.51027C2.00948 3.21 2.30974 2.97325 2.66775 2.80002C3.03731 2.61524 3.45884 2.52285 3.93234 2.52285C4.31344 2.52285 4.67723 2.58637 5.02369 2.71341C5.37015 2.84044 5.67619 3.04254 5.94181 3.31971C6.20743 3.58533 6.41531 3.93757 6.56544 4.37642C6.72712 4.80372 6.80797 5.32342 6.80797 5.9355V7.37331H8.47098C8.60956 7.37331 8.70195 7.42528 8.74815 7.52922C8.80589 7.62161 8.83476 7.76597 8.83476 7.9623C8.83476 8.17017 8.80589 8.32608 8.74815 8.43002C8.70195 8.52241 8.60956 8.5686 8.47098 8.5686H6.77332C6.75022 9.13449 6.63474 9.67151 6.42686 10.1796C6.23053 10.6878 5.95336 11.1324 5.59535 11.5135C5.23734 11.8946 4.81004 12.1949 4.31344 12.4143C3.81685 12.6453 3.25674 12.7608 2.63311 12.7608H0.796861L0.692923 11.5828H2.52917ZM2.09609 5.72762C2.09609 6.01634 2.12496 6.26464 2.18271 6.47251C2.252 6.68039 2.36171 6.85362 2.51184 6.9922C2.67353 7.11924 2.88718 7.2174 3.1528 7.2867C3.41842 7.34444 3.75333 7.37331 4.15754 7.37331H5.71661V6.07408C5.71661 5.21948 5.54916 4.6074 5.21424 4.23784C4.87933 3.86828 4.41738 3.6835 3.8284 3.6835C3.27406 3.6835 2.84676 3.86828 2.54649 4.23784C2.24622 4.6074 2.09609 5.10399 2.09609 5.72762ZM11.3338 7.37331C11.4839 7.37331 11.582 7.42528 11.6282 7.52922C11.686 7.62161 11.7149 7.76597 11.7149 7.9623C11.7149 8.17017 11.686 8.32608 11.6282 8.43002C11.582 8.52241 11.4839 8.5686 11.3338 8.5686H8.47545C8.32531 8.5686 8.22715 8.52241 8.18095 8.43002C8.12321 8.33763 8.09434 8.19327 8.09434 7.99694C8.09434 7.78907 8.12321 7.63316 8.18095 7.52922C8.22715 7.42528 8.32531 7.37331 8.47545 7.37331H11.3338ZM14.1927 7.37331C14.3429 7.37331 14.441 7.42528 14.4872 7.52922C14.545 7.62161 14.5738 7.76597 14.5738 7.9623C14.5738 8.17017 14.545 8.32608 14.4872 8.43002C14.441 8.52241 14.3429 8.5686 14.1927 8.5686H11.3344C11.1843 8.5686 11.0861 8.52241 11.0399 8.43002C10.9822 8.33763 10.9533 8.19327 10.9533 7.99694C10.9533 7.78907 10.9822 7.63316 11.0399 7.52922C11.0861 7.42528 11.1843 7.37331 11.3344 7.37331H14.1927ZM17.0517 7.37331C17.2019 7.37331 17.3 7.42528 17.3462 7.52922C17.404 7.62161 17.4328 7.76597 17.4328 7.9623C17.4328 8.17017 17.404 8.32608 17.3462 8.43002C17.3 8.52241 17.2019 8.5686 17.0517 8.5686H14.1934C14.0433 8.5686 13.9451 8.52241 13.8989 8.43002C13.8412 8.33763 13.8123 8.19327 13.8123 7.99694C13.8123 7.78907 13.8412 7.63316 13.8989 7.52922C13.9451 7.42528 14.0433 7.37331 14.1934 7.37331H17.0517ZM19.9107 7.37331C20.0608 7.37331 20.159 7.42528 20.2052 7.52922C20.2629 7.62161 20.2918 7.76597 20.2918 7.9623C20.2918 8.17017 20.2629 8.32608 20.2052 8.43002C20.159 8.52241 20.0608 8.5686 19.9107 8.5686H17.0524C16.9023 8.5686 16.8041 8.52241 16.7579 8.43002C16.7002 8.33763 16.6713 8.19327 16.6713 7.99694C16.6713 7.78907 16.7002 7.63316 16.7579 7.52922C16.8041 7.42528 16.9023 7.37331 17.0524 7.37331H19.9107ZM21.4705 7.37331C21.9209 7.37331 22.2789 7.25205 22.5445 7.00953C22.8217 6.767 22.9602 6.43209 22.9602 6.00479V3.61421H24.0862V6.00479C24.0862 6.82475 23.8553 7.45993 23.3933 7.91033C22.9429 8.34918 22.3251 8.5686 21.5397 8.5686H19.9114C19.7612 8.5686 19.6631 8.52241 19.6169 8.43002C19.5591 8.33763 19.5303 8.19327 19.5303 7.99694C19.5303 7.78907 19.5591 7.63316 19.6169 7.52922C19.6631 7.42528 19.7612 7.37331 19.9114 7.37331H21.4705ZM24.2595 1.39685H22.8736V0.166916H24.2595V1.39685ZM22.0594 1.39685H20.6736V0.166916H22.0594V1.39685ZM10.2553 22.2221C10.2553 22.8458 10.1571 23.429 9.96076 23.9718C9.76444 24.5261 9.48149 25.0054 9.11193 25.4096C8.74237 25.8253 8.29197 26.1545 7.76073 26.397C7.24104 26.6395 6.65206 26.7608 5.99378 26.7608H4.97172C3.67826 26.7608 2.67353 26.3624 1.95751 25.5655C1.24149 24.7686 0.883476 23.6773 0.883476 22.2914V19.2599H1.99215V22.2568C1.99215 22.7534 2.0499 23.2038 2.16538 23.608C2.29242 24.0122 2.48297 24.3587 2.73704 24.6474C3.00267 24.9476 3.3318 25.1786 3.72446 25.3403C4.11712 25.502 4.59061 25.5828 5.14495 25.5828H5.90717C6.44996 25.5828 6.92345 25.4904 7.32766 25.3056C7.73186 25.1324 8.06678 24.8957 8.3324 24.5954C8.60956 24.2951 8.81167 23.9429 8.9387 23.5387C9.07729 23.1345 9.14658 22.713 9.14658 22.2741V17.6142H10.2553V22.2221ZM6.0804 17.2331H4.62526V15.9685H6.0804V17.2331ZM14.7322 22.5686C14.4319 22.5686 14.1432 22.5282 13.866 22.4473C13.5889 22.355 13.3406 22.2048 13.1211 21.9969C12.9133 21.7891 12.7458 21.5177 12.6188 21.1828C12.4917 20.8363 12.4282 20.409 12.4282 19.9009V11.8283H13.5542V19.693C13.5542 20.178 13.6582 20.5822 13.866 20.9056C14.0855 21.2174 14.4377 21.3733 14.9227 21.3733H15.2172C15.4713 21.3733 15.5983 21.5696 15.5983 21.9623C15.5983 22.3665 15.4713 22.5686 15.2172 22.5686H14.7322ZM15.5025 21.3733C15.9529 21.3733 16.2936 21.2636 16.5246 21.0442C16.7556 20.8247 16.871 20.5303 16.871 20.1607V19.5024C16.871 18.4977 17.1251 17.7124 17.6333 17.1465C18.1529 16.5806 18.869 16.2977 19.7813 16.2977C20.2548 16.2977 20.6706 16.3727 21.0286 16.5229C21.3866 16.673 21.6811 16.8866 21.9121 17.1638C22.1546 17.441 22.3336 17.7701 22.4491 18.1512C22.5646 18.5323 22.6223 18.9539 22.6223 19.4158C22.6223 20.409 22.3625 21.1828 21.8428 21.7371C21.3231 22.2914 20.6128 22.5686 19.712 22.5686C19.2501 22.5686 18.8055 22.482 18.3781 22.3088C17.9508 22.124 17.6159 21.8006 17.3734 21.3387C17.2695 21.6043 17.1424 21.8179 16.9923 21.9796C16.8422 22.1413 16.6863 22.2683 16.5246 22.3607C16.3629 22.4416 16.1897 22.4993 16.0049 22.534C15.8317 22.5571 15.6642 22.5686 15.5025 22.5686H15.2254C15.0752 22.5686 14.9771 22.5224 14.9309 22.43C14.8731 22.3376 14.8442 22.1933 14.8442 21.9969C14.8442 21.7891 14.8731 21.6332 14.9309 21.5292C14.9771 21.4253 15.0752 21.3733 15.2254 21.3733H15.5025ZM21.5136 19.5197C21.5136 18.9192 21.3808 18.4342 21.1152 18.0646C20.8496 17.6835 20.3934 17.4929 19.7467 17.4929C18.5456 17.4929 17.9451 18.1916 17.9451 19.589C17.9451 20.178 18.1068 20.6226 18.4301 20.9229C18.765 21.2232 19.1923 21.3733 19.712 21.3733C20.301 21.3733 20.7456 21.2116 21.0459 20.8883C21.3577 20.5649 21.5136 20.1087 21.5136 19.5197Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                            </del>
                                        @else
                                            <span class="new">
                                                {{ number_format($product_normal_women->quantity_check->price) }}
                                                <svg class="mr-2" width="20" height="22"
                                                    viewBox="0 0 25 27" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.52917 11.5828C3.03731 11.5828 3.48194 11.502 3.86304 11.3403C4.2557 11.1786 4.58484 10.9592 4.85046 10.682C5.11608 10.4048 5.31818 10.0815 5.45677 9.71193C5.59535 9.35392 5.67619 8.97281 5.69929 8.5686H3.96698C3.378 8.5686 2.89295 8.50509 2.51184 8.37805C2.13074 8.25101 1.83047 8.06623 1.61105 7.82371C1.39162 7.58119 1.23571 7.29247 1.14332 6.95756C1.06248 6.6111 1.02206 6.22422 1.02206 5.79691C1.02206 5.35806 1.08558 4.94231 1.21261 4.54965C1.33965 4.157 1.52443 3.81053 1.76695 3.51027C2.00948 3.21 2.30974 2.97325 2.66775 2.80002C3.03731 2.61524 3.45884 2.52285 3.93234 2.52285C4.31344 2.52285 4.67723 2.58637 5.02369 2.71341C5.37015 2.84044 5.67619 3.04254 5.94181 3.31971C6.20743 3.58533 6.41531 3.93757 6.56544 4.37642C6.72712 4.80372 6.80797 5.32342 6.80797 5.9355V7.37331H8.47098C8.60956 7.37331 8.70195 7.42528 8.74815 7.52922C8.80589 7.62161 8.83476 7.76597 8.83476 7.9623C8.83476 8.17017 8.80589 8.32608 8.74815 8.43002C8.70195 8.52241 8.60956 8.5686 8.47098 8.5686H6.77332C6.75022 9.13449 6.63474 9.67151 6.42686 10.1796C6.23053 10.6878 5.95336 11.1324 5.59535 11.5135C5.23734 11.8946 4.81004 12.1949 4.31344 12.4143C3.81685 12.6453 3.25674 12.7608 2.63311 12.7608H0.796861L0.692923 11.5828H2.52917ZM2.09609 5.72762C2.09609 6.01634 2.12496 6.26464 2.18271 6.47251C2.252 6.68039 2.36171 6.85362 2.51184 6.9922C2.67353 7.11924 2.88718 7.2174 3.1528 7.2867C3.41842 7.34444 3.75333 7.37331 4.15754 7.37331H5.71661V6.07408C5.71661 5.21948 5.54916 4.6074 5.21424 4.23784C4.87933 3.86828 4.41738 3.6835 3.8284 3.6835C3.27406 3.6835 2.84676 3.86828 2.54649 4.23784C2.24622 4.6074 2.09609 5.10399 2.09609 5.72762ZM11.3338 7.37331C11.4839 7.37331 11.582 7.42528 11.6282 7.52922C11.686 7.62161 11.7149 7.76597 11.7149 7.9623C11.7149 8.17017 11.686 8.32608 11.6282 8.43002C11.582 8.52241 11.4839 8.5686 11.3338 8.5686H8.47545C8.32531 8.5686 8.22715 8.52241 8.18095 8.43002C8.12321 8.33763 8.09434 8.19327 8.09434 7.99694C8.09434 7.78907 8.12321 7.63316 8.18095 7.52922C8.22715 7.42528 8.32531 7.37331 8.47545 7.37331H11.3338ZM14.1927 7.37331C14.3429 7.37331 14.441 7.42528 14.4872 7.52922C14.545 7.62161 14.5738 7.76597 14.5738 7.9623C14.5738 8.17017 14.545 8.32608 14.4872 8.43002C14.441 8.52241 14.3429 8.5686 14.1927 8.5686H11.3344C11.1843 8.5686 11.0861 8.52241 11.0399 8.43002C10.9822 8.33763 10.9533 8.19327 10.9533 7.99694C10.9533 7.78907 10.9822 7.63316 11.0399 7.52922C11.0861 7.42528 11.1843 7.37331 11.3344 7.37331H14.1927ZM17.0517 7.37331C17.2019 7.37331 17.3 7.42528 17.3462 7.52922C17.404 7.62161 17.4328 7.76597 17.4328 7.9623C17.4328 8.17017 17.404 8.32608 17.3462 8.43002C17.3 8.52241 17.2019 8.5686 17.0517 8.5686H14.1934C14.0433 8.5686 13.9451 8.52241 13.8989 8.43002C13.8412 8.33763 13.8123 8.19327 13.8123 7.99694C13.8123 7.78907 13.8412 7.63316 13.8989 7.52922C13.9451 7.42528 14.0433 7.37331 14.1934 7.37331H17.0517ZM19.9107 7.37331C20.0608 7.37331 20.159 7.42528 20.2052 7.52922C20.2629 7.62161 20.2918 7.76597 20.2918 7.9623C20.2918 8.17017 20.2629 8.32608 20.2052 8.43002C20.159 8.52241 20.0608 8.5686 19.9107 8.5686H17.0524C16.9023 8.5686 16.8041 8.52241 16.7579 8.43002C16.7002 8.33763 16.6713 8.19327 16.6713 7.99694C16.6713 7.78907 16.7002 7.63316 16.7579 7.52922C16.8041 7.42528 16.9023 7.37331 17.0524 7.37331H19.9107ZM21.4705 7.37331C21.9209 7.37331 22.2789 7.25205 22.5445 7.00953C22.8217 6.767 22.9602 6.43209 22.9602 6.00479V3.61421H24.0862V6.00479C24.0862 6.82475 23.8553 7.45993 23.3933 7.91033C22.9429 8.34918 22.3251 8.5686 21.5397 8.5686H19.9114C19.7612 8.5686 19.6631 8.52241 19.6169 8.43002C19.5591 8.33763 19.5303 8.19327 19.5303 7.99694C19.5303 7.78907 19.5591 7.63316 19.6169 7.52922C19.6631 7.42528 19.7612 7.37331 19.9114 7.37331H21.4705ZM24.2595 1.39685H22.8736V0.166916H24.2595V1.39685ZM22.0594 1.39685H20.6736V0.166916H22.0594V1.39685ZM10.2553 22.2221C10.2553 22.8458 10.1571 23.429 9.96076 23.9718C9.76444 24.5261 9.48149 25.0054 9.11193 25.4096C8.74237 25.8253 8.29197 26.1545 7.76073 26.397C7.24104 26.6395 6.65206 26.7608 5.99378 26.7608H4.97172C3.67826 26.7608 2.67353 26.3624 1.95751 25.5655C1.24149 24.7686 0.883476 23.6773 0.883476 22.2914V19.2599H1.99215V22.2568C1.99215 22.7534 2.0499 23.2038 2.16538 23.608C2.29242 24.0122 2.48297 24.3587 2.73704 24.6474C3.00267 24.9476 3.3318 25.1786 3.72446 25.3403C4.11712 25.502 4.59061 25.5828 5.14495 25.5828H5.90717C6.44996 25.5828 6.92345 25.4904 7.32766 25.3056C7.73186 25.1324 8.06678 24.8957 8.3324 24.5954C8.60956 24.2951 8.81167 23.9429 8.9387 23.5387C9.07729 23.1345 9.14658 22.713 9.14658 22.2741V17.6142H10.2553V22.2221ZM6.0804 17.2331H4.62526V15.9685H6.0804V17.2331ZM14.7322 22.5686C14.4319 22.5686 14.1432 22.5282 13.866 22.4473C13.5889 22.355 13.3406 22.2048 13.1211 21.9969C12.9133 21.7891 12.7458 21.5177 12.6188 21.1828C12.4917 20.8363 12.4282 20.409 12.4282 19.9009V11.8283H13.5542V19.693C13.5542 20.178 13.6582 20.5822 13.866 20.9056C14.0855 21.2174 14.4377 21.3733 14.9227 21.3733H15.2172C15.4713 21.3733 15.5983 21.5696 15.5983 21.9623C15.5983 22.3665 15.4713 22.5686 15.2172 22.5686H14.7322ZM15.5025 21.3733C15.9529 21.3733 16.2936 21.2636 16.5246 21.0442C16.7556 20.8247 16.871 20.5303 16.871 20.1607V19.5024C16.871 18.4977 17.1251 17.7124 17.6333 17.1465C18.1529 16.5806 18.869 16.2977 19.7813 16.2977C20.2548 16.2977 20.6706 16.3727 21.0286 16.5229C21.3866 16.673 21.6811 16.8866 21.9121 17.1638C22.1546 17.441 22.3336 17.7701 22.4491 18.1512C22.5646 18.5323 22.6223 18.9539 22.6223 19.4158C22.6223 20.409 22.3625 21.1828 21.8428 21.7371C21.3231 22.2914 20.6128 22.5686 19.712 22.5686C19.2501 22.5686 18.8055 22.482 18.3781 22.3088C17.9508 22.124 17.6159 21.8006 17.3734 21.3387C17.2695 21.6043 17.1424 21.8179 16.9923 21.9796C16.8422 22.1413 16.6863 22.2683 16.5246 22.3607C16.3629 22.4416 16.1897 22.4993 16.0049 22.534C15.8317 22.5571 15.6642 22.5686 15.5025 22.5686H15.2254C15.0752 22.5686 14.9771 22.5224 14.9309 22.43C14.8731 22.3376 14.8442 22.1933 14.8442 21.9969C14.8442 21.7891 14.8731 21.6332 14.9309 21.5292C14.9771 21.4253 15.0752 21.3733 15.2254 21.3733H15.5025ZM21.5136 19.5197C21.5136 18.9192 21.3808 18.4342 21.1152 18.0646C20.8496 17.6835 20.3934 17.4929 19.7467 17.4929C18.5456 17.4929 17.9451 18.1916 17.9451 19.589C17.9451 20.178 18.1068 20.6226 18.4301 20.9229C18.765 21.2232 19.1923 21.3733 19.712 21.3733C20.301 21.3733 20.7456 21.2116 21.0459 20.8883C21.3577 20.5649 21.5136 20.1087 21.5136 19.5197Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        @endif
                                    @else
                                        <div class="not-in-stock">
                                            <p class="text-danger">ناموجود</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="product-modal-link">
                                    {{-- <form action="">
                                <div class="row align-items-center">
                                    <div class="col-sm-6">
                                        <div class="cart-counter">
                                            <input type="text" name="count" class="counter"
                                                value="1">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <button
                                            class="shadow-sm fw-bold btn-add-to-cart mt-sm-0 mt-2 waves-effect waves-light">افزودن
                                            به سبد
                                            خرید</button>
                                    </div>
                                </div>
                            </form> --}}

                                    <form action="{{ route('home.cart.add') }}" method="POST">
                                        <input type="hidden" name="product_id"
                                            value="{{ $product_normal_women->id }}">
                                        @csrf
                                        @if ($product_normal_women->quantity_check)
                                            @php
                                                if ($product_normal_women->sale_check) {
                                                    $variationProductSelected = $product_normal_women->sale_check;
                                                } else {
                                                    $variationProductSelected = $product_normal_women->price_check;
                                                }
                                            @endphp
                                            <div class="pro-details-size-color text-right" style="display: flex">
                                                <div class="pro-details-size w-50">
                                                    <span>{{ App\Models\Attribute::find($product_normal_women->variations->first()->attribute_id)->name }}</span>
                                                    <select name="variation" class="form-control variation-select"
                                                        data-id="{{ $product_normal_women->id }}">
                                                        @foreach ($product_normal_women->variations()->where('quantity', '>', 0)->get() as $variation)
                                                            <option
                                                                value="{{ json_encode($variation->only(['id', 'quantity', 'is_sale', 'sale_price', 'price'])) }}"
                                                                {{ $variationProductSelected->id == $variation->id ? 'selected' : '' }}>
                                                                {{ $variation->value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="cart-plus-minus"
                                                    style="text-align: -webkit-right;padding-right:10px">
                                                    <span>تعداد</span>
                                                    <input style="width: 100px"
                                                        class="form-control cart-plus-minus-box quantity-input"
                                                        type="text" name="qtybutton" value="1"
                                                        data-max="5" />
                                                </div>

                                            </div>
                                            <div class="pro-details-quality">

                                                <div class="pro-details-cart"
                                                    style="text-align: center;margin-right: 62px;margin-top: 12px;">
                                                    <button class="but-btn" type="submit">افزودن به سبد خرید</button>
                                                </div>

                                                <style>
                                                    .but-btn {
                                                        margin-bottom: 14px;
                                                        margin-top: 13px;
                                                        border: 1px solid #6666ff;
                                                        background: #6666ff !important;
                                                        color: white !important;
                                                        padding: 5px;
                                                        width: 160px;
                                                        transition: all .3s ease-in-out;
                                                        border-radius: 50px;
                                                        box-shadow: 1px 2px 13px rgba(101, 72, 164, 0.5);
                                                    }

                                                    .but-btn:hover {
                                                        margin-bottom: 14px;
                                                        margin-top: 13px;
                                                        border: 1px solid #6666ff;
                                                        background: white !important;
                                                        padding: 5px;
                                                        width: 160px;
                                                        color: rgb(68, 68, 68) !important;
                                                        transition: all .3s ease-in-out;

                                                    }
                                                </style>




                                                <div class="pro-details-wishlist">
                                                    @auth
                                                        @if ($product_normal_women->checkUserWishlist(auth()->id()))
                                                            <a
                                                                href="{{ route('home.wishlist.remove', ['product' => $product_normal_women->id]) }}"><i
                                                                    class="fas fa-heart" style="color:red"></i>
                                                            </a>
                                                        @else
                                                            <a
                                                                href="{{ route('home.wishlist.add', ['product' => $product_normal_women->id]) }}"><i
                                                                    class="sli sli-heart"></i>
                                                            </a>
                                                        @endif
                                                    @else
                                                        <a
                                                            href="{{ route('home.wishlist.add', ['product' => $product_normal_women->id]) }}"><i
                                                                class="sli sli-heart"></i>
                                                        </a>
                                                    @endauth
                                                </div>
                                                <div class="pro-details-compare">
                                                    <a title="Add To Compare" href="#"><i
                                                            class="sli sli-refresh"></i></a>
                                                </div>
                                            </div>
                                        @else
                                            <div class="not-in-stock">
                                                <p class="text-white">ناموجود</p>
                                            </div>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <style>
        .float-contact .icon {
            padding-top: 10px;
        }
    </style>

@endsection
