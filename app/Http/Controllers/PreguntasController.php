<?php

namespace App\Http\Controllers;

use App\Preguntas;
use App\Respuestas;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PreguntasController extends Controller {

    public function index($isbn = null) {
        if (!empty($isbn)) {
            $book = DB::table('book_registers')->where('isbn', '=', $isbn);
            $preguntas = DB::table('preguntas')
                ->join('respuestas', 'respuestas.id_pregunta', '=', 'preguntas.id')
                ->where('preguntas.isbn', '=', $isbn)
                ->inRandomOrder()
                ->limit(4)
                ->get();
            return view('preguntas')
                ->with('preguntas', $preguntas)->with('book', $book);
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

    public function procesarPreguntas(Request $request) {
        $preguntas = array();
        array_push($preguntas, $request);
        if (!empty($preguntas)) {
            # evaluar respuestas
        }
    }

}
