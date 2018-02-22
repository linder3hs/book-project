<?php

namespace App\Http\Controllers;

use App\Preguntas;
use Illuminate\Http\Request;

class PreguntasController extends Controller {

    public function index() {
        $preguntas = Preguntas::all();
        $listP = array('preguntas' => $preguntas);
        return view('preguntas', $listP);
    }

}
