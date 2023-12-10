<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
        // Logic for storing a new comment in the database
        $data = [];
        $data['customer_id'] = $request->customer_id;
        $data['book_id'] = $request->book_id;
        $data['comment'] = $request->comment;
        $data['evaluate_stars'] = $request->evaluate_stars;

        $res = Comment::create($data);
        if($res){
            return redirect()->back()->with('msg','Create comment is success');
        }
        return redirect()->back()->with('msg','Create comment is failure');
    }

    public function show(Request $request)
    {
        $pagination = $request->input('pagination');
        $book_id = $request->input('book_id');
        $skip = $pagination * 8;
        $comments = null;
        try {
            $comments = Comment::join('users','users.id','=','comments_book.customer_id')->select('comments_book.*', 'users.fullName as fullName','users.avatarUrl as avatarUrl')->orderBy('comments_book.created_at', 'desc')->skip($skip)->take(8)->get();
            return response()->json(['comments'=>$comments],200);
        } catch (\Throwable $th) {
            return response()->json($th, 500);
        }



    }
}
