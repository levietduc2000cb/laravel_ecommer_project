<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

use App\Models\Books;

class BookController extends Controller
{
    public function index($id)
    {
        $res = [];

        $book = Books::where('id', $id)->get();
        $relatedBooks = Books::inRandomOrder()->where('id', '!=', $id)->where('type', $book[0]->type)->take(6)->get();
        $comments = Comment::join('users','users.id','=','comments_book.customer_id')->select('comments_book.*', 'users.fullName as fullName','users.avatarUrl as avatarUrl')->orderBy('comments_book.created_at', 'desc')->skip(0)->take(8)->get();

        $res["book"] = $book[0];
        $res["relatedBooks"] = $relatedBooks;
        $res['comments'] = $comments;
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
