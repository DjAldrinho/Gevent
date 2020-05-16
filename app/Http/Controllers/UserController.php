<?php

namespace Gevent\Http\Controllers;

use Gevent\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth.admin', ['except' => ['getChangePassword', 'postChangePassword']]);
        $this->middleware('auth', ['only' => ['getChangePassword', 'postChangePassword']]);
    }

    public function index()
    {
        $usuarios = User::paginate(10);

        return view('pages.list', compact('usuarios'));
    }

    public function getChangePassword()
    {
        return view('pages.cambiar-password');
    }

    public function destroy($id)
    {
        $usuario = User::find($id);

        if ($usuario->delete()) {
            return redirect()->back()->with('mensaje', 'El usuario ha sido eliminado!');
        } else {
            return redirect()->back()->with('mensaje', 'No se ha podido elimiar el usuario!');
        }

    }


    public function postChangePassword(Request $request)
    {
        /*if (\Hash::check($request->a_password, $request->user()->password)) {
            if ($request->n_password == $request->a_password) {
                \Session::flash('error', 'No ingrese la misma contraseña que la antigua');
                return back();
            } else {
                if ($request->n_password == $request->rn_password) {
                    $request->user()->password = $request->n_password;
                    $request->user()->update();
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
        }*/
    }


}
