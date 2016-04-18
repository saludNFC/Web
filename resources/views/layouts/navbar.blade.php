<!-- Main Header -->
<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>S</b>NFC</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Salud</b>NFC</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account Menu -->
                @if(Auth::check())
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{ \Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="fa fa-home"></i> Ver Perfil</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#"><i class="fa fa-sign-out"></i> Cerrar sesión</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </nav>
</header>
