<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{asset('assets/admin/images/logo-sm.svg')}}" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('assets/admin/images/logo-sm.svg')}}" alt="" height="24"> <span class="logo-txt">Minia</span>
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('assets/admin/images/logo-sm.svg')}}" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('assets/admin/images/logo-sm.svg')}}" alt="" height="24"> <span class="logo-txt">Minia</span>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <button class="btn btn-primary" type="button"><i class="bx bx-search-alt align-middle"></i></button>
                </div>
            </form>
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item" id="page-header-search-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="search" class="icon-lg"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">
        
                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Search Result">

                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img id="header-lang-img" src="{{asset('assets/admin/images/flags/us.jpg')}}" alt="Header Language" height="16">
                </button>
                <div class="dropdown-menu dropdown-menu-end">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="en">
                        <img src="{{asset('assets/admin/images/flags/us.jpg')}}" alt="user-image" class="me-1" height="12"> <span class="align-middle">English</span>
                    </a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="sp">
                        <img src="assets/admin/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="gr">
                        <img src="assets/admin/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="it">
                        <img src="assets/admin/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="ru">
                        <img src="assets/admin/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>
                    </a>
                </div>
            </div>

            <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item" id="mode-setting-btn">
                    <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                    <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                </button>
            </div>

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="grid" class="icon-lg"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <div class="p-2">
                        <div class="row g-0">
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="{{asset('assets/admin/images/brands/github.png')}}" alt="Github">
                                    <span>GitHub</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    
                                    <span>Bitbucket</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="{{asset('assets/admin/images/brands/dribbble.png')}}" alt="dribbble">
                                    <span>Dribbble</span>
                                </a>
                            </div>
                        </div>

                        <div class="row g-0">
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="{{asset('assets/admin/images/brands/dropbox.png')}}" alt="dropbox">
                                    <span>Dropbox</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="{{asset('assets/admin/images/brands/mail_chimp.png')}}" alt="mail_chimp">
                                    <span>Mail Chimp</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="{{url('assets/admin/images/brands/slack.png')}}" alt="slack">
                                    <span>Slack</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon position-relative" id="page-header-notifications-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="bell" class="icon-lg"></i>
                    <span class="badge bg-danger rounded-pill">5</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> Notifications </h6>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small text-reset text-decoration-underline"> Unread (3)</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <img src="{{asset('assets/admin/images/users/avatar-3.jpg')}}"
                                    class="me-3 rounded-circle avatar-sm" alt="user-pic">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">James Lemire</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">It will seem like simplified English.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hour ago</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="avatar-sm me-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="bx bx-cart"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Your order is placed</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">If several languages coalesce the grammar</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3 min ago</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="avatar-sm me-3">
                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                        <i class="bx bx-badge-check"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Your item is shipped</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">If several languages coalesce the grammar</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3 min ago</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <img src="{{asset('assets/admin/images/users/avatar-6.jpg')}}"
                                    class="me-3 rounded-circle avatar-sm" alt="user-pic">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Salena Layfield</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hours ago</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top d-grid">
                        <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                            <i class="mdi mdi-arrow-right-circle me-1"></i> <span>View More..</span> 
                        </a>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item right-bar-toggle me-2">
                    <i data-feather="settings" class="icon-lg"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-light-subtle border-start border-end" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{asset('assets/admin/images/users/avatar-1.jpg')}}"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium">Shawn L.</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="apps-contacts-profile.html"><i class="mdi mdi mdi-face-man font-size-16 align-middle me-1"></i> Profile</a>
                    <a class="dropdown-item" href="auth-lock-screen.html"><i class="mdi mdi-lock font-size-16 align-middle me-1"></i> Lock screen</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="auth-logout.html"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                </div>
            </div>
            
        </div>
    </div>
</header>
    
