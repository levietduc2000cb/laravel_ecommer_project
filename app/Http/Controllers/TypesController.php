<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Types;

class TypesController extends Controller
{


    public function store(Request $request)
    {
        $data = $request->all();
        $res = Types::create($data);
        if($res){
            return back()->with("msg","Type created successfully!");
        }
        return back()->withErrors("msg","Type created failed!");
    }
    public function destroy($id)
    {
        // Logic for deleting a book
    }
}
