<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    @include('partials.head')
</head>
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

@include('partials.header')
@include('partials.main-menu')

<!-- BEGIN Content-->
<div class="app-content content">
    <div class="content-wrapper">
        @yield('content')
    </div>
</div>
<!-- END Content-->

@include('partials.scripts')
</body>
</html>
