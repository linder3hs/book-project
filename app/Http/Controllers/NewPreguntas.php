<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Respuestas;
use App\Preguntas;

class NewPreguntas extends Controller {

    public function index() {
        return view('addpreguntas');
    }

    public function newPregunta(Request $request) {
        $ask = new Preguntas();
        $pregunta = $request->input('pregunta');
        $isbn = $request->input('isbn');
        $ask->isbn = $isbn;
        $ask->pregunta = $pregunta;
        $ask->save();
        return redirect('/home/nuevaspreguntas');
    }
}
