<?php

namespace App\Http\Controllers;

use App\Publicaciones;
use Illuminate\Http\Request;
use App\Comemnts;

class PublishedController extends Controller
{
    public function index() {
        $publics = Publicaciones::orderBy('id', 'desc')->get();
        $comentarios = Comemnts::all();
        return view('published', compact('publics', 'comentarios'));
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
        $comentario = new Comemnts();
        $comentario->comentario = $request->input('comentario');
        $comentario->pub_id = $request->input('idpu');
        $comentario->save();

        return redirect('/home/linder');
    }


}
