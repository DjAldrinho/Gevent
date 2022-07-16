<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        table#mensual {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        table#mensual td, table#mensual th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
    <title>Template</title>
</head>
<!-- Imagen de Fondo 286*183 -->
<body style="-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;-webkit-font-smoothing: antialiased;width: 100%;background: url({{($plantilla->imagen_uno != null)?$message->embed(public_path() . '/plantillas/'.$plantilla->tipo_plantilla.'/fondos/'.$plantilla->imagen_uno):''}}) left top repeat">
<table width="600" align="center" cellpadding="0" cellspacing="0" border="0" class="MCwrapper">
    <tr>
        <td width="600">
            <img src="{{$message->embed(public_path() . '/plantillas/'.$plantilla->tipo_plantilla.'/cabeceras/'.$plantilla->imagen_dos)}}"
                 width="600" height="300"/>
            <!-- Cambiar imagen 600x300 Cabecera-->
        </td>
    </tr>
</table>
<table align="center" border="0">
    <tr>
        <td width="600">
            @if(str_contains($plantilla->mensaje, "####"))
                @if(isset($usuario))
                    <p>{!! str_replace("####", $usuario->getNombreCompleto(), $plantilla->mensaje) !!}</p>
                @endif
                @if(isset($mensaje))
                    <p>{!! str_replace("####", $mensaje, $plantilla->mensaje) !!}</p>
                @endif
                @if(isset($prueba))
                    <p>{!! $plantilla->mensaje !!}</p>
                @endif
            @else
                <p>{!! $plantilla->mensaje !!}</p>
            @endif
        </td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <!-- Final cuerpo -->
        <td width="600">
            <img src="{{$message->embed(public_path() . '/plantillas/'.$plantilla->tipo_plantilla.'/cuerpos/'.$plantilla->imagen_tres)}}"
                 width="600"
                 height="150" alt="" title=""
                 style="border: 0;display: block;outline: none;">
        </td>
    </tr>
</table>
<table align="center" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td width="600">
            <img src="{{$message->embed(public_path(). '/img/cinta.png')}}"
                 alt="" title=""
                 style="border: 0;display: block;outline: none;">
        </td>
    </tr>
</table>

</body>
</html>