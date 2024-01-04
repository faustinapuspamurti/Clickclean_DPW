 <div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Utama</li>

        <li class="sidebar-item {{ (request()->is('v1')) ? 'active' : '' }}">
            <a href="{{ route('dashboard')}}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="sidebar-title">Product</li>

        <li class="sidebar-item {{ (request()->is('v1/product')) ? 'active' : '' }}">
            <a href="{{ route('product.index')}}" class='sidebar-link'>
                <i class="bi bi-box2-fill"></i>
                <span>Data Product</span>
            </a>
        </li>

        <li class="sidebar-item {{ (request()->is('v1/product/create')) ? 'active' : '' }}">
            <a href="{{ route('product.create')}}" class='sidebar-link'>
                <i class="bi bi-box-arrow-in-up"></i>
                <span>Tambah Product</span>
            </a>
        </li>

        <li class="sidebar-title">Pemesanan Layanan</li>

        <li class="sidebar-item {{ (request()->is('v1/orderan*')) ? 'active' : '' }}">
            <a href="{{ route('orderan.index')}}" class='sidebar-link'>
                <i class="bi bi-cart-fill"></i>
                <span>Data Pemesanan</span>
            </a>
        </li>

        <li class="sidebar-title">Pengaturan Admin</li>

        <li class="sidebar-item {{ (request()->is('v1/cities')) ? 'active' : '' }}">
            <a href="" target="" class='sidebar-link'>
                <i class="bi bi-person-lines-fill"></i>
                <span>Daftar User</span>
            </a>
        </li>
    </ul>
</div>
