<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="icon" href="{{ asset('images/logo/small_logo.png') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/lib/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-icons/icons/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/main.css') }}">
    @yield('style')
</head>
<body>
<div class="page-wrapper app sidebar-mini rtl" ng-app="app" ng-cloak>
    @include('admin.layouts._inc.top_bar')
    @include('admin.layouts._inc.side_bar')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> {{ $page }}</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active"><a href="#">{{ $page }}</a></li>
            </ul>
        </div>
        @yield('content')
    </main>
</div>

<script type="text/javascript" src="{{ asset('js/lib/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lib/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lib/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lib/angular.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/admin/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/admin/pace.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/admin/sweetalert.min.js') }}"></script>
<script>
    var app = angular.module('app', []);
</script>
@yield('script')
</body>
</html>
