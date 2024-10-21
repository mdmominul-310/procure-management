<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Category;
use App\Models\OrderItem;


class AdminController extends Controller
{
    public function index()
    {
        return view('super-admin.dashboard');
    }

 public function orderslist(Request $request)
    {
    $orders = Order::latest()->paginate(10);

        $categories = Category::all();
        return view('super-admin.order.orderlist', ['orders'=>$orders, 'page'=>$request->page??1, 'categories'=>$categories]);
    }

     public function details($id)
    {
        $order = Order::where('id',$id)->first();
        $ordersDetails =  OrderItem::where('order_id', $id)->get();
        return view('super-admin.order.details',compact('ordersDetails', 'order'));
    } 

     public function OrderEditForm($id)
    {
        $order = Order::where('id', $id)->first();
        $categories = Category::all();
        return view('super-admin.order.edit-form', compact('order', 'categories'));
    }

    public function updateOrder(Request $request, $id)
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ];
        $order = Order::where('id', $id)->update($data);

        return redirect()->route('super-admin.order.orderlist')->with('success', 'Order updated successfully');
    }
}
