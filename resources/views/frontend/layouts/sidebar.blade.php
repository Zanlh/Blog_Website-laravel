<div class="left">
    <div class="profile">
        <div class="profile-photo">
            @if (Auth()->user()->photos->where('type', 1)->first() == null)
                <img class="avatar" src="https://ui-avatars.com/api/?size=100&name={{ $Auth()->user()->name }}"
                    alt="...">
            @else
                <img class="avatar"
                    src="{{ asset(
    'storage/profile/' .
        Auth()->user()->photos->where('type', 1)->first()->path,
) }}"
                    alt="...">
            @endif
        </div>

        <div class="handle">
            <h4>{{ Auth()->user()->name }}</h4>
        </div>
    </div>
    {{-- =========================Sidebar====================================== --}}
    <div class="sidebar">

        <a class="menu-item @yield('feed-active')">
            <i class="fas fa-home"></i>
            <h3>Feed</h3>
        </a>
        <a class="menu-item">
            <span><i class="fas fa-compass"></i></span>
            <h3>Explore</h3>
        </a>
        <a class="menu-item">
            <span><i class="fas fa-bell"></i></span>
            <h3>Notification</h3>
            {{-- TODO:Notification pop up --}}
            <div class="notification-popup">
                <div class="notification-body"></div>
            </div>
        </a>
        <a class="menu-item ">
            <span><i class="fas fa-bookmark"></i></span>
            <h3>Bookmarks</h3>
        </a>
        <a class="menu-item active" @yield('profile-active') href="{{ url('/profile/' . auth()->user()->id) }}">
            <span><i class="fas fa-user"></i></span>
            <h3>Profile</h3>
        </a>
    </div>
    <label for="create-post" class="btn btn-primary">Create</label>
</div>
