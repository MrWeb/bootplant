<div class="main-navbar sticky-top bg-white">
  <!-- Main Navbar -->
  <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
    <vue-search place-holder="Cerca..." class="ml-3"></vue-search>
    <form action="" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex" v-if="false"></form>
    @include('bootplant::inc.topbar-inc.right')
    <nav class="nav">
      <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
        <i class="material-icons">&#xE5D2;</i>
      </a>
    </nav>
  </nav>
</div>
