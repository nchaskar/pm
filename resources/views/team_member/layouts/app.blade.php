<!doctype html>
<html>

<head>

    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PM</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>


</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <div class="navbar-brand-box" style="background:#ffffff;border-right: 1px solid #ddd;">
                        <a href="{{ url('teacher/dashboard') }}" class="logo logo-light">
                            
                        </a>
                    </div>
                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </div>

                <div class="d-flex">

                    
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            
                            <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ Auth::user()->fname }} {{ Auth::user()->lname }}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        
                    </div>

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu" style="background: #FFFFFF;">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">

                        <li>
                            <a href="{{ url('employee/dashboard') }}" class="waves-effect">
                                <i class="bx bx-home-circle"></i><span key="t-chat">Dashboard</span>
                            </a>
                        </li>

                        <li><a href="{{ url('employee/tasks/show') }}" class="waves-effect">
                                <i class="bx bx-home-circle"></i><span key="t-chat">Tasks</span>
                            </a>
                        </li>

                        <li><a href="{{ url('logout') }}" class="waves-effect">
                                <i class="bx bx-home-circle"></i><span key="t-chat">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        
