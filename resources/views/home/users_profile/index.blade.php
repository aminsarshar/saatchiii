@extends('home.layouts.home')


<link rel="stylesheet" href="{{asset('assets/js/plugin/countdown/countdown.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/style-1.css')}}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@section('title')
    صفحه ای پروفایل
@endsection

@section('script')

<script>
        window.toPersianNum = function (num, dontTrim) {

var i = 0,

    dontTrim = dontTrim || false,

    num = dontTrim ? num.toString() : num.toString().trim(),
    len = num.length,

    res = '',
    pos,

    persianNumbers = typeof persianNumber == 'undefined' ?
        ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'] :
        persianNumbers;

for (; i < len; i++)
    if ((pos = persianNumbers[num.charAt(i)]))
        res += pos;
    else
        res += num.charAt(i);

return res;
}

window.number_format = function (number, decimals, dec_point, thousands_point) {

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

$('.variation-select').on('change' , function(){
            let variation = JSON.parse(this.value);
            let variationPriceDiv = $('.variation-price-' + $(this).data('id'));
            variationPriceDiv.empty();

            if(variation.is_sale){
                let spanSale = $('<span />' , {
                    class : 'new',
                    text : toPersianNum(number_format(variation.sale_price)) + ' تومان'
                });
                let spanPrice = $('<del />' , {
                    class : 'old',
                    text : toPersianNum(number_format(variation.price)) + ' تومان'
                });

                variationPriceDiv.append(spanSale);
                variationPriceDiv.append(spanPrice);
            }else{
                let spanPrice = $('<span />' , {
                    class : 'new',
                    text : toPersianNum(number_format(variation.price)) + ' تومان'
                });
                variationPriceDiv.append(spanPrice);
            }

            $('.quantity-input').attr('max' , variation.quantity);
            $('.quantity-input').val(1);

        });
</script>

<script>
    $('.province-select').change(function() {

        var provinceID = $(this).val();

        if (provinceID) {
            $.ajax({
                type: "GET",
                url: "{{ url('/get-province-cities-list') }}?province_id=" + provinceID,
                success: function(res) {
                    if (res) {
                        $(".city-select").empty();

                        $.each(res, function(key , city) {
                            console.log(city);
                            $(".city-select").append('<option value="' + city.id + '">' +
                                city.name + '</option>');
                        });

                    } else {
                        $(".city-select").empty();
                    }
                }
            });
        } else {
            $(".city-select").empty();
        }
    });
</script>
<script>
    $('#address-input').val( $('#address-select').val() );

    $('#address-select').change(function() {
        $('#address-input').val($(this).val());
    });
            $('.province-select').change(function() {

                var provinceID = $(this).val();

                if (provinceID) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('/get-province-cities-list') }}?province_id=" + provinceID,
                        success: function(res) {
                            if (res) {
                                $(".city-select").empty();

                                $.each(res, function(key, city) {
                                    console.log(city);
                                    $(".city-select").append('<option value="' + city.id + '">' +
                                        city.name + '</option>');
                                });

                            } else {
                                $(".city-select").empty();
                            }
                        }
                    });
                } else {
                    $(".city-select").empty();
                }
            });

        </script>

@endsection




