<?php

namespace App\Http\Controllers;
use App\Admin;
use App\book_register;
use App\Certificaciones;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller {

    /*public function __construct() {
        $this->middleware('auth:admin');
    }*/

    public function showLoginForm() {
        return view('admin.login');
    }

    public function login(Request $request) {
        $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|min:6'
        ]);
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
           // echo ("Correcto master");
            return redirect('admin/usuarios');
            //return redirect()->intended(route('admin.dashboard'));

        } else {
            return redirect('admin/login');

        }
       // return redirect()->back()->whitInput($request->only('email', 'remember'));
    }

    public function preguntas() {
        return view('admin.addask');
    }

    public function listuser() {
        $users = User::all();
        $tipos = array('1' => 'Inscrito', '2' => 'Lector', '3' => 'Certificador', '4' => 'Acreditador', '5' => 'Debaja');
        return view('admin.listuser')->with('users', $users)->with('tipos', $tipos);
    }

    public function updatenivel(Request $request) {
        $user = $request->input('userid');
        $nivel = $request->input('nivel');
        $dbuser = new User();
        $dbuser->exists = true;
        $dbuser->id = $user;
        $dbuser->nivel = $nivel;
        $dbuser->save();
        return redirect('admin/usuarios');
    }

    public function certificacion() {
        $certificaciones = DB::table('certificaciones')
                            ->join('users', 'users.id', '=', 'certificaciones.user_id')
                            ->select('users.*', 'certificaciones.*')
                            ->get();
        return view('admin.certificacion')->with('certificaciones', $certificaciones);
    }

    public function aprobarCertificacion(Request $request) {
        $idc = $request->input('idc');
        $certificacion = Certificaciones::find($idc);
        $certificacion->estado = 1;
        $certificacion->save();
        $idbook = $request->input('book_id');
        $libro = book_register::find($idbook);
        $libro->estado = 2;
        $libro->save();
        return redirect('/admin/certificacion');
    }

    /*public function loginadmin(Request $request) {
        $useradmin = $request->input('emailadmin');
        $password = $request->input('passwordadmin');
        $users = Admin::all();
        foreach($users as $user) {
            if ($user->email == $useradmin && $user->password == $password) {
                return redirect('admin/preguntas');
            } else {
                echo "Datos incorrectos";
                return redirect('admin');
            }
      }*/
    
        
}
