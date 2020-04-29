<header class="main-header bg-red">
    <!-- Logo -->
    <a href="/admin" class="logo bg-red">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>PG</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>POSTGRADO</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top bg-red">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="bg-blue">
                    <a href="/"><button type="button" class="btn btn-danger btn-xs">Pagina Web</button></a>
                </li>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset("img/usuarios/".$usuarios->imagen) }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{$usuarios->nombres}}{{$usuarios->apellidos}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-red">
                            <img src="{{ asset("img/usuarios/".$usuarios->imagen) }}" class="img-circle"
                                alt="User Image">
                            <p>{{$usuarios->nombres}}{{$usuarios->apellidos}} - {{$usuarios->tipo}}</p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a class="btn btn-danger btn-block" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar Session') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>