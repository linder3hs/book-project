<?php

namespace App\Http\Controllers;

use App\Publicaciones;
use Illuminate\Http\Request;

class PublishedController extends Controller
{
    public function index() {
        $publics = Publicaciones::all();
        $publics = array('publics' => $publics);
        return view('published', $publics);
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


}
