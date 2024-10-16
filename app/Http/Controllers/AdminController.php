<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Category;


class AdminController extends Controller
{
    public function index()
    {
        return view('super-admin.dashboard');
    }

       public function orderslist(Request $request)
    {
        $orders = Order::latest()->where('creator_id', auth()->id())->paginate(10);

        $categories = Category::all();
        return view('super-admin.order.orderlist', ['orders'=>$orders, 'page'=>$request->page??1, 'categories'=>$categories]);
    }

    // public function orderslist()
    // {
    //     return view('super-admin.order.orderlist');
    // }
}
