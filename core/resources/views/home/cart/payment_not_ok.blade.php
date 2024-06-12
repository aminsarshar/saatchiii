@extends('home.layouts.home')
<link rel="stylesheet" href="{{asset('assets/css/style-1.css')}}">
@section('title')
    صفحه ای سبد خرید
@endsection

@section('content')
<div class="content">
    <div class="line-steps">
        <div class="container-fluid">
            <div class="line-step-container">
                <div class="line-step">
                    <div class="line-step-boxs">
                        <div class="line-step-box complete">
                            <a href="cart.html">
                                <div class="icon">
                                    <i class="bi bi-bag"></i>
                                </div>
                                <p>سبد خرید</p>
                            </a>
                        </div>
                        <div class="line-step-box complete">
                            <a href="cart.html">
                                <div class="icon">
                                    <i class="bi bi-file-earmark-text"></i>
                                </div>
                                <p>جزییات پرداخت</p>
                            </a>
                        </div>
                        <div class="line-step-box complete">
                            <a href="cart.html">
                                <div class="icon">
                                    <i class="bi bi-file-earmark-break"></i>
                                </div>
                                <p>تکمیل سفارش</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cart">
        <div class="container-fluid">
            <div class="cart-content shadow-box">
                <div class="payment">
                    <div class="payment-title">
                        <img src="img/default-icon/iconNok.jpg" alt="" width="100" class="img-fluid">
                        <h2>سفارش <span class="payment-order-code">R010802114</span> ثبت شد اما پر1داخت ناموفق بود</h2>
                        <p class="text-danger my-3">برای جلوگیری از لغو سیستمی سفارش، تا یک ساعت آینده پرداخت را انجام دهید
                        </p>
                        <p class="text-muted mt-3">چناچه طی این فرآیند مبلغی از حساب شما کسر شده است ، طی 72 ساعت آینده به حساب شما باز خواهد گشت.
                        </p>
                    </div>
                </div>
                <div class="category-filter">
                    <div class="category-filter-box">
                        <div class="category-filter-box-title">
                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                <h4 class="fw-bold">
                                    کد سفارش : <span>R010802114</span>
                                </h4>
                                <a class="btn-main btn-main-primary waves-effect waves-light btn-payment" href="">پیگیری سفارش</a>
                            </div>
                            <p class="text-muted my-2 font-14 text-payment">سفارش شما با موفقیت در سیستم ثبت شد و هم اکنون <span
                                    class="danger-span">در انتظار پرداخت</span> است
                                جزییات این سفارش را میتوانید با کلیک بر روی دکمه <a href=""><span
                                        class="danger-span-border">پیگیری سفارش</span></a> مشاهده نمایید
                            </p>
                        </div>
                        <div class="category-filter-box-desc">
                            <table class="table payment-table">
                                <tr>
                                    <td colspan="2">
                                        <h6>نام تحویل گیرنده: </h6>
                                        <p>امیر رضایی</p>
                                    </td>
                                    <td colspan="2">
                                        <h6>شماره تماس: </h6>
                                        <p>09330005566</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h6>تعداد مرسوله: </h6>
                                        <p>1</p>
                                    </td>
                                    <td colspan="2">
                                        <h6>مبلغ کل: </h6>
                                        <p>4,990,000 تومان</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h6>روش پرداخت: </h6>
                                        <p>پرداخت اینترنتی <span class="danger-span">(ناموفق)</span></p>
                                    </td>
                                    <td colspan="2">
                                        <h6>وضعیت سفارش: </h6>
                                        <p class="primary-span">در انتظار پرداخت</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <h6>آدرس: </h6>
                                        <p>خرم آباد شهریار انتهای کوچه</p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="table-responsive-md d-lg-block d-none">
                    <table class="table main-table">
                        <thead>
                            <tr>
                                <th scope="col">ردیف</th>
                                <th scope="col">درگاه</th>
                                <th scope="col">شماره پیگیری</th>
                                <th scope="col">تاریخ</th>
                                <th scope="col">مبلغ</th>
                                <th scope="col">وضعیت</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td>1</td>
                                <td>زرین پال</td>
                                <td>2546587</td>
                                <td>8 آبان 1401</td>
                                <td>4,900,000 تومان</td>
                                <td><span class="danger-span">پرداخت ناموفق</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive-mobile d-lg-none d-block">
                    <div class="trm-parent">
                        <div class="trm">
                            <div class="trm-item">ردیف</div>
                            <div class="trm-item">
                                1
                            </div>
                        </div>
                        <div class="trm">
                            <div class="trm-item">درگاه</div>
                            <div class="trm-item">
                                زرین پال
                            </div>
                        </div>
                        <div class="trm">
                            <div class="trm-item">شماره پیگیری</div>
                            <div class="trm-item">
                                2546587
                            </div>
                        </div>
                        <div class="trm">
                            <div class="trm-item">تاریخ</div>
                            <div class="trm-item">
                                8 آبان 1401
                            </div>
                        </div>
                        <div class="trm">
                            <div class="trm-item">مبلغ</div>
                            <div class="trm-item">
                                4,900,000 تومان
                            </div>
                        </div>
                        <div class="trm">
                            <div class="trm-item">وضعیت</div>
                            <div class="trm-item">
                                <span class="danger-span">پرداخت ناموفق</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
