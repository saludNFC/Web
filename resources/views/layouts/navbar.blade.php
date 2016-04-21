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
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Iniciar sesion</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Cerrar sesion</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>
