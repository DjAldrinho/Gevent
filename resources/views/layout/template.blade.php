<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Software para la gestion de eventos">
    <meta name="author" content="Aldray Narvaez">
    <title>@yield('title', 'Default') | Gevent</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link href="{{asset('css/animate.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/app.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/custom.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/editor.css')}}" rel="stylesheet"/>
    <!-- include summernote css/js-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"/>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"/>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/datatables.min.css')}}"/>
</head>
<body>
<div class="container">
    @include('layout.includes.header')

    <div class="jumbotron">
        @yield('jumbotron')
    </div>
    @yield('content')
</div>
<script rel="script" type="application/javascript" src="{{asset('js/app.js')}}"></script>
<script rel="script" type="application/javascript" src="{{asset('js/editor.js')}}"></script>
<script type="text/javascript" src="{{asset('js/datatables.min.js')}}"></script>
</body>

</html>
