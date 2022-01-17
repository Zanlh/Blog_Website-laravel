<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-5">
        <nav aria-label="breadcrumb">
            <h3 class="font-weight-bolder mb-0">Dashboard</h3>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <span class="ms-1 font-weight-bold">
                    <h6 class="font-weight-bolder mb-0"> {{ auth()->guard('admin_user')->user()->name }}</h6>
                </span>

            </div>
            <ul class="navbar-nav  justify-content-end">
                {{-- <li class="nav-item dropdown pe-2 d-flex align-items-center"> --}}
                <div class="dropdown">
                    <button class="btn btn-theme" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-cog "></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a tabindex="0" class="dropdown-item" href=" {{ route('admin.logout') }}" onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                            class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                {{-- </li> --}}
            </ul>
        </div>
    </div>
</nav>