<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="index.html" id="topnav-dashboard" role="button">
                            <i data-feather="home"></i><span data-key="t-dashboards">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
                            <i data-feather="briefcase"></i>
                            <span data-key="t-elements">Elements</span> 
                            <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu mega-dropdown-menu px-2 dropdown-mega-menu-xl" aria-labelledby="topnav-uielement">
                            <div class="ps-2 p-lg-0">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div>
                                            <div class="menu-title">Elements</div>
                                            <div class="row g-0">
                                                <div class="col-lg-5">
                                                    <div>
                                                        <a href="ui-alerts.html" class="dropdown-item" data-key="t-alerts">Alerts</a>
                                                        <a href="ui-buttons.html" class="dropdown-item" data-key="t-buttons">Buttons</a>
                                                        <a href="ui-cards.html" class="dropdown-item" data-key="t-cards">Cards</a>
                                                        <a href="ui-carousel.html" class="dropdown-item" data-key="t-carousel">Carousel</a>
                                                        <a href="ui-dropdowns.html" class="dropdown-item" data-key="t-dropdowns">Dropdowns</a>
                                                        <a href="ui-grid.html" class="dropdown-item" data-key="t-grid">Grid</a>
                                                        <a href="ui-images.html" class="dropdown-item" data-key="t-images">Images</a>
                                                        <a href="ui-modals.html" class="dropdown-item" data-key="t-modals">Modals</a>
                                                        <a href="ui-offcanvas.html" class="dropdown-item" data-key="t-offcanvas">Offcanvas</a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div>
                                                        <a href="ui-progressbars.html" class="dropdown-item" data-key="t-progress-bars">Progress Bars</a>
                                                        <a href="ui-placeholders.html" class="dropdown-item" data-key="t-progress-bars">Placeholders</a>
                                                        <a href="ui-tabs-accordions.html" class="dropdown-item" data-key="t-tabs-accordions">Tabs & Accordions</a>
                                                        <a href="ui-typography.html" class="dropdown-item" data-key="t-typography">Typography</a>
                                                        <a href="ui-toasts.html" class="dropdown-item" data-key="t-toasts">Toasts</a>
                                                        <a href="ui-video.html" class="dropdown-item" data-key="t-video">Video</a>
                                                        <a href="ui-general.html" class="dropdown-item" data-key="t-general">General</a>
                                                        <a href="ui-colors.html" class="dropdown-item" data-key="t-colors">Colors</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4">
                                        <div>
                                            <div class="menu-title">Extended</div>
                                            <div>
                                                <a href="extended-lightbox.html" class="dropdown-item" data-key="t-lightbox">Lightbox</a>
                                                <a href="extended-rangeslider.html" class="dropdown-item" data-key="t-range-slider">Range Slider</a>
                                                <a href="extended-sweet-alert.html" class="dropdown-item" data-key="t-sweet-alert">SweetAlert 2</a>
                                                <a href="extended-session-timeout.html" class="dropdown-item" data-key="t-session-timeout">Session Timeout</a>
                                                <a href="extended-rating.html" class="dropdown-item" data-key="t-rating">Rating</a>
                                                <a href="extended-notifications.html" class="dropdown-item" data-key="t-notifications">Notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button">
                            <i data-feather="grid"></i><span data-key="t-apps">Apps</span> <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-pages">

                            <a href="apps-calendar.html" class="dropdown-item" data-key="t-calendar">Calendar</a>
                            <a href="apps-chat.html" class="dropdown-item" data-key="t-chat">Chat</a>
                            
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-email"
                                    role="button">
                                    <span data-key="t-email">Email</span> <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-email">
                                    <a href="apps-email-inbox.html" class="dropdown-item" data-key="t-inbox">Inbox</a>
                                    <a href="apps-email-read.html" class="dropdown-item" data-key="t-read-email">Read Email</a>
                                </div>
                            </div>
                            
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-invoice"
                                    role="button">
                                    <span data-key="t-invoices">Invoices</span> <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-invoice">
                                    <a href="apps-invoices-list.html" class="dropdown-item" data-key="t-invoice-list">Invoice List</a>
                                    <a href="apps-invoices-detail.html" class="dropdown-item" data-key="t-invoice-detail">Invoice Detail</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-contact"
                                    role="button">
                                    <span data-key="t-contacts">Contacts</span> <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-contact">
                                    <a href="apps-contacts-grid.html" class="dropdown-item" data-key="t-user-grid">User Grid</a>
                                    <a href="apps-contacts-list.html" class="dropdown-item" data-key="t-user-list">User List</a>
                                    <a href="apps-contacts-profile.html" class="dropdown-item" data-key="t-profile">Profile</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle d-flex justify-content-between align-items-center" href="#" id="topnav-contact"
                                    role="button">
                                    <span data-key="t-contacts" class="">Blog</span> 
                                    <span class="badge bg-danger-subtle text-danger">New</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-contact">
                                    <a href="apps-blog-grid.html" class="dropdown-item" data-key="t-blog-grid">Blog Grid</a>
                                    <a href="apps-blog-list.html" class="dropdown-item" data-key="t-blog-list">Blog List</a>
                                    <a href="apps-blog-detail.html" class="dropdown-item" data-key="t-blog-details">Blog Details</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components" role="button">
                            <i data-feather="box"></i><span data-key="t-components">Components</span> <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-components">
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-form"
                                    role="button">
                                    <span data-key="t-forms">Forms</span> <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-form">
                                    <a href="form-elements.html" class="dropdown-item" data-key="t-form-elements">Basic Elements</a>
                                    <a href="form-validation.html" class="dropdown-item" data-key="t-form-validation">Validation</a>
                                    <a href="form-advanced.html" class="dropdown-item" data-key="t-form-advanced">Advanced Plugins</a>
                                    <a href="form-editors.html" class="dropdown-item" data-key="t-form-editors">Editors</a>
                                    <a href="form-uploads.html" class="dropdown-item" data-key="t-form-upload">File Upload</a>
                                    <a href="form-wizard.html" class="dropdown-item" data-key="t-form-wizard">Wizard</a>
                                    <a href="form-mask.html" class="dropdown-item" data-key="t-form-mask">Mask</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-table"
                                    role="button">
                                    <span data-key="t-tables">Tables</span> <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-table">
                                    <a href="tables-basic.html" class="dropdown-item" data-key="t-basic-tables">Bootstrap Basic</a>
                                    <a href="tables-datatable.html" class="dropdown-item" data-key="t-data-tables">Data Tables</a>
                                    <a href="tables-responsive.html" class="dropdown-item" data-key="t-responsive-table">Responsive</a>
                                    <a href="tables-editable.html" class="dropdown-item" data-key="t-editable-table">Editable</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-charts"
                                    role="button">
                                    <span data-key="t-charts">Charts</span> <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-charts">
                                    <a href="charts-apex.html" class="dropdown-item" data-key="t-apex-charts">Apex charts</a>
                                    <a href="charts-echart.html" class="dropdown-item" data-key="t-e-charts">E charts</a>
                                    <a href="charts-chartjs.html" class="dropdown-item" data-key="t-chartjs-charts">Chartjs</a>
                                    <a href="charts-knob.html" class="dropdown-item" data-key="t-knob-charts">Jquery Knob</a>
                                    <a href="charts-sparkline.html" class="dropdown-item" data-key="t-sparkline-charts">Sparkline</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-icons"
                                    role="button">
                                    <span data-key="t-icons">Icons</span> <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-icons">
                                    <a href="icons-boxicons.html" class="dropdown-item" data-key="t-boxicons">Boxicons</a>
                                    <a href="icons-materialdesign.html" class="dropdown-item" data-key="t-material-design">Material Design</a>
                                    <a href="icons-dripicons.html" class="dropdown-item" data-key="t-dripicons">Dripicons</a>
                                    <a href="icons-fontawesome.html" class="dropdown-item" data-key="t-font-awesome">Font Awesome 5</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-map" role="button">
                                    <span data-key="t-maps">Maps</span> <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-map">
                                    <a href="maps-google.html" class="dropdown-item" data-key="t-g-maps">Google</a>
                                    <a href="maps-vector.html" class="dropdown-item" data-key="t-v-maps">Vector</a>
                                    <a href="maps-leaflet.html" class="dropdown-item" data-key="t-l-maps">Leaflet</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more" role="button">
                            <i data-feather="file-text"></i><span data-key="t-extra-pages">Extra Pages</span> <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-more">

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-auth" role="button">
                                    <span data-key="t-authentication">Authentication</span> <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-auth">
                                    <a href="auth-login.html" class="dropdown-item" data-key="t-login">Login</a>
                                    <a href="auth-register.html" class="dropdown-item" data-key="t-register">Register</a>
                                    <a href="auth-recoverpw.html" class="dropdown-item" data-key="t-recover-password">Recover Password</a>
                                    <a href="auth-lock-screen.html" class="dropdown-item" data-key="t-lock-screen">Lock Screen</a>
                                    <a href="auth-logout.html" class="dropdown-item" data-key="t-logout">Log Out</a>
                                    <a href="auth-confirm-mail.html" class="dropdown-item" data-key="t-confirm-mail">Confirm Mail</a>
                                    <a href="auth-email-verification.html" class="dropdown-item" data-key="t-email-verification">Email verification</a>
                                    <a href="auth-two-step-verification.html" class="dropdown-item" data-key="t-two-step-verification">Two step verification</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-utility" role="button">
                                    <span data-key="t-utility">Utility</span> <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-utility">
                                    <a href="pages-starter.html" class="dropdown-item" data-key="t-starter-page">Starter Page</a>
                                    <a href="pages-maintenance.html" class="dropdown-item" data-key="t-maintenance">Maintenance</a>
                                    <a href="pages-comingsoon.html" class="dropdown-item" data-key="t-coming-soon">Coming Soon</a>
                                    <a href="pages-timeline.html" class="dropdown-item" data-key="t-timeline">Timeline</a>
                                    <a href="pages-faqs.html" class="dropdown-item" data-key="t-faqs">FAQs</a>
                                    <a href="pages-pricing.html" class="dropdown-item" data-key="t-pricing">Pricing</a>
                                    <a href="pages-404.html" class="dropdown-item" data-key="t-error-404">Error 404</a>
                                    <a href="pages-500.html" class="dropdown-item" data-key="t-error-500">Error 500</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="layouts-horizontal.html" role="button">
                            <i data-feather="layout"></i><span data-key="t-horizontal">Horizontal</span>
                        </a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
</div>