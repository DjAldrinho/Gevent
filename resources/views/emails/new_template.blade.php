<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Template</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            -webkit-font-smoothing: antialiased;
            width: 100%;
            background: url({{ isset($template->imagen_uno) && !empty($template->imagen_uno)?$message->embed(public_path().'/plantillas/'.$template->tipo_plantilla.'/fondos/'.$template->imagen_uno):''}}) left top repeat;
        }

        h2 {
            color: #d32426;
            font-family: "Comic Sans MS", serif;
            text-align: center;
        }

        .container {
            display: table-row;
            align-content: center;
        }

        .header {
            background: url("{{$message->embed(public_path().'/plantillas/'.$template->tipo_plantilla.'/cabeceras/'.$template->imagen_dos)}}") 50% 50% / cover;
            height: 300px;
            width: 600px;
        }

        .body {
            padding-top: 1rem;
        }

        .footer {
            background: url("{{$message->embed(public_path().'/plantillas/'.$template->tipo_plantilla.'/cuerpos/'.$template->imagen_tres)}}") 50% 50% / cover;
            height: 150px;
            width: 600px;
        }

        .ribbon {
            background: url("{{$message->embed(public_path().'/img/cinta.png')}}") 50% 50% / cover;
            width: 600px;
            height: 200px;
        }

        .row {
            text-align: center;
            align-content: center;
            align-items: center;
            justify-content: center;
            display: table;
            max-width: 600px;
        }

        .item {
            align-items: center;
            align-content: center;
        }

        .column {
            width: 33.33%;
            float: left;
            display: flex;
            justify-content: center;
            margin-bottom: 3rem;
            height: 250px;
        }

        .column-list {
            display: inline-block;
            width: 50%;
        }

        .column .item {
            display: table-row;
        }

        .column .item img {
            width: 65px;
            height: 80px;
        }


        .column-list .item {
            display: inline-flex;
            justify-content: center;
            float: left;
        }

        .column-list .item img {
            width: 40px;
            height: 50px;
        }

        .column-list .item p {
            text-align: left;
            padding-left: 10px;
        }

        .name, .job, .day {
            font-family: "Comic Sans MS", serif;
            font-weight: bold;
        }

        .name {
            color: rgb(0 74 173);
        }

        .job, .day {
            color: rgb(131 161 187);
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header"></div>
    <div class="body">
        <h2>{{$actualMonth}}</h2>
        @if(isset($template->mensaje))
            {!! $template->mensaje !!}
        @endif
        <div class="row" style="{{$template->tipo_plantilla === 'personal'?'display:flex': ''}}">
            @if($template->tipo_plantilla !== 'personal')
                @foreach($users as $user)
                    <div class="{{$template->tipo_plantilla === 'mensual'?'column': 'column-list'}}">
                        <div class="item">
                            @if(isset($user->avatar))
                                <img src="{{$message->embed($isTest ? public_path().'/img/'.$user->avatar:public_path().'/fotos/'.$user->avatar)}}"
                                     alt=""/>
                            @endif
                            <p>
                                <span class="name">{{$user->getNombreCompleto()}}</span> <br>
                                <span class="job"> {{$user->cargo}}</span> <br>
                            </p>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="column">
                    <div class="item">
                        @if(isset($users->avatar))
                            <img src="{{$message->embed($isTest ? public_path().'/img/'.$users->avatar:public_path().'/fotos/'.$users->avatar)}}"
                                 alt=""/>
                        @endif
                        <p>
                            <span class="name">{{$users->getNombreCompleto()}}</span> <br>
                            <span class="job"> {{$users->cargo}}</span> <br>
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="footer"></div>
    <div class="ribbon"></div>
</div>
</body>
</html>