<!DOCTYPE html>

<!-- Stored in resources/views/layouts/app.blade.php -->

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{--CSRF Token--}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{--Title and Meta--}}

        <meta name="description" content="">
        <meta name="author" content="">

        <title>App Name - @yield('title')</title>

        @yield('meta')

        {{--Common App Styles--}}

        <!-- Fonts -->

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link href="/css/app.css" rel="stylesheet">

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

        <!-- Bootstrap core JavaScript -->
        <script src="/js/app.js"></script>

        {{--Laravel Js Variables--}}
        @yield('adminscripts')
        {{--Scripts--}}
        @yield('scripts')
    
    </body>
</html>
