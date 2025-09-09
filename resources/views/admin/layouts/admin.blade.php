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
    @include('admin.sections.links_css')
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


    @yield('script')

    @include('admin.sections.links_js')


</body>

</html>
