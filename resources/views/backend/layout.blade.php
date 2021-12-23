<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Admin, Dashboard, Bootstrap" />
    <link rel="shortcut icon" sizes="196x196" href="/backend/assets/images/logo.jpg">
    <title>Cafematic - Laravel Cafe Template</title>

    <link rel="stylesheet" href="/backend/libs/bower/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet"
        href="/backend/libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css">
    <!-- build:css ../assets/css/app.min.css -->
    <link rel="stylesheet" href="/backend/libs/bower/animate.css/animate.min.css">
    <link rel="stylesheet" href="/backend/libs/bower/alertifyjs/css/alertify.min.css">
    <link rel="stylesheet" href="/backend/libs/bower/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="/backend/libs/bower/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="/backend/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/backend/assets/css/core.css">
    <link rel="stylesheet" href="/backend/assets/css/app.css">
    <!-- build:js ../assets/js/core.min.js -->
    <script src="/backend/libs/bower/jquery/dist/jquery.js"></script>
    <script src="/backend/libs/bower/jquery-ui/jquery-ui.min.js"></script>
    <script src="/backend/libs/bower/jQuery-Storage-API/jquery.storageapi.min.js"></script>
    <!-- endbuild -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
    <script src="/backend/libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
    <script>
        Breakpoints();
    </script>/backend
</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary">
    <!--============= start main area -->

    <!-- APP NAVBAR ==========-->
    <nav id="app-navbar" class="navbar navbar-inverse navbar-fixed-top primary">

        <!-- navbar header -->
        <div class="navbar-header">
            <button type="button" id="menubar-toggle-btn"
                class="navbar-toggle visible-xs-inline-block navbar-toggle-left hamburger hamburger--collapse js-hamburger">
                <span class="sr-only">Toggle navigation</span>
                <span class="hamburger-box"><span class="hamburger-inner"></span></span>
            </button>

            <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse"
                data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="zmdi zmdi-hc-lg zmdi-more"></span>
            </button>

            <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse"
                data-target="#navbar-search" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="zmdi zmdi-hc-lg zmdi-search"></span>
            </button>

            <a href="../index.html" class="navbar-brand">
                <span class="brand-icon"><i class="fa fa-gg"></i></span>
                <span class="brand-name">Cafe Matic</span>
            </a>
        </div><!-- .navbar-header -->

        <div class="navbar-container container-fluid">
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-toolbar navbar-toolbar-left navbar-left">
                    <li class="hidden-float hidden-menubar-top">
                        <a href="javascript:void(0)" role="button" id="menubar-fold-btn"
                            class="hamburger hamburger--arrowalt is-active js-hamburger">
                            <span class="hamburger-box"><span class="hamburger-inner"></span></span>
                        </a>
                    </li>
                    <li>
                        <h5 class="page-title hidden-menubar-top hidden-float">Dashboard</h5>
                    </li>
                </ul>
            </div>
        </div><!-- navbar-container -->
    </nav>
    <!--========== END app navbar -->

    <!-- APP ASIDE ==========-->
    <aside id="menubar" class="menubar light">

        <div class="menubar-scroll">
            <div class="menubar-scroll-inner">
                <ul class="app-menu">
                    <li>
                        <a href="{{ route('home.Index') }}">
                            <i class="menu-icon zmdi zmdi-storage zmdi-hc-lg"></i>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="menu-separator">
                        <hr>
                    </li>

                    <li class="has-submenu open">
                        <a href="javascript:void(0)" class="submenu-toggle">
                            <i class="menu-icon zmdi zmdi-pin zmdi-hc-lg"></i>
                            <span class="menu-text">Yönetim</span>
                            <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                        </a>
                        <ul class="submenu" style="display: block">
                            <li><a href="{{ route('tables.Index') }}"><span class="menu-text">Tables</span></a>
                            </li>
                            <li><a href="{{ route('foods.Index') }}"><span class="menu-text">Foods</span></a></li>
                            <li><a href="{{ route('income.Index') }}"><span class="menu-text">Income </span></a></li>
                        </ul>
                    </li>

                </ul><!-- .app-menu -->
            </div><!-- .menubar-scroll-inner -->
        </div><!-- .menubar-scroll -->
    </aside>
    <!--========== END app aside -->


    <!-- APP MAIN ==========-->
    @yield('content')

    <!--========== END app main -->

    <!-- APP CUSTOMIZER -->
    <div id="app-customizer" class="app-customizer">
        <a href="javascript:void(0)" class="app-customizer-toggle theme-color" data-toggle="class" data-class="open"
            data-active="false" data-target="#app-customizer">
            <i class="fa fa-gear"></i>
        </a>
        <div class="customizer-tabs">
            <!-- tabs list -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#menubar-customizer"
                        aria-controls="menubar-customizer" role="tab" data-toggle="tab">Menubar</a></li>
                <li role="presentation"><a href="#navbar-customizer" aria-controls="navbar-customizer" role="tab"
                        data-toggle="tab">Navbar</a></li>
            </ul><!-- .nav-tabs -->

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane in active fade" id="menubar-customizer">
                    <div class="hidden-menubar-top hidden-float">
                        <div class="m-b-0">
                            <label for="menubar-fold-switch">Fold Menubar</label>
                            <div class="pull-right">
                                <input id="menubar-fold-switch" type="checkbox" data-switchery data-size="small" />
                            </div>
                        </div>
                        <hr class="m-h-md">
                    </div>
                    <div class="radio radio-default m-b-md">
                        <input type="radio" id="menubar-light-theme" name="menubar-theme" data-toggle="menubar-theme"
                            data-theme="light">
                        <label for="menubar-light-theme">Light</label>
                    </div>

                    <div class="radio radio-inverse m-b-md">
                        <input type="radio" id="menubar-dark-theme" name="menubar-theme" data-toggle="menubar-theme"
                            data-theme="dark">
                        <label for="menubar-dark-theme">Dark</label>
                    </div>
                </div><!-- .tab-pane -->
                <div role="tabpanel" class="tab-pane fade" id="navbar-customizer">
                    <!-- This Section is populated Automatically By javascript -->
                </div><!-- .tab-pane -->
            </div>
        </div><!-- .customizer-taps -->
        <hr class="m-0">
        <div class="customizer-reset">
            <button id="customizer-reset-btn" class="btn btn-block btn-outline btn-primary">Reset</button>
        </div>
    </div><!-- #app-customizer -->


    <!-- build:js ../assets/js/core.min.js -->
    <script src="/backend/libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
    <script src="/backend/libs/bower/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="/backend/libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="/backend/libs/bower/PACE/pace.min.js"></script>
    <script src="/backend/libs/bower/alertifyjs/alertify.min.js"></script>
    <!-- endbuild -->

    <!-- build:js ../assets/js/app.min.js -->
    <script src="/backend/assets/js/library.js"></script>
    <script src="/backend/assets/js/plugins.js"></script>
    <script src="/backend/assets/js/app.js"></script>
    <!-- endbuild -->
    <script src="/backend/libs/bower/moment/moment.js"></script>
    <script src="/backend/libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="/backend/assets/js/fullcalendar.js"></script>

    @if (session()->has('success'))
        <script>
            alertify.success('{{ session('success') }}');
        </script>
    @endif

    @if (session()->has('error'))
        <script>
            alertify.error('{{ session('error') }}');
        </script>
    @endif
</body>

</html>
