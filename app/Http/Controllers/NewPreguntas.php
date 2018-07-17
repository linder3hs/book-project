<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Respuestas;
use App\Preguntas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

//Probando

class NewPreguntas extends Controller {

    public function index() {
        $est = Auth::user()->nivel;
        if ($est == 4) {
            return view('addpreguntas');
        } else {
           return redirect('/');
        }

    }

    public function newPregunta(Request $request) {
        $ask = new Preguntas();
        $res = new Respuestas();
        $user = Auth::user();
        $pregunta = $request->input('pregunta');
        $r1 = $request->input('r1');
        $r2 = $request->input('r2');
        $r3 = $request->input('r3');
        $r4 = $request->input('r4');
        $r5 = $request->input('r5');
        $isbn = $request->input('isbn');
        $ask->iduser = $user->id;
        $ask->pregunta = $pregunta;
        $ask->respuesta = $r1;
        $ask->isbn = $isbn;
        $ask->save();

        if (!empty($r1) && !empty($r2) && !empty($r3) && !empty($r4) && !empty($r5)) {
            //Respuesta 1
            $res->isbn = $isbn;
            $book = DB::table('book_registers')->where('isbn', '=', $res->isbn)->get();
            if (!empty($book)) {
                $res->user_id = $user->id;
                $res->respuesta = $r1;
                $res->save();

                //Respuesta 2
                $res->isbn = $isbn;
                $res->user_id = $user->id;
                $res->respuesta2 = $r2;
                $res->save();

                //Respuesta 3
                $res->isbn = $isbn;
                $res->user_id = $user->id;
                $res->respuesta3 = $r3;
                $res->save();

                //Respuesta 4
                $res->isbn = $isbn;
                $res->user_id = $user->id;
                $res->respuesta4 = $r4;
                $res->save();

                //Respuesta 5
                $res->isbn = $isbn;
                $res->user_id = $user->id;
                $res->respuesta5 = $r5;
                $res->save();
                return redirect('/home/nuevaspreguntas');
            }
        } else {
            echo "Debe rellenar todas las preguntas";
        }
    }
}
