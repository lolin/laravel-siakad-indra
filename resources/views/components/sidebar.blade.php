<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">FIC8 Indra</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">FIC</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="{{ url('dashboard-general-dashboard') }}">General Dashboard</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Users</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('user') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="{{ url('user') }}">User List</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Subjects</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('subject') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="{{ url('subject') }}">Subject List</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Schedule</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('schedule') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="{{ url('schedule') }}">Schedule List</a>
                    </li>
                </ul>
            </li>
    </aside>
</div>
