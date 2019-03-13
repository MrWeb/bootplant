<!doctype html>
<html class="no-js h-100" lang="en">
<head>
  @include("bootplant::inc.html-header")
</head>
<body class="h-100">
  <div class="container-fluid" id="app">
    <div class="row">
      <!-- Main Sidebar -->
      @include('bootplant::inc.sidebar')
      <!-- End Main Sidebar -->
      <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
        @include('bootplant::inc.topbar-left')
        @include('bootplant::inc.notification')
        <!-- / .main-navbar -->
        <div class="main-content-container container-fluid px-4">
          <!-- Page Header -->
          @include('bootplant::inc.page-header')
          <!-- End Page Header -->
          <!-- Small Stats Blocks -->
          @yield('content')
        </div>
        @include('bootplant::inc.footer')
      </main>
    </div>
  </div>
  @include('bootplant::inc.html-footer-scripts')
  @yield('js')
</body>
</html>
