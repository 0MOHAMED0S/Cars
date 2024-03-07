<style>
   ul li a{
        font-size: 20px
    }
</style>
<header id="header" class="defualt">
    <div class="menu">
        <nav id="menu" class="mega-menu">
            <section class="menu-list-items">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <ul style="text-align: center" class="menu-logo">
                                <li>
                                    <a href="{{route('home')}}"><img id="logo_img" src="{{asset('main/images/sport-car.png')}}" alt="logo">
                                        <h3>Car</h3>
                                    </a>
                                </li>
                            </ul>
                            <ul class="menu-links">
                                <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="{{ request()->routeIs('cars.user') ? 'active' : '' }}">
                                    <a href="{{ route('cars.user') }}">Cars</a>
                                </li>
                                @auth
                                    <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                        <a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                @endauth
                                {{-- <li class="{{ request()->is('about-us*') ? 'active' : '' }}">
                                    <a href="{{ route('about-us') }}">About Us</a>
                                </li>
                                <li class="{{ request()->is('faq*') ? 'active' : '' }}">
                                    <a href="{{ route('faq') }}">FAQ</a>
                                </li> --}}
                                <li class="{{ request()->is('contactus*') ? 'active' : '' }}">
                                    <a href="{{ route('contactus') }}">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </nav>
    </div>
</header>
