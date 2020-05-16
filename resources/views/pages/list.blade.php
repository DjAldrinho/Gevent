@extends('layout.template')

@section('title') Listar Usuarios @endsection


@section('jumbotron')
    <h1>Listar Usuarios!</h1>

    <p class="lead">
        Gestionar usuarios: Listar y eliminar.
    </p>
@endsection


@section('content')
    @if (session('mensaje'))
        <div class="alert alert-success alert-dismissible animated fadeIn" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <strong><i class="fa fa-warning"></i></strong>
            {{session('mensaje')}}
        </div>
    @endif
    <table class="table table-striped table-hover" id="myTable">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Cumpleaño</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)
            <tr class="{{($usuario->is_superadministrador)?'hidden':''}}">
                <td><a href="{{url('usuarios/show', $usuario->id)}}"
                       target="_blank">{{$usuario->getNombreCompleto()}}</a></td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->fecha_nacimiento->toFormattedDateString()}}</td>
                <td class="text-center">
                    <a class="btn btn-primary btn-sm" href="{{url('usuarios/edit', $usuario->id)}}">
                        <i class="fa fa-pencil"></i>
                    </a>
                    @if(Auth::user()->id != $usuario->id )
                        <a class="btn btn-danger btn-sm" href="{{url('usuarios/destroy', $usuario->id)}}"
                           onclick="return confirm('estas seguro?')">
                            <i class="fa fa-trash"></i>
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
   {{-- *Los usuarios con fondo rojo son <span class="text-danger">Administradores</span>--}}
    {{--{{$usuarios->links()}}--}}

    <script>
        $(document).ready(function () {
            $('#myTable').DataTable({
                "paging": true,
                "info": false,
                "responsive": true,
                "bLengthChange": false,
                "pageLength": 50,
                language: {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });
        });


    </script>
@endsection