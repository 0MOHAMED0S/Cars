<header class="topbar" data-navbarbg="skin6">
    <nav style="justify-content: space-between; display:flex;" class="navbar top-navbar navbar-expand-md navbar-dark">
        <div style="background-color:transparent" class="navbar-header" data-logobg="skin6">
            <ul style="text-align: center" class="menu-logo">
                <li>
                    <a href="{{route('home')}}"><img width="70" height="70" id="logo_img" src="{{asset('main/images/sport-car.png')}}" alt="logo">
                    </a>
                </li>
            </ul>
            <div id="right" style=";" class="d-md-none" style="margin-left: auto;">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button  class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150" style="margin-right: 10px;">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)">
                <i class="ti-menu ti-close"></i>
            </a>
        </div>
        <div class="d-none d-md-block">
            <div style="margin-left: auto;">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </nav>
</header>

<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item"> <a  class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{route('dashboard')}}" aria-expanded="false"><i class="me-3 far fa-clock fa-fw"
                            aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{route('categories')}}" aria-expanded="false">
                        <i class="me-3 fa fa-columns"
                            aria-hidden="true"></i><span
                            class="hide-menu">Categories</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{route('cars')}}" aria-expanded="false"><i class="me-3 fa fa-table"
                            aria-hidden="true"></i><span class="hide-menu">Cars</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{route('users')}}" aria-expanded="false"><i class="me-3 fa fa-user" aria-hidden="true"></i>
                        <span class="hide-menu">Users</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{route('testimonials')}}" aria-expanded="false"><i class="me-3 fa fa-globe"
                            aria-hidden="true"></i><span class="hide-menu">Ttestimonials</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{route('messages')}}" aria-expanded="false"><i class="me-3 fa fa-columns"
                            aria-hidden="true"></i><span class="hide-menu">Messages
                                <span style="margin-left: 15px" class=" top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $messages->where('read', 0)->count() }}
                                    <span class="visually-hidden">unread messages</span>
                            </span>
                        </a>
                        </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Get the current URL
        var currentUrl = window.location.href;

        // Check if the URL contains the 'cars' route
        if (currentUrl.includes('/dashboard/cars')) {
            // Add the 'active' class to the Cars link
            $('.sidebar-link[href="{{ route('cars') }}"]').addClass('active');
        }
    });
</script>

</aside>