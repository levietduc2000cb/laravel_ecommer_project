<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\Users;

class UsersController extends Controller
{
    //private $image = ['book_img_1','book_img_2','book_img_3','book_img_4'];
    //private $image_edit = ['book_img_edit_1','book_img_edit_2','book_img_edit_3','book_img_edit_4'];
    public function index(Request $request)
    {
        $res = [];
        $skip = 0;
        $take = 10;
        $count = 0;
        $users = new Users;
        //Check has query pagination
        if($request->has('pagination')){
            $skip = (int)($request->query('pagination')-1) * $take;
            $res['pagination'] = (int)($request->query('pagination'));
        }
        if($request->has('search')){
            $users= $users->where('fullName','like','%'.$request->query('search').'%');
            $count =  ceil($users->count()/ $take);
            $res['search'] = $request->query('search');
        }
        else{
            $count =  ceil(Users::count() / $take);
        }
        //Get data from table book and skip 10 item
        $users = $users->skip($skip)->take($take)->get();

        $res['users'] = $users;
        $res['count'] =(int)$count;
        return view('admin/customers', $res);
    }

    public function edit($id)
    {
        $user = Users::where('id', $id)->get();
        return view('admin/edituser',['user'=> $user]);
    }

    // public function update(Request $request, $id)
    // {
    //     $data = $request->except('_method', '_token','book_img_edit','book_img_edit_1','book_img_edit_2','book_img_edit_3','book_img_edit_4','image_empty');
    //     //Get image empty to handle delete
    //     $listImageEmpty = json_decode($request->request->get('image_empty'));
    //     $res = Users::where('id', $id)->get('image');

    //     $image = $res[0]->image;
    //     for($i=0;$i<4;$i++){
    //         if($request->hasFile($this->image_edit[$i])){
    //             //Delete old image for book
    //             if(isset($image[$i])){
    //                 $path = public_path("images/books/".$image[$i]);
    //                 if(File::exists($path)){
    //                     File::delete($path);
    //                 };
    //             }
    //             //Create a new image for book
    //             $timestamp = round(microtime(true) * 1000);
    //             $imageName = $timestamp.$request->file($this->image_edit[$i])->getClientOriginalName();
    //             $request->file($this->image_edit[$i])->move(public_path('images/books'),$imageName);
    //             array_splice($image,$i,1,$imageName);
    //         }
    //         else{
    //             if (in_array($i,$listImageEmpty)) {

    //                 //Delete old image for book
    //             if(isset($image[$i])){
    //                 $path = public_path("images/books/".$image[$i]);
    //                 if(File::exists($path)){
    //                     File::delete($path);
    //                 };
    //                     array_splice($image,$i,1);
    //                 }
    //             }
    //         }
    //     }
    //     $data['image'] = json_encode($image);
    //     $res = Books::where('id', $id)->update($data);
    //     if($res){
    //         return back()->with('msg','Book update successfully!');
    //     }
    //     return back()->with('ms_error','Book update failed!');
    // }

    public function destroy($id)
    {
        //Select image from database has id
        $res = Users::where('id', $id)->get('avatarUrl');
        //Create a path to contains images in public folder
        $image = $res[0]->avatarUrl;
        if(isset($image)){
            $path = public_path("images/users/".$image);
            if(File::exists($path)){
                File::delete($path);
            };
        }
        //Handle delete from database has id
        $res = Users::where('id', $id)->delete();
        if($res){
            return back()->with('msg','User deleted successfully!');
        }
        return back()->with('ms_error','User deleted failed!');
    }
    function searchName(Request $request){
        if($request->has('search')){
            $users = Users::where('fullName','like','%'.$request->query('search').'%')->take(10)->get('fullName');
            return response()->json($users,200);
        }
        return response()->json(null,200);
    }
}
