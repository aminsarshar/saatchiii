    @extends('home.layouts.home')
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/style-1.css') }}"> --}}

    @section('title')
        پروفایل کاربری-سفارشات
    @endsection

    @section('content')
        <!-- bread croumb -->
        <div class="content">
            <div class="container-fluid">
                <nav aria-label="breadcrumb" class="my-lg-0 my-2">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#" class="font-14 text-muted">خانه</a></li>
                        <li class="breadcrumb-item active main-color-one-color font-14" aria-current="page">پنل کاربری</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- start main-data -->
        <div class="content">
            <div class="container-fluid">
                <div class="row gy-2">
                    @include('home.sections.profile_sidebar')

                    <div class="col-lg-9">
                        <div class="content-box">
                            <div class="row gy-3">
                                <div class="col-12">
                                    @if (!$orders->count() == 0)
                                        <div class="item-box shadow-box">
                                            <div class="title border-bottom border-muted">
                                                <h6 class="font-14">آخرین سفارشات من</h6>
                                            </div>
                                            <div class="desc p-0 shadow-none">
                                                <div class="responsive-table p-0">
                                                    <table class="table main-table rounded-0">
                                                     <thead class="text-bg-dark bg-opacity-75 text-center">
    <tr>
        <th>#</th>
        <th>محصول سفارش</th>
        <th>تاریخ ثبت سفارش</th>
        <th>شماره سفارش</th>
        <th>وضعیت پرداخت</th>
        <th>وضعیت سفارش</th>
        <th>مبلغ پرداختی</th>
        <th>فاکتور</th> {{-- ستون جدید --}}
    </tr>
</thead>
<tbody class="text-center">
    @foreach ($orders as $key => $order)
        <tr>
            <td> {{ $orders->firstItem() + $key }} </td>
            @foreach ($order->orderItems as $item)
                <td>
                    <a href="{{ route('home.products.show', ['product' => $item->product->slug]) }}" style="width: 100px">
                        <img style="width: 100px !important" class="w-full"
                             src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $item->product->primary_image) }}" alt="">
                    </a>
                </td>
            @endforeach
            <td> {{ verta($order->created_at)->format('%d %B، %Y') }} </td>
            <td> {{ $order->ref_id }} </td>
            <td>{{ $order->status }}</td>
            <td>
                @if ($order->payment_stage == 'waiting')
                    <div class="btn btn-warning text-white">در انتظار بررسی</div>
                @elseif($order->payment_stage == 'inprogress')
                    <div class="btn btn-primary">در حال انجام</div>
                @elseif($order->payment_stage == 'completed')
                    <div class="btn btn-success">تکمیل شده</div>
                @elseif($order->payment_stage == 'canceled')
                    <div class="btn btn-danger">لغو شده</div>
                @endif
            </td>
            <td>{{ number_format($order->paying_amount) }} تومان</td>
            <td>
<a href="{{ route('home.orders.invoice', $order->id) }}"
   class="btn btn-sm btn-warning" target="_blank">
   فاکتور PDF
</a>
            </td>
        </tr>
    @endforeach
</tbody>

                                                    </table>
                                                </div>
                                            </div>
                                            <hr>

                                            {{ $orders->links() }}

                                        </div>
                                    @else
                                        <div class="cart-content" style="display: flex;justify-content: center;">
                                        <div class="cart-empty">
                                            <div class="cart-empty-icon mb-0">
                                                <img src="{{ asset('assets/image/empty-cart.svg') }}" alt=""
                                                    width="300" class="img-fluid">
                                            </div>
                                            <div class="cart-empty-title">
                                                <h2 class="text-muted">سبد خرید شما خالیست!</h2>
                                                <div class="cart-empty-offer">
                                                    <a href="{{ route('home.wishlist.users_profile.index') }}"><span
                                                            class="danger-span-border">لیست مورد علاقه من</span></a>
                                                    <a href="{{ route('home.special-offer') }}"><span
                                                            class="danger-span-border">محصولات شگفت انگیز</span></a>
                                                    <a href="{{ route('home.shop') }}"><span
                                                            class="danger-span-border">محصولات پر فروش روز</span></a>
                                                </div>
                                                <div style="display: flex;justify-content: center;">
                                                    <a href="{{ route('home.index') }}"
                                                    class="btn-main btn-main-primary waves-effect waves-light fs-6 waves-effect waves-light">ادامه
                                                    خرید از فروشگاه</a>
                                                </div>
                                            </div>

                                        </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end main-data -->
    @endsection
