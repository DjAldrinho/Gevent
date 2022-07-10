<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{

    /**
     * UsuarioController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest', ['only' => ['getLogin']]);
    }

    public function index()
    {
        $usuarios = Usuario::all();
        return view('pages.list', compact('usuarios'));
    }

    public function show($id)
    {
        $usuario = Usuario::find($id);


        return view('pages.show', compact('usuario'));
    }

    public function edit($id)
    {
        $usuario = Usuario::find($id);

        return view('pages.edit', compact('usuario'));
    }


    public function update(Request $request)
    {
        $usuario = Usuario::find(Crypt::decrypt($request->hdnUser));


        $validator = Validator::make($request->all(), [
            'nombres' => 'required|max:255',
            'apellidos' => 'required|max:255',
            'fecha_nacimiento' => 'required',
            'permisos' => 'required',
            'email' => 'required|email|max:255|unique:usuarios,email,' . $usuario->id
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $usuario->nombres = $request->nombres;
            $usuario->apellidos = $request->apellidos;
            $usuario->email = $request->email;
            $usuario->fecha_nacimiento = $request->fecha_nacimiento;
            if (!$usuario->is_superadministrador) {
                $expEmail = explode('@', $request->email);
                $usuario->password = $expEmail[0];
            }

            if ($request->permisos == 'S') {
                $usuario->is_superadministrador = true;
            }

            $usuario->update();

            return redirect('usuarios')->with('mensaje', 'Cambios realizados correctamente!');
        }

    }


    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        if ($usuario->delete()) {
            return redirect()->back()->with('mensaje', 'El usuario ha sido eliminado!');
        } else {
            return redirect()->back()->with('mensaje', 'No se ha podido elimiar el usuario!');
        }
    }


    public function postLogin(Request $request)
    {

        $credenciales = ['email' => $request->email, 'password' => $request->password];

        if (Auth::attempt($credenciales, $request->remember)) {
            return redirect()->to('/');
        } else {
            return redirect()->back()->with('mensaje', 'Usuario o Contraseña Incorrecta');
        }
    }


    public function showRegistrationForm()
    {
        return view('pages.registro');
    }


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombres' => 'required|max:255',
            'apellidos' => 'required|max:255',
            'fecha_nacimiento' => 'required',
            'cargo' => 'max:255',
            'avatar' => 'required|image|mimes:jpeg,png,jpg',
            'is_administrador' => 'string',
            'is_superadministrador' => 'string',
            'email' => 'required|email|max:255|unique:usuarios',
        ]);

        if ($validator->fails()) {
            return view('pages.registro')->withInput($request->all())->withErrors($validator);
        }

        Usuario::create([
            'nombres' => $request['nombres'],
            'apellidos' => $request['apellidos'],
            'fecha_nacimiento' => $request['fecha_nacimiento'],
            'email' => $request['email'],
            'cargo' => $request['cargo'],
            'avatar' => $this->uploadFile($request->file('avatar')) ?: '',
            'password' => $request['identificacion'],
            'is_administrador' => !isset($request['is_administrador']) ? false : $request['is_administrador'],
            'is_superadministrador' => !isset($request['is_superadminsitrador']) ? false : $request['is_superadminsitrador'],
        ]);

        return redirect('usuarios');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
    }

    private function uploadFile($file)
    {
        try {
            if (isset($file)) {
                $input['image-name'] = time() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('/fotos');
                $file->move($destinationPath, $input['image-name']);
                return $input['image-name'];
            }
        } catch (\Exception $exception) {
            return false;
        }
    }
}
