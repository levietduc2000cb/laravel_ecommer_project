<?php

namespace App\Http\Controllers;

use App\Models\{Blogs, BlogTypes};
use App\Models\Tasks;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogsController extends Controller
{
    public function index($id)
    {

    }
    public function indexAdmin(Request $request){
        $res = [];
        $skip = 0;
        $take = 10;
        $count = 0;
        $blogs = new Blogs;
        //Check has query pagination
        if($request->has('pagination')){
            $skip = (int)($request->query('pagination')-1) * $take;
            $res['pagination'] = (int)($request->query('pagination'));
        }
        if($request->has('search')){
            $blogs= $blogs->where('title','like','%'.$request->query('search').'%');
            $count =  ceil($blogs->count()/ $take);
            $res['search'] = $request->query('search');
        }
        else{
            //Get count in total
            $count =  ceil(Blogs::count() / $take);
        }
        //Get data from table book and skip 10 item
        $blogs = $blogs->skip($skip)->take($take)->select('id','blog_type_id','title','written_by','image_title','updated_at')->get();

        $res['blogs'] = $blogs;
        $res['count'] =(int)$count;
        return view('admin/blogs',$res);
    }
    public function userBlogs(Request $request){
        $res = [];
        $skip = 0;
        $take = 10;
        $count = 0;
        $blogs = new Blogs;
        //Check has query pagination
        if($request->has('pagination')){
            $skip = (int)($request->query('pagination')-1) * $take;
            $res['pagination'] = (int)($request->query('pagination'));
        }
        if($request->has('search')){
            $blogs= $blogs->where('title','like','%'.$request->query('search').'%');
            $count =  ceil($blogs->count()/ $take);
            $res['search'] = $request->query('search');
        }
        else{
            //Get count in total
            $count =  ceil(Blogs::count() / $take);
        }
        //Get data from table book and skip 10 item
        $blogs = $blogs->skip($skip)->take($take);
        $blogs = $blogs->join('blogtypes','blogs.blog_type_id','=','blogtypes.id')->select('blogs.*', 'blogtypes.name as nameType')->get();
        $types = BlogTypes::get();

        $recentBlogs = Blogs::orderBy('created_at')->limit(4)->get();

        $sqlBlogCategoryTotal = "SELECT blogtypes.*, totalBlogsType.count
        FROM blogtypes
        LEFT JOIN (SELECT blog_type_id, COUNT(*) AS count FROM blogs GROUP BY blog_type_id) AS totalBlogsType
        ON blogtypes.id = totalBlogsType.blog_type_id;";
        $blogCategoryTotal = DB::select(DB::raw($sqlBlogCategoryTotal));

        $tagCategory =  BlogTypes::inRandomOrder()->limit(10)->get();

        $res['blogs'] = $blogs;
        $res['recentBlogs'] = $recentBlogs;
        $res['types'] = $types;
        $res['count'] =(int)$count;
        return view('user/blog', $res,['blogCategoryTotal'=>$blogCategoryTotal,'tagCategory'=>$tagCategory]);
    }

    public function userTypeBlogs($id, Request $request){
        $res = [];
        $skip = 0;
        $take = 10;
        $count = 0;
        $blogs = new Blogs;
        //Check has query pagination
        if($request->has('pagination')){
            $skip = (int)($request->query('pagination')-1) * $take;
            $res['pagination'] = (int)($request->query('pagination'));
        }
        if($id){
            $blogs= $blogs->where('blog_type_id',$id);
            $count =  ceil($blogs->count()/ $take);
        }
        else{
            //Get count in total
            $count =  ceil(Blogs::count() / $take);
        }
        //Get data from table book and skip 10 item
        $blogs = $blogs->skip($skip)->take($take);
        $blogs = $blogs->join('blogtypes','blogs.blog_type_id','=','blogtypes.id')->select('blogs.*', 'blogtypes.name as nameType')->get();
        $types = BlogTypes::get();
        $recentBlogs = Blogs::orderBy('created_at')->limit(4)->get();

        $sqlBlogCategoryTotal = "SELECT blogtypes.*, totalBlogsType.count
        FROM blogtypes
        LEFT JOIN (SELECT blog_type_id, COUNT(*) AS count FROM blogs GROUP BY blog_type_id) AS totalBlogsType
        ON blogtypes.id = totalBlogsType.blog_type_id;";
        $blogCategoryTotal = DB::select(DB::raw($sqlBlogCategoryTotal));
        $tagCategory =  BlogTypes::inRandomOrder()->limit(10)->get();

        $res['blogs'] = $blogs;
        $res['recentBlogs'] = $recentBlogs;
        $res['types'] = $types;
        $res['count'] =(int)$count;
        return view('user/blog', $res,['blogCategoryTotal'=>$blogCategoryTotal,'tagCategory'=>$tagCategory]);
    }
    function useBlogDetail($id){
        $blog = Blogs::where('id',$id)->first();
        return view('user/blog_detail',['blog'=>$blog]);
    }
    public function create()
    {
        $res['types'] = BlogTypes::get();
        return view('admin/createblog',$res);
    }
    public function store(Request $request)
    {
        $blog = [];
        $blog['blog_type_id'] = $request->blogtypes;
        $blog['title'] = $request->title;
        $blog['written_by'] = $request->written_by;
        $blog['abstract'] = $request->abstract;
        $blog['list_image_ckeditor'] = json_encode(explode(",",$request->list_images_ckeditor));
        $nameFile = 'image_title';
        if($request->hasFile($nameFile)){
            $timestamp = round(microtime(true) * 1000);
            $imageName = $timestamp.$request->file($nameFile)->getClientOriginalName();
            $request->file($nameFile)->move(public_path('images/blogs'),$imageName);
            $blog['image_title'] = $imageName;
        }
        $blog['content'] = $request->content;
        $res = Blogs::create($blog);
        if($res){
            return back()->with("msg","Blog created successfully!");
        }else{
            return back()->with("ms_error","Blog created failed!");
        }
    }

    public function ckeditorUploadImage(Request $request){

        $task = new Tasks();
        $task->id = 0;
        $task->exists = true;
        $image = $task->addMediaFromRequest(key:'upload')->toMediaCollection(collectionName:'media');
        return response()->json(['url'=>$image->getUrl()]);

    }
    public function show($id)
    {
        // Logic for displaying a specific book
    }
    public function edit($id)
    {
        // Logic for showing a form to edit a book
        $res['blog'] = Blogs::where('id',$id)->first();
        $res['types'] = BlogTypes::get();
        return view('admin/editblog',$res);
    }
    public function update(Request $request, $id)
    {
        $blogDB = Blogs::where('id',$id)->first();
        $blog = [];
        $blog['blog_type_id'] = $request->blogtypes;
        $blog['title'] = $request->title;
        $blog['written_by'] = $request->written_by;
        $blog['abstract'] = $request->abstract;
        //Check upload add image in ckeditor and push into database
        if(isset($request->list_images_ckeditor)){
            $blog['list_image_ckeditor'] = json_decode($blogDB->list_image_ckeditor);
            $listImagesCkeditor = explode(",",$request->list_images_ckeditor);
            for ($i=0; $i < count($listImagesCkeditor); $i++) {
                array_push($blog['list_image_ckeditor'],$listImagesCkeditor[$i]);
            }
            $blog['list_image_ckeditor'] = json_encode($blog['list_image_ckeditor']);
        }
        //Check has image title to delete and change it
        $nameFile = 'image_title';
        if($request->hasFile($nameFile)){
            $path = public_path("images/blogs/".$blogDB->image_title);
            if(File::exists($path)){
                File::delete($path);
            };
            $timestamp = round(microtime(true) * 1000);
            $imageName = $timestamp.$request->file($nameFile)->getClientOriginalName();
            $request->file($nameFile)->move(public_path('images/blogs'),$imageName);
            $blog['image_title'] = $imageName;
        };
        $blog['content'] = $request->content;
        $res = Blogs::where('id', $id)->update($blog);
        if($res){
            return back()->with("msg","Blog updated successfully!");
        }else{
            return back()->with("ms_error","Blog updated failed!");
        }
    }

    public function destroy($id)
    {
        //Select image from database has id
        $blog = Blogs::where('id', $id)->first();
        //Create a path to contains images in public folder
        $image = $blog->image_title;
        if(isset($image)){
            $path = public_path("images/blogs/".$image);
            if(File::exists($path)){
                File::delete($path);
            };
        }
        $listImageCkeditor = json_decode($blog->list_image_ckeditor);
        if(count($listImageCkeditor)>0){
            foreach ($listImageCkeditor as $key => $image) {
                //Cut string to get folder and file
                $storage = explode("storage", $image);
                $folder = explode("/",$storage[1])[1];
                $fileExtension = explode("/",$storage[1])[2];
                $fileName = explode(".",$fileExtension)[0];
                //Create path to folder
                $folderPath = public_path("storage/".$folder);
                //Check folder exists
                if (File::isDirectory($folderPath)) {
                    //Delete folder
                    File::deleteDirectory($folderPath);
                }
                if(isset($fileName)){
                    $sql = "DELETE  FROM media WHERE `name` = "."'".$fileName."'";
                    DB::select($sql);
                }
            }
        }
        //Handle delete from database has id
        $blog = Blogs::where('id', $id)->delete();
        if($blog){
            return back()->with('msg','Blog deleted successfully!');
        }
        return back()->with('ms_error','Blog deleted failed!');
    }
    public function typesBlogStore(Request $request){
        $data = $request->all();
        $res = BlogTypes::create($data);
        if($res){
            return back()->with("msg","Type created successfully!");
        }
        return back()->withErrors("msg","Type created failed!");
    }

    public function searchName(Request $request){
        if($request->has('search')){
            $blogs = Blogs::where('title','like','%'.$request->query('search').'%')->take(10)->get('title');
            return response()->json($blogs,200);
        }
        return response()->json(null,200);

    }
}
