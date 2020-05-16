@extends('layout.template')

@section('title') Crear Usuario @endsection

@section('jumbotron')
    <h1>Crear Usuario!</h1>

    <p class="lead">
        Por favor, ingrese toda la informacion solicitada.
    </p>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Registro</div>
        <div class="panel-body">
            <form class="form-horizontal" action="{{route('register')}}" method="POST">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10 @if($errors->has('email')) has-error @endif">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email" required
                               name="email"/>
                        <span class="help-block text-info">{{$errors->first('email')}}</span>
                    </div>

                </div>
                <div class="form-group">
                    <label for="txtNombres" class="col-sm-2 control-label">Nombres</label>
                    <div class="col-sm-10 @if($errors->has('nombres')) has-error @endif">
                        <input type="text" class="form-control" id="txtNombres" placeholder="Nombres" required
                               name="nombres"/>
                    </div>
                    <span class="help-block text-info">{{$errors->first('nombres')}}</span>
                </div>
                <div class="form-group">
                    <label for="txtApellidos" class="col-sm-2 control-label">Apellidos</label>
                    <div class="col-sm-10 @if($errors->has('apellidos')) has-error @endif">
                        <input type="text" class="form-control" id="txtApellidos" placeholder="Apellidos" required
                               name="apellidos"/>
                    </div>
                    <span class="help-block text-info">{{$errors->first('apellidos')}}</span>
                </div>
                <div class="form-group">
                    <label for="dateFechaNacimiento" class="col-sm-2 control-label">Cumpleaños</label>
                    <div class="col-sm-10 @if($errors->has('fecha_nacimiento')) has-error @endif">
                        <input type="date" class="form-control" id="dateFechaNacimiento"
                               placeholder="Fecha de Nacimiento (Ejemplo: 24/12/1995)"
                               required
                               name="fecha_nacimiento"/>
                        <span class="help-block text-info">{{$errors->first('fecha_nacimiento')}}</span>
                    </div>

                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success pull-right">Registrarse</button>
                    </div>
                </div>
                {{ csrf_field()}}
            </form>
        </div>
    </div>


@endsection
