<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>
                <li>
                    <a href="{{ url('/admin/dashboard') }}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>   
                    </a>
                </li>                                
		        <li>    
                    <a href="{{ url('drivers') }}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Driver Management</span>
                    </a>
                </li>                                       
		        <li>                                       
                    <a href="{{ url('users') }}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">User Management</span>
                    </a>
                </li>
		        <li>
                    <a href="{{ url('') }}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Supplier Management</span>
                    </a>
                </li>
		        <li>
                    <a href="{{ url('') }}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Vehicle Management</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('settings') }}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Settings</span>
                    </a>
                </li>

            </ul>

        </div>
        
    </div>
</div>
<!-- Left Sidebar End -->