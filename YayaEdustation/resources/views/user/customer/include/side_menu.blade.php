<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ url('dashboard-customer') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
{{--                    <span class="right badge badge-danger">New</span>--}}
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('customer-profile') }}" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Profile
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('daftar-booking-tutor') }}" class="nav-link">
                <i class="nav-icon fas fa-bookmark"></i>
                <p>
                    Daftar Booking
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('customer-chat') }}" class="nav-link">
                <i class="nav-icon fas fa-comment"></i>
                <p>
                    Chat
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('jadwal-kursus') }}" class="nav-link">
                <i class="nav-icon fas fa-calendar"></i>
                <p>
                    Jadwal Kursus
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('absen-customer') }}" class="nav-link">
                <i class="nav-icon fas fa-check-circle"></i>
                <p>
                    Kehadiran
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('sign-out') }}" class="nav-link" onclick="return confirm('Apakah anda yakin akan keluar..?')">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    Keluar
                </p>
            </a>
        </li>

{{--        <li class="nav-item has-treeview menu-open">--}}
{{--            <a href="#" class="nav-link active">--}}
{{--                <i class="nav-icon fas fa-tachometer-alt"></i>--}}
{{--                <p>--}}
{{--                    Starter Pages--}}
{{--                    <i class="right fas fa-angle-left"></i>--}}
{{--                </p>--}}
{{--            </a>--}}
{{--            <ul class="nav nav-treeview">--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link active">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Active Page</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Inactive Page</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}

    </ul>
</nav>
