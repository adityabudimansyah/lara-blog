<!DOCTYPE html>
<html>
<head>
    @include('includes.new_style.head')
    @yield('page_css')
</head>
<body class="page-index">
    <!--start-header-->
    @include('includes.new_style.header')
    <!--End-header-->
    <!--Main-Content-->
    @yield('content')
    <!--Main-Content-end-->
    <!--footer-starts-->
    <!-- @include('includes.footer') -->
    <!--global-Js-->
    @include('includes.new_style.scripts')
    
    @yield('page_scripts')
</body>
</html>