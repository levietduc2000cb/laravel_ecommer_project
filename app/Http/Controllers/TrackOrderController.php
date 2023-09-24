<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Orders;

class TrackOrderController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $orders = Orders::where('customerId', $id)->get();
        return view('user/track_order', ["orders"=>$orders]);
    }

    public function create()
    {
        // Logic for showing a form to create a new book
    }

    public function store(Request $request)
    {
        $data = [];
        $data['customerId'] = $request->customerId;
        $data['status'] = $request->status;
        $data['total'] = $request->total;
        $data['products'] = json_encode($request->products);
        if(isset($request->tax)){
            $data['tax'] = $request->tax;
        }
        if(isset($request->discount)){
            $data['discount'] = $request->discount;
        }
        $res = Orders::create($data);
        if($res){
            return response()->json(['msg' => 'Tạo đơn hàng thành công'], 200);
        }
        return response()->json(['msg' => 'Tạo đơn hàng thất bại'], 400);
    }

    public function show($id)
    {
        $order = Orders::where('id', $id)->get();
        // dd($data);
        return view('user/track_order_detail',['order' => $order[0]]);
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
