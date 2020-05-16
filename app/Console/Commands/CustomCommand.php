<?php

namespace Gevent\Console\Commands;

use Gevent\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CustomCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'custom:command';

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

        $usuarios = User::all();
        $usuariosMensual = array();
        $usuariosDia = array();


        if ($fechaActual->eq($primerDiaMes)) {
            $primerDia = true;
        }

        foreach ($usuarios as $usuario) {
            if (($usuario->fecha_nacimiento->day == $fechaActual->day) && ($usuario->fecha_nacimiento->month == $fechaActual->month)) {
                if (enviarCorreoPersonal($usuario)) {
                    $this->info("Correos enviados personal");
                }
                array_push($usuariosDia, $usuario);
            }

            if ($primerDia) {
                if ($usuario->fecha_nacimiento->month == $fechaActual->month) {
                    array_push($usuariosMensual, $usuario);
                }
            }
        }


        if ($primerDia) {
            if (enviarCorreoMensual($usuariosMensual)) {
                $this->info("Correos enviados mensual");
            }
        }

        if (count($usuariosDia) > 0) {
            if (enviarCorreoDiario($usuariosDia)) {
                $this->info("Correos enviados diarios");
            }
        }
    }
}

function enviarCorreoDiario($usuarios)
{
    Mail::send('emails.diario',
        ['usuarios' => $usuarios],
        function ($message) {
            $message->to('auxiliarsoftware1@unisinucartagena.edu.co')
                ->subject('Feliz Cumpleaños a todos');
        });
    return true;
}

function enviarCorreoPersonal($usuario)
{

    Mail::send('emails.personal',
        ['usuario' => $usuario],
        function ($message) use ($usuario) {
            $message->to($usuario->email)
                ->subject('Happy Birthday ' . $usuario->getNombreCompleto());
        });

    return true;
}


function enviarCorreoMensual($usuarios)
{
    Mail::send('emails.mensual',
        ['usuarios' => $usuarios],
        function ($message) {
            $message->to('auxiliarsoftware1@unisinucartagena.edu.co')
                ->subject('Happy Birthday ');
        });

    return true;
}