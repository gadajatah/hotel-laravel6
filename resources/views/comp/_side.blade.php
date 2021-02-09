<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            <div class="pcoded-navigation-label">Navigation</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="{{ request()->is('admin') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>
                </li>
                <li class="{{ request()->is('admin/rooms') ? 'active' : '' }}">
                    <a href="{{ route('room') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-layers"></i>
                        </span>
                        <span class="pcoded-mtext">Data Room</span>
                    </a>
                </li>
                <li class="{{ request()->is('admin/pembayaran') ? 'active' : '' }}">
                    <a href="{{ route('pembayaran') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-menu"></i>
                        </span>
                        <span class="pcoded-mtext">Pembayaran</span>
                    </a>
                </li>
                <li class="{{ request()->is('admin/bank') ? 'active' : '' }}">
                    <a href="{{ route('bank') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-credit-card"></i>
                        </span>
                        <span class="pcoded-mtext">Bank</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>