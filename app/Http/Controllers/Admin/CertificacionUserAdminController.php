<?php

namespace App\Http\Controllers\Admin;

use App\book_register;
use App\Certificaciones;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ListBookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CertificacionUserAdminController extends Controller {

    const EST_CETIFICACION_CREADA = 0;
    const EST_CERTIFICACION_APROBADA = 1;
    const EST_CERTIFICACION_DESAPROBADA = 2;

    public function index() {
        $users = DB::table('users')->get();
        if (!empty($users)) {
            return view('admin.list_certificate')->with('users', $users);
        } else {
            return redirect('/admin');
        }
    }

    public function detailUsercertificate($id) {
        if (!empty($id)) {
            $usuario = DB::table('users')
                ->where('users.id', '=' , $id)
                ->get();

            $libros = DB::table('book_registers')
                ->where('user_id', '=', $id)
                ->whereIn('estado', array(ListBookController::EST_SOLICITUD_CERTIFICAR, ListBookController::EST_SOLICITUD_EXAMEN))
                ->get();
            if (!empty($usuario)) {
                return view('admin.detalle_usuario_certidicador')
                    ->with('user', $usuario)
                    ->with('libros', $libros);
            } else {
                return redirect('/admin');
            }
        } else {
            return redirect('/admin');
        }
    }

    # Aprobacion de usuarios certificadores
    /*
     * En este caso el estado del libro es 3 porque es un usuario certidicador
     */

    public function aprobarUserCertificate(Request $request) {
        $idbook = $request->input('book_id');
        $user = $request->input('id_user');
        $libro = book_register::find($idbook);
        $libro->estado = ListBookController::EST_CERTIFICACION_APROBADA;
        $libro->save();
        $certicacion = new Certificaciones();
        $certicacion->user_id = $user;
        $certicacion->isbn = $libro->isbn;
        $certicacion->libro = $libro->title;
        $certicacion->estado = self::EST_CERTIFICACION_APROBADA;
        $certicacion->book_id = $libro->id;
        $certicacion->save();
        return redirect('/admin/user/detail/' . $user);
    }

    # Desaprobracion de usuarios certificadores
    /*
     * En este caso se desaprueba la certificación del usuario certificador
     */

    public function desaprobarUserCertificate(Request $request) {
        $idc = $request->input('idc');
        $certificacion = Certificaciones::find($idc);
        $certificacion->estado = self::EST_CERTIFICACION_DESAPROBADA;
        $certificacion->save();
        return redirect('/admin/user/certificate');
    }

    public function certificacion() {
        $certificaciones = DB::table('certificaciones')
            ->join('users', 'users.id', '=', 'certificaciones.user_id')
            ->select('users.*', 'certificaciones.*')
            ->get();
        if (!empty($certificaciones)) {
            return view('admin.certificacion')->with('certificaciones', $certificaciones);
        }
    }

    public function aprobarCertificacion(Request $request) {
        $idc = $request->input('idc');
        $certificacion = Certificaciones::find($idc);
        $certificacion->estado = self::EST_CERTIFICACION_APROBADA;
        $certificacion->save();
        $idbook = $request->input('book_id');
        $libro = book_register::find($idbook);
        $libro->estado = ListBookController::EST_SOLICITUD_EXAMEN;
        $libro->save();
        return redirect('/admin/certificacion');
    }

}
