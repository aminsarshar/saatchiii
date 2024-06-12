@extends('home.layouts.home')
<link
rel="stylesheet"
href="{{asset('assets/css404/bootstrap-rtl.css')}}"
/>
<link
rel="stylesheet"
href="{{asset('assets/css404/style.css')}}"
/>

@section('script')
<script  src="{{asset('assets/js404/scripts.js')}}"></script>


@endsection


@section('title')
    صفحه 404
@endsection


@section('content')
<div class="error">
    <div class="container-floud">
        <div class="col-12 ground-color text-center">
            <div class="container-error-404">
                <div class="clip"><div class="shadow"><span class="digit firstDigit"></span></div></div>
                <div class="clip"><div class="shadow"><span class="digit secondDigit"></span></div></div>
                <div class="clip"><div class="shadow"><span class="digit thirdDigit"></span></div></div>
            </div>
            <br>
            <br>
            <h2 class="h1">صفحه مورد نظر یافت نشد!</h2>
            <a href="{{route('home.index')}}"><button class="btn btn-primary">بازگشت به صفحه نخست</button></a>
            <a href="{{route('home.shop')}}"><button class="btn btn-primary">صفحه محصولات</button></a>
        </div>
    </div>
</div>

@endsection
