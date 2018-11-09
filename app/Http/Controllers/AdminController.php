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

}
