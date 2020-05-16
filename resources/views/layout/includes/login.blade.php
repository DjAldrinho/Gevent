@section('jumbotron')
    <h1>Bienvenido</h1>

    <p class="lead">
        Bienvenido a la plataforma de Gestion de Eventos (Genvent), la cual ayudara a su institucion
        a recordar las fechas especiales a todos sus sempledos.</p>

    <p class="hidden">
        <a class="btn btn-lg btn-primary" href="{{url('usuarios/create')}}" role="button">
            Registrar Usuario!
        </a>
    </p>
@endsection
@section('content')
    @if(session('mensaje'))
        <div class="alert alert-danger alert-dismissible animated bounceIn" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <strong><i class="fa fa-warning"></i></strong> {{session('mensaje')}}
        </div>
    @endif
    <div class="panel panel-primary animated fadeIn">
        <div class="panel-heading">Login</div>
        <div class="panel-body">
            <form class="form-horizontal" action="{{route('login')}}" method="POST">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10 @if($errors->has('email')) has-error @endif">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email" required
                               name="email"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10 @if($errors->has('password')) has-error @endif">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password"
                               name="password"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"/> Remember me
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary pull-right">
                            <i class="fa fa-user"></i> Login
                        </button>
                    </div>
                </div>
                {{ csrf_field()}}
            </form>
        </div>
    </div>
@endsection

