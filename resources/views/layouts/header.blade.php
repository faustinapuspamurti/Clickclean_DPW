<header>
            <img class="logo" src="{{ asset('images/Logo.png') }}" alt="logo">
            <nav>
                <ul class="nav__links">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('product') }}">Product</a></li>
                    <li><a href="{{ route('booking') }}">Booking</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
            </nav>
            <a class="nav__links" href="{{ route('checkout') }}">
                <i class="bi bi-cart text-dark"></i> Cart
            </a>
            <div class="user-actions">
                <div class="dropdown">
                    <button onclick="toggleDropdown()" class="dropbtn">
                    <i class="bi bi-person"></i>
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    </form>
                    </button>
                </div>
            </div>
</header>