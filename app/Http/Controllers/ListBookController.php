<?php

namespace App\Http\Controllers;

use App\book_register;
use App\Certificaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ListBookController extends Controller
{
    
    public function index() {
        $books = DB::table('book_registers')
                ->where('user_id', '=', Auth::user()->id)
                ->get();
        if (!empty($books)) {
            $list = array('libros' => $books);
            return view('list_book', $list);
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
