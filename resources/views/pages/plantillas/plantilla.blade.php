@extends('layout.template')

@section('title') Plantillas @endsection

@section('jumbotron')
    <h1>Lista de Plantillas!</h1>

    <p class="lead">
        Todas las plantillas
    </p>
@endsection

@section('content')

    <div class="row animated fadeIn">
        <div class="col-sm-6 col-md-4">
            <a href="#" class="thumbnail" data-toggle="modal" data-target="#modal-personal">
                <img src="{{asset('img/template.png')}}" alt=""/>
            </a>
            <div class="caption">
                <h4>Plantilla General</h4>
            </div>
        </div>
        <div class="col-sm-6 col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">Plantillas seleccionadas</div>
                <div class="panel-body">
                    <ul class="fa-ul">
                        <li>
                            <i class="fa-li fa fa-check-square"></i>
                            <b>Plantilla
                                Personal: </b> {{isset($plantillaPersonal)?$plantillaPersonal->nombre:'No Registra'}}
                            <a href="{{url('plantilla/show', 'personal')}}"
                               class="btn btn-xs btn-primary pull-right" role="button">Personalizar</a>
                        </li>


                        <li>
                            <i class="fa-li fa fa-check-square"></i>
                            <b>Plantilla
                                Mensual: </b> {{isset($plantillaMensual)?$plantillaMensual->nombre:'No Registra'}}
                            <a href="{{url('plantilla/show', 'mensual')}}"
                               class="btn btn-xs btn-primary pull-right" role="button">Personalizar</a>
                        </li>


                        <li>
                            <i class="fa-li fa fa-check-square"></i>
                            <b>Plantilla Diaria: </b> {{isset($plantillaDia)?$plantillaDia->nombre:'No Registra'}}
                            <a href="{{url('plantilla/show', 'diario')}}"
                               class="btn btn-xs btn-primary pull-right" role="button">Personalizar</a>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-personal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Plantilla Personal</h4>
                </div>
                <div class="modal-body">
                    <img src="{{asset('img/template.png')}}" alt="" class="img-responsive"/>
                </div>
            </div>
        </div>
    </div>

@endsection