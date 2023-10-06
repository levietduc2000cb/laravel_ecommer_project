<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

use App\Models\Users;
use App\Models\Orders;
use App\Models\Books;

class AnalysticController extends Controller
{
    public function index()
    {
        $data = [];
        $data['totalCustomers'] = Users::where('isAdmin',0)->count();
        $data['totalOrders'] = Orders::count();
        $data['totalRevenue'] = Orders::sum('total');
        $data['totalBooks'] = Books::count();
        $data['topCustomers'] = DB::select("SELECT users.id, users.fullName AS name,totalOrders.totalOrders  FROM users INNER JOIN (SELECT orders.customerId, COUNT(orders.customerId) as totalOrders FROM orders GROUP BY orders.customerId) AS totalOrders ON users.id = totalOrders.customerId ORDER BY totalOrders.totalOrders DESC LIMIT 10");
        $data['lineChartRevenue'] = DB::select("SELECT MONTH(created_at) AS month, YEAR(created_at) AS year, SUM(total) AS total
        FROM orders
        GROUP BY MONTH(created_at), YEAR(created_at)
        ORDER BY YEAR(created_at), MONTH(created_at)");
        $data['topBooks'] = Books::orderBy('quantity_order_number','desc')->limit(5)->get();

        return view('admin/analystics',$data);
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
