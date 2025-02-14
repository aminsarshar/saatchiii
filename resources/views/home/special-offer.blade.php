@extends('home.layouts.home')
<link rel="stylesheet" href="{{ asset('assets/css/home.css') }}" />
@section('title')
    فروشگاه
@endsection

@section('script')
    <script>
        function filter() {

            let sortBy = $('#sort-by').val();
            if (sortBy == "default") {
                $('#filter-sort-by').prop('disabled', true);
            } else {
                $('#filter-sort-by').val(sortBy);
            }

            let search = $('#search-input').val();
            if (search == "") {
                $('#filter-search').prop('disabled', true);
            } else {
                $('#filter-search').val(search);
            }

            $('#filter-form').submit();
        }

        $('#filter-form').on('submit', function(event) {
            event.preventDefault();
            let currentUrl = '{{ url()->current() }}';
            let url = currentUrl + '?' + decodeURIComponent($(this).serialize())
            $(location).attr('href', url);
        });

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

            $('.quantity-input').attr('data-max', variation.quantity);
            $('.quantity-input').val(1);

        });

        $('#pagination li a').map(function() {
            let decodeUrl = decodeURIComponent($(this).attr('href'));
            if ($(this).attr('href') !== undefined) {
                $(this).attr('href', decodeUrl);
            }
        });
    </script>
@endsection


