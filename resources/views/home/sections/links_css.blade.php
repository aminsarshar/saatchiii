<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.rtl.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/font/bootstrap-icon/bootstrap-icons.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugin/waves/waves.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugin/swiper/swiper-bundle.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugin/timer/timer.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugin/hint-css/hint-css.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugin/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
<link href="
     https://cdn.jsdelivr.net/npm/sweetalert2@11.15.10/dist/sweetalert2.min.css
     " rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .logo_type {
        background: -webkit-linear-gradient(0deg, #9d4edd, #c77dff, #e0aaff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-size: 24px;
    }

    @media screen and (max-width: 576px) {
        .logo_type {
            font-size: 18px;

        }

        .modal-content {
            width: 88% !important;
            margin: auto;
            margin-top: 21%;
        }

        .product-modal-link form {
            display: block;
        }

        cart-plus-minus {
            width: 84%;
        }

        .pro-details-cart {
            margin-top: auto !important;
            margin-right: auto !important;
        }

    }


    .dropdown.toggle>input {
        display: none;
    }

    .dropdown>a,
    .dropdown.toggle>label {
        border-radius: 2px;
        /* box-shadow: 0 6px 5px -5px rgba(0,0,0,0.3); */
    }

    .dropdown>a::after,
    .dropdown.toggle>label::after {
        content: "";
        float: right;
        margin: 15px 15px 0 0;
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 10px solid #CCC;
        display: none;
    }

    .dropdown ul {
        list-style-type: none;
        display: block;
        margin: 0;
        padding: 0;
        position: absolute;
        width: 100%;
        /* box-shadow: 0 6px 5px -5px rgba(0,0,0,0.3); */
        overflow: hidden;
    }

    .dropdown a,
    .dropdown.toggle>label {
        display: block;
        padding: 0 0 0 10px;
        text-decoration: none;
        line-height: 40px;
        font-size: 15px;
        text-transform: uppercase;
        font-weight: bold;
        color: #494949;
        background-color: #fff;
        text-align: right;
        padding-right: 12px
    }

    .dropdown li {
        height: 0;
        overflow: hidden;
        transition: all 500ms;
    }

    .dropdown.hover li {
        transition-delay: 300ms;
    }

    .dropdown li:first-child a {
        border-radius: 2px 2px 0 0;
        margin-top: -12px !important;

    }

    .dropdown li:last-child a {
        border-radius: 0 0 2px 2px;
        margin-top: -12px !important;
    }

    .dropdown li:first-child a::before {
        content: "";
        display: block;
        position: absolute;
        width: 0;
        height: 0;
        border-left: 10px solid transparent;
        border-right: 10px solid transparent;
        border-bottom: 10px solid #FFF;
        margin: -10px 0 0 30px;
    }

    .dropdown a:hover,
    .dropdown.toggle>label:hover,
    .dropdown.toggle>input:checked~label {
        color: #666;
    }

    .dropdown>a:hover::after,
    .dropdown.toggle>label:hover::after,
    .dropdown.toggle>input:checked~label::after {
        border-top-color: #AAA;
    }

    .dropdown li:first-child a:hover::before {
        border-bottom-color: #EEE;
    }

    .dropdown.hover:hover li,
    .dropdown.toggle>input:checked~ul li {
        height: 40px;
    }

    .dropdown.hover:hover li:first-child,
    .dropdown.toggle>input:checked~ul li:first-child {
        padding-top: 15px;
        text-align: center
    }

    .avatar-style {
        width: 47px;
        height: 47px;
        margin-left: 9px;
        object-fit: cover;
        margin-top: -3px;
        border: 2px solid #6666ff;
    }

    .old {
        font-size: 18px !important;
        color: #a1a1a1 !important;
        padding-right: 5px !important;
    }

    .test {
        transition: transform 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .test:hover {
        transform: scale(1.1) rotateX(-5deg);
    }

    .float-contact .icon {
        padding-top: 10px;
    }
</style>
