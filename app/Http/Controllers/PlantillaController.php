<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use App\Plantilla;
use Illuminate\Http\Request;

class PlantillaController extends Controller
{


    /**
     * PlantillaController constructor.
     */
    public function __construct()
    {

    }

    public function index()
    {
        $plantillaPersonal = Plantilla::where('tipo_plantilla', 'personal')->where('predeterminada', true)->first();

        $plantillaMensual = Plantilla::where('tipo_plantilla', 'mensual')->where('predeterminada', true)->first();

        $plantillaDia = Plantilla::where('tipo_plantilla', 'diario')->where('predeterminada', true)->first();


        return view('pages.plantillas.plantilla', compact('plantillaPersonal', 'plantillaMensual', 'plantillaDia'));
    }

    public function show($id)
    {
        $plantillas = Plantilla::where('tipo_plantilla', $id)->where('predeterminada', false)->get();

        $plantillaPredeterminada = Plantilla::where('tipo_plantilla', $id)->where('predeterminada', true)->first();

        return view('pages/plantillas/personalizar_plantillas', compact('plantillas', 'plantillaPredeterminada', 'id'));
    }

    public function update(Request $request, $id)
    {
        $plantilla = Plantilla::find($id);

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255|unique:plantillas,nombre,' . $plantilla->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('mensaje_error', 'Existe una plantilla con este nombre');
        } else {
            $plantilla->nombre = $request->nombre;

            $plantilla->mensaje = $request->mensaje;

            $fileUno = $request->file('file_uno');
            $fileDos = $request->file('file_dos');
            $fileTres = $request->file('file_tres');

            $path = public_path() . '/plantillas/';

            $nombrePlantilla = str_replace(" ", "_", $request->nombre);

            if (isset($fileUno) && $fileUno != '') {

                if ($plantilla->imagen_uno && file_exists($path . $plantilla->tipo_plantilla . '/fondos/' . $plantilla->imagen_uno)) {
                    unlink($path . $plantilla->tipo_plantilla . '/fondos/' . $plantilla->imagen_uno);
                }

                $pathImagenUno = $path . $request->tipo_plantilla . '/fondos';
                $fondo = 'fondo_' . $nombrePlantilla . '.' . $fileUno->getClientOriginalExtension();
                $imagenUno = Image::make($fileUno);
                $imagenUno->resize(286, 183)->save($pathImagenUno . '/' . $fondo);
                $plantilla->imagen_uno = $fondo;
            }

            if (isset($fileDos) && $fileDos != '') {

                if ($plantilla->imagen_dos && file_exists($path . $plantilla->tipo_plantilla . '/cabeceras/' . $plantilla->imagen_dos)) {
                    unlink($path . $plantilla->tipo_plantilla . '/cabeceras/' . $plantilla->imagen_dos);
                }

                $pathImagenDos = $path . $request->tipo_plantilla . '/cabeceras';
                $cabecera = 'cabecera_' . $nombrePlantilla . '.' . $fileDos->getClientOriginalExtension();
                $imagenDos = Image::make($fileDos);
                $imagenDos->resize(600, 300);
                $imagenDos->save($pathImagenDos . '/' . $cabecera);
                $plantilla->imagen_dos = $cabecera;
            }


            if (isset($fileTres) && $fileTres != '') {
                if ($plantilla->imagen_tres && file_exists($path . $plantilla->tipo_plantilla . '/cuerpos/' . $plantilla->imagen_tres)) {
                    unlink($path . $plantilla->tipo_plantilla . '/cuerpos/' . $plantilla->imagen_tres);
                }
                $pathImagenTres = $path . $request->tipo_plantilla . '/cuerpos';
                $cuerpo = 'cuerpo_' . $nombrePlantilla . '.' . $fileTres->getClientOriginalExtension();
                $imagenTres = Image::make($fileTres);
                $imagenTres->resize(600, 150);
                $imagenTres->save($pathImagenTres . '/' . $cuerpo);
                $plantilla->imagen_tres = $cuerpo;
            }

            $plantilla->update();

            return back()->with('mensaje', 'Exitoso');
        }


    }


    public function personalizar(Request $request)
    {
        $plantillaSeleccionada = Plantilla::find($request->plantilla);
        $plantillas = Plantilla::where('tipo_plantilla', $plantillaSeleccionada->tipo_plantilla)->get();
        $plantillaPredeterminada = null;

        foreach ($plantillas as $plantilla) {
            if ($plantilla->predeterminada) {
                $plantillaPredeterminada = $plantilla;
                break;
            }
        }

        if ($plantillaPredeterminada != null) {
            $plantillaPredeterminada->predeterminada = false;
            $plantillaPredeterminada->update();
        }


        $plantillaSeleccionada->predeterminada = true;
        $plantillaSeleccionada->update();

        return back()->with('mensaje', 'Exitoso');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255|unique:plantillas',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('mensaje_error', 'Existe una plantilla con este nombre');
        } else {
            $fileUno = $request->file('file_uno');
            $fileDos = $request->file('file_dos');
            $fileTres = $request->file('file_tres');


            $fondo = '';
            $cabecera = '';
            $cuerpo = '';

            $path = public_path() . '/plantillas/';

            $nombrePlantilla = str_replace(" ", "_", $request->nombre);

            if (isset($fileUno) && $fileUno != '') {
                $pathImagenUno = $path . $request->id . '/fondos';
                $fondo = 'fondo_' . $nombrePlantilla . '.' . $fileUno->getClientOriginalExtension();
                $imagenUno = Image::make($fileUno);
                $imagenUno->resize(286, 183)->save($pathImagenUno . '/' . $fondo);
            }

            if (isset($fileDos) && $fileDos != '') {
                $pathImagenDos = $path . $request->id . '/cabeceras';
                $cabecera = 'cabecera_' . $nombrePlantilla . '.' . $fileDos->getClientOriginalExtension();
                $imagenDos = Image::make($fileDos);
                $imagenDos->resize(600, 300);
                $imagenDos->save($pathImagenDos . '/' . $cabecera);
            }


            if (isset($fileTres) && $fileTres != '') {
                $pathImagenTres = $path . $request->id . '/cuerpos';
                $cuerpo = 'cuerpo_' . $nombrePlantilla . '.' . $fileTres->getClientOriginalExtension();
                $imagenTres = Image::make($fileTres);
                $imagenTres->resize(600, 150);
                $imagenTres->save($pathImagenTres . '/' . $cuerpo);
            }


            $plantilla = new Plantilla([
                'nombre' => $request->nombre,
                'mensaje' => $request->mensaje,
                'tipo_plantilla' => $request->id,
                'imagen_uno' => $fondo,
                'imagen_dos' => $cabecera,
                'imagen_tres' => $cuerpo
            ]);

            $plantilla->save();

            return back()->with('mensaje', 'Exitoso');
        }


    }

    public function testEmail(Request $request)
    {
        $plantilla = Plantilla::find($request->plantilla);

        Mail::send('emails.template',
            ['prueba' => true, 'plantilla' => $plantilla],
            function ($message) use ($plantilla) {
                $message->to($request->user()->email)
                    ->subject('Prueba de plantilla ' . $plantilla->tipo_plantilla);
            });
        return back()->with('mensaje', 'Mensaje Enviado Correctamente');
    }

    
}
