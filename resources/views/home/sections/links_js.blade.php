<!-- Plugins JS File -->
@livewireScripts

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/plugin/waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/plugin/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/plugin/timer/timer.js') }}"></script>
<script src="{{ asset('assets/plugin/hint-css/hint-css.js') }}"></script>
<script src="{{ asset('assets/plugin/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/jquery-app.js') }}"></script>

<!-- ===== start new update 3.2.0 -->
<script src="{{ asset('assets/plugin/go-to-top/script.js') }}"></script>
<script src="{{ asset('assets/plugin/rasta-contact/script.js') }}"></script>

<link rel="stylesheet" href="{{ asset('assets/plugin/go-to-top/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugin/rasta-contact/style.css') }}">

<script src="{{ asset('assets/rating.js') }}"></script>




<script>
    window.toPersianNum = function(num, dontTrim) {

        var i = 0,

            dontTrim = dontTrim || false,

            num = dontTrim ? num.toString() : num.toString().trim(),
            len = num.length,

            res = '',
            pos,

            persianNumbers = typeof persianNumber == 'undefined' ? ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸',
                '۹'
            ] :
            persianNumbers;

        for (; i < len; i++)
            if ((pos = persianNumbers[num.charAt(i)]))
                res += pos;
            else
                res += num.charAt(i);

        return res;
    }

    window.number_format = function(number, decimals, dec_point, thousands_point) {

        if (number == null || !isFinite(number)) {
            throw new TypeError("number is not valid");
        }

        if (!decimals) {
            var len = number.toString().split('.').length;
            decimals = len > 1 ? len : 0;
        }

        if (!dec_point) {
            dec_point = '.';
        }

        if (!thousands_point) {
            thousands_point = ',';
        }

        number = parseFloat(number).toFixed(decimals);

        number = number.replace(".", dec_point);

        var splitNum = number.split(dec_point);
        splitNum[0] = splitNum[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_point);
        number = splitNum.join(dec_point);

        return number;
    }

    $('.variation-select').on('change', function() {
        let variation = JSON.parse(this.value);
        let variationPriceDiv = $('.variation-price-' + $(this).data('id'));
        variationPriceDiv.empty();

        if (variation.is_sale) {
            let spanSale = $('<span />', {
                class: 'new',
                text: toPersianNum(number_format(variation.sale_price)) + ' تومان'
            });
            let spanPrice = $('<span />', {
                class: 'old',
                text: toPersianNum(number_format(variation.price)) + ' تومان'
            });

            variationPriceDiv.append(spanSale);
            variationPriceDiv.append(spanPrice);
        } else {
            let spanPrice = $('<span />', {
                class: 'new',
                text: toPersianNum(number_format(variation.price)) + ' تومان'
            });
            variationPriceDiv.append(spanPrice);
        }

        $('.quantity-input').attr('max', variation.quantity);
        $('.quantity-input').val(1);

    });
</script>

<script type="text/javascript">
    ! function() {
        var i = "by5M6H",
            a = window,
            d = document;

        function g() {
            var g = d.createElement("script"),
                s = "https://www.goftino.com/widget/" + i,
                l = localStorage.getItem("goftino_" + i);
            g.async = !0, g.src = l ? s + "?o=" + l : s;
            d.getElementsByTagName("head")[0].appendChild(g);
        }
        "complete" === d.readyState ? g() : a.attachEvent ? a.attachEvent("onload", g) : a.addEventListener("load", g, !
            1);
    }();
</script>

<script>
    window.toPersianNum = function(num, dontTrim) {

        var i = 0,

            dontTrim = dontTrim || false,

            num = dontTrim ? num.toString() : num.toString().trim(),
            len = num.length,

            res = '',
            pos,

            persianNumbers = typeof persianNumber == 'undefined' ? ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸',
                '۹'
            ] :
            persianNumbers;

        for (; i < len; i++)
            if ((pos = persianNumbers[num.charAt(i)]))
                res += pos;
            else
                res += num.charAt(i);

        return res;
    }

    window.number_format = function(number, decimals, dec_point, thousands_point) {

        if (number == null || !isFinite(number)) {
            throw new TypeError("number is not valid");
        }

        if (!decimals) {
            var len = number.toString().split('.').length;
            decimals = len > 1 ? len : 0;
        }

        if (!dec_point) {
            dec_point = '.';
        }

        if (!thousands_point) {
            thousands_point = ',';
        }

        number = parseFloat(number).toFixed(decimals);

        number = number.replace(".", dec_point);

        var splitNum = number.split(dec_point);
        splitNum[0] = splitNum[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_point);
        number = splitNum.join(dec_point);

        return number;
    }

    $('.variation-select').on('change', function() {
        let variation = JSON.parse(this.value);
        let variationPriceDiv = $('.variation-price-' + $(this).data('id'));
        variationPriceDiv.empty();

        if (variation.is_sale) {
            let spanSale = $('<span />', {
                class: 'new',
                text: toPersianNum(number_format(variation.sale_price)) + ' تومان'
            });
            let spanPrice = $('<del />', {
                class: 'old',
                text: toPersianNum(number_format(variation.price)) + ' تومان'
            });

            variationPriceDiv.append(spanSale);
            variationPriceDiv.append(spanPrice);
        } else {
            let spanPrice = $('<span />', {
                class: 'new',
                text: toPersianNum(number_format(variation.price)) + ' تومان'
            });
            variationPriceDiv.append(spanPrice);
        }

        $('.quantity-input').attr('max', variation.quantity);
        $('.quantity-input').val(1);

    });
</script>

<script>
    //// config floating contact
    $('#btncollapzion').Collapzion({
        _child_attribute: [{
                'label': 'پشتیبانی تلفنی',
                'url': 'tel:0930555555555',
                'icon': 'bi bi-telephone'
            },
            {
                'label': 'پشتیبانی تلگرام',
                'url': 'https://tlgrm.me',
                'icon': 'bi bi-telegram'
            },
            {
                'label': 'پشتیبانی واتس آپ',
                'url': 'https://wa.me/444444444',
                'icon': 'bi-whatsapp'
            },

        ],
    });
</script>
<script src="{{ asset('assets/js/rating.js') }}"></script>
<script src="{{ asset('assets/js/wow.js') }}"></script>

{{-- /admin/js/sweetalert2.all.min.js --}}

<script>
    new WOW().init();
</script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
