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
     * @return void
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
            if (!$usuario->is_superadministrador) {
                if (($usuario->fecha_nacimiento->day == $fechaActual->day) && ($usuario->fecha_nacimiento->month == $fechaActual->month)) {
                    if (enviarCorreoPersonal($usuario)) {
                        $this->info('Correos Personales enviados!');
                    } else {
                        $this->info('Correos Personales no enviados!');
                    }
                    $usuariosDia[] = $usuario;
                }

                if ($primerDia) {
                    if ($usuario->fecha_nacimiento->month == $fechaActual->month) {
                        $usuariosMensual[] = $usuario;
                    }
                }
            }
        }


        if ($primerDia && !empty($usuariosMensual)) {
            $mes = new Date($fechaActual);
            if (enviarCorreoMensual($usuariosMensual, $mes->format("F"))) {
                $this->info('Correos Mensuales enviados!');
            } else {
                $this->info('Correos Mensuales no enviados!');
            }
        }

        if (!empty($usuariosDia)) {
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
        $actualMonth = getActualMonth($plantillaPersonal);
        Mail::send('emails.new_template',
            ['users' => $usuario, 'template' => $plantillaPersonal, 'actualMonth' => $actualMonth, 'isTest' => false],
            static function ($message) use ($usuario) {
                $message->to($usuario->email)
                    ->subject('Happy Birthday!' . $usuario->getNombreCompleto());
            });

        return true;
    }

    return false;

}


function enviarCorreoDiario($usuarios, $dia)
{
    $plantillaPersonal = Plantilla::where('tipo_plantilla', 'diario')->where('predeterminada', true)->first();

    if (isset($plantillaPersonal)) {

        $actualMonth = getActualMonth($plantillaPersonal);

        Mail::send('emails.new_template',
            ['users' => $usuarios, 'template' => $plantillaPersonal, 'actualMonth' => $actualMonth, 'isTest' => false],
            static function ($message) use ($dia, $plantillaPersonal) {
                $message->to('cojowa.group@cojowa.edu.co')
                    ->subject($plantillaPersonal->nombre . ' ' . $dia);
            });
        return true;
    }

    return false;

}


function enviarCorreoMensual($tempUsuarios, $mes)
{

    $users = Collection::make($tempUsuarios);

    $template = Plantilla::where('tipo_plantilla', 'mensual')->where('predeterminada', true)->first();

    if (isset($template)) {

        $actualMonth = getActualMonth($template);

        Mail::send('emails.new_template',
            ['users' => $users, 'template' => $template, 'actualMonth' => $actualMonth, 'isTest' => false],
            static function ($message) use ($mes, $template) {
                $message->to('cojowa.group@cojowa.edu.co')
                    ->subject($template->nombre . ' ' . $mes);
            });
        return true;
    }

    return false;
}

function getActualMonth(Plantilla $template)
{
    $now = Carbon::now();

    $months = config('constants.months');

    $localeMonth = $now->localeMonth;
    $esMonth = $months[$localeMonth];
    $month = $localeMonth . ' / ' . $esMonth;

    if ($template->tipo_plantilla === 'mensual') {
        $actualMonth = $month;
    } else {
        $actualMonth = $month . ', ' . $now->day;
    }

    return $actualMonth;
}
