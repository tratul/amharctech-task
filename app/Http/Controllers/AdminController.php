<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.order.index', compact('orders'));
    }
    public function show($id)
    {
        $order = Order::find( $id);
        $order->view = 1;
        $order->save();
        return view('admin.order.show', compact('order'));
    }
}
