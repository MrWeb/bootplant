<div class="main-navbar  bg-white">
  <div class="container p-0 nav-wrapper">
    <!-- Main Navbar -->
    <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
      <a class="navbar-brand" href="#" style="line-height: 25px;">
        <div class="d-table m-auto">
          <img id="main-logo" class="d-inline-block align-top mr-1 ml-3" style="max-width: 25px;" src="{{asset("bootplant/images/logo".(config('bootplant.app_color') ? '-'.config('bootplant.app_color') : '').".svg")}}" alt="Dashboard">
          <span class="d-none d-md-inline ml-1">{{config('bootplant.app_name')}}</span>
        </div>
      </a>
      <vue-search place-holder="Cerca..." class="ml-3"></vue-search>
      <form action="" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex" v-if="false"></form>
      @include('bootplant::inc.topbar-inc.right')
      <nav class="nav">
        <a href="#" class="nav-link nav-link-icon toggle-sidebar d-sm-inline d-md-none text-center " data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
          <i class="material-icons">&#xE5D2;</i>
        </a>
      </nav>
    </nav>
  </div>
  <!-- / .container -->
</div>
