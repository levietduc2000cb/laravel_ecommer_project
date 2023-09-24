<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Tasks;
use Illuminate\Http\Request;

use App\Models\Books;

class BlogsController extends Controller
{
    public function index($id)
    {

    }
    public function indexAdmin(){
        return view('admin/blogs');
    }
    public function create()
    {
        return view('admin/createblog');
    }
    public function store(Request $request)
    {
        $blog = [];
        $blog['blog_type_id'] = $request->blogtypes;
        $blog['title'] = $request->title;
        $blog['written_by'] = $request->written_by;
        $blog['abstract'] = $request->abstract;
        if($request->hasFile($request->image_title)){
            $timestamp = round(microtime(true) * 1000);
            $imageName = $timestamp.$request->file($request->image_title)->getClientOriginalName();
            $path = $request->file($request->image_title)->move(public_path('images/blogs'),$imageName);
            $blog['image_title'] = $imageName;
        }
        $blog['content'] = $request->content;
        $res = Blogs::create($blog);
        if($res){
            return back()->with("msg","Blog created successfully!");
        }
        return back()->with("ms_error","Blog created failed!");
    }

    public function ckeditorUploadImage(Request $request){

        $task = new Tasks();
        $task->id = 0;
        $task->exists = true;
        $image = $task->addMediaFromRequest(key:'upload')->toMediaCollection(collectionName:'media');
        error_log($image->getFullUrl());
        return response()->json(['url'=>$image->getUrl()]);

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
