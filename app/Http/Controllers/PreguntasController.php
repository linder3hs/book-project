<?php

namespace App\Http\Controllers;

use App\Preguntas;
use App\Respuestas;
use Illuminate\Http\Request;

class PreguntasController extends Controller {

    public function index() {
        $preguntas = Preguntas::all();
        $respuestas = Respuestas::all();
        return view('preguntas')
            ->with('preguntas', $preguntas)
            ->with('respuestas', $respuestas);
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
