<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;


use App\Models\Orders;

class OrdersController extends Controller
{
    public function index()
    {
        return view('user/track_order');
    }
    public function indexAdmin(Request $request)
    {
        $orders = new Orders;
        $res = [];
        $skip = 0;
        $take = 10;
        $count = 0;
        //$request->search_classification == 1: is Order's id
        //$request->search_classification == 2: is user's name
        //$request->search_classification == 0: is all

        $count =  ceil(Orders::count() / $take);
        $orders= $orders->join('users', 'orders.customerId', '=', 'users.id');

        if($request->search_classification == 1){
            if(isset($request->search)){
                $orders = $orders->where('orders.id',(int)$request->search);
                $count =  ceil($orders->count()/ $take);
                $res['search'] = $request->search;
            }
        }
        elseif ($request->search_classification == 2){
            if(isset($request->search)){
                $orders= $orders->where('users.fullName','like','%'.$request->search.'%');
                $count =  ceil( $orders->count()/ $take);
                $res['search'] = $request->search;
            }
        }

        if($request->has('pagination')){
            $skip = (int)($request->query('pagination')-1) * $take;
            $res['pagination'] = (int)($request->query('pagination'));
        }

        $res['orders'] = $orders->orderBy('created_at', 'desc')->take($take)->skip($skip)->select('orders.*','users.avatarUrl as avatarUrl' ,'users.fullName as fullName', 'users.address as address')->get();
        $res['count'] = $count;
        $res['search_classification'] = $request->search_classification;
        return view('admin/orders',$res);
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
        $order = Orders::where('orders.id', $id)->join('users', 'orders.customerId', '=', 'users.id')->select('orders.*','users.avatarUrl as avatarUrl' ,'users.fullName as fullName', 'users.address as address')->first();
        // dd($res);
        return view('admin/orders_detail',['order'=>$order]);
    }

    public function edit($id)
    {
        // Logic for showing a form to edit a book
    }

    public function update(Request $request, $id)
    {
        // Logic for updating a book in the database
        $order = Orders::where('id', $id)->select('status','products')->first();
        $products = json_decode($order->products);
        (int)$status = $order->status;
        if($status==0){
            foreach ($products as $book) {
                $bookId = $book->id;
                $bookDB = Books::where('id', $bookId)->select('quantity','quantity_order_number')->first();
                $quantity = (int)$bookDB->quantity - (int)$book->quantity;
                $quantityOrderNumber = (int)$bookDB->quantity_order_number + (int)$book->quantity;
                $book = [];
                $book['quantity'] = $quantity;
                $book['quantity_order_number'] = $quantityOrderNumber;
                Books::where('id', $bookId)->update($book);
            }
        }
        if($status < 2){
            $status+=1;
        }
        Orders::where('id', $id)->update(['status' => $status]);
        return back();
    }

    public function destroy($id)
    {
         //Handle delete orders
         $res = Orders::where('id', $id)->delete();
         if($res){
            return redirect(route('admin_orders'))->with('msg','Order '.$id.' deleted successfully!');
        }
        return redirect(route('admin_orders'))->with('ms_error','Order '.$id.' deleted failed!');
    }
}
