@extends('home.layouts.home')
<link rel="stylesheet" href="{{asset('assets/js/plugin/countdown/countdown.css')}}">
{{-- <link rel="stylesheet" href="{{asset('assets/css/style-1.css')}}"> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



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

<div class="content">
    <div class="dashboard">
        <div class="container-fluid">
            <div class="row">
                @include('home.sections.profile_sidebar')
                <div class="col-lg-9">
                    <div class="content-box" style="padding:40px 20px;">
                        <p>
                            <button class="address_btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                              ایجاد آدرس
                            </button>
                          </p>
                          <div style="box-shadow: rgb(0 0 0 / 10%) 0px 0px 10px 0px !important;padding:30px;margin-bottom:30px" class="collapse" id="collapseExample"  style="{{ count($errors->addressStore) > 0 ? 'display:block' : '' }}">
                            <form action="{{ route('home.addresses.store') }}" method="POST">
                                @csrf
                                <div class="row">

                                    <div class="tax-select col-lg-6 col-md-6">
                                        <label>
                                            عنوان
                                        </label>
                                        <input class="form-control" type="text" name="title" value="{{ old('title') }}">
                                        @error('title', 'addressStore')
                                            <p class="input-error-validation">
                                                <strong>{{ $message }}</strong>
                                            </p>
                                        @enderror
                                    </div>
                                    <div class="tax-select col-lg-6 col-md-6">
                                        <label>
                                            شماره تماس
                                        </label>
                                        <input class="form-control" type="text" name="cellphone" value="{{ old('cellphone') }}">
                                        @error('cellphone', 'addressStore')
                                            <p class="input-error-validation">
                                                <strong>{{ $message }}</strong>
                                            </p>
                                        @enderror
                                    </div>
                                    <div class="tax-select col-lg-6 col-md-6">
                                        <label>
                                            استان
                                        </label>
                                        <select  class="email s-email s-wid province-select form-control" name="province_id">
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province->id }}">{{ $province->name }}</option>
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
                                        <select class="email s-email s-wid city-select form-control" name="city_id">
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
                                        <input class="form-control" type="text" name="address" value="{{ old('address') }}">
                                        @error('address', 'addressStore')
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
                                            value="{{ old('postal_code') }}">
                                        @error('postal_code', 'addressStore')
                                            <p class="input-error-validation">
                                                <strong>{{ $message }}</strong>
                                            </p>
                                        @enderror
                                    </div>

                                    <div class=" col-lg-12 col-md-12">

                                        <button class="address_btn" type="submit"> ثبت آدرس
                                        </button>
                                    </div>



                                </div>

                            </form>
                          </div>
                        <div class="row">

                            <div class="col-12">
                                <div class="ui-boxs">
                                    <div class="ui-box">
                                        <div class="ui-box-item ui-box-white">
                                            <div class="ui-box-item-title" style="padding: 15px;">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h4 class="fw-bold">
                                                        آدرس ها
                                                    </h4>



                                                </div>
                                            </div>
                                            <div class="ui-box-item-desc">
                                                <div class="orders">
                                                    <div class="order-item">
                                                        <div class="order-item-status-item">
                                                            @if($addresses->isEmpty())
                                                            <div class="alert alert-warning" style="margin: 10px">
                                                             آدرسی ثبت نشده
                                                            </div>
                                                            @else
                                                        <div class="order-item-status flex-nowrap">
                                                                @foreach ($addresses as $address)
                                                                <div>
                                                                    <address>
                                                                        <p class="address_p">
                                                                            <strong>{{auth()->user()->name}}</strong>
                                                                            <br>
                                                                            <br>
                                                                            <span class="mr-2"> عنوان آدرس : <span> {{$address->title}} </span> </span>

                                                                        </p>
                                                                        <p class="address_p">

                                                                            <i class="bi bi-geo-alt-fill"></i>  {{$address->address}}
                                                                            <br>
                                                                            <br>
                                                                            <span class="address_p"><i class="bi bi-pin-map me-1"></i> استان : {{ province_name($address->province_id) }} </span>
                                                                            <span> شهر : {{ city_name($address->city_id) }} </span>
                                                                        </p>
                                                                        <p class="address_p">
                                                                            <i class="bi bi-mailbox"></i>   کدپستی :
                                                                            {{$address->postal_code}}

                                                                        </p>
                                                                        <p class="address_p">
                                                                          <i class="bi bi-phone me-1"></i>  شماره موبایل :
                                                                            {{$address->cellphone}}

                                                                        </p>

                                                                    </address>





                                                                    <a href="#" style="color: white !important" class="address_btn" data-bs-toggle="collapse" data-bs-target="#collapseEdit-{{$address->id}}" aria-expanded="false" aria-controls="collapseEdit">
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
                                                                                <select class="email s-email s-wid province-select form-control"
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
                                                                                <select class="email s-email s-wid city-select form-control"
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

                                                                                <button class="address_btn" type="submit" style="background-color: #FFC107;
                                                                                color: white;
                                                                                margin-bottom: 40px;"> ویرایش آدرس
                                                                                </button>
                                                                                <hr>
                                                                            </div>

                                                                        </div>

                                                                    </form>
                                                                    </div>


                                                                </div>

                                                                @endforeach
                                                                @endif
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
    </div>
    <!-- end dashboard -->
</div>

<style>
    .address_btn{
     background: linear-gradient(to right, #c77dff, #9d4edd);
    color: white;
    border: navajowhite;
    padding: 7px;
    margin-top: 22px;
    border-radius: 7px;
                }
</style>

@endsection
