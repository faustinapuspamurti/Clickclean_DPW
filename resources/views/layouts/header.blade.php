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
                                <?php
                                 $pesanan_utama = \App\Models\Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
                                 if(!empty($pesanan_utama))
                                    {
                                     $notif = \App\Models\PesananDetails::where('pesanan_id', $pesanan_utama->id)->count(); 
                                    }
                                ?>
                                <a class="nav__links" href="{{ url('checkout') }}">
                                    <i class="fa fa-shopping-cart"></i>
                                    @if(!empty($notif))
                                    <span class="badge badge-danger">{{ $notif }}</span>
                                    @endif
                                </a>
                            </li>
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