<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>
                <li>
                    <a href="{{ url('/agent/dashboard') }}">
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
                    <a href="{{ url('dispatcher/bookings') }}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Booking Management</span>
                    </a>
                </li>
		        <li>
                    <a href="{{ url('vehicle-categories') }}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Vehicle Management</span>
                    </a>
                </li>

            </ul>

        </div>
        
    </div>
</div>
<!-- Left Sidebar End -->