<?php

namespace App\Http\Controllers;

use App\book_register;
use App\User;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
	 public function __construct() {
        $this->middleware('auth');
    }


    public function index(Request $request) {
        $nombre = ($request->get('buscador'));
        //$users = User::name($request->get('buscador'));
        $users = User::name($nombre)->orderby('id', 'DESC')->paginate();
        $user = array('users' => $users);
    	return view('auth.perfil', $user);
    }
    
    public function edit() {
	     return view('auth.edit_profile');
    }

    public function update(Request $request) {
        $user = $request->user();
        $iuser = User::find($user->id);
        $iuser->name = $request->input('first_name');
        $iuser->second_name = $request->input('second');
        $iuser->apellido = $request->input('last_name');
        $iuser->second_last_name = $request->input('second_last');
        $iuser->fechadenacimiento = $request->input('date_born');
        $iuser->age = $request->input('age');
        $iuser->nacionalidad = $request->input('country');
        $iuser->provincia = $request->input('department');
        $imagen = $request->file('profile');
        $file = $request->file('profile')->getClientOriginalName();
        \Storage::disk('images')->put($file, \File::get($imagen));
        $iuser->avatar= $file;
        $iuser->save();

        return redirect('home/perfil');
    }

}
