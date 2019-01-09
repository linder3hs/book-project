<?php

namespace App\Http\Controllers;

use App\Publicaciones;
use Illuminate\Http\Request;
use App\Comemnts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PublishedController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $publics = Publicaciones::orderBy('id', 'desc')->get();
        $comentarios = DB::table('comemnts')->
        join('users', 'users.id', '=', 'comemnts.user_id')->
        orderBy('comemnts.id', 'desc')->get();
        return view('published')->with('publics', $publics)->with('comentarios', $comentarios);
    }

    public function storage(Request $request) {
        $user = $request->user();
        $public = new Publicaciones();
        $public->user_id = $user->id;
        $public->name = $user->name;
        $public->publicaciones = $request->input('public');
        $public->save();
        return redirect('/home/publicaciones');
    }

    public function comment(Request $request) {
        $user = $request->user();
        $comentario = new Comemnts();
        $comentario->user_id = $user->id;
        $comentario->comentario = $request->input('comentario');
        $comentario->pub_id = $request->input('idpu');
        $comentario->save();

        return redirect('/home/publicaciones');
    }


}
