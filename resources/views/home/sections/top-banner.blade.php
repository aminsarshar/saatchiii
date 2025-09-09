    <div class="banner py-20" style="overflow: hidden !important">
        <div class="container-fluid" style="overflow: hidden !important">
            <div class="row">
                @foreach ($indexTopBanners as $banner)
                    <div class="col-md-3 col-6 mt-md-0 mt-2" data-aos="fade-up" data-aos-duration="700">
                        <a href="">
                            <img src="{{ asset(env('BANNER_IMAGES_UPLOAD_PATH') . $banner->image) }}"
                                class="img-fluid rounded-3 shadow-box" alt="">
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
