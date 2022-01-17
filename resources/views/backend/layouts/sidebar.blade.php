<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="" target="_blank">
        <img src="{{asset('backend/assets/img/logo-ct.png')}}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Soft UI Dashboard</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link  @yield('home-active')" href="{{route('home')}}">
              <div class="fas fa-home icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              </div>
              <span class="nav-link-text ms-1">Dashboard</span>
            </a>
          </li>
        <li class="nav-item">
            <a class="nav-link  @yield('admin-active')" href="{{route('home')}}">
              <div class="fas fa-user icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              </div>
              <span class="nav-link-text ms-1">Admin User</span>
            </a>
          </li>
      </ul>
    </div>
  </aside>