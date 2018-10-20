<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller {
    
    public function index() {
        $users = DB::table('users')->where('nivel', '=', 3)->get();
        if (!empty($users)) {
            return view('admin.list_certificate')->with('users', $users);
        } else {
            return redirect('/admin');
        }    
    }

    public function detailUserCerticate($id) {
        if (!empty($id)) {
            $usuario = DB::table('users')
                ->where('users.id', '=' , $id)
                ->get();

            $libros = DB::table('book_registers')
                ->where('user_id', '=', $id)
                ->get();
            if (!empty($usuario)) {
                return view('admin.detalle_usuario_certidicador')
                    ->with('user', $usuario)
                    ->with('libros', $libros);
            } else {
                return redirect('/admin');
            }
        } else {
            return redirect('/admin');
        }
    }
}
