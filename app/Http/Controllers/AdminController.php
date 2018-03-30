<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller {

    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function index() {
        return view('admin.addask');
    }

    public function preguntas() {
        return view('admin.addask');
    }

    public function loginadmin(Request $request) {
        $this->validate($request, [ 'email' => 'required|email', 'password' => 'required']);
    }
}
