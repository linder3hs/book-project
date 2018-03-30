<?php

namespace App\Http\Controllers;

use App\book_register;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $imagen = $request->file('imagen');
        $file = $request->file('imagen')->getClientOriginalName();
        \Storage::disk('images')->put($file, \File::get($imagen));
        $book->image = $file;
        $book->user_id = $user->id;
        $book->save();
        return redirect('home');
    }

    public function createBookByIsbn(Request $request) {
        $user = $request->user();
        $book = new book_register();
        $book->title = $request->input('titlere');
        $book->author = $request->input('autorre');
        $book->public_date = $request->input('anopure');
        $book->image = $request->input('imgre');
        $book->user_id = $user->id;
        $book->save();
        return redirect('home');

    }

    public function searchScope($query, $s) {
        return $query->where('name', 'like', '%' . $s . '%')->orWhere('apellido' , 'like' , '%' . $s . '%');
    }


}
