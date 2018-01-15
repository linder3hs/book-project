<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
	 public function __construct() {
        $this->middleware('auth');
    }


    public function index() {
    	return view('auth.perfil');
    }

    public function edit() {
	     return view('auth.edit_profile');
    }
}