@section('content')
    <div class="content">
        <div class="container-fluid">
            <nav aria-label="breadcrumb" class="my-lg-0 my-2">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}" class="font-14 text-muted">خانه</a></li>
                    <li class="breadcrumb-item"><a href="#" class="font-14 text-muted">فروش ویژه</a></li>

                </ol>
            </nav>
        </div>
    </div>
    <!-- end breadcrumb -->

    <!-- top category -->
    <div class="content">
        <div class="container-fluid">
            <div class="content-box" style="height: 190px;">
                <div class="new-category">
                    <div class="title mb-3">
                        <h4 class="font-18">دسته بندی</h4>
                    </div>
                    <div class="swiper free-mode">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a href="">
                                    <div class="item text-center">
                                        <div class="icon"><i class="bi bi-laptop"></i></div>
                                        <div class="d-grid gap-2 mt-2">
                                            <h6 class="font-14">لپتاپ</h6>
                                            <h6 class="font-12">32,500 محصول</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="">
                                    <div class="item text-center">
                                        <div class="icon"><i class="bi bi-phone"></i></div>
                                        <div class="d-grid gap-2 mt-2">
                                            <h6 class="font-14">لپتاپ</h6>
                                            <h6 class="font-12">32,500 محصول</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="">
                                    <div class="item text-center">
                                        <div class="icon"><i class="bi bi-tablet"></i></div>
                                        <div class="d-grid gap-2 mt-2">
                                            <h6 class="font-14">لپتاپ</h6>
                                            <h6 class="font-12">32,500 محصول</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="">
                                    <div class="item text-center">
                                        <div class="icon"><i class="bi bi-car-front"></i></div>
                                        <div class="d-grid gap-2 mt-2">
                                            <h6 class="font-14">لپتاپ</h6>
                                            <h6 class="font-12">32,500 محصول</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="">
                                    <div class="item text-center">
                                        <div class="icon"><i class="bi bi-steam"></i></div>
                                        <div class="d-grid gap-2 mt-2">
                                            <h6 class="font-14">لپتاپ</h6>
                                            <h6 class="font-12">32,500 محصول</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="">
                                    <div class="item text-center">
                                        <div class="icon"><i class="bi bi-camera"></i></div>
                                        <div class="d-grid gap-2 mt-2">
                                            <h6 class="font-14">لپتاپ</h6>
                                            <h6 class="font-12">32,500 محصول</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="">
                                    <div class="item text-center">
                                        <div class="icon"><i class="bi bi-bicycle"></i></div>
                                        <div class="d-grid gap-2 mt-2">
                                            <h6 class="font-14">لپتاپ</h6>
                                            <h6 class="font-12">32,500 محصول</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="">
                                    <div class="item text-center">
                                        <div class="icon"><i class="bi bi-boombox"></i></div>
                                        <div class="d-grid gap-2 mt-2">
                                            <h6 class="font-14">لپتاپ</h6>
                                            <h6 class="font-12">32,500 محصول</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="">
                                    <div class="item text-center">
                                        <div class="icon"><i class="bi bi-brush"></i></div>
                                        <div class="d-grid gap-2 mt-2">
                                            <h6 class="font-14">لپتاپ</h6>
                                            <h6 class="font-12">32,500 محصول</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="">
                                    <div class="item text-center">
                                        <div class="icon"><i class="bi bi-bus-front"></i></div>
                                        <div class="d-grid gap-2 mt-2">
                                            <h6 class="font-14">لپتاپ</h6>
                                            <h6 class="font-12">32,500 محصول</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="">
                                    <div class="item text-center">
                                        <div class="icon"><i class="bi bi-easel"></i></div>
                                        <div class="d-grid gap-2 mt-2">
                                            <h6 class="font-14">لپتاپ</h6>
                                            <h6 class="font-12">32,500 محصول</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end category -->

    <!-- main content page -->
    <div class="content">
        <div class="container-fluid">

            <!-- start filter in mobile -->
            <div class="custom-filter d-lg-none d-block">
                <button class="btn border-0 main-color-two-bg shadow-box px-3 rounded-3 position-fixed"
                    style="z-index: 999;bottom:80px;" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <i class="bi bi-funnel font-20 fw-bold"></i>
                    <span class="d-block font-14">فیلتر</span>
                </button>

                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasRight"
                    aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasRightLabel">فیلتر ها</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="item-boxs">

                            <div class="item-box bg-white shadow-box">
                                <div class="title">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h6 class="font-14">جستجو</h6>
                                        <a class="btn border-0" data-bs-toggle="collapse" href="#collapseItemBoxSearch"
                                            role="button" aria-expanded="false">
                                            <i class="bi bi-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="desc collapse show" id="collapseItemBoxSearch">
                                    <form action="">
                                        <div class="position-relative">
                                            <input type="text" name="search" id="search-input"
                                                value="{{ request()->has('search') ? request()->search : '' }}"
                                                class="form-control font-14 rounded-pill text-muted py-3 border-muted bg-light"
                                                placeholder="نام محصول مورد نظر خود را وارد کنید">
                                            <button type="button" onclick="filter()"
                                                class="position-absolute top-50 translate-middle-y btn rounded-circle border-0"
                                                style="left: 5px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                    <path
                                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <form id="filter-form">
                <input id="filter-sort-by" type="hidden" name="sortBy">
                <input id="filter-search" type="hidden" name="search">
            </form>


            <!-- end filter mobile -->

            <div class="row">
                <div class="col-lg-3 d-lg-block d-none">
                    <div class="item-boxs">


                        <div class="item-box bg-white shadow-box">
                            <div class="title">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="font-14">جستجو</h6>
                                    <a class="btn border-0" data-bs-toggle="collapse" href="#collapseItemBoxSearch"
                                        role="button" aria-expanded="false">
                                        <i class="bi bi-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="desc collapse show" id="collapseItemBoxSearch">
                                <form action="">
                                    <div class="position-relative">
                                        <input type="text" name="search"
                                            class="form-control font-14 rounded-pill text-muted py-3 border-muted bg-light"
                                            placeholder="نام محصول مورد نظر خود را وارد کنید">
                                        <button type="submit"
                                            class="position-absolute top-50 translate-middle-y btn rounded-circle border-0"
                                            style="left: 5px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                <path
                                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="content-box">
                        <div class="filter-items shadow-box">
                            <div class="items">
                                <div class="link d-md-block d-none">
                                    <div class="shop-top-bar" style="direction: rtl;">
                                        <form id="filter-form">

                                            <input id="filter-sort-by" type="hidden" name="sortBy">
                                            <input id="filter-search" type="hidden" name="search">
                                        </form>


                                        <div class="select-shoing-wrap">
                                            <div class="shop-select">
                                                <select id="sort-by" onchange="filter()">
                                                    <option value="default"> مرتب سازی </option>
                                                    <option value="max"
                                                        {{ request()->has('sortBy') && request()->sortBy == 'max' ? 'selected' : '' }}>
                                                        بیشترین قیمت </option>
                                                    <option value="min"
                                                        {{ request()->has('sortBy') && request()->sortBy == 'min' ? 'selected' : '' }}>
                                                        کم
                                                        ترین قیمت </option>
                                                    <option value="latest"
                                                        {{ request()->has('sortBy') && request()->sortBy == 'latest' ? 'selected' : '' }}>
                                                        جدیدترین </option>
                                                    <option value="oldest"
                                                        {{ request()->has('sortBy') && request()->sortBy == 'oldest' ? 'selected' : '' }}>
                                                        قدیمی ترین </option>
                                                </select>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                                <div class="count">
                                    <div class="font-14">مشاهده همه <span class="fw-bold">3</span> نتیجه</div>
                                </div>
                                <div class="link-responsive d-md-none d-block">
                                    <form action="">
                                        <select class="form-select bg-light">
                                            <option>پیشفرض</option>
                                            <option>محبوب ترین</option>
                                            <option>پر فروش ترین</option>
                                            <option>جدیدترین</option>
                                            <option>ارزان ترین</option>
                                            <option>گران ترین</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($products_special_offers as $products_special_offer)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="product-box-item bg-white w-100">
                                        <div class="hover">
                                            <div class="hover-btn">



                                                <a href="{{ route('home.compare.add', ['product' => $products_special_offer]) }}"
                                                    data-hint="مقایسه محصول" class="hint--right"><i
                                                        class="bi bi-arrow-left-right"></i></a>

                                                @auth
                                                    @if ($products_special_offer->checkUserWishlist(auth()->id()))
                                                        <a href="{{ route('home.wishlist.remove', ['product' => $products_special_offer->id]) }}"
                                                            data-hint="افزوده شده" class="hint--right"
                                                            style="background: red"><i class="bi bi-heart"></i></a>
                                                    @else
                                                        <a href="{{ route('home.wishlist.add', ['product' => $products_special_offer->id]) }}"
                                                            data-hint="افزودن به علاقه مندی" class="hint--right"><i
                                                                class="bi bi-heart"></i></a>
                                                    @endif

                                                @endauth


                                                <a href="#productModal-{{ $products_special_offer->id }}"
                                                    data-hint="مشاهده سریع" class="hint--right" data-bs-toggle="modal"
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
                                        <a
                                            href="{{ route('home.products.show', ['product' => $products_special_offer->slug]) }}">
                                            <div class="image text-center">

                                                <img src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $products_special_offer->primary_image) }}"
                                                    alt="توضیحات عکس" class="img-fluid one-image">
                                                {{-- hover image --}}
                                                @foreach ($products_special_offer->images as $image)
                                                    <img src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $image->image) }}"
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
                                                                    <select name="variation"
                                                                        class="form-control variation-select"
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
                                                                        <div class="pro-details-size w-50"
                                                                            style="display: none">
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
                                                                                type="text" name="qtybutton"
                                                                                value="1" data-max="5" />
                                                                        </div>
                                                                        <div
                                                                            class="d-flex align-items-center justify-content-center">
                                                                            <button type="submit"
                                                                                style="border: none;padding-left: 160px;background: no-repeat;">
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





                                                                        <div class="pro-details-wishlist">
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
                                                        @else
                                                            <div class="not-in-stock">
                                                                <p class="text-white" style="padding-right:56px">ناموجود
                                                                </p>
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
                                                                <div
                                                                    class="d-flex justify-content-center align-items-center">
                                                                    <span
                                                                        class="text-muted font-14 text-decoration-line-through">
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
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach



                        </div>

                        {{ $products_special_offers->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .pagination {
            justify-content: center !important;
            padding-top: 53px !important;
        }
    </style>





@endsection
