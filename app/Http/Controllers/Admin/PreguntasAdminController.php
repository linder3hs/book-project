<?php

namespace App\Http\Controllers\Admin;

use App\Preguntas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PreguntasAdminController extends Controller {

    public function index() {
        return view('admin.preguntas_admin');
    }

    public function setAskAdmin(Request $request) {
        $number = $request->input('number');
        DB::table('preguntas')->update(array('number_ask' => $number));
        DB::table('users')->update(array('number_ask_user' => $number));
        return redirect('/admin/preguntas/')->with('status', 'Cambiaste el numero de preguntas a ' . $number);
    }

}
