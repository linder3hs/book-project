<?php

namespace App\Http\Controllers;

use App\book_register;
use App\Certificaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ListBookController extends Controller {

    const EST_CREADO = 0;
    const EST_CERTIFICAR = 1;
    const EST_EXAMEN = 2;
    const EST_APROBADO = 3;
    
    public function index() {
        $books = DB::table('book_registers')
                ->where('user_id', '=', Auth::user()->id)
                ->whereIn('estado', array(self::EST_CREADO, self::EST_CERTIFICAR, self::EST_EXAMEN))
                ->get();
        if (!empty($books)) {
            $list = array('libros' => $books);
            return view('list_book', $list);
        }
    }

    public function listAllBooks() {
        $books = DB::table('book_registers')
            ->where('user_id', '=', Auth::user()->id)
            ->get();
        if (!empty($books)) {
            $books = array('books' => $books);
            return view('lista_book_all', $books);
        }
    }

    public function solicitarCertificacion(Request $request) {
        $certicacion = new Certificaciones();
        $certicacion->user_id = Auth::user()->id;
        $certicacion->isbn = $request->input('isbn');
        $certicacion->libro = $request->input('libro');
        $certicacion->estado = 0;
        $certicacion->book_id = $request->input('idbook');
        $certicacion->save();
        $idbook = $request->input('idbook');
        $libros = book_register::find($idbook);
        $libros->estado = 1;
        $libros->save();
        return redirect('/home/lista');
    }
}
