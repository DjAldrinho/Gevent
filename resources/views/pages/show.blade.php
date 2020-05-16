@extends('layout.template')

@section('title') Detalles de usuario @endsection


@section('jumbotron')
    <h1>{{$usuario->getNombreCompleto()}}</h1>

    <p class="lead">
        Informacion del usuario
    </p>
@endsection


@section('content')
    <div class="row marketing">
        <div class="col-lg-6">
            <h4>Nombre Completo</h4>
            <p>{{$usuario->getNombreCompleto()}}</p>

            <h4>Fecha de Cumpleaños</h4>
            <p>{{$usuario->fecha_nacimiento->toFormattedDateString()}}</p>

            <h4>Email</h4>
            <p>{{$usuario->email}}</p>
        </div>
    </div>
@endsection