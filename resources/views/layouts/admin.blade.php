<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="icon" href="/assets/admin/images/favicon.ico">
    <title>Laravel Manager</title>
    <link rel="stylesheet" href="/assets/admin/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
    <link rel="stylesheet" href="/assets/admin/css/font-icons/entypo/css/entypo.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
    <link rel="stylesheet" href="/assets/admin/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/admin/css/neon-core.css">
    <link rel="stylesheet" href="/assets/admin/css/neon-theme.css">
    <link rel="stylesheet" href="/assets/admin/css/neon-forms.css">
    <link rel="stylesheet" href="/assets/admin/css/custom.css">
    <script src="/assets/admin/js/jquery-1.11.3.min.js"></script>
    <!--[if lt IE 9]>
    <script src="/assets/admin/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="page-body  page-fade" >
<div class="page-container">
    <div class="sidebar-menu">
        <div class="sidebar-menu-inner">
            <header class="logo-env">
                <!-- logo -->
                <div class="logo">
                    <a href="{{ route('admin.dashboard') }}">
                        <img src="/assets/admin/images/logo@2x.png" width="120" alt=""/>
                    </a>
                </div>
                <!-- logo collapse icon -->
                <div class="sidebar-collapse">
                    <a href="#" class="sidebar-collapse-icon">
                        <!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                        <i class="entypo-menu"></i>
                    </a>
                </div>
                <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
                <div class="sidebar-mobile-menu visible-xs">
                    <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                        <i class="entypo-menu"></i>
                    </a>
                </div>
            </header>
            <div class="sidebar-user-info">
                <div class="sui-normal">
                    <a href="#" class="user-link">
                        <img src="/media/usuarios/{{ (!empty(Auth::user()->foto)? Auth::user()->foto:'default/default.png') }}" width="55" alt="" class="img-circle" />
                        <span>Bem vindo,</span>
                        <strong>{{ Auth::user()->nome }}</strong>
                    </a>
                </div>
                <div class="sui-hover inline-links animate-in">
                    <a href="{{ route('admin.profile') }}">
                        <i class="entypo-user"></i>
                        Perfil
                    </a>
                    <a href="{{ url('/logout') }}">
                        <i class="entypo-lock"></i>
                        Sair
                    </a>
                    <span class="close-sui-popup">&times;</span>
                </div>
            </div>
            <ul id="main-menu" class="main-menu">
                <li {{ setActive('admin/dashboard') }}>
                    <a href="{{ url('admin/dashboard') }}">
                        <i class="entypo-gauge"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li {{ setActive('admin/banners') }}>
                    <a href="{{ url('admin/banners') }}">
                        <i class="entypo-picture"></i>
                        <span class="title">Banner</span>
                    </a>
                </li>
                <!--
                <li class="has-sub">
                    <a href="layout-api.html">
                        <i class="entypo-layout"></i>
                        <span class="title">Layouts</span>
                    </a>
                    <ul>
                        <li>
                            <a href="layout-api.html">
                                <span class="title">Layout API</span>
                            </a>
                        </li>
                    </ul>
                </li>
                -->
                <li {{ setActive('admin/usuarios','has-sub') }} >
                    <a href="#">
                        <i class="entypo-cog"></i>
                        <span class="title">Administração</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.usuarios') }}">
                                <i class="entypo-users"></i>
                                <span class="title">Usuarios</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.roles') }}">
                                <i class="entypo-key"></i>
                                <span class="title">Permissões</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        @include('errors._check')
        @yield('content')

    </div>
    <!-- Imported styles on this page -->
    <link rel="stylesheet" href="/assets/admin/js/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Bottom scripts (common) -->
    <script src="/assets/admin/js/gsap/TweenMax.min.js"></script>
    <script src="/assets/admin/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
    <script src="/assets/admin/js/bootstrap.js"></script>
    <script src="/assets/admin/js/joinable.js"></script>
    <script src="/assets/admin/js/resizeable.js"></script>
    <script src="/assets/admin/js/neon-api.js"></script>
    <script src="/assets/admin/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <!-- Imported scripts on this page -->
    <script src="/assets/admin/js/fileinput.js"></script>
    <script src="/assets/admin/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
    <script src="/assets/admin/js/jquery.sparkline.min.js"></script>
    <script src="/assets/admin/js/raphael-min.js"></script>
    <script src="/assets/admin/js/morris.min.js"></script>
    <script src="/assets/admin/js/toastr.js"></script>
    <!-- JavaScripts initializations and stuff -->
    <script src="/assets/admin/js/neon-custom.js"></script>
    <!-- Demo Settings -->
    <script src="/assets/admin/js/neon-demo.js"></script>
    <script src="/assets/admin/js/scripts.js"></script>
</body>
</html>