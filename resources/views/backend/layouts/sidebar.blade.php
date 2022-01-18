
<div class="sidebar" data-color="white" data-active-color="success">
  <div class="logo">
    <a href="" class="simple-text logo-normal">
      <div class="text-center">
        <i class="fas fa-book"></i>
      <span> My Blog</span>
      </div>
      
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="@yield('home-active') ">
        <a href="{{route('admin.home')}}">
          <i class="fas fa-home"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="@yield('admin-active') ">
        <a href="{{route('admin.admin-user.index')}}">
          <i class="fas fa-user-tie"></i>
          <p>Admin User</p>
        </a>
      </li>
    </ul>
  </div>
</div>