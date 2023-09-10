<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Faqs;

class FAQController extends Controller
{
    public function index(Request $request)
    {
        $faqs = new Faqs;
        $res = [];
        if($request->has('search')){
            $faqs = $faqs->where('question','like','%'.$request->query('search').'%');
            $res['search'] = $request->query('search');
        }
        $faqs = $faqs->take(20)->get();
        $res['faqs'] = $faqs;
        return view('user/faq',$res);
    }
    public function index_admin(Request $request){
        $res = [];
        $skip = 0;
        $take = 10;
        $count = 0;
        $faqs = new Faqs;
        //Check has query pagination
        if($request->has('pagination')){
            $skip = (int)($request->query('pagination')-1) * $take;
            $res['pagination'] = (int)($request->query('pagination'));
        }
        if($request->has('search')){
            $faqs= $faqs->where('title','like','%'.$request->query('search').'%');
            $count =  ceil($faqs->count()/ $take);
            $res['search'] = $request->query('search');
        }
        else{
            $count =  ceil(Faqs::count() / $take);
        }
        //Get data from table faqs and skip 10 item
        $faqs = $faqs->skip($skip)->take($take)->join('users','faqs.customerId','=','users.id')->select('faqs.*', 'users.fullName', 'users.avatarUrl')->get();

        $res['faqs'] = $faqs;
        $res['count'] =(int)$count;
        return view('admin/supports', $res);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['customerId'] = Auth::user()->id;
        $data = Faqs::create($data);
        if($data){
            return back()->with('msg','Send a question for administrator');
        }
        return back()->with('ms_error','Send a question is failure');
    }

    public function show($id)
    {
        // Logic for displaying a specific book
    }

    public function edit($id)
    {
        $faq = Faqs::where('id', $id)->get();
        return view('admin/editsupport',['faq'=>$faq]);

    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_method', '_token');
        // $res = Faqs::where('id', $id)->first();
        $res = Faqs::where('id', $id)->update($data);
        if($res){
            return back()->with('msg','Answer is successfully!');
        }
        return back()->with('ms_error','Answer is failed!');

    }

    public function destroy($id)
    {
        $res = Faqs::where('id', $id)->delete();
        if($res){
            return back()->with('msg','Question deleted successfully!');
        }
        return back()->with('ms_error','Question deleted failed!');
    }

    function searchName(Request $request){
        if($request->has('search')){
            $faqs = Faqs::where('title','like','%'.$request->query('search').'%')->take(10)->get('title');
            return response()->json($faqs,200);
        }
        return response()->json(null,200);

    }
}
