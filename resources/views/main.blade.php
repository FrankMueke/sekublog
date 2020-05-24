<!doctype html>
<html lang="en">
    <head>
@include('partials._head')
@yield('stylesheets')
    </head>
  <body>
@include('partials._nav')

      <div class="container-fluid container-spacing-top">
        @include('partials._messages')
         
        @yield('content')
    @include('partials._footer')

      </div><!-- end of container -->
       @include('partials._javascript')

   @yield('scripts')

</body>
</html>