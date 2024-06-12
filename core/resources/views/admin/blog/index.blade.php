@extends('admin.layouts.admin')

@section('title')
    index blogs
@endsection

@section('script')
<script>
    function filter() {

        let sortBy = $('#sort-by').val();
        if (sortBy == "default") {
            $('#filter-sort-by').prop('disabled', true);
        } else {
            $('#filter-sort-by').val(sortBy);
        }

        let search = $('#search-input').val();
        if (search == "") {
            $('#filter-search').prop('disabled', true);
        } else {
            $('#filter-search').val(search);
        }

        $('#filter-form').submit();
    }

    $('#filter-form').on('submit', function(event) {
        event.preventDefault();
        let currentUrl = '{{ url()->current() }}';
        let url = currentUrl + '?' + decodeURIComponent($(this).serialize())
        $(location).attr('href', url);
    });

    $('.variation-select').on('change' , function(){
        let variation = JSON.parse(this.value);
        let variationPriceDiv = $('.variation-price-' + $(this).data('id'));

        variationPriceDiv.empty();

        if(variation.is_sale){
            let spanSale = $('<span />' , {
                class : 'new',
                text : toPersianNum(number_format(variation.sale_price)) + ' تومان'
            });
            let spanPrice = $('<span />' , {
                class : 'old',
                text : toPersianNum(number_format(variation.price)) + ' تومان'
            });

            variationPriceDiv.append(spanSale);
            variationPriceDiv.append(spanPrice);
        }else{
            let spanPrice = $('<span />' , {
                class : 'new',
                text : toPersianNum(number_format(variation.price)) + ' تومان'
            });
            variationPriceDiv.append(spanPrice);
        }

        $('.quantity-input').attr('data-max' , variation.quantity);
        $('.quantity-input').val(1);

    });

    $('#pagination li a').map(function(){
        let decodeUrl = decodeURIComponent($(this).attr('href'));
        if( $(this).attr('href') !== undefined ){
            $(this).attr('href' , decodeUrl);
        }
    });

</script>
@endsection

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="d-flex flex-column text-center flex-md-row justify-content-md-between mb-4">
                <h5 class="font-weight-bold mb-3 mb-md-0">لیست مقاله ها </h5>
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.blog.create') }}">
                    <i class="fa fa-plus"></i>
                    ایجاد مقاله
                </a>
                <div class="sidebar-widget">
                    <h4 class="pro-sidebar-title">جستجو </h4>
                    <div class="pro-sidebar-search mb-50 mt-25">
                        <div class="pro-sidebar-search-form">
                            <input id="search-input" type="text" placeholder="... جستجو "
                                value="{{ request()->has('search') ? request()->search : '' }}">
                            <button type="button" onclick="filter()">
                                <i class="sli sli-magnifier"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>عنوان مقاله</th>
                            <th>محتوای مقاله</th>
                            <th>تصویر مقاله</th>
                            <th>نام نویسنده</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blog as $key => $blogs)
                            <tr>
                                <th>
                                    {{ $blog->firstItem() + $key }}
                                </th>
                                <th>
                                    {{ $blogs->title }}
                                </th>
                                <th>
                                    {{-- {{$blogs->description = strip_tags($blogs->description)}} --}}

                                    {{$blogs->description = strip_tags(\Illuminate\Support\Str::limit($blogs->description,100))}}
                                </th>
                                

                                <th>
                                    <img src="{{ asset(env('BLOG_IMAGES_UPLOAD_PATH').$blogs->primary_image) }}" alt="{{ $blogs->title }}" width="90px">
                                </th>

                                <th>
                                    {{ $blogs->user->name }}
                                </th>

                                <th>
                                    <span
                                        class="{{ $blogs->getRawOriginal('is_active') ? 'text-success' : 'text-danger' }}">
                                        {{ $blogs->is_active }}
                                    </span>
                                </th>

                                <th>
                                    <a class="btn btn-sm btn-outline-success"
                                        href="{{ route('admin.blog.show', ['blog' => $blogs->id]) }}">نمایش</a>
                                    <a class="btn btn-sm btn-outline-info mr-3"
                                        href="{{ route('admin.blog.edit', ['blog' => $blogs->id]) }}">ویرایش</a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $blog->render() }}
            </div>
        </div>
    </div>
@endsection
