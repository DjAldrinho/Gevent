<?php

namespace App\Http\Controllers;

use App\Plantilla;
use App\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

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

        $testUsers = null;


        $actualMonth = '';

        if (isset($plantillaPredeterminada)) {

            if ($plantillaPredeterminada->tipo_plantilla !== 'personal') {
                $count = 6;
            } else {
                $count = 1;
            }

            $testUsers = $this->getTestUsers($count);
            $actualMonth = $this->getActualMonth($plantillaPredeterminada);
        }

        return view('pages/plantillas/personalizar_plantillas', compact('plantillas', 'plantillaPredeterminada', 'id', 'testUsers', 'actualMonth'));
    }

    public function update(Request $request, $id)
    {
        $plantilla = Plantilla::find($id);

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255|unique:plantillas,nombre,' . $plantilla->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('mensaje_error', 'Existe una plantilla con este nombre');
        }

        $plantilla->nombre = $request->nombre;

        $plantilla->mensaje = $request->mensaje;

        $fileUno = $request->file('file_uno');
        $fileDos = $request->file('file_dos');
        $fileTres = $request->file('file_tres');

        $path = public_path() . '/plantillas/';

        $nombrePlantilla = str_replace(" ", "_", $request->nombre);

        if (isset($fileUno)) {

            if ($plantilla->imagen_uno && file_exists($path . $plantilla->tipo_plantilla . '/fondos/' . $plantilla->imagen_uno)) {
                unlink($path . $plantilla->tipo_plantilla . '/fondos/' . $plantilla->imagen_uno);
            }

            $pathImagenUno = $path . $request->tipo_plantilla . '/fondos';
            $fondo = 'fondo_' . $nombrePlantilla . '.' . $fileUno->getClientOriginalExtension();
            $imagenUno = Image::make($fileUno);
            $imagenUno->resize(286, 183)->save($pathImagenUno . '/' . $fondo);
            $plantilla->imagen_uno = $fondo;
        }

        if (isset($fileDos)) {

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


        if (isset($fileTres)) {
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

        if ($plantillaPredeterminada !== null) {
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
        }

        $fileUno = $request->file('file_uno');
        $fileDos = $request->file('file_dos');
        $fileTres = $request->file('file_tres');


        $fondo = '';
        $cabecera = '';
        $cuerpo = '';

        $path = public_path() . '/plantillas/';

        $nombrePlantilla = str_replace(" ", "_", $request->nombre);

        if (isset($fileUno)) {
            $pathImagenUno = $path . $request->id . '/fondos';
            $fondo = 'fondo_' . $nombrePlantilla . '.' . $fileUno->getClientOriginalExtension();
            $imagenUno = Image::make($fileUno);
            $imagenUno->resize(286, 183)->save($pathImagenUno . '/' . $fondo);
        }

        if (isset($fileDos)) {
            $pathImagenDos = $path . $request->id . '/cabeceras';
            $cabecera = 'cabecera_' . $nombrePlantilla . '.' . $fileDos->getClientOriginalExtension();
            $imagenDos = Image::make($fileDos);
            $imagenDos->resize(600, 300);
            $imagenDos->save($pathImagenDos . '/' . $cabecera);
        }


        if (isset($fileTres)) {
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

    public function testEmail(Request $request)
    {


        $template = Plantilla::find($request->plantilla);

        $actualMonth = $this->getActualMonth($template);

        if ($template->tipo_plantilla === 'personal') {
            $count = 1;
        } else {
            $count = 6;
        }

        $users = $this->getTestUsers($count);


        Mail::send('emails.new_template',
            ['isTest' => true, 'template' => $template, 'users' => $users, 'actualMonth' => $actualMonth],
            static function ($message) use ($request, $template) {
                $message->to($request->user()->email)
                    ->subject('Prueba de plantilla ' . $template->tipo_plantilla);
            });
        return back()->with('mensaje', 'Mensaje Enviado Correctamente');
    }

    protected function getActualMonth(Plantilla $template)
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

    protected function getTestUsers($count)
    {

        $users = factory(Usuario::class, $count)->make();

        if (is_array($users)) {
            return $users->sortBy('nombres')->values()->all();
        }

        return $users;
    }

}
