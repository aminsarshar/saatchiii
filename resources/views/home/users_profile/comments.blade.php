@extends('home.layouts.home')
<link
rel="stylesheet"
href="{{asset('assets/css/home.css')}}"
/>
@section('title')
پروفایل کاربری-نظرات
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
                                        <h6 class="font-14">آخرین نظرات من</h6>
                                    </div>
                                    <div class="desc shadow-none">
                                        <div class="sended-comments">
                                            @foreach ($comments as $comment)
                                            <div class="sended-comment mb-3 py-3 border-bottom border-muted">
                                                <div
                                                    class="d-flex align-items-center justify-content-between flex-wrap">
                                                    <div class="review-name d-flex align-items-center">
                                                        <h4>
                                                            برای محصول :
                                                        </h4>
                                                        <a class="mr-1"
                                                            href="{{ route('home.products.show', ['product' => $comment->product->slug]) }}"
                                                            style="color:#ff3535;">
                                                            <img src="{{asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $comment->product->primary_image)}}" alt="" width="150px">
                                                            {{$comment->product->name}}
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <span class="badge main-color-three-bg">تایید شده</span>
                                                        <a class="" href="#" role="button" id="dropdownMenuLink"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="bi bi-three-dots-vertical text-dark fs-5"></i>
                                                        </a>


                                                    </div>
                                                </div>
                                                <div
                                                    class="comment mt-3 bg-light shadow-box border-1 border-muted mb-4">
                                                    <div class="titlea">
                                                        <div class="row align-items-center">
                                                            <div class="col-sm-10">
                                                                <div class="d-flex align-items-center">
                                                                    <div
                                                                        class="avatar p-2 bg-white shadow-box rounded-circle">
                                                                        <img src="{{ $comment->user->avatar == null ? asset('assets/image/user-profile.png') : $comment->user->avatar }}" alt=""
                                                                            class="img-fluid rounded-circle">
                                                                    </div>
                                                                    <div
                                                                        class="d-flex flex-wrap align-items-center ms-2">
                                                                        <h6 class="text-muted font-14">{{ $comment->user->name == null ? 'کاربر گرامی' : $comment->user->name }}</h6>
                                                                        <h6 class="text-muted font-14 ms-2">{{ verta($comment->created_at)->format('d') }} {{ verta($comment->created_at)->formatWord('F') }} {{ verta($comment->created_at)->format('Y') }}</h6>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="desc shadow-none bg-transparent py-3">
                                                        <p class="font-14 text-muted">
                                                            {{$comment->text}}
                                                        </p>
                                                    </div>
                                                    <div class="foot">
                                                        <div class="col-md-4 mt-md-0 mt-3">
                                                            <div class="comments-like">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="d-flex align-items-center ms-3">
                                                                        <a href=""
                                                                            class="btn btn-sm border-0 main-color-one-bg waves-effect waves-light">
                                                                            <span>70</span>
                                                                            <i class="bi bi-hand-thumbs-up"></i>
                                                                        </a>
                                                                        <a href=""
                                                                            class="btn btn-sm border-0 main-color-two-bg ms-3 waves-effect waves-light">
                                                                            <span>70</span>
                                                                            <i class="bi bi-hand-thumbs-down"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="my-paginate pb-3">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination justify-content-center">
                                                <li class="page-item disabled">
                                                    <a class="page-link rounded-3" href="#"><i
                                                            class="bi bi-chevron-right"></i></a>
                                                </li>
                                                <li class="page-item active"><a class="page-link rounded-3"
                                                        href="#">1</a></li>
                                                <li class="page-item"><a class="page-link rounded-3" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link rounded-3" href="#">3</a></li>
                                                <li class="page-item"><a class="page-link rounded-3" href="#">...</a>
                                                </li>
                                                <li class="page-item"><a class="page-link rounded-3" href="#">14</a>
                                                </li>
                                                <li class="page-item"><a class="page-link rounded-3" href="#">15</a>
                                                </li>
                                                <li class="page-item"><a class="page-link rounded-3" href="#">16</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link rounded-3" href="#"><i
                                                            class="bi bi-chevron-left"></i></a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
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
