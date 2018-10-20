<?php

namespace App\Http\Controllers;

use App\Preguntas;
use App\Respuestas;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PreguntasController extends Controller {

    public function index($isbn = null) {
        if (!empty($isbn)) {
            $preguntas = DB::table('preguntas')
                ->join('respuestas', 'respuestas.id_pregunta', '=', 'preguntas.id')
                ->where('preguntas.isbn', '=', $isbn)
                ->get();
            return view('preguntas')
                ->with('preguntas', $preguntas);
        } else {
            return redirect('/');
        }

    }

    public function newPregunta(Request $request) {
        $ask = new Preguntas();
        $pregunta = $request->input('pregunta');
        $isbn = $request->input('isbn');
        $ask->isbn = $isbn;
        $ask->pregunta = $pregunta;
        $ask->save();
    }

}
