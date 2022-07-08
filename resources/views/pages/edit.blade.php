@extends('layout.template')

@section('title') Editar Usuario @endsection

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
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10 @if($errors->has('email')) has-error @endif">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email" required
                               name="email" value="{{$usuario->email}}"/>
                        <span class="help-block text-info">{{$errors->first('email')}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtNombres" class="col-sm-2 control-label">Nombres</label>
                    <div class="col-sm-10 @if($errors->has('nombres')) has-error @endif">
                        <input type="text" class="form-control" id="txtNombres" placeholder="Nombres" required
                               name="nombres" value="{{$usuario->nombres}}"/>
                        <span class="help-block text-info">{{$errors->first('nombres')}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtApellidos" class="col-sm-2 control-label">Apellidos</label>
                    <div class="col-sm-10 @if($errors->has('apellidos')) has-error @endif">
                        <input type="text" class="form-control" id="txtApellidos" placeholder="Apellidos" required
                               name="apellidos" value="{{$usuario->apellidos}}"/>
                        <span class="help-block text-info">{{$errors->first('apellidos')}}</span>
                    </div>
                </div>


                  <div class="form-group">
                    <label for="dateFechaNacimiento" class="col-sm-2 control-label">Cumpleaños</label>
                    <div class="col-sm-10 @if($errors->has('fecha_nacimiento')) has-error @endif">
                        <input type="text" class="form-control" id="dateFechaNacimiento"
                               placeholder="Fecha de Nacimiento (Ejemplo: 24/12/1995)"
                               required value="{{$usuario->fecha_nacimiento->format('d/m/Y')}}"
                               name="fecha_nacimiento"/>

                        <span class="help-block text-info">{{$errors->first('fecha_nacimiento')}}</span>

                    </div>
                </div>

                <div class="form-group">
                    <label for="selectPermisos" class="col-sm-2 control-label">Permisos</label>
                    <div class="col-sm-10 @if($errors->has('permisos')) has-error @endif">
                       <div class="select">
                           <select name="permisos" id="selectPermisos" class="form-control">
                               <option value="">Seleccione una opcion</option>
                               <option value="N">No</option>
                               <option value="S">Si</option>
                           </select>
                       </div>

                        <span class="help-block text-info">{{$errors->first('fecha_nacimiento')}}</span>

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
