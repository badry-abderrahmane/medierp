<!DOCTYPE html>
<html lang="en">

@include('layouts.head')
@yield('styles')

<body class="app header-fixed footer-fixed sidebar-fixed pace-done">
  @include('layouts.header')
  <div class="app-body" id="app">
    @include('layouts.sidebar')

    <main class="main">
      <div class="container-fluid">
        @yield('content')
      </div>
    </main>

  </div>

  @include('layouts.footer')

  @include('layouts.scripts')

  @yield('scripts')
</body>
</html>
