@extends('layout.template')

@section('title')
    Crear Usuario
@endsection

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
            <form class="form-horizontal" action="{{route('register')}}" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9 @if($errors->has('email')) has-error @endif">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email" required
                               name="email"/>
                        <span class="help-block text-info">{{$errors->first('email')}}</span>
                    </div>

                </div>
                <div class="form-group">
                    <label for="txtNombres" class="col-sm-3 control-label">Nombres</label>
                    <div class="col-sm-9 @if($errors->has('nombres')) has-error @endif">
                        <input type="text" class="form-control" id="txtNombres" placeholder="Nombres" required
                               name="nombres"/>
                    </div>
                    <span class="help-block text-info">{{$errors->first('nombres')}}</span>
                </div>
                <div class="form-group">
                    <label for="txtApellidos" class="col-sm-3 control-label">Apellidos</label>
                    <div class="col-sm-9 @if($errors->has('apellidos')) has-error @endif">
                        <input type="text" class="form-control" id="txtApellidos" placeholder="Apellidos" required
                               name="apellidos"/>
                    </div>
                    <span class="help-block text-info">{{$errors->first('apellidos')}}</span>
                </div>
                <div class="form-group">
                    <label for="txtCargo" class="col-sm-3 control-label">Cargo</label>
                    <div class="col-sm-9 @if($errors->has('cargo')) has-error @endif">
                        <input type="text" class="form-control" id="txtCargo" placeholder="Cargo"
                               name="cargo"/>
                    </div>
                    <span class="help-block text-info">{{$errors->first('cargo')}}</span>
                </div>
                <div class="form-group">
                    <label for="fileAvatar" class="col-sm-3 control-label">Foto</label>
                    <div class="col-sm-9 @if($errors->has('avatar')) has-error @endif">
                        <input type="file" class="form-control" id="fileAvatar" placeholder="Cargo"
                               name="avatar"/>
                    </div>
                    <span class="help-block text-info">{{$errors->first('avatar')}}</span>
                </div>
                <div class="form-group">
                    <label for="dateFechaNacimiento" class="col-sm-3 control-label">Cumpleaños</label>
                    <div class="col-sm-9 @if($errors->has('fecha_nacimiento')) has-error @endif">
                        <input type="date" class="form-control" id="dateFechaNacimiento"
                               placeholder="Fecha de Nacimiento (Ejemplo: 24/12/1995)"
                               required
                               name="fecha_nacimiento"/>
                        <span class="help-block text-info">{{$errors->first('fecha_nacimiento')}}</span>
                    </div>
                </div>
                @if(Auth::user()->is_administrador || Auth::user()->is_superadministrador)
                    <div class="form-group">
                        <label for="selectIsAdministrador" class="col-sm-3 control-label">Administrador?</label>
                        <div class="col-sm-9 @if($errors->has('is_administrador')) has-error @endif">
                            <select class="form-control" id="selectIsAdministrador" required name="is_administrador">
                                <option value="true">Si</option>
                                <option value="false" selected>No</option>
                            </select>
                            <span class="help-block text-info">{{$errors->first('is_administrador')}}</span>
                        </div>
                    </div>
                    @if(Auth::user()->is_superadministrador)
                        <div class="form-group">
                            <label for="selectIsSuperAdministrador"
                                   class="col-sm-3 control-label">Superadministrador?</label>
                            <div class="col-sm-9 @if($errors->has('is_superadministrador')) has-error @endif">
                                <select class="form-control" id="selectIsSuperAdministrador" required
                                        name="is_superadministrador">
                                    <option value="true">Si</option>
                                    <option value="false" selected>No</option>
                                </select>
                                <span class="help-block text-info">{{$errors->first('is_superadministrador')}}</span>
                            </div>
                        </div>
                    @endif
                @endif
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
