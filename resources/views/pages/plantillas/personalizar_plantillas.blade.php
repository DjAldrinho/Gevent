@extends('layout.template')

@section('title')
    Personalizar Plantillas
@endsection

@section('jumbotron')
    <h1>Personalizar Plantillas!</h1>

    <p class="lead">
        Espacio para personalizar plantillas
    </p>
@endsection

@section('content')
    <script>
        $(document).ready(function () {
            $('.editor').summernote({
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ol', 'ul', 'paragraph', 'height']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']]
                ]
            });
        });

    </script>
    <div class="row">
        <div class="col-sm-6 col-md-4">
            @if (session('mensaje'))
                <div class="alert alert-success animated bounceIn">
                    {{session('mensaje')}}
                </div>
            @endif
            @if (session('mensaje_error'))
                <div class="alert alert-danger animated bounceIn">
                    {{session('mensaje_error')}}
                </div>
            @endif
            <a data-toggle="modal" data-target="#modal-{{$id}}" class="btn btn-primary btn-block">
                <i class="fa fa-eye fa-12x"></i><br/>
                <span style="font-size: 2em">Vista Previa</span>
            </a>
            <div class="caption">
                @if(isset($plantillaPredeterminada))
                    <b>Plantilla: </b> {{$plantillaPredeterminada->nombre}}
                @else
                    <h4>Plantilla {{$id}}</h4>
                @endif

            </div>
        </div>
        <div class="col-sm-6 col-md-8">
            @if(count($plantillas) > 0)
                <button class="btn btn-lg btn-block btn-primary" data-toggle="modal"
                        data-target="#modal-seleccionar-{{$id}}">Seleccionar plantilla
                </button>
            @endif
            @if(isset($plantillaPredeterminada))

                <a class="btn btn-lg btn-block btn-info" href="{{route('test-email', $plantillaPredeterminada)}}">
                    Test Email!
                </a>


                <button class="btn btn-lg btn-block btn-warning" data-toggle="modal"
                        data-target="#modal-modificar-{{$id}}">Modificar plantilla
                </button>
            @endif
            <button class="btn btn-lg btn-block btn-success" data-toggle="modal" data-target="#modal-nuevo-{{$id}}">
                Crear Nueva
            </button>
        </div>
    </div>

    <!-- Modal -->
    @if(isset($plantillaPredeterminada))
        <div class="modal fade" id="modal-{{$id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">{{$plantillaPredeterminada->nombre}}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="{{asset('plantillas/'.$plantillaPredeterminada->tipo_plantilla.'/cabeceras/'.$plantillaPredeterminada->imagen_dos)}}"
                                     alt="" class="img-responsive" width="600" height="300"/>
                            </div>
                            <div class="col-md-12">
                                <h2 style="color: #d32426;font-family: 'Comic Sans MS', serif; text-align: center;">{{$actualMonth}}</h2>
                                <p>{!! $plantillaPredeterminada->mensaje !!}</p>
                            </div>
                            <div class="col-md-12">
                                <div class="row"
                                     style="padding-top: 1rem;{{$plantillaPredeterminada->tipo_plantilla === 'personal'?'display:flex;justify-content:center':''}}">
                                    @if(count($testUsers) > 1)
                                        @foreach($testUsers as $user)
                                            @if($plantillaPredeterminada->tipo_plantilla === 'mensual')
                                                <div class="col-md-6 text-center" style="margin-bottom: 1rem">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <img src="{{asset('img/'.$user->avatar)}}"
                                                                 width="40" height="50" alt="" class="media-object"/>
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"
                                                                style="color: rgb(0 74 173);font-weight: bold">{{$user->getNombreCompleto()}}</h4>
                                                            <p style="font-family: 'Comic Sans MS', serif;font-weight: bold;">
                                                                <span style="color: rgb(131 161 187)"> {{$user->cargo}}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="col-md-4 text-center"
                                                     style="margin-bottom: 2rem;max-height: 240px;">
                                                    @if(isset($user->avatar))
                                                        <img src="{{asset('img/'.$user->avatar)}}" alt="" width="80"
                                                             height="100"/>
                                                    @endif
                                                    <p style="font-family: 'Comic Sans MS', serif;font-weight: bold;">
                                                        <span style="color: rgb(0 74 173);">{{$user->getNombreCompleto()}}</span>
                                                        <br>
                                                        <span style="color: rgb(131 161 187)"> {{$user->cargo}}</span>
                                                    </p>
                                                </div>
                                            @endif
                                        @endforeach
                                    @else
                                        <div class="col-md-4 text-center"
                                             style="margin-bottom: 2rem;max-height: 240px;">
                                            @if(isset($testUsers->avatar))
                                                <img src="{{asset('img/'.$testUsers->avatar)}}" alt="" width="80"
                                                     height="100"/>
                                            @endif
                                            <p style="font-family: 'Comic Sans MS', serif;font-weight: bold;">
                                                <span style="color: rgb(0 74 173);">{{$testUsers->getNombreCompleto()}}</span>
                                                <br>
                                                <span style="color: rgb(131 161 187)"> {{$testUsers->cargo}}</span>
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <img src="{{asset('plantillas/'.$plantillaPredeterminada->tipo_plantilla.'/cuerpos/'.$plantillaPredeterminada->imagen_tres)}}"
                                     width="600" height="150" class="img-responsive" alt="">
                            </div>
                            <div class="col-md-12">
                                <img src="{{asset('img/cinta.png')}}" class="img-responsive" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="modal fade" id="modal-nuevo-{{$id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Nueva plantilla {{$id}}</h4>
                </div>
                <div class="modal-body">
                    <form action="{{url('plantilla/store')}}" method="post" enctype="multipart/form-data"
                          id="frmNuevaPlantilla">
                        <div class="form-group">
                            <label for="txtNombre">Nombre</label>
                            <input type="text" class="form-control" id="txtNombre"
                                   placeholder="Nombre de la plantilla"
                                   name="nombre" required/>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="txtTipoPlantilla" value="{{$id}}"
                                   name="id"/>
                        </div>
                        <div class="form-group">
                            <label for="txtMensaje">Mensaje</label>
                            <textarea class="editor" id="txtMensaje" name="mensaje"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="fileImagenUno">Imagen de Fondo</label>
                            <input type="file" id="fileImagenUno" class="btn btn-success" name="file_uno"/>
                            <p class="help-block">Ancho: 286px - Alto: 183px</p>
                        </div>
                        <div class="form-group">
                            <label for="fileImagenDos">Cabecera</label>
                            <input type="file" id="fileImagenDos" class="btn btn-success" name="file_dos" required/>
                            <p class="help-block">Ancho: 600px - Alto: 300px</p>
                        </div>
                        <div class="form-group">
                            <label for="fileImagenDos">Final de Cuerpo</label>
                            <input type="file" id="fileImagenTres" class="btn btn-success" name="file_tres" required/>
                            <p class="help-block">Ancho: 600px - Alto: 150px</p>
                        </div>
                        {{ csrf_field()}}
                        <button type="submit" class="btn btn-default">Guardar</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    @if(isset($plantillaPredeterminada))
        <div class="modal fade" id="modal-modificar-{{$id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Modificar plantilla {{$id}}</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('plantilla/update', $plantillaPredeterminada)}}" method="post"
                              enctype="multipart/form-data"
                              id="frmModificarPlantilla">
                            <div class="form-group">
                                <label for="txtNombre">Nombre</label>
                                <input type="text" class="form-control" id="txtNombre"
                                       value="{{$plantillaPredeterminada->nombre}}"
                                       placeholder="Nombre de la plantilla"
                                       name="nombre" required/>
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="txtTipoPlantilla"
                                       value="{{$plantillaPredeterminada->tipo_plantilla}}"
                                       name="tipo_plantilla"/>
                            </div>
                            <div class="form-group">
                                <label for="txtMensaje">Mensaje</label>
                                <textarea class="editor" id="txtMensaje" name="mensaje" required>
                                    {{$plantillaPredeterminada->mensaje}}
                                </textarea>
                                <p class="help-block">Ingrese #### para remplazar por el nombre</p>
                            </div>
                            <div class="form-group">
                                <label for="fileImagenUno">Imagen de Fondo</label>
                                <input type="file" id="fileImagenUno" class="btn btn-success" name="file_uno"/>
                            </div>
                            <div class="form-group">
                                <label for="fileImagenDos">Cabecera</label>
                                <input type="file" id="fileImagenDos" class="btn btn-success" name="file_dos"/>
                            </div>
                            <div class="form-group">
                                <label for="fileImagenDos">Final de Cuerpo</label>
                                <input type="file" id="fileImagenTres" class="btn btn-success" name="file_tres"/>
                            </div>
                            {{ csrf_field()}}
                            <button type="submit" class="btn btn-default">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    @endif

    <div class="modal fade" id="modal-seleccionar-{{$id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Plantilla {{$id}}</h4>
                </div>
                <div class="modal-body">
                    <form action="{{url('plantilla/personalizar')}}" method="post"
                          id="frmSeleccionarPlantilla">
                        <div class="form-group">
                            <label for="selectPlantilla">Seleccionar Plantilla</label>
                            <select class="form-control" id="selectPlantilla"
                                    name="plantilla" required>
                                <option value="">Seleccione una opcion</option>
                                @foreach($plantillas as $plantillaPredeterminada)
                                    <option value="{{$plantillaPredeterminada->id}}">{{$plantillaPredeterminada->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{ csrf_field()}}
                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection