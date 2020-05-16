<div class="header clearfix">
    <nav>
        <ul class="nav nav-pills pull-right">
            @if(Auth::check() && Auth::user()->is_superadministrador)
                <li role="presentation" class="{{Request::is('usuarios/create')?'active':''}}">
                    <a href="{{url('usuarios/create')}}">
                        Registro
                    </a>
                </li>

                <li role="presentation" class="{{Request::is('usuarios')?'active':''}}">
                    <a href="{{url('usuarios')}}">
                        Listar Usuarios
                    </a>
                </li>
                <li role="presentation">
                    <a href="{{url('/plantilla')}}"
                       class="{{Request::is('/plantilla')?'active':''}}">
                        Plantillas
                    </a>
                </li>
            @endif
            @if(Auth::check())
                <li class="dropdown" role="presentation">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">{{Auth::user()->getNombreCompleto()}} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="hidden"><a href="{{url('usuarios/change-password')}}">Cambiar Contraseña</a></li>
                        <li role="separator" class="divider hidden"></li>
                        <li><a href="{{route('logout')}}">Cerrar Sesion</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </nav>
    <h3 class="text-muted"><a href="{{url('/')}}" style="text-decoration: none">Gevent</a></h3>
</div>