    <div class="banner py-20">
        <div class="container-fluid">
            <div class="row">
                @foreach ($indexSpecialBanners as $sbanner)
                    <div class="col-md-6 mt-md-0 mt-2">
                        <a href="">
                            <img src="{{ asset(env('BANNER_IMAGES_UPLOAD_PATH') . $sbanner->image) }}"
                                class="img-fluid rounded-3 shadow-box" alt="">
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
