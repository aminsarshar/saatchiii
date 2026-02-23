@extends('home.layouts.home')
<link rel="stylesheet" href="{{ asset('assets/css/home.css') }}" />
@section('title')
    وبلاگ
@endsection
@section('content')
    <!-- bread croumb -->
    <div class="content">
        <div class="container-fluid">
            <nav aria-label="breadcrumb" class="my-lg-0 my-2">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#" class="font-14 text-muted">خانه</a></li>
                    <li class="breadcrumb-item active main-color-one-color font-14" aria-current="page">وبلاگ</li>
                </ol>
            </nav>
        </div>
    </div>



    <!-- start main-data -->
    <div class="content">
        <div class="container-fluid">
            <div class="row gy-2">
                <div class="col-lg-3 order-lg-1 order-2">
                    <div class="item-boxs">

                        <div class="item-box bg-white shadow-box">
                            <div class="title">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="font-14">جستجو</h6>
                                    <a class="btn border-0" data-bs-toggle="collapse" href="#collapseItemBoxSearch"
                                        role="button" aria-expanded="false">
                                        <i class="bi bi-chevron-down"></i>
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
                <div class="col-lg-9 order-lg-2 order-1">
                    <div class="content-box">
                        <div class="row gy-4">

                            @foreach ($blog as $blogs)
                                <div class="col-md-4 col-sm-6">
                                    <div class="shadow-box">
                                        <div class="card shadow-inner border-muted">
                                            <div class="image-blog text-center">
                                                <img style="height: 225px;"
                                                    src="{{ asset(env('BLOG_IMAGES_UPLOAD_PATH') . $blogs->primary_image) }}"
                                                    alt="{{ $blogs->title }}" class="img-fluid rounded-2">
                                                <div class="blog-desc p-0 px-2 position-absolute bottom-0">
                                                    <div class="d-flex justify-content-between align-items-center my-2">
                                                        <div class="like">
                                                            <span class="icon">
                                                                <i class="bi bi-heart"></i>
                                                            </span>
                                                            <span class="counter font-12">25</span>
                                                        </div>
                                                        <div class="date">
                                                            <span class="icon">
                                                                <i class="bi bi-calendar-event"></i>
                                                            </span>
                                                            <span class="font-12">{{ verta($blogs->created_at)->format('%d  %B   %Y') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title font-15 text-overflow-2">{{ $blogs->title }}
                                                </h5>
                                                <p class="card-text text-overflow-3 font-13 text-justify">
                                                    {{!! $blogs->description = strip_tags(\Illuminate\Support\Str::limit($blogs->description, 200)) !!}}
                                                </p>
                                                <a href="{{ route('home.blogs.show', ['blogs' => $blogs->slug]) }}"
                                                    class="span-primary rounded-3 font-14 shadow-md">مشاهده</a>
                                                <div
                                                    class="my-card-footer mt-3 d-flex justify-content-center border-top pt-2 border-muted">
                                                    <div class="btn-group" role="group">
                                                        <a href="" class="btn border-0 bg-dark text-white btn-sm"
                                                            style="border-top-right-radius:20px;border-bottom-right-radius:20px">تکتولوژی</a>
                                                        <a href="" class="btn border-0 bg-primary text-white btn-sm"
                                                            style="border-top-left-radius:20px;border-bottom-left-radius:20px">0
                                                            دیدگاه</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            {{ $blog->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end main-data -->
    @endsection
