<!DOCTYPE html>
<html lang="FA-IR" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/font/bootstrap-icon/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugin/waves/waves.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugin/swiper/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugin/timer/timer.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugin/hint-css/hint-css.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugin/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/sweetalert2.min.css')}}"> --}}
    <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.15.10/dist/sweetalert2.min.css
" rel="stylesheet">
    {{-- /admin/vendors/css/sweetalert2.min.css --}}

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    {{-- <link
    rel="stylesheet"
    href="{{asset('assets/css/plugins/owl-carousel/owl.carousel.css')}}"
  /> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <header>

        <div class="header-bottom shadow-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-6 order-lg-3 order-1">
                        <div class="d-flex flex-column d-lg-flex d-none flex-wrap justify-content-center">
                            <div class="header-bottom-btn">
                                <a href="{{route('home.wishlist.users_profile.index')}}"
                                    class="header-bottom-link waves-effect waves-light d-flex align-items-center justify-content-center flex-wrap">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor"
                                        class="bi bi-heart me-2" viewBox="0 0 16 16">
                                        <path
                                            d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                    </svg>
                                    <span class="text-overflow fw-bold font-14">علاقه مندی ها</span>
                                </a>
                                <a class="header-bottom-link waves-effect waves-light d-flex align-items-center justify-content-center flex-wrap"
                                    data-bs-toggle="offcanvas" href="#cartCanvas" role="button"
                                    aria-controls="cart canvas">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor"
                                        class="bi bi-bag me-2" viewBox="0 0 16 16">
                                        <path
                                            d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                    </svg>
                                    @if(! \Cart::isEmpty())
                                    <span class="count-item rounded-circle">{{\Cart::getContent()->count()}}</span>
                                    @endif
                                    <span class="text-overflow fw-bold font-14">سبد خرید</span>

                                </a>

                                <a href="{{route('home.compare.index')}}"
                                    class="header-bottom-link waves-effect waves-light d-flex align-items-center justify-content-center flex-wrap">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor"
                                        class="bi bi-heart me-2" viewBox="0 0 16 16">
                                        <path
                                            d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                    </svg>
                                    <span class="text-overflow fw-bold font-14">لیست مقایسه ها</span>
                                </a>



                            </div>
                        </div>
                        <div class="responsive-menu d-lg-none d-block">
                            <button class="btn border-0 btn-responsive-menu" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#responsiveMenu" aria-controls="responsive menu">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                    class="bi bi-list" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                                </svg>
                            </button>
                            <div class="offcanvas offcanvas-start" tabindex="-1" id="responsiveMenu" style="width:75%"
                                aria-labelledby="responsive menu">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasRightLabel">فروشگاه ساعتچی</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">

                                    <div class="header-bottom-form mb-4 w-100">
                                        <form action="{{ route('search.results') }}" method="GET">
                                            <div class="position-relative">
                                                <input type="text" name="query"
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
                                    <ul class="rm-item-menu navbar-nav">
                                        <li class="nav-item bg-ul-f7"><a href="{{route('home.index')}}" class="nav-link">صفحه
                                                اصلی</a>
                                        </li>
                                        @php
                            $parentCategories = App\Models\Category::where('parent_id' , 0)->get();
                            // $parentCategories = App\Models\Category::where('is_active' , 1)->get();

                                        @endphp

                                        @foreach ($parentCategories as $parentCategory)
                                        <li class="nav-item bg-ul-f7">
                                            <a href="{{route('home.categories.show' , ['category' => $parentCategory->slug ])}}" class="nav-link">{{$parentCategory->name}}</a>
                                            <span class="showSubMenu"><i class="bi bi-chevron-left"></i></span>
                                            <ul class="navbar-nav h-0">
                                                @foreach ($parentCategory->children as $childCategory)
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{route('home.categories.show' , ['category' => $childCategory->slug ])}}">{{$childCategory->name}}</a>
                                                </li>
                                            @endforeach
                                            </ul>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-6 order-lg-1 order-2">
                        <div class="row">
                            <a href="" class="text-lg-start text-end d-block logo_type">
                            <!-- <img src="{{asset('assets/image/logo.png')}}" alt="" class="img-fluid" width="200"> -->
                            فروشگاه ساعت چی

                            </a>
                        </div>
                    </div>

                        <style>
      .logo_type{
        background: -webkit-linear-gradient(0deg,#9d4edd,#c77dff,#e0aaff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-size: 24px;
      }

      @media screen and (max-width: 576px) {
        .logo_type{
        font-size: 18px;

        }

        .modal-content{
            width:88% !important;
            margin:auto;
            margin-top: 21%;
        }

        .product-modal-link form{
            display:block;
        }

        cart-plus-minus{
            width:84%;
        }

        .pro-details-cart{
            margin-top:auto !important;
            margin-right:auto !important;
        }

      }
    </style>
                    <div class="col-6 d-lg-flex d-none order-lg-2 order-3">
                        <div class="header-bottom-form me-2 w-100">
                            <form action="{{ route('search.results') }}" method="GET">
                                <div class="position-relative">
                                    <input type="text" name="query"
                                        class="form-control font-14 rounded-pill text-muted py-2 border-muted bg-light"
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
        </div>
    </header>

    <div class="mega-menu d-lg-flex d-none">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-8">
                    <div class="top-menu-menu">

                        <ul class="navbar-nav">
                            @php
                            $parentCategories = App\Models\Category::where('parent_id' , 0)->get();
                            // $parentCategories = App\Models\Category::where('is_active' , 1)->get();

                        @endphp
                            <li class="position-relative m-0"></li>
                            <li class="nav-item main-menu-head"><a href=""
                                    class="nav-link border-animate fromRight fw-bold"><i class="bi bi-list"></i>
                                   دسته بندی کالا ها
                                </a>
                                <ul class="level-one">
                                    @foreach ($parentCategories as $parentCategory)
                                    <li class="position-relative"><a href="{{route('home.categories.show' , ['category' => $parentCategory->slug ])}}">{{$parentCategory->name}}<i
                                                class="bi bi-chevron-left"></i></a>
                                        <ul class="level-two">
                                            @foreach ($parentCategory->children as $childCategory)
                                            <li><a href="{{route('home.categories.show' , ['category' => $childCategory->slug ])}}">{{$childCategory->name}}</a></li>
                                            @endforeach

                                        </ul>
                                    </li>

                                    @endforeach
                                </ul>
                            </li>


                            <li class="nav-item"><a href="{{route('home.index')}}" class="nav-link border-animate fromRight"><i class="bi bi-house"></i>  خانه  </a>
                            </li>
                            <li class="nav-item"><a href="{{route('home.shop')}}" class="nav-link border-animate fromRight"><i class="bi bi-cart-plus"></i>  فروشگاه  </a>
                            </li>
                            <li class="nav-item"><a href="{{route('home.blog.index')}}" class="nav-link border-animate fromRight"><i class="bi bi-book"></i>  مقالات </a></li>

                            <li class="nav-item"><a href="{{route('home.about-us')}}" class="nav-link border-animate fromRight"><i class="bi bi-people"></i>  درباره ما </a>
                            </li>
                            <li class="nav-item"><a href="{{route('home.contact-us')}}" class="nav-link border-animate fromRight"><i class="bi bi-telephone-inbound"></i>  تماس با ما  </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-4">
                    @auth
                    <ul class="navbar-nav text-end">
                        <style>

                            .dropdown.toggle > input {
                              display: none;
                            }
                            .dropdown > a, .dropdown.toggle > label {
                              border-radius: 2px;
                              /* box-shadow: 0 6px 5px -5px rgba(0,0,0,0.3); */
                            }
                            .dropdown > a::after, .dropdown.toggle > label::after {
                              content: "";
                              float: right;
                              margin: 15px 15px 0 0;
                              width: 0;
                              height: 0;
                              border-left: 5px solid transparent;
                              border-right: 5px solid transparent;
                              border-top: 10px solid #CCC;
                              display: none;
                            }
                            .dropdown ul {
                              list-style-type: none;
                              display: block;
                              margin: 0;
                              padding: 0;
                              position: absolute;
                              width: 100%;
                              /* box-shadow: 0 6px 5px -5px rgba(0,0,0,0.3); */
                              overflow: hidden;
                            }
                            .dropdown a, .dropdown.toggle > label {
                                display: block;
                                padding: 0 0 0 10px;
                                text-decoration: none;
                                line-height: 40px;
                                font-size: 15px;
                                text-transform: uppercase;
                                font-weight: bold;
                                color: #494949;
                                background-color: #fff;
                                text-align: right;
                                padding-right:12px
                            }
                            .dropdown li {
                              height: 0;
                              overflow: hidden;
                              transition: all 500ms;
                            }
                            .dropdown.hover li {
                              transition-delay: 300ms;
                            }
                            .dropdown li:first-child a {
                              border-radius: 2px 2px 0 0;
                              margin-top: -12px !important;

                            }
                            .dropdown li:last-child a {
                              border-radius: 0 0 2px 2px;
                              margin-top: -12px !important;
                            }
                            .dropdown li:first-child a::before {
                              content: "";
                              display: block;
                              position: absolute;
                              width: 0;
                              height: 0;
                              border-left: 10px solid transparent;
                              border-right: 10px solid transparent;
                              border-bottom: 10px solid #FFF;
                              margin: -10px 0 0 30px;
                            }
                            .dropdown a:hover, .dropdown.toggle > label:hover, .dropdown.toggle > input:checked ~ label {
                              color: #666;
                            }
                            .dropdown > a:hover::after, .dropdown.toggle > label:hover::after, .dropdown.toggle > input:checked ~ label::after {
                              border-top-color: #AAA;
                            }
                            .dropdown li:first-child a:hover::before {
                              border-bottom-color: #EEE;
                            }
                            .dropdown.hover:hover li, .dropdown.toggle > input:checked ~ ul li {
                              height: 40px;
                            }
                            .dropdown.hover:hover li:first-child, .dropdown.toggle > input:checked ~ ul li:first-child {
                              padding-top: 15px;
                              text-align: center
                            }

                                </style>

<script>

    $(document).click(function(event) {
      if(
        $('.toggle > input').is(':checked') &&
        !$(event.target).parents('.toggle').is('.toggle')
      ) {
        $('.toggle > input').prop('checked', false);
      }
    })
        </script>

                        <nav>

                            <div class="dropdown toggle">
                              <input id="t1" type="checkbox">
                              <label style="margin-right: 155px !important;margin-bottom: 3px;" for="t1"><img src="{{auth()->user()->avatar == null ? asset('home/images/users_default/images.jfif') : asset('home/images/users_avatar/'.auth()->user()->avatar)  }}" alt="" style="    width: 47px;
                                height: 47px;
                                margin-left: 9px;
                                object-fit: cover;
                                margin-top: -3px;
                                border: 2px solid #6666ff;"
                                class="img-fluid rounded-circle">  {{auth()->user()->name}}</label>
                              <ul style="width: 207px !important;margin-right: 219px !important;padding-top: 14px;">
                                @role('admin')
                                <li><a href="{{route('dashboard')}}" target="_blank" style="font-weight: bold"><i class="fa-solid fa-user" style="margin-left: 10px;margin-top: 3px;"></i>مشاهده پنل ادمین</a></li>
                                <li><a href="{{route('home.users_profile.index')}}" target="_blank" style="font-weight: bold"><i class="fa-solid fa-user" style="margin-left: 10px;margin-top: 3px;"></i>مشاهده پنل کاربری</a></li>
                                @endrole
                                {{-- @role('user') --}}
                                {{-- @endrole --}}
                                @role('user')
                                <li><a href="{{route('home.users_profile.index')}}" target="_blank" style="font-weight: bold"><i class="fa-solid fa-user" style="margin-left: 10px;margin-top: 3px;"></i>مشاهده پنل کاربری</a></li>
                                @endrole
                                <li><a href="{{route('home.orders.users_profile.index')}}" target="_blank" style="font-weight: bold"><i class="fa-solid fa-cart-shopping" style="margin-left: 10px;margin-top: 3px;"></i>سفارش  </a></li>
                                <li><a href="{{route('home.wishlist.users_profile.index')}}" target="_blank" style="font-weight: bold"><i class="fa-solid fa-heart" style="margin-left: 10px;margin-top: 3px;"></i>علاقه مندی ها</a></li>
                                <li><a href="{{route('home.comments.users_profile.index') }}" target="_blank" style="font-weight: bold"><i class="fa-solid fa-message" style="margin-left: 10px;margin-top: 3px;"></i>نظرات ثبت شده</a></li>
                                <li><a href="{{route('logout')}}" target="_blank" style="font-weight: bold"><i class="fa-solid fa-right-from-bracket" style="margin-left: 10px;margin-top: 3px;"></i>خروج از حساب کاربری</a></li>
                              </ul>
                            </div>
                          </nav>




                    </ul>
                    @else
                    <ul class="navbar-nav text-end" style="margin-right:245px ">
                    <a href="#loginModal"
                    class="header-bottom-link-cat waves-effect waves-light rounded-pill ms-1 font-14 d-flex align-items-center justify-content-center flex-wrap"
                    data-bs-toggle="modal" data-bs-target="#loginModal" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person-circle me-2" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd"
                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
                    <span class="fw-bold text-overflow">حساب کاربری</span>
                </a>
            </ul>

                            @endauth
                </div>
            </div>
        </div>
    </div>


    <div class="mobile-footer d-lg-none d-table justify-content-center shadow-box bg-white position-fixed bottom-0 p-2 w-100"
        style="z-index: 100;table-layout: fixed;">
        <ul class="d-table-row">
            <li class="d-table-cell pointer" onclick="topFunction()">
                <div class="mf-link nav-link text-center">
                    <span class="d-block mf-link-icon"><i class="bi bi-chevron-up font-20"></i></span>
                    <span class="mt-1 font-12 fw-bold mf-link-title">بالا</span>
                </div>
            </li>
            <li class="d-table-cell"><a href="{{route('home.wishlist.users_profile.index')}}" class="mf-link nav-link text-center">
                    <div class="mf-link-icon position-relative d-table mx-auto">
                        <i class="bi bi-heart font-20"></i>
                        <span class="position-absolute main-color-one-bg rounded-pill font-10 text-white badge"
                            style="right:-40%;bottom:-5px;"></span>
                    </div>
                    <span class="mt-1 font-12 fw-bold mf-link-title">علاقه مندی ها</span>
                </a></li>
            <li class="d-table-cell"><a href="{{route('home.index')}}" class="mf-link nav-link text-center">
                    <span class="d-block mf-link-icon"><i class="bi bi-house font-20"></i></span>
                    <span class="mt-1 font-12 fw-bold mf-link-title">صفحه اصلی</span>
                </a></li>

            <li class="d-table-cell"><a class="mf-link nav-link text-center" data-bs-toggle="offcanvas"
                    href="#cartCanvas" role="button" aria-controls="cart canvas">
                    <div class="position-relative mf-link-icon d-table mx-auto">
                        <span class="d-block mf-link-icon"><i class="bi bi-bag font-20"></i></span>
                        @if(! \Cart::isEmpty())
                        <span class="position-absolute main-color-one-bg rounded-pill font-10 text-white badge"
                            style="right:-60%;bottom:-5px;">{{\Cart::getContent()->count()}}</span>
                        @endif
                    </div>
                    <span class="mt-1 font-12 fw-bold mf-link-title">سبد خرید</span>
                </a></li>



             @auth
                <li class="d-table-cell"><a href="{{route('home.users_profile.index')}}" class="mf-link nav-link text-center">
                    <span class="d-block mf-link-icon"><i class="bi bi-person-lines-fill font-20"></i></span>
                    <span class="mt-1 font-12 fw-bold mf-link-title">حساب کاربری</span>
                </a></li>
             @else
             <li class="d-table-cell"><a href="#loginModal"
                class="mf-link nav-link text-center"
                data-bs-toggle="modal" data-bs-target="#loginModal" role="button">
                    <span class="d-block mf-link-icon"><i class="bi bi-person-circle font-20"></i></span>
                    <span class="mt-1 font-12 fw-bold mf-link-title">ورود ثبت نام</span>
                </a></li>
             @endauth
        </ul>
    </div>


