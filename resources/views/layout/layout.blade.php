<!doctype html>
<html lang="en">

<head>
    <title>Hall booking</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ URL::asset('js/multiselect-dropdown.js') }}"></script>
   
</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only"> Menu</span>
                </button>
            </div>
            <h1><a href="" class="logo">Hall Booking</a></h1>
            <ul class="list-unstyled components mb-5">

                @if (auth()->user()->role == 1)
                    <li>
                        <a href="{{ route('dashboard') }}"><span class="fa fa-dashboard mr-3"></span>Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('bookHall') }}"><span class="fa fa-building-o mr-3"></span>Book Hall</a>
                    </li>
                    {{-- <li>
                    <a href="{{ route('AdminSections') }}"><span class="fa fa-users mr-3"></span>Sections</a>
                </li>


                <li>
                    <a href="{{ route('AdminHalls') }}"><span class="fa fa-users mr-3"></span>Halls</a>
                </li>

                <li>
                    <a href="{{ route('superAdminUsers') }}"><span class="fa fa-users mr-3"></span>Users</a>
                </li> --}}
                    <li class="{{ in_array(Route::currentRouteName(), ['AdminSections', 'AdminHalls', 'superAdminUsers']) ? 'active' : '' }}">
                        <a href="#settingsSubmenu" data-toggle="collapse"
                            aria-expanded="{{ in_array(Route::currentRouteName(), ['AdminSections', 'AdminHalls', 'superAdminUsers']) ? 'true' : 'false' }}"
                            class="dropdown-toggle" style="padding-right: 20px;">
                            <span class="fa fa-cog mr-3"></span>Settings
                        </a>
                        <ul class="collapse list-unstyled {{ in_array(Route::currentRouteName(), ['AdminSections', 'AdminHalls', 'superAdminUsers']) ? 'show' : '' }}"
                            id="settingsSubmenu">
                            <li class="{{ Route::currentRouteName() == 'AdminSections' ? 'active' : '' }}">
                                <a href="{{ route('AdminSections') }}"><span
                                        class="fa fa-list-alt mr-3"></span>Sections</a>
                            </li>
                            <li class="{{ Route::currentRouteName() == 'AdminHalls' ? 'active' : '' }}">
                                <a href="{{ route('AdminHalls') }}"><span class="fa fa-building-o mr-3"></span>Halls</a>
                            </li>
                            <li class="{{ Route::currentRouteName() == 'superAdminUsers' ? 'active' : '' }}">
                                <a href="{{ route('superAdminUsers') }}"><span class="fa fa-users mr-3"></span>Users</a>
                            </li>
                        </ul>
                    </li>
                @endif

                <li>
                    <a href="/logout"><span class="fa fa-sign-out mr-3"></span> Logout</a>
                </li>
            </ul>

        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-9 col">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row p-2">
                                {{-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> --}}
                                <div class="col-lg-12 m-1">
                                    @yield('space-work')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/popper.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/main.js') }}"></script>
    <script src="{{ URL::asset('js/multiselect-dropdown.js') }}"></script>
</body>

</html>