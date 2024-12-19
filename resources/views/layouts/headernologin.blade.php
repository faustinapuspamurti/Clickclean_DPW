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
            <div class="user-actions">
                <div class="dropdown">
                    <button onclick="toggleDropdown()" class="dropbtn">
                    <i class="bi bi-person"></i>
                    <a href="{{ route('login') }}">Login</a>
                    </button>
                </div>
            </div>
</header>