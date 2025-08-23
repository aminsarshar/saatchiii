    <div class="product-box blog-box py-20">
        <div class="container-fluid">
            <div class="parent" style="height: 440px">
                <div class="content-title">
                    <div class="item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-seam" viewBox="0 0 16 16">
                            <path
                                d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                        </svg>
                        <h5 class="title">آخرین مطالب وبلاگ</h5>
                    </div>
                    <div class="item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z" />
                            <path fill-rule="evenodd"
                                d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                        </svg>
                        <a href="{{ route('home.blog.index') }}">
                            <h5 class="title">مشاهده همه</h5>
                        </a>
                    </div>
                </div>
                <div class="swiper py-5" id="swiper-box-two">
                    <div class="swiper-wrapper">

                        @foreach ($blog as $blogs)
                            <div class="swiper-slide">
                                <a href="{{ route('home.blogs.show', ['blogs' => $blogs->slug]) }}">
                                    <div class="image-blog text-center">
                                        <img style="height: 300px;"
                                            src="{{ asset(env('BLOG_IMAGES_UPLOAD_PATH') . $blogs->primary_image) }}"
                                            alt="{{ $blogs->title }}" class="img-fluid">
                                        <div class="blog-desc position-absolute bottom-0">
                                            <h6 class="font-14">{{ $blogs->title }}
                                            </h6>
                                            <div class="d-flex justify-content-between align-items-center my-2">
                                                <div class="like">
                                                    <span class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-heart"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                                        </svg>
                                                    </span>
                                                    <span class="counter font-12">25</span>
                                                </div>
                                                <div class="date">
                                                    <span
                                                        class="font-12">{{ verta($blogs->created_at)->format('%d  %B   %Y') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                    <div class="swiper-pagination" style="height: 125px"></div>
                    <div class="swiper-button-next d-sm-flex d-none"></div>
                    <div class="swiper-button-prev d-sm-flex d-none"></div>
                </div>
            </div>
        </div>
    </div>
