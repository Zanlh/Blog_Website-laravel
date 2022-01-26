<div class="left">
    <div class="profile">
        <img class="profile-photo" src="{{ asset('frontend/images/pfp.jpg') }}" alt="">
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
        <a class="menu-item active" @yield('profile-active') href="{{url('/profile/'. auth()->user()->id)}}">
            <span><i class="fas fa-user"></i></span>
            <h3>Profile</h3>
        </a>
    </div>
    <label for="create-post" class="btn btn-primary">Create</label>
</div>
