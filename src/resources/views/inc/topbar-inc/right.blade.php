<ul class="navbar-nav border-left flex-row">
  <li class="nav-item border-right d-block d-sm-block d-md-none">
    <a class="nav-link nav-link-icon text-center" href="javascript:history.go(-1)" role="button">
      <i class="material-icons">keyboard_backspace</i>
    </a>
  </li>
{{--   <li class="nav-item border-right dropdown notifications">
    <a class="nav-link nav-link-icon text-center" href="#" role="button">
      <div class="nav-link-icon__wrapper">
        <i class="material-icons">receipt</i>
        <span class="badge badge-pill badge-salmon">2</span>
      </div>
    </a>
  </li> --}}
{{--   <li class="nav-item border-right dropdown notifications">
    <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <div class="nav-link-icon__wrapper">
        <i class="material-icons">&#xE7F4;</i>
        <span class="badge badge-pill badge-danger">2</span>
      </div>
    </a>
    <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink">
      <a class="dropdown-item" href="#">
        <div class="notification__icon-wrapper">
          <div class="notification__icon">
            <i class="material-icons">&#xE6E1;</i>
          </div>
        </div>
        <div class="notification__content">
          <span class="notification__category">Analytics</span>
          <p>Nessuna notifica</p>
        </div>
      </a>
      <a class="dropdown-item" href="#">
        <div class="notification__icon-wrapper">
          <div class="notification__icon">
            <i class="material-icons">&#xE8D1;</i>
          </div>
        </div>
        <div class="notification__content">
          <span class="notification__category">Sales</span>
          <p>Last week your store’s sales count decreased by <span class="text-danger text-semibold">5.52%</span>. It could have been worse!</p>
        </div>
      </a>
      <a class="dropdown-item notification__all text-center" href="#"> View all Notifications </a>
    </div>
  </li> --}}
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
      <img class="user-avatar rounded-circle mr-2" src="{{asset('bootplant/images/avatars/0.jpg')}}" alt="User Avatar">
      <span class="d-none d-md-inline-block">{{Auth::user()->name ?? ''}} {{Auth::user()->lastname ?? ''}}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-small">
      <a class="dropdown-item d-none d-sm-block" href="{{url('users/'.Auth::id().'/edit')}}">
        <i class="material-icons">person</i>Profilo
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="{{url('/users/'.Auth::id().'/edit?resetforce=true')}}">
        <i class="material-icons">vpn_key</i>Aggiorna Password
      </a>
      <form action="{{url('logout')}}" method="POST">
        @csrf
        <button class="dropdown-item text-danger" role="button" type="submit">
          <i class="material-icons text-danger">&#xE879;</i> Esci
        </button>
      </form>
    </div>
  </li>
</ul>
