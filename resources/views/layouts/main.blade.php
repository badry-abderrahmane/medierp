<!DOCTYPE html>
<html lang="en">

@include('layouts.head')
@yield('styles')

<body class="site">

  <div id="app" class="site-content">
    @include('layouts.header')
    {{-- <div class="container is-fluid">
      @include('layouts.sidebar')
    </div> --}}

      @yield('content')

  </div>

  @include('layouts.footer')

  @include('layouts.scripts')

  @yield('scripts')
</body>
</html>
