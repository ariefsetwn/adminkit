<div class="scroll-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li class="sidebar-item {{ Request::segment(1) == 'home' ? 'active' : '' }}">
                <a class="sidebar-link sidebar-link" href="/home"
                    aria-expanded="false">
                    <i data-feather="home" class="feather-icon"></i>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>
            <li class="list-divider"></li>
            <li class="nav-small-cap"><span class="hide-menu">Applications</span></li>

            <li class="sidebar-item {{ Request::segment(1) == 'user' ? 'active' : '' }}">
                <a class="sidebar-link sidebar-link" href="/user"
                    aria-expanded="false">
                    <i data-feather="users" class="feather-icon"></i>
                    <span class="hide-menu">User</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::segment(1) == 'data-barang' ? 'active' : '' }}">
                <a class="sidebar-link sidebar-link" href="/data-barang"
                    aria-expanded="false">
                    <i data-feather="folder" class="feather-icon"></i>
                    <span class="hide-menu">Data Barang</span>
                </a>
            </li>
            
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>