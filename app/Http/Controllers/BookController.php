<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Books;

class BookController extends Controller
{
    public function index($id)
    {
        $res = [];
        $book = Books::where('id', $id)->get();
        $relatedBooks = Books::inRandomOrder()->where('id', '!=', $id)->where('type', $book[0]->type)->take(6)->get();
        $res["book"] = $book[0];
        $res["relatedBooks"] = $relatedBooks;
        return view('user/book',$res);
    }

    public function create()
    {
        // Logic for showing a form to create a new book
    }

    public function store(Request $request)
    {
        // Logic for storing a new book in the database
    }

    public function show($id)
    {
        // Logic for displaying a specific book
    }

    public function edit($id)
    {
        // Logic for showing a form to edit a book
    }

    public function update(Request $request, $id)
    {
        // Logic for updating a book in the database
    }

    public function destroy($id)
    {
        // Logic for deleting a book
    }
}
