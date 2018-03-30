<?php

namespace App\Http\Controllers;

use App\book_register;
use Illuminate\Http\Request;

class ListBookController extends Controller
{
    
    public function index() {
        $books = book_register::all();
        $list = array('libros' => $books);
        return view('list_book', $list);
    }
}
