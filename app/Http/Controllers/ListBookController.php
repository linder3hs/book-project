<?php

namespace App\Http\Controllers;

use App\book_register;
use App\Certificaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ListBookController extends Controller {

    const EST_CREADO = 0;
    const EST_SOLICITUD_CERTIFICAR = 1;
    const EST_SOLICITUD_EXAMEN = 2;
    const EST_CERTIFICACION_APROBADA = 3;
    const EST_EXAMEN_APROBADO = 4;
    const EST_EXAMEN_DESAPROBADO = 5;

    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        $books = DB::table('book_registers')
                ->where('user_id', '=', Auth::user()->id)
                ->whereIn('estado', array(self::EST_CREADO, self::EST_SOLICITUD_CERTIFICAR, self::EST_SOLICITUD_EXAMEN))
                ->get();
        if (!empty($books)) {
            $list = array('libros' => $books);
            return view('list_book', $list);
        }
    }

    public function listAllBooks() {
        $createb = DB::table('book_registers')
            ->where('user_id', '=', Auth::user()->id)
            ->where('estado', '=', self::EST_CREADO)
            ->get();
        $certificateb = DB::table('book_registers')
            ->where('user_id', '=', Auth::user()->id)
            ->whereIn('estado', array(self::EST_SOLICITUD_CERTIFICAR, self::EST_SOLICITUD_EXAMEN, self::EST_CERTIFICACION_APROBADA))
            ->get();
        $examenb = DB::table('book_registers')
            ->where('user_id', '=', Auth::user()->id)
            ->where('estado', '=', self::EST_SOLICITUD_EXAMEN)
            ->get();
        $aprobadob = DB::table('book_registers')
            ->where('user_id', '=', Auth::user()->id)
            ->where('estado', '=', self::EST_CERTIFICACION_APROBADA)
            ->get();
        if (!empty($createb)) {
            return view('lista_book_all')->with('createb', $createb)->with('certificateb', $certificateb)
                ->with('examenb', $examenb)->with('aprobadob', $aprobadob);
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
        $libros->estado = self::EST_SOLICITUD_CERTIFICAR;
        $libros->save();
        return redirect('/home/lista');
    }

    public function solicitarExamen(Request $request) {
        $idbook = $request->input('idbook');
        $libros = book_register::find($idbook);
        $libros->estado = self::EST_SOLICITUD_CERTIFICAR;
        $libros->save();
        return redirect('/home/lista');
    }

}
