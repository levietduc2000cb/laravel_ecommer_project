<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\{Books,Types,Comment};

class BooksController extends Controller
{
    private $image = ['book_img_1','book_img_2','book_img_3','book_img_4'];
    private $image_edit = ['book_img_edit_1','book_img_edit_2','book_img_edit_3','book_img_edit_4'];
    public function index(Request $request)
    {
        $res = [];
        $skip = 0;
        $take = 10;
        $count = 0;
        $books= new Books;
        //Check has query pagination
        if($request->has('pagination')){
            $skip = (int)($request->query('pagination')-1) * $take;
            $res['pagination'] = (int)($request->query('pagination'));
        }
        if($request->has('search')){
            $books= $books->where('name','like','%'.$request->query('search').'%');
            $count =  ceil($books->count()/ $take);
            $res['search'] = $request->query('search');
        }
        else{
            //Get count in total
            $count =  ceil(Books::count() / $take);
        }
        //Get data from table book and skip 10 item
        $books = $books->skip($skip)->take($take)->get();
        $types = Types::get();

        $res['books'] = $books;
        $res['types'] = $types;
        $res['count'] =(int)$count;
        return view('admin/books', $res);
    }

    public function store(Request $request)
    {
        //Get all data from form with method post
        $data = $request->all();
        $image = [];
        //Check if has input type='file' send
        for($i=0;$i<4;$i++){
            $imageName = saveFileImage($request,$this->image[$i]);
            if($imageName != null){
                array_push($image,$imageName);
            }
        }
        if(count($image)>0){
            $data['image'] =  $image;
        }
        $res = Books::create($data);
        if($res){
            return back()->with("msg","Book created successfully!");
        }
        return back()->with("ms_error","Book created failed!");
    }

    public function edit($id)
    {
        $book = Books::where('id', $id)->get();
        $types = Types::get();
        return view('admin/editbook',['book'=> $book],['types'=>$types]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_method', '_token','book_img_edit','book_img_edit_1','book_img_edit_2','book_img_edit_3','book_img_edit_4','image_empty');
        //Get image empty to handle delete
        $listImageEmpty = json_decode($request->request->get('image_empty'));
        $res = Books::where('id', $id)->get('image');

        $image = $res[0]->image;
        if(!isset($image)){
            $image = [];
        }
        for($i=0;$i<4;$i++){
            if($request->hasFile($this->image_edit[$i])){
                //Delete old image for book
                if(isset($image[$i])){
                    $path = public_path("images/books/".$image[$i]);
                    if(File::exists($path)){
                        File::delete($path);
                    };
                }
                //Create a new image for book
                $timestamp = round(microtime(true) * 1000);
                $imageName = $timestamp.$request->file($this->image_edit[$i])->getClientOriginalName();
                $request->file($this->image_edit[$i])->move(public_path('images/books'),$imageName);
                if(isset($image[$i])){
                    array_splice($image,$i,1,$imageName);
                }
                else{
                    array_push($image,$imageName);
                }
            }
            else{
                if (isset($listImageEmpty) && in_array($i, $listImageEmpty)) {
                    //Delete old image for book
                if(isset($image[$i])){
                    $path = public_path("images/books/".$image[$i]);
                    if(File::exists($path)){
                        File::delete($path);
                    };
                        array_splice($image,$i,1);
                    }
                }
            }
        }
        $data['image'] = json_encode($image);
        $res = Books::where('id', $id)->update($data);
        if($res){
            return back()->with('msg','Book update successfully!');
        }
        return back()->with('ms_error','Book update failed!');
    }

    public function destroy($id)
    {
        //Select image from database has id
        $res = Books::where('id', $id)->get('image');
        //Create a path to contains images in public folder
        $images = $res[0]->image;
        foreach($images as $image){
            $path = public_path("images/books/".$image);
        //Handle delete image
            if(File::exists($path)){
                File::delete($path);
            };
        }
        //Handle delete from database has id
        $res = Books::where('id', $id)->delete();
        if($res){
            return back()->with('msg','Book deleted successfully!');
        }
        return back()->with('ms_error','Book deleted failed!');
    }
    public function searchName(Request $request){
        if($request->has('search')){
            try {
                $books = Books::where('name','like','%'.$request->query('search').'%')->take(10)->get('name');
                return response()->json($books,200);
            } catch (\Throwable $th) {
                return response()->json($th,500);
            }

        }
        return response()->json([],400);

    }

    public function searchBooksWithType(Request $request){
        if($request->has('type')){
            if(strlen(trim($request->query('type')))>0){
                try {
                    $books = Books::where('type', $request->query('type'))->orderBy('created_at', 'desc')->take(30)->get();
                    return response()->json($books,200);
                } catch (\Throwable $th) {
                    return response()->json($th,500);
                }
            }
            else{
                try {
                    $books = Books::orderBy('created_at', 'desc')->take(30)->get();
                    return response()->json($books,200);
                } catch (\Throwable $th) {
                    return response()->json($th,500);
                }
            }

        }
        return response()->json([],400);

    }

    public function userBooksHome(){
        $res = [];
        $bannerBooks = Books::orderBy('created_at', 'desc')->skip(3)->take(3)->join('types','books.type','=','types.id')->select('books.*', 'types.name as typeBook')->get();
        $bestSellingBooks =  Books::take(12)->get();
        foreach ($bestSellingBooks as $key => $book) {
            $totalComment = Comment::where('book_id', $book->id)->count();
            $book->totalComment = $totalComment;
        }
        $thisWeekBooks = Books::orderBy('created_at', 'desc')->take(3)->join('types','books.type','=','types.id')->select('books.*', 'types.name as typeBook')->get();
        $latestPublishedBooks = Books::orderBy('created_at', 'desc')->take(30)->get();
        $latestPublishedTypes = Types::orderBy('created_at', 'desc')->take(4)->get();
        $res['bannerBooks'] = $bannerBooks;
        $res['bestSellingBooks'] = $bestSellingBooks;
        $res['thisWeekBooks'] = $thisWeekBooks;
        $res['latestPublishedBooks'] = $latestPublishedBooks;
        $res['latestPublishedTypes'] = $latestPublishedTypes;
        return view('user/home',$res);
    }
}
