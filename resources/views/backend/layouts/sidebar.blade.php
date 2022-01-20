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
                <a href="{{ route('admin.home') }}">
                    <i class="fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="@yield('admin-active') ">
                <a href="{{ route('admin.admin-user.index') }}">
                    <i class="fas fa-user-tie"></i>
                    <p>Admin User</p>
                </a>
            </li>
            <li class="@yield('user-active') ">
                <a href="{{ route('admin.user.index') }}">
                    <i class="fas fa-user"></i>
                    <p>User</p>
                </a>
            </li>
            <li class="@yield('category-active') ">
                <a href="{{ route('admin.category.index') }}">
                    <i class="fas fa-clipboard"></i>
                    <p>Category</p>
                </a>
            </li>
            <li class="@yield('post-active') ">
                <a href="{{ url('admin/post') }}">
                    <i class="fas fa-list"></i>
                    <p>Post</p>
                </a>
            </li>
            <li class="@yield('profile-active') ">
                <a
                    href="{{ url(
                        'admin/profile/' .
                            auth()->guard('admin_user')->user()->id,
                    ) }}">
                    <i class="fas fa-id-badge"></i>
                    <p>Profile</p>
                </a>
            </li>
        </ul>
    </div>
</div>
