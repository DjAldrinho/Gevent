<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{


    /**
     * UsuarioController constructor.
     */
    public function __construct()
    {
        //$this->middleware('auth.admin', ['only' => ['index', 'destroy', 'show', 'edit', 'update']]);
       // $this->middleware('auth', ['only' => ['getChangePassword', 'postChangePassword']]);
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

            if($request->permisos == 'S'){
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
            'email' => 'required|email|max:255|unique:usuarios',
        ]);

        if ($validator->fails()) {
            return view('pages.registro')->withInput($request->all())->withErrors($validator);
        } else {
            Usuario::create([
                'nombres' => $request['nombres'],
                'apellidos' => $request['apellidos'],
                'fecha_nacimiento' => $request['fecha_nacimiento'],
                'email' => $request['email'],
                'password' => $request['identificacion'],
                'is_superadministrador' => !isset($request['is_superadminsitrador']) ? false : $request['is_superadminsitrador'],
            ]);

            return redirect('usuarios');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
    }



    /*public function getChangePassword()
{
    return view('pages.cambiar-password');
}*/

    /* public function postChangePassword(Request $request)
     {
         if (\Hash::check($request->a_password, $request->Usuario()->password)) {
             if ($request->n_password == $request->a_password) {
                 \Session::flash('error', 'No ingrese la misma contraseña que la antigua');
                 return back();
             } else {
                 if ($request->n_password == $request->rn_password) {
                     $request->Usuario()->password = $request->n_password;
                     $request->Usuario()->update();
                     \Auth::logout();
                     return redirect('login');
                 } else {
                     \Session::flash('error', 'Las contraseñas no coinciden');
                     return back();
                 }
             }
         } else {
             \Session::flash('error', 'La contraseña que has ingresado no es la antigua');
             return back();
         }
     }*/


}
