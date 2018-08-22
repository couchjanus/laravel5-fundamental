@extends('layouts.app')
    
    @section('styles')
        <!-- Custom styles for this template -->
        <link href="/css/dashboard.css" rel="stylesheet">
        <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    @endsection
    
    {{--Head--}}
    @section('head')
    @endsection
    
    @section('navigation')
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
            <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
            <ul class="navbar-nav px-3">
              <li class="nav-item text-nowrap">
                <a class="nav-link" href="#">Sign out</a>
              </li>
            </ul>
        </nav>
    @endsection
    
    {{--Page--}}
    
    @section('page')
      <div class="container-fluid">
        <div class="row">
          @include('partials.admin.sidebar')
          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            @yield('content')
          </main>
        </div><!-- /.row -->
      </div>
    @endsection

    @section('adminscripts')
      {{--Scripts--}}
      @include('partials.admin._scripts')    
    @endsection
    
 