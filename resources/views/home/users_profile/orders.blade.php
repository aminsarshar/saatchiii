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
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center">

                                                        @foreach ($orders as $key => $order)
                                                            @php
                                                                $transactions = App\Models\Transaction::where(
                                                                    'user_id',
                                                                    auth()->id(),
                                                                )->find($order->id);

                                                            @endphp
                                                            <tr>
                                                                <td> {{ $orders->firstItem() + $key }} </td>
                                                                @foreach ($order->orderItems as $item)
                                                                    <td>
                                                                        <a href="{{ route('home.products.show', ['product' => $item->product->slug]) }}"
                                                                            style="width: 100px">
                                                                            <img style="width: 100px !important"
                                                                                class="w-full"
                                                                                src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $item->product->primary_image) }}"
                                                                                alt="">
                                                                        </a>
                                                                    </td>
                                                                @endforeach
                                                                <td> {{ verta($order->created_at)->format('%d %B، %Y') }}
                                                                <td> {{ $transactions->ref_id }}</td>
                                                                </td>
                                                                <td>{{ $order->status }}</td>
                                                                <td>
                                                                    @if ($order->payment_stage == 'waiting')
                                                                        <div class="btn btn-warning text-white">در
                                                                            انتظار بررسی</div>
                                                                    @elseif($order->payment_stage == 'inprogress')
                                                                        <div class="btn btn-primary">در حال انجام</div>
                                                                    @elseif($order->payment_stage == 'completed')
                                                                        <div class="btn btn-success">تکمیل شده</div>
                                                                    @elseif($order->payment_stage == 'canceled')
                                                                        <div class="btn btn-danger">لغو شده</div>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    {{ number_format($order->paying_amount) }}
                                                                    تومان
                                                                </td>
                                                                {{-- <td><a href="#" data-toggle="modal"
                                                                            data-target="#ordersDetiles-{{ $order->id }}"
                                                                            class="check-btn sqr-btn "> نمایش جزئیات </a> --}}
                                                                <!-- Button trigger modal -->
                                                            </tr>
                                                        @endforeach


                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                        <hr>

                                        {{ $orders->links() }}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end main-data -->

        <!-- Modal -->
        @foreach ($order->orderItems as $item)
            <div class="modal fade " id="exampleModal-{{ $item->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel-{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel-{{ $item->id }}">
                                {{ $item->product->name }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">عکس محصول</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Handle</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{ $item->product->description }}</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td colspan="2">Larry the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endsection
