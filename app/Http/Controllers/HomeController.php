<?php

namespace App\Http\Controllers;

use App\book_register;
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
    public function index() {
        return view('home');
    }

    public function createBook(Request $request) {
        $user = $request->user();
        $book = new book_register();
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->public_date = $request->input('public-date');
        $book->user_id = $user->id;
        $book->save();
        return redirect('home');
    }


}
