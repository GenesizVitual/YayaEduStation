<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{url('dashboard-tutor')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
               </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('profile-tutor') }}" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Profile
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('kursus') }}" class="nav-link">
                <i class="nav-icon fas fa-book-open"></i>
                <p>
                    Kursus
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('message-chat') }}" class="nav-link">
                <i class="nav-icon fas fa-comments"></i>
                <p>
                    Chat
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('daftar-booking') }}" class="nav-link">
                <i class="nav-icon fas fa-comments"></i>
                <p>
                    Daftar Booking
                </p>
            </a>
        </li>
    </ul>
</nav>