<?php

namespace App\Console\Commands;

use App\Plantilla;
use App\Usuario;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Mail;
use Jenssegers\Date\Date;

class BirthdayCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'birthday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enviar correo de felicitaciones!';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $fechaActual = Carbon::today();
        $fechaHoy = Carbon::now();
        $primerDiaMes = $fechaHoy->firstOfMonth();

        $primerDia = false;

        $usuarios = Usuario::all();
        $usuariosMensual = array();
        $usuariosDia = array();

        if ($fechaActual->eq($primerDiaMes)) {
            $primerDia = true;
        }


        foreach ($usuarios as $usuario) {
            if (($usuario->fecha_nacimiento->day == $fechaActual->day) && ($usuario->fecha_nacimiento->month == $fechaActual->month)) {

                if (enviarCorreoPersonal($usuario)) {
                    $this->info('Correos Personales enviados!');
                } else {
                    $this->info('Correos Personales no enviados!');
                }
                array_push($usuariosDia, $usuario);
            }

            if ($primerDia) {
                if ($usuario->fecha_nacimiento->month == $fechaActual->month) {
                    array_push($usuariosMensual, $usuario);
                }
            }
        }


        if ($primerDia  && count($usuariosMensual) > 0) {
            $mes = new Date($fechaActual);
            if (enviarCorreoMensual($usuariosMensual, $mes->format("F"))) {
                $this->info('Correos Mensuales enviados!');
            } else {
                $this->info('Correos Mensuales no enviados!');
            }
        }

        if (count($usuariosDia) > 0) {
            $dia = new Date($fechaActual);
            if (enviarCorreoDiario($usuariosDia, $dia->format('l j \\d\\e F \\d\\e\\l Y'))) {
                $this->info('Correos Diarios enviados!');
            } else {
                $this->info('Correos Diarios no enviados!');
            }
        }
    }

}

function enviarCorreoPersonal($usuario)
{
    $plantillaPersonal = Plantilla::where('tipo_plantilla', 'personal')->where('predeterminada', true)->first();



    if (isset($plantillaPersonal)) {
        Mail::send('emails.template',
            ['usuario' => $usuario, 'plantilla' => $plantillaPersonal],
            function ($message) use ($usuario) {
            $message->to($usuario->email)
                    ->subject('Happy Birthday!' . $usuario->getNombreCompleto());//Hasta aqui 
            });

        return true;
    }

    return false;

}


function enviarCorreoDiario($usuarios, $dia)
{
    $plantillaPersonal = Plantilla::where('tipo_plantilla', 'diario')->where('predeterminada', true)->first();

    if (isset($plantillaPersonal)) {
        /* $mensaje = "<ul class='fa fa-ul'>";

         foreach ($usuarios as $usuario) {
             $mensaje .= "<li>" . $usuario->getNombreCompleto() . "</li>";
         }
         $mensaje .= "</ul>";*/

        $mensaje = "";
       
        foreach ($usuarios as $usuario) {
            $mensaje .=  $usuario->getNombreCompleto() . "<br/>";
        }
       

        Mail::send('emails.template',
            ['mensaje' => $mensaje, 'plantilla' => $plantillaPersonal],
            function ($message) use ($dia, $plantillaPersonal) {
               $message->to('cojowa.group@cojowa.edu.co')
                    ->subject($plantillaPersonal->nombre . ' '. $dia);
                   /* $message->to('anthony.jimenez@cojowa.edu.co')
                    ->subject($plantillaPersonal->nombre . ' '. $dia);*/
            });
        return true;
    }

    return false;

}


function enviarCorreoMensual($tempUsuarios, $mes)
{

    $usuarios = Collection::make($tempUsuarios);

    $plantillaMensual = Plantilla::where('tipo_plantilla', 'mensual')->where('predeterminada', true)->first();

    if (isset($plantillaMensual)) {
        $mensaje = "<center><table id='mensual' border='0' style='border-collapse:unset;width:60%'>";
        $mensaje .= "<tr>";
        $mensaje .= "<th>Nombre</th><th>Dia</th>";
        $mensaje .= "</tr>";
        foreach ($usuarios->sortBy('fecha_nacimiento.day')->values()->all() as $usuario) {
            $mensaje .= "<tr><td align='center'>" . $usuario->getNombreCompleto() . "</td><td align='center'>" . $usuario->fecha_nacimiento->day . "</td></tr>";
        }
        $mensaje .= "</table></center>";

        Mail::send('emails.template',
            ['mensaje' => $mensaje, 'plantilla' => $plantillaMensual],
            function ($message) use ($mes, $plantillaMensual) {
                $message->to('cojowa.group@cojowa.edu.co')
                    ->subject($plantillaMensual->nombre . ' '. $mes);
            });
        return true;
    } else {
        return false;
    }
}