@section('content')
@auth
<div class="content">
    <div class="dashboard">
        <div class="container">
            <div class="row">
                @include('home.sections.profile_sidebar')
                <div class="col-lg-9">
                    <div class="content-box" style="padding:40px 20px;">
                        <div class="row g-3">
                            <div class="col-xl-3 col-6 dashboard-cart-col">
                                <div class="dashboard-cart shadow-box">
                                    <div class="dashboard-cart-title"><i class="bi bi-bag-check"></i> سفارشات تکمیل
                                        شده</div>
                                    <div class="dashboard-cart-footer" style="background: #0476D0;">0</div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-6 dashboard-cart-col">
                                <div class="dashboard-cart shadow-box">
                                    <div class="dashboard-cart-title"><i class="bi bi-activity"></i> سفارشات در
                                        انتظار بررسی</div>
                                    <div class="dashboard-cart-footer" style="background: #F6A21E;">0</div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-6 dashboard-cart-col">
                                <div class="dashboard-cart shadow-box">
                                    <div class="dashboard-cart-title"><i class="bi bi-x-octagon"></i> سفارشات لغو
                                        شده</div>
                                    <div class="dashboard-cart-footer" style="background: #0db47f;">0</div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-6 dashboard-cart-col">
                                <div class="dashboard-cart shadow-box">
                                    <div class="dashboard-cart-title"><i class="bi bi-repeat"></i> سفارشات مرجوعی
                                    </div>
                                    <div class="dashboard-cart-footer" style="background: #BA0F30;">0</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="ui-box">
                                    <div class="ui-box-item ui-box-white">
                                        <div class="ui-box-item-title">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h4 class="fw-bold">
                                                    اطلاعات شخصی
                                                </h4>
                                                {{-- <a href="#" class="editbtn" data-bs-toggle="collapse" data-bs-target="#collapseEdit-{{auth()->user()->id}}" aria-expanded="false" aria-controls="collapseEdit">
                                                    <i class="fa-solid fa-pen"></i>
                                                    ویرایش اطلاعات
                                                </a>

                                                <hr>

                                                <div class="collapse" id="collapseEdit-{{auth()->user()->id}}"  >
                                                    <form
                                                    action="{{ route('home.users_profile.update', ['user' => auth()->user()->id]) }}"
                                                    method="POST"
                                                    enctype="multipart/form-data"
                                                    >
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="row">

                                                        <div class="tax-select col-lg-6 col-md-6">
                                                            <label>
                                                                نام و نام خانوادگی
                                                            </label>
                                                            <input class="form-control" type="text" name="name" value="{{auth()->user()->name}}">
                                                            @error('name', 'nameUpdate')
                                                                <p class="input-error-validation">
                                                                    <strong>{{ $message }}</strong>
                                                                </p>
                                                            @enderror
                                                        </div>
                                                        <div class="tax-select col-lg-6 col-md-6">
                                                            <label>
                                                                شماره تماس
                                                            </label>
                                                            <input class="form-control" type="text" name="cellphone"
                                                                value="{{auth()->user()->cellphone}}">
                                                            @error('cellphone', 'cellphoneUpdate')
                                                                <p class="input-error-validation">
                                                                    <strong>{{ $message }}</strong>
                                                                </p>
                                                            @enderror
                                                        </div>
                                                        <div class="tax-select col-lg-6 col-md-6">
                                                            <label>
                                                                 ایمیل
                                                            </label>
                                                            <input class="form-control" type="text" name="email"
                                                                value="{{auth()->user()->email}}">
                                                            @error('email', 'emailUpdate')
                                                                <p class="input-error-validation">
                                                                    <strong>{{ $message }}</strong>
                                                                </p>
                                                            @enderror
                                                        </div>

                                                        <div class="tax-select col-lg-6 col-md-6">
                                                            <label>
                                                                 عکس
                                                            </label>
                                                            <input class="form-control" type="file" name="avatar"
                                                                value="{{auth()->user()->avatar}}">
                                                            @error('avatar', 'emailUpdate')
                                                                <p class="input-error-validation">
                                                                    <strong>{{ $message }}</strong>
                                                                </p>
                                                            @enderror
                                                        </div>


                                                        <div class=" col-lg-12 col-md-12">

                                                            <button class="cart-btn-2" type="submit" style="background-color: #FFC107;
                                                            color: white;
                                                            margin-bottom: 40px;"> ویرایش آدرس
                                                            </button>
                                                            <hr>
                                                        </div>

                                                    </div>

                                                </form>
                                                </div> --}}
                                                

                                            </div>
                                        </div>
                                        <div class="ui-box-item-desc p-0">
                                             <table class="table main-table shadow-none main-table-2">
                                                <tr>
                                                    <td colspan="2">
                                                        <h6 class="text-muted">نام و نام خانوادگی</h6>
                                                        <p class="fw-bold mt-2">{{auth()->user()->name}}</p>
                                                    </td>
                                                    <td colspan="2">
                                                        <h6 class="text-muted">شماره تلفن</h6>
                                                        <p class="fw-bold mt-2">{{auth()->user()->cellphone}}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <h6>ایمیل</h6>
                                                        <p class="fw-bold mt-2">{{auth()->user()->email}}</p>
                                                    </td>
                                                    <td colspan="2">
                                                        <h6>عضویت</h6>
                                                        <p class="fw-bold mt-2">{{ verta(auth()->user()->created_at)->format('d') }} {{ verta(auth()->user()->created_at)->formatWord('F') }} {{ verta(auth()->user()->created_at)->format('Y') }}</p>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td colspan="2">
                                                        <h6>کد پستی </h6>
                                                        <p class="fw-bold mt-2">{{auth()->user()->postal_code}}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <h6>آدرس: </h6>
                                                        @foreach ($addresses as $address)
                                                        <div>
                                                            <address>
                                                                <p class="address_p">
                                                                    <strong>{{auth()->user()->name}}</strong>
                                                                    <br>
                                                                    <span class="mr-2"> عنوان آدرس : <span> {{$address->title}} </span> </span>
                                                                </p>
                                                                <p class="address_p">
                                                                    {{$address->address}}
                                                                    <br>
                                                                    <span class="address_p"> استان : {{ province_name($address->province_id) }} </span>
                                                                    <span> شهر : {{ city_name($address->city_id) }} </span>
                                                                </p>
                                                                <p class="address_p">
                                                                    کدپستی :
                                                                    {{$address->postal_code}}

                                                                </p>
                                                                <p class="address_p">
                                                                    شماره موبایل :
                                                                    {{$address->cellphone}}

                                                                </p>

                                                            </address>

                                                            <style>
                                                                .address_p{
                                                                    padding-bottom: 11px;
                                                                }

                                                                .editbtn{
                                                                    background: white !important;
                                                                }

                                                                .editbtn:hover{
                                                                    color: rgb(255, 140, 0) !important;
                                                                }
                                                            </style>



                                                            <a href="#" class="editbtn" data-bs-toggle="collapse" data-bs-target="#collapseEdit-{{$address->id}}" aria-expanded="false" aria-controls="collapseEdit">
                                                                <i class="fa-solid fa-pen"></i>
                                                                ویرایش آدرس
                                                            </a>

                                                            <hr>

                                                            <div class="collapse" id="collapseEdit-{{$address->id}}"  style="{{ count($errors->addressUpdate) > 0 && $errors->addressUpdate->first('address_id') == $address->id ? 'display:block' : '' }}">
                                                                <form
                                                                action="{{ route('home.addresses.update', ['address' => $address->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')

                                                                <div class="row">

                                                                    <div class="tax-select col-lg-6 col-md-6">
                                                                        <label>
                                                                            عنوان
                                                                        </label>
                                                                        <input class="form-control" type="text" name="title" value="{{ $address->title }}">
                                                                        @error('title', 'addressUpdate')
                                                                            <p class="input-error-validation">
                                                                                <strong>{{ $message }}</strong>
                                                                            </p>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="tax-select col-lg-6 col-md-6">
                                                                        <label>
                                                                            شماره تماس
                                                                        </label>
                                                                        <input class="form-control" type="text" name="cellphone"
                                                                            value="{{  $address->cellphone }}">
                                                                        @error('cellphone', 'addressUpdate')
                                                                            <p class="input-error-validation">
                                                                                <strong>{{ $message }}</strong>
                                                                            </p>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="tax-select col-lg-6 col-md-6">
                                                                        <label>
                                                                            استان
                                                                        </label>
                                                                        <select class="form-control" class="email s-email s-wid province-select"
                                                                            name="province_id">
                                                                            @foreach ($provinces as $province)
                                                                                <option value="{{ $province->id }}" {{ $province->id  == $address->province_id ? 'selected' : '' }}>
                                                                                    {{ $province->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('province_id', 'addressStore')
                                                                            <p class="input-error-validation">
                                                                                <strong>{{ $message }}</strong>
                                                                            </p>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="tax-select col-lg-6 col-md-6">
                                                                        <label>
                                                                            شهر
                                                                        </label>
                                                                        <select class="form-control" class="email s-email s-wid city-select"
                                                                            name="city_id">
                                                                            <option value="{{ $address->city_id }}" selected>
                                                                                {{ city_name($address->city_id) }}
                                                                            </option>
                                                                        </select>
                                                                        @error('city_id', 'addressStore')
                                                                            <p class="input-error-validation">
                                                                                <strong>{{ $message }}</strong>
                                                                            </p>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="tax-select col-lg-6 col-md-6">
                                                                        <label>
                                                                            آدرس
                                                                        </label>
                                                                        <input class="form-control" type="text" name="address"
                                                                            value="{{ $address->address }}">
                                                                        @error('address', 'addressUpdate')
                                                                            <p class="input-error-validation">
                                                                                <strong>{{ $message }}</strong>
                                                                            </p>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="tax-select col-lg-6 col-md-6">
                                                                        <label>
                                                                            کد پستی
                                                                        </label>
                                                                        <input class="form-control" type="text" name="postal_code"
                                                                            value="{{ $address->postal_code }}">
                                                                        @error('postal_code', 'addressUpdate')
                                                                            <p class="input-error-validation">
                                                                                <strong>{{ $message }}</strong>
                                                                            </p>
                                                                        @enderror
                                                                    </div>

                                                                    <div class=" col-lg-12 col-md-12">

                                                                        <button class="cart-btn-2" type="submit"
                                                                        style="
                                                                        background-color: #FFC107;
                                                                        color: white;
                                                                        border: navajowhite;
                                                                        padding: 7px;
                                                                        margin-top: 22px;
                                                                        border-radius: 7px;
                                                                        "
                                                                        > ویرایش آدرس
                                                                        </button>
                                                                        <hr>
                                                                    </div>

                                                                </div>

                                                            </form>
                                                            </div>


                                                        </div>

                                                        @endforeach
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="ui-box">
                                    <div class="ui-box-item ui-box-white">
                                        <div class="ui-box-item-title">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h4 class="fw-bold">
                                                    علاقه مندی ها
                                                </h4>
                                                <a class="btn-main btn-main-primary" href="{{route('home.wishlist.users_profile.index')}}">مشاهده همه <i
                                                        class="bi bi-list-stars"></i></a>
                                            </div>
                                        </div>
                                        <div class="ui-box-item-desc">
                                            <div class="product-list-row">
                                                @if($wishlist->isEmpty())
                                                <div class="alert alert-danger">
                                                    لیست علاقه مندی های شما خالی می باشد
                                                </div>
                                            @else

                                            @foreach ($wishlist as $item)
                                                <div class="product-row">
                                                    <a href="{{ route('home.products.show' , ['product' => $item->product->slug]) }}">
                                                        <div class="product-row-desc">
                                                            <div class="product-row-desc-item">
                                                                <div class="product-row-img">
                                                                    <img src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $item->product->primary_image) }}" alt=""
                                                                        class="" width="100">
                                                                </div>
                                                                <div class="product-row-title">
                                                                    <h6>
                                                                    {{ $item->product->name }}
                                                                    </h6>
                                                                    <div class="product-price">
                                                                        @if($item->product->quantity_check)
                                                                        @if($item->product->sale_check)
                                                                        <div class="price d-flex flex-column justify-content-end">
                                                                            <div>
                                                                                <span class="fw-bold font-18 def-color">
                                                                                  {{ number_format($item->product->quantity_check->sale_price) }}
                                                                                </span>
                                                                                <svg class="mr-1 " width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                    <path class="text-gray-880 dark:text-white" d="M1.14878 6.91843C1.44428 6.91843 1.70285 6.87142 1.92447 6.77739C2.15282 6.68337 2.34422 6.55577 2.49869 6.39458C2.65316 6.2334 2.77069 6.04535 2.85128 5.83044C2.93187 5.62224 2.97888 5.40062 2.99231 5.16556H1.98492C1.6424 5.16556 1.36033 5.12862 1.1387 5.05474C0.917077 4.98087 0.742461 4.87341 0.614858 4.73238C0.487254 4.59134 0.396588 4.42344 0.34286 4.22868C0.295849 4.0272 0.272343 3.80221 0.272343 3.55372C0.272343 3.29852 0.309281 3.05674 0.383156 2.8284C0.457032 2.60005 0.564488 2.39857 0.705523 2.22396C0.846559 2.04934 1.02117 1.91167 1.22937 1.81093C1.44428 1.70347 1.68941 1.64974 1.96477 1.64974C2.1864 1.64974 2.39795 1.68668 2.59943 1.76056C2.80091 1.83443 2.97888 1.95196 3.13335 2.11315C3.28782 2.26761 3.40871 2.47245 3.49601 2.72766C3.59004 2.97615 3.63705 3.27837 3.63705 3.63431V4.47045H4.60415C4.68474 4.47045 4.73847 4.50068 4.76533 4.56112C4.79891 4.61485 4.8157 4.6988 4.8157 4.81297C4.8157 4.93386 4.79891 5.02452 4.76533 5.08497C4.73847 5.13869 4.68474 5.16556 4.60415 5.16556H3.6169C3.60347 5.49464 3.53631 5.80693 3.41542 6.10244C3.30125 6.39794 3.14007 6.65651 2.93187 6.87813C2.72368 7.09976 2.47518 7.27438 2.1864 7.40198C1.89761 7.5363 1.57188 7.60346 1.20922 7.60346H0.141381L0.0809373 6.91843H1.14878ZM0.896929 3.51343C0.896929 3.68133 0.913719 3.82572 0.947299 3.94661C0.987594 4.0675 1.0514 4.16823 1.1387 4.24883C1.23273 4.3227 1.35697 4.37979 1.51144 4.42008C1.66591 4.45366 1.86067 4.47045 2.09573 4.47045H3.00239V3.71491C3.00239 3.21792 2.90501 2.86198 2.71024 2.64707C2.51548 2.43215 2.24684 2.3247 1.90433 2.3247C1.58196 2.3247 1.33347 2.43215 1.15885 2.64707C0.984237 2.86198 0.896929 3.15076 0.896929 3.51343ZM6.26895 4.47045C6.35626 4.47045 6.41335 4.50068 6.44021 4.56112C6.47379 4.61485 6.49058 4.6988 6.49058 4.81297C6.49058 4.93386 6.47379 5.02452 6.44021 5.08497C6.41335 5.13869 6.35626 5.16556 6.26895 5.16556H4.60675C4.51944 5.16556 4.46235 5.13869 4.43549 5.08497C4.40191 5.03124 4.38512 4.94729 4.38512 4.83312C4.38512 4.71223 4.40191 4.62156 4.43549 4.56112C4.46235 4.50068 4.51944 4.47045 4.60675 4.47045H6.26895ZM7.93155 4.47045C8.01886 4.47045 8.07594 4.50068 8.10281 4.56112C8.13639 4.61485 8.15318 4.6988 8.15318 4.81297C8.15318 4.93386 8.13639 5.02452 8.10281 5.08497C8.07594 5.13869 8.01886 5.16556 7.93155 5.16556H6.26935C6.18204 5.16556 6.12495 5.13869 6.09809 5.08497C6.06451 5.03124 6.04772 4.94729 6.04772 4.83312C6.04772 4.71223 6.06451 4.62156 6.09809 4.56112C6.12495 4.50068 6.18204 4.47045 6.26935 4.47045H7.93155ZM9.59415 4.47045C9.68146 4.47045 9.73854 4.50068 9.76541 4.56112C9.79899 4.61485 9.81578 4.6988 9.81578 4.81297C9.81578 4.93386 9.79899 5.02452 9.76541 5.08497C9.73854 5.13869 9.68146 5.16556 9.59415 5.16556H7.93194C7.84464 5.16556 7.78755 5.13869 7.76069 5.08497C7.72711 5.03124 7.71032 4.94729 7.71032 4.83312C7.71032 4.71223 7.72711 4.62156 7.76069 4.56112C7.78755 4.50068 7.84464 4.47045 7.93194 4.47045H9.59415ZM11.2567 4.47045C11.3441 4.47045 11.4011 4.50068 11.428 4.56112C11.4616 4.61485 11.4784 4.6988 11.4784 4.81297C11.4784 4.93386 11.4616 5.02452 11.428 5.08497C11.4011 5.13869 11.3441 5.16556 11.2567 5.16556H9.59454C9.50723 5.16556 9.45015 5.13869 9.42328 5.08497C9.3897 5.03124 9.37291 4.94729 9.37291 4.83312C9.37291 4.71223 9.3897 4.62156 9.42328 4.56112C9.45015 4.50068 9.50723 4.47045 9.59454 4.47045H11.2567ZM12.1638 4.47045C12.4257 4.47045 12.6339 4.39994 12.7884 4.2589C12.9496 4.11787 13.0302 3.9231 13.0302 3.67461V2.2844H13.685V3.67461C13.685 4.15144 13.5506 4.52082 13.282 4.78275C13.0201 5.03795 12.6608 5.16556 12.2041 5.16556H11.2571C11.1698 5.16556 11.1127 5.13869 11.0859 5.08497C11.0523 5.03124 11.0355 4.94729 11.0355 4.83312C11.0355 4.71223 11.0523 4.62156 11.0859 4.56112C11.1127 4.50068 11.1698 4.47045 11.2571 4.47045H12.1638ZM13.7857 0.994934H12.9798V0.279683H13.7857V0.994934ZM12.5063 0.994934H11.7004V0.279683H12.5063V0.994934ZM5.64177 12.9641C5.64177 13.3267 5.58468 13.6659 5.47051 13.9815C5.35634 14.3039 5.1918 14.5826 4.97689 14.8177C4.76198 15.0595 4.50005 15.2509 4.19112 15.3919C3.8889 15.5329 3.54638 15.6035 3.16357 15.6035H2.56921C1.81702 15.6035 1.23273 15.3718 0.816337 14.9084C0.399946 14.445 0.191751 13.8103 0.191751 13.0044V11.2414H0.836485V12.9842C0.836485 13.273 0.870065 13.5349 0.937225 13.77C1.0111 14.0051 1.12191 14.2065 1.26967 14.3744C1.42413 14.549 1.61554 14.6834 1.84388 14.7774C2.07223 14.8714 2.34758 14.9184 2.66995 14.9184H3.1132C3.42885 14.9184 3.70421 14.8647 3.93927 14.7572C4.17433 14.6565 4.36909 14.5188 4.52356 14.3442C4.68474 14.1696 4.80227 13.9648 4.87615 13.7297C4.95674 13.4946 4.99703 13.2495 4.99703 12.9943V10.2844H5.64177V12.9641ZM3.21394 10.0628H2.36773V9.32738H3.21394V10.0628ZM8.24526 13.1656C8.07064 13.1656 7.90274 13.1421 7.74156 13.095C7.58038 13.0413 7.43598 12.954 7.30838 12.8331C7.18749 12.7122 7.09011 12.5544 7.01624 12.3596C6.94236 12.1582 6.90542 11.9097 6.90542 11.6142V6.9197H7.56023V11.4933C7.56023 11.7754 7.62067 12.0104 7.74156 12.1985C7.86916 12.3798 8.074 12.4705 8.35607 12.4705H8.52733C8.67508 12.4705 8.74896 12.5846 8.74896 12.813C8.74896 13.048 8.67508 13.1656 8.52733 13.1656H8.24526ZM8.69324 12.4705C8.95516 12.4705 9.15328 12.4067 9.2876 12.279C9.42192 12.1514 9.48908 11.9802 9.48908 11.7653V11.3825C9.48908 10.7982 9.63683 10.3415 9.93233 10.0124C10.2346 9.68332 10.6509 9.51878 11.1815 9.51878C11.4569 9.51878 11.6986 9.56243 11.9068 9.64974C12.115 9.73705 12.2863 9.8613 12.4206 10.0225C12.5616 10.1837 12.6657 10.3751 12.7329 10.5967C12.8001 10.8183 12.8336 11.0635 12.8336 11.3321C12.8336 11.9097 12.6825 12.3596 12.3803 12.682C12.0781 13.0044 11.6651 13.1656 11.1412 13.1656C10.8726 13.1656 10.614 13.1152 10.3655 13.0144C10.117 12.907 9.92226 12.7189 9.78123 12.4503C9.72078 12.6048 9.64691 12.729 9.5596 12.823C9.47229 12.9171 9.38162 12.9909 9.2876 13.0447C9.19358 13.0917 9.09284 13.1253 8.98538 13.1454C8.88464 13.1588 8.78726 13.1656 8.69324 13.1656H8.53205C8.44475 13.1656 8.38766 13.1387 8.3608 13.085C8.32722 13.0312 8.31043 12.9473 8.31043 12.8331C8.31043 12.7122 8.32722 12.6216 8.3608 12.5611C8.38766 12.5007 8.44475 12.4705 8.53205 12.4705H8.69324ZM12.1889 11.3925C12.1889 11.0433 12.1117 10.7612 11.9572 10.5463C11.8027 10.3247 11.5375 10.2139 11.1614 10.2139C10.4629 10.2139 10.1137 10.6202 10.1137 11.4328C10.1137 11.7754 10.2077 12.0339 10.3957 12.2085C10.5905 12.3831 10.839 12.4705 11.1412 12.4705C11.4837 12.4705 11.7423 12.3764 11.9169 12.1884C12.0982 12.0003 12.1889 11.7351 12.1889 11.3925Z" fill="currentColor"></path>
                                                                                </svg>
                                                                            </div>
                                                                            <div class="d-flex justify-content-center align-items-center">
                                                                                <span
                                                                                    class="text-muted font-14 text-decoration-line-through">
                                                                                    {{ number_format($item->product->quantity_check->price) }}
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                        <div>
                                                                            <span class="fw-bold font-18 def-color">
                                                                              {{ number_format($item->product->quantity_check->price) }}
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
                                                                </div>

                                                            </div>
                                                            <div class="product-row-icon">
                                                                <a href="{{ route('home.wishlist.remove' , ['product' => $item->product->id]) }}"><i class="bi bi-trash"></i></a>
                                                                <a href=""><i class="bi bi-cart-plus"></i></a>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                            @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="ui-boxs">
                                    <div class="ui-box">
                                        <div class="ui-box-item ui-box-white">
                                            <div class="ui-box-item-title" style="padding: 15px;">
                                                <h4 class="fw-bold">
                                                    آخرین سفارش ها
                                                </h4>
                                            </div>
                                            <div class="ui-box-item-desc p-0">
                                                <div class="orders">
                                                    <div class="order-item">
                                                        <a href="order-detail.html">
                                                            <div class="order-item-status">
                                                                <div class="order-item-status-item">
                                                                    <p><i class="bi bi-bag-check-fill"></i>
                                                                        <span>تحویل شده</span></p>
                                                                </div>
                                                                <div class="order-item-status-item">
                                                                    <p><i
                                                                            class="bi bi-arrow-left pointer text-dark"></i>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="order-item-detail">
                                                                <ul class="nav">
                                                                    <li class="nav-item text-muted">29 خرداد 1399
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <span class="text-mute">کد سفارش</span>
                                                                        <strong>17745651</strong>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <span class="text-mute">مبلغ</span>
                                                                        <strong>25,000,000 تومان</strong>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="order-item-product-list">
                                                                <div class="order-item-product-list-item">
                                                                    <img src="img/product/product-image1.jpg" alt=""
                                                                        class="img-thumbnail" width="70"
                                                                        height="70">
                                                                </div>
                                                                <div class="order-item-product-list-item">
                                                                    <img src="img/product/product-image3.jpg" alt=""
                                                                        class="img-thumbnail" width="70"
                                                                        height="70">
                                                                </div>
                                                                <div class="order-item-product-list-item">
                                                                    <img src="img/product/product-image4.jpg" alt=""
                                                                        class="img-thumbnail" width="70"
                                                                        height="70">
                                                                </div>
                                                                <div class="order-item-product-list-item">
                                                                    <img src="img/product/product-image5.jpg" alt=""
                                                                        class="img-thumbnail" width="70"
                                                                        height="70">
                                                                </div>
                                                                <div class="order-item-product-list-item">
                                                                    <img src="img/product/product-image6.jpg" alt=""
                                                                        class="img-thumbnail" width="70"
                                                                        height="70">
                                                                </div>
                                                            </div>
                                                            <div class="order-item-show">
                                                                <p><i class="bi bi-card-list"></i> مشاهده فاکتور</p>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end dashboard -->
</div>
@else

<div>
    <script>
        Swal.fire({
      icon: "warning",
      title: "توجه کنید...",
      text: "برای دسترسی به این بخش ابتدا وارد شوید !",
      footer: '<a class="text-warning fs-4 fw-bold" href="#loginModal" data-bs-toggle="modal">ورود و یا ثبت نام</a>',
      timer: 4200,
    });
    </script>
</div>

@endauth

@endsection


