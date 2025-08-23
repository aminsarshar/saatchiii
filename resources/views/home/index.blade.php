@extends('home.layouts.home')

@section('title')
    فروشگاه ساعت چی
@endsection


@section('content')


    <!-- home-slider -->
    @include('home.sections.home-slider')
    <!-- end home-slider -->


    <!-- feature -->
    @include('home.sections.feature')
    <!-- end feature -->


    <!-- start special-offer -->
    @include('home.sections.special-offer')
    <!-- end special-offer -->


    <!-- start products-one -->
    @include('home.sections.products-one')
    <!-- end products-one -->


    <!-- start top_banner -->
    {{-- @include('home.sections.top-banner') --}}
    <!-- end top_banner -->


    <!-- start center_banner -->
    {{-- @include('home.sections.center-banner') --}}
    <!-- end center_banner -->


    <!-- start brand box -->
    @include('home.sections.brands')
    <!-- end brand box -->


    <!-- product box two -->
    @include('home.sections.products-two')
    <!-- end product box two -->


    <!-- start blog box -->
    @include('home.sections.blogs')
    <!-- end blog box -->


    <!-- start special_offer modal -->
    @include('home.sections.special-offer-modal')
    <!-- end special_offer modal -->


    <!-- start product box one modal -->
    @include('home.sections.products-one-modal')
    <!-- end product box one modal -->

    
    <!-- start product box two modal -->
    @include('home.sections.products-two-modal')
    <!-- end product box two modal -->

@endsection
