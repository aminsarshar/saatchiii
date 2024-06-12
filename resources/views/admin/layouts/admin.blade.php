<!DOCTYPE html>
<html lang="en" class="loading">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Convex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Convex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>پنل مدیریت - @yield('title')</title>
    <link rel="apple-touch-icon" sizes="60x60" href="/admin/img/ico/apple-icon-60.html">
    <link rel="apple-touch-icon" sizes="76x76" href="/admin/img/ico/apple-icon-76.html">
    <link rel="apple-touch-icon" sizes="120x120" href="/admin/img/ico/apple-icon-120.html">
    <link rel="apple-touch-icon" sizes="152x152" href="/admin/img/ico/apple-icon-152.html">
    <link rel="shortcut icon" type="image/x-icon"
        href="https://pixinvent.com/demo/convex-bootstrap-admin-dashboard-template/app-assets/img/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="/admin/img/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link
        href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/admin/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="/admin/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/vendors/css/prism.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/vendors/css/chartist.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/css/app.css">
    <link rel="stylesheet" type="text/css" href="/admin/vendors/css/toastr.css">
    <link rel="stylesheet" type="text/css" href="/admin/css/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/css/select2.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">



    @livewireStyles
</head>

<body data-col="2-columns" class=" 2-columns ">
    <div class="wrapper">


        @include('admin.sections.header')
        @include('admin.sections.sidebar')

        <div class="main-panel">
            <div class="main-content">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        @include('admin.sections.footer')
    </div>

    @include('admin.sections.aside')

    <!-- BEGIN VENDOR JS-->
    @livewireScripts
    <script src="/admin/vendors/js/core/jquery-3.3.1.min.js"></script>
    <script src="/admin/js/persian-datepicker.min.js"></script>
    <script src="/admin/vendors/js/core/popper.min.js"></script>
    <script src="/admin/vendors/js/core/bootstrap.min.js"></script>
    <script src="/admin/vendors/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="/admin/vendors/js/prism.min.js"></script>
    <script src="/admin/vendors/js/jquery.matchHeight-min.js"></script>
    <script src="/admin/vendors/js/"></script>
    <script src="/admin/vendors/js/pace/pace.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="/admin/vendors/js/chartist.min.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN CONVEX JS-->
    <script src="/admin/js/app-sidebar.js"></script>
    <script src="/admin/js/notification-sidebar.js"></script>
    <script src="/admin/js/customizer.js"></script>
    <!-- END CONVEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="/admin/js/dashboard-ecommerce.js"></script>
    <!-- END PAGE LEVEL JS-->

    <script src="/admin/vendors/js/jqBootstrapValidation.js"></script>
    <script src="/admin/js/form-validation.js"></script>
    <script src="/admin/js/sweetalert2.all.min.js"></script>
    <script src="/admin/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <script>
        $('select').select2([
            dir: "rtl",
            dropdownAutoWidth: true,
            dropdownParent: $('#parent')
        ])
    </script>
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    @yield('script')



</body>

</html>
