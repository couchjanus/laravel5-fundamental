@extends('layouts.base')
    
    @section('styles')
        @include('partials.styles')
    @endsection
    
    {{--Head--}}
    @section('head')
    @endsection
    
    @section('navigation')
       @include('shared.navigation')
    @endsection
    
    {{--Page--}}
    
    @section('page')
      <main role="main" class="container">
        <div class="row">
          @yield('content')
        </div><!-- /.row -->
      </main>
    @endsection

    @section('footer')
        @include('shared.footer')
    @endsection
    
    {{--Scripts--}}

    @section('scripts')
    @endsection
   