
<body>

    @include('home.sections.header')


    @yield('content')

    @include('home.sections.footer')








    <!-- Main JS File -->
    <script src="{{asset('home/assets/js/rating.js')}}"></script>
    <script src="{{asset('assets/js/rating.js')}}"></script>
    <script src="{{asset('assets/js/wow.js')}}"></script>
    {{-- <script src="{{asset('admin/vendors/js/sweetalert2.min.js')}}"></script> --}}

    <script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.15.10/dist/sweetalert2.all.min.js
"></script>

{{-- @include('sweetalert::alert') --}}
@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@11'])


<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

@yield('script')


{!!  GoogleReCaptchaV3::init() !!}



</body>

</html>

