<!-- resources/views/layouts/master.blade.php -->

<!doctype html>
<html lang="en">

<head>
    @include('backoffice.layouts.common.title-meta', ['title' => isset($title) ? $title : 'Dashboard'])
    @include("backoffice.layouts.common.head-css")
</head>

<body data-sidebar-size="lg">

    <!-- Begin page -->
    <div id="layout-wrapper">
        @include("backoffice.layouts.common.topbar")
        
        <!-- Left Sidebar Start -->
@if(auth()->user()->role === 'admin')
    @include('backoffice.layouts.common.admin-sidebar')
@elseif(auth()->user()->role === 'agent')
    @include('backoffice.layouts.common.agent-sidebar')
@endif

        <!-- Left Sidebar End -->

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    @yield('page-title')
                    <!-- end page title -->
                    
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            @include("backoffice.layouts.common.footer")
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    @include("backoffice.layouts.common.right-sidebar")
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    @include("backoffice.layouts.common.vendor-scripts")

    <script>
        $('.dropify').dropify();
    </script>

    @yield('scripts')

</body>

</html>
