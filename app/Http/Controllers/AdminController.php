<?php

namespace App\Http\Controllers;
use App\Admin;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller {

    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function showLoginForm() {
        return view('admin.loginadmin');
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
        $user = array('users' => $users);
        return view('admin.listuser', $user);
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
