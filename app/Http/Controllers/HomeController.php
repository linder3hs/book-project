<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function searchIsbn(Request $request) {
        $isbn = $request->input('isbnbook');
            if (!empty($isbn)) {
                $ruta = "http://isbndb.com/api/v2/json/LOWY1B9W/books?q=" . $isbn;
                echo $ruta;
            }

    }
}
