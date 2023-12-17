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

    public function show_api(Request $request){

        $query = $request->query();
        $limit = $request->query('limit');
        $skip = $request->query('skip');
        if($limit && $skip){
            $types =  Types::orderBy('created_at', 'desc')->skip($skip)->take($limit)->get();
        }
        else{
            $types = Types::get();
        }

        return response()->json(['types' => $types]);
    }
}
