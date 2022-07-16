@extends('layout.template')

@section('title')
    Editar Usuario
@endsection

@section('jumbotron')
    <h1>Editar Usuario!</h1>

    <p class="lead">
        Por favor, ingrese toda la informacion solicitada.
    </p>
@endsection

@section('content')
    <div class="panel panel-info animated fadeIn">
        <div class="panel-heading">Actualizar datos</div>
        <div class="panel-body">
            <form class="form-horizontal" action="{{route('update')}}" method="POST">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9 @if($errors->has('email')) has-error @endif">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email" required
                               name="email" value="{{$usuario->email}}"/>
                        <span class="help-block text-info">{{$errors->first('email')}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtNombres" class="col-sm-3 control-label">Nombres</label>
                    <div class="col-sm-9 @if($errors->has('nombres')) has-error @endif">
                        <input type="text" class="form-control" id="txtNombres" placeholder="Nombres" required
                               name="nombres" value="{{$usuario->nombres}}"/>
                        <span class="help-block text-info">{{$errors->first('nombres')}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtApellidos" class="col-sm-3 control-label">Apellidos</label>
                    <div class="col-sm-9 @if($errors->has('apellidos')) has-error @endif">
                        <input type="text" class="form-control" id="txtApellidos" placeholder="Apellidos" required
                               name="apellidos" value="{{$usuario->apellidos}}"/>
                        <span class="help-block text-info">{{$errors->first('apellidos')}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtCargo" class="col-sm-3 control-label">Cargo</label>
                    <div class="col-sm-9 @if($errors->has('cargo')) has-error @endif">
                        <input type="text" class="form-control" id="txtCargo" placeholder="Cargo"
                               name="cargo" value="{{$usuario->cargo}}"/>
                    </div>
                    <span class="help-block text-info">{{$errors->first('cargo')}}</span>
                </div>
                <div class="form-group">
                    <label for="fileAvatar" class="col-sm-3 control-label">Foto</label>
                    <div class="col-sm-9 @if($errors->has('avatar')) has-error @endif">
                        <input type="file" class="form-control" id="fileAvatar" placeholder="Cargo"
                               name="avatar" value="{{$usuario->avatar}}"/>
                    </div>
                    <span class="help-block text-info">{{$errors->first('avatar')}}</span>
                    <div class="text-center" style="margin-top: 5rem">
                        <img src="{{$usuario->getUrlAvatar()}}" alt="{{$usuario->getUrlAvatar()}}"
                             class="img-rounded" width="200px"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="dateFechaNacimiento" class="col-sm-3 control-label">Cumpleaños</label>
                    <div class="col-sm-9 @if($errors->has('fecha_nacimiento')) has-error @endif">
                        <input type="text" class="form-control" id="dateFechaNacimiento"
                               placeholder="Fecha de Nacimiento (Ejemplo: 24/12/1995)"
                               required value="{{$usuario->fecha_nacimiento->format('d/m/Y')}}"
                               name="fecha_nacimiento"/>

                        <span class="help-block text-info">{{$errors->first('fecha_nacimiento')}}</span>

                    </div>
                </div>
                @if(Auth::user()->is_administrador || Auth::user()->is_superadministrador)
                    <div class="form-group">
                        <label for="selectIsAdministrador" class="col-sm-3 control-label">Administrador?</label>
                        <div class="col-sm-9 @if($errors->has('is_administrador')) has-error @endif">
                            <select class="form-control" id="selectIsAdministrador" required name="is_administrador">
                                <option value="true" {{$usuario->is_administrador? 'selected': '' }}>Si</option>
                                <option value="false" {{!$usuario->is_administrador? 'selected': '' }}>No</option>
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
                                    <option value="true" {{$usuario->is_superadministrador? 'selected': '' }}>Si</option>
                                    <option value="false" {{!$usuario->is_superadministrador? 'selected': '' }}>No</option>
                                </select>
                                <span class="help-block text-info">{{$errors->first('is_superadministrador')}}</span>
                            </div>
                        </div>
                    @endif
                @endif
                <div class="form-group">
                    <label for="txtPassword" class="col-sm-3 control-label">Change Password</label>
                    <div class="col-sm-9 @if($errors->has('password')) has-error @endif">
                        <input type="password" class="form-control" id="txtPassword"
                               placeholder="Password"
                               required
                               name="password"/>
                        <span class="help-block text-info">{{$errors->first('password')}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtPassword" class="col-sm-3 control-label">Confirm Password</label>
                    <div class="col-sm-9 @if($errors->has('password_confirmation')) has-error @endif">
                        <input type="password" class="form-control" id="txtPassword"
                               placeholder="Confirm Password"
                               required
                               name="password_confirmation"/>
                        <span class="help-block text-info">{{$errors->first('password_confirmation')}}</span>
                    </div>
                </div>
                <input type="hidden" value="{{Crypt::encrypt($usuario->id)}}" name="hdnUser"/>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary pull-right">
                            <i class="fa fa-refresh"></i>
                            Actualizar
                        </button>
                    </div>
                </div>
                {{ csrf_field()}}
            </form>
        </div>
    </div>

@endsection
