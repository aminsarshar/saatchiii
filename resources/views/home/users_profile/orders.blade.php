@extends('home.layouts.home')
<link rel="stylesheet" href="{{asset('assets/css/style-1.css')}}">

@section('title')
    صفحه ای سفارشات
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
                                                        {{-- <th>شماره سفارش</th> --}}
                                                        <th>مبلغ پرداختی</th>
                                                        <th>وضعیت سفارش</th>
                                                        <th>جزییات</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    @php
                                                    $transactions = App\Models\Transaction::where('user_id' , auth()->id())->find(10);
                                                    @endphp
                                                    @foreach ($orders as $key => $order)

                                                            <tr>
                                                                <td> {{ $orders->firstItem() + $key }} </td>
                                                                {{-- <td> {{ $transactions->order_id }}</td> --}}
                                                                <td> {{ verta($order->created_at)->format('%d %B، %Y') }}
                                                                </td>
                                                                <td>{{ $order->status }}</td>
                                                                <td>
                                                                    {{ number_format($order->paying_amount) }}
                                                                    تومان
                                                                </td>
                                                                <td><a href="#" data-toggle="modal"
                                                                        data-target="#ordersDetiles-{{ $order->id }}"
                                                                        class="check-btn sqr-btn "> نمایش جزئیات </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach


                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <hr>

                                    {{$orders->links()}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end main-data -->



@endsection
