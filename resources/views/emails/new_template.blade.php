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
    </style>
</head>
<body style="background: url({{ isset($template->imagen_uno) && !empty($template->imagen_uno)?$message->embed(public_path().'/plantillas/'.$template->tipo_plantilla.'/fondos/'.$template->imagen_uno):''}}) left top repeat;">
<center>
    <div style="display: table-row;align-content: center;align-items: center">
        <center>
            <img src="{{$message->embed(public_path() . '/plantillas/'.$template->tipo_plantilla.'/cabeceras/'.$template->imagen_dos)}}"
                 width="600" height="300" alt=""/>
        </center>
        <div>
            <center style="max-width: 600px">
                <h2 style="color: #d32426;font-family: 'Comic Sans MS', serif;text-align: center;">{{$actualMonth}}</h2>
                @if(isset($template->mensaje))
                    {!! $template->mensaje !!}
                @endif
            </center>
            <div style="text-align: center;align-content: center;align-items: center;justify-content: center;max-width: 600px;margin-top: 1rem;display: {{$template->tipo_plantilla === 'personal'?'flex': 'table'}};">
                @if($template->tipo_plantilla !== 'personal')
                    @foreach($users as $user)
                        @if($template->tipo_plantilla === 'diario')
                            <div style=" width: 33.33%;float: left;display: flex;justify-content: center;margin-bottom: 3rem;height: 200px; max-height: 200px">
                                <center style="width: 100%">
                                    <div style="display: table-row;align-items: center;align-content: center;text-align: center">
                                        <img src="{{$message->embed(($isTest || !isset($user->avatar)) ? public_path().'/img/'.$user->avatar:public_path().'/fotos/'.$user->avatar)}}"
                                             alt="" style="width: 65px;height: 80px;"/>
                                        <p style="font-family: 'Comic Sans MS', serif;font-weight: bold;">
                                            <span style="color:#004bad">{{$user->getNombreCompleto()}}</span>
                                            <br>
                                            <span style="color: #83a1bb;"> {{$user->cargo}}</span>
                                            <br>
                                        </p>
                                    </div>
                                </center>
                            </div>
                        @else
                            <div style="display: inline-block;width: 50%;">
                                <div style="display: inline-flex;justify-content: center;float: left;align-items: center;align-content: center;">
                                    <img src="{{$message->embed(($isTest || !isset($user->avatar)) ? public_path().'/img/'.$user->avatar:public_path().'/fotos/'.$user->avatar)}}"
                                         alt="" style="width: 40px;height: 50px;"/>
                                    <p style="font-family: 'Comic Sans MS', serif;font-weight: bold;padding-left: 5px;margin-top: 4px;text-align: left">
                                        <span style="color: #004bad">{{$user->getNombreCompleto()}}</span>
                                        <br>
                                        <span style="color: #83a1bb;"> {{$user->cargo}}</span>
                                    </p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <center style="width: 100%">
                        <div style="display: flex;justify-content: center;height: 250px;align-items: center;margin-top: 1rem;">
                            <center style="width: 100%">
                                <div style="display: table-row;align-items: center;align-content: center;text-align: center">
                                    <img src="{{$message->embed(($isTest || !isset($users->avatar)) ? public_path().'/img/'.$users->avatar:public_path().'/fotos/'.$users->avatar)}}"
                                         alt="" style="width: 65px;height: 80px;"/>
                                    <p style="text-align: center;font-weight: bold;font-family: 'Comic Sans MS', serif;">
                                        <span style="color: #004bad">{{$users->getNombreCompleto()}}</span>
                                        <br>
                                        <span style="color: #83a1bb;"> {{$users->cargo}}</span>
                                    </p>
                                </div>
                            </center>
                        </div>
                    </center>
                @endif
            </div>
        </div>
        <center>
            <img src="{{$message->embed(public_path() . '/plantillas/'.$template->tipo_plantilla.'/cuerpos/'.$template->imagen_tres)}}"
                 alt=""
                 style="width: 600px;height: 150px"/>
        </center>
        <center>
            <img src="{{$message->embed(public_path(). '/img/cinta.png')}}"
                 alt="" title=""/>
        </center>
    </div>
</center>
</body>
</html>