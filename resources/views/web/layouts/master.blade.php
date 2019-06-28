<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/font-icons/icons/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/lib/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/web/style.css') }}" rel="stylesheet" type="text/css">
    @yield('style')
</head>
<body>

@include('web.layouts._inc.menu')

<div ng-app="app" ng-cloak>
    @yield('content')
</div>

@include('web.layouts._inc.footer')

<script type="text/javascript" src="{{ asset('js/lib/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lib/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lib/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lib/angular.min.js') }}"></script>
<script>
    var app = angular.module('app', []);
</script>
@yield('script')
</body>
</html>
