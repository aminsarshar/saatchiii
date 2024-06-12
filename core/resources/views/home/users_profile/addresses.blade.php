@extends('home.layouts.home')
<link rel="stylesheet" href="{{asset('assets/css/style-1.css')}}">


<script src="{{asset('assets/js/home.js')}}"></script>
<script src="{{asset('assets/js/plugins.js')}}"></script>
<script src="{{asset('assets/js/jquery-1.12.4.min.js')}}"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

@section('title')
    صفحه ای آدرس ها
@endsection

@section('script')
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

                            <button class="" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
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

                                        <button class="cart-btn-2" type="submit"> ثبت آدرس
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
                                                        <div class="order-item-status flex-nowrap">
                                                            <div class="order-item-status-item">
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

                                                                                <button class="cart-btn-2" type="submit" style="background-color: #FFC107;
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

@endsection
