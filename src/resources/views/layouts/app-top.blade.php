<!doctype html>
<html class="no-js h-100" lang="en">
<head>
  @include("bootplant::inc.html-header")
</head>
<body class="h-100">
  <div class="container-fluid" id="app">
    <div class="row">
      <main class="main-content col-lg-12 col-md-12 col-sm-12 p-0">
        @include('bootplant::inc.topbar-top')
        <div class="header-navbar collapse d-lg-flex p-0 bg-white border-top">
          <div class="container">
            <div class="row">
              <div class="col">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                  @include('bootplant::inc.menu')
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="main-content-container container container-fluid">
          <!-- Page Header -->
          @include('bootplant::inc.page-header')
          <!-- End Page Header -->
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
