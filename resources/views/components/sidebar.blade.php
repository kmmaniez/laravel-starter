        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-text mx-3">BRANDS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ (request()->is('/') || request()->is('dashboard')) ? 'active' : '' }}">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-desktop"></i>
                <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Products Master
            </div>

            <!-- Nav Item - Tables -->
            
            <li class="nav-item {{ (request()->is('products*')) ? 'active' : '' }}">
                <a class="nav-link" href="/products">
                    <i class="fas fa-fw fa-list"></i>
                <span>Products</span></a>
            </li>
            
            <li class="nav-item {{ (request()->is('profile*')) ? 'active' : '' }}">
                <a class="nav-link" href="/profile">
                    <i class="fas fa-fw fa-user"></i>
                <span>Profile</span></a>
            </li>
            
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item {{ (request()->is('blog*')) ? 'active' : '' }}">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Blogs</span>
                </a>
                <div id="collapseUtilities" class="collapse {{ (request()->is('blog*')) ? 'show' : '' }}" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Blog features:</h6>
                        <a class="collapse-item {{ (request()->is('blog*category')) ? 'active' : '' }}" href="{{ route('category.index') }}">Category</a>
                        <a class="collapse-item {{ (request()->is('blog*post')) ? 'active' : '' }}" href="{{ route('post.index') }}">Post</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Nav Item - Log Out -->
            <li class="nav-item">
                <form action="" method="post">
                    @csrf
                    <button class="btn btn-md nav-link">Logout</button>
                </form>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
