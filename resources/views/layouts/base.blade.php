<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- Stored in resources/views/layouts/base.blade.php -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{--CSRF Token--}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{--Title and Meta--}}

        <meta name="description" content="">
        <meta name="author" content="">

        <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

        @yield('meta')

        {{--Common App Styles--}}

        <!-- Fonts -->

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        @yield('styles')

        {{--Head--}}
        @yield('head')

    </head>
    <body class="@yield('body_class')">
        
        {{--Page--}}
        
        @yield('navigation')        
        <!-- Page Content -->
        
        <div class="container">
            @yield('page')
        </div>
        
        @yield('footer')
        
        {{--Common Scripts--}}
        <script src="{{ asset('js/app.js') }}" defer></script>

        {{--Laravel Js Variables--}}
        @yield('adminscripts')

        {{--Scripts--}}
        @yield('scripts')
    
    </body>
</html>
