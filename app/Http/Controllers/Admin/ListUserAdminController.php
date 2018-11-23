<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Http\Controllers\Controller;



class ListUserAdminController extends Controller {

    public function listuser() {
        $users = User::all();
        if (!empty($users)) {
            $tipos = array('1' => 'Inscrito', '2' => 'Lector', '4' => 'Certificador', '5' => 'Debaja');
            return view('admin.listuser')->with('users', $users)->with('tipos', $tipos);
        }
    }

    public function updatenivel(Request $request) {
        $user = $request->input('userid');
        $nivel = $request->input('nivel');
        $dbuser = new User();
        $dbuser->exists = true;
        $dbuser->id = $user;
        $dbuser->nivel = $nivel;
        if (!empty($user) && !empty($nivel) && !empty($dbuser)) {
            $dbuser->save();
            return redirect('admin/usuarios');
        }
    }
}
