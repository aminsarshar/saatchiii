    <!-- home-slider -->
    <div class="home-slider py-20">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="swiper" id="homeSlider">
                        <div class="swiper-wrapper">
                            @foreach ($sliders as $slider)
                                <div class="swiper-slide">
                                    <a href=""><img
                                            src="{{ asset('/upload/files/banners/images/' . $slider->image) }}"
                                            class="d-sm-block d-none" alt=""></a>
                                    <a href=""><img
                                            src="{{ asset('/upload/files/banners/images/' . $slider->image) }}"
                                            class="d-sm-none d-block" alt=""></a>
                                </div>
                            @endforeach

                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next d-md-flex d-none"></div>
                        <div class="swiper-button-prev d-md-flex d-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end home-slider -->
