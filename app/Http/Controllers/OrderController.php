<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use PDF;
use Mail;
use Auth;
use App\Mail\InvoiceEmailManager;


class OrderController extends Controller
{
    public function store()
    {
        $subtotal = 0;
        $subqty = 0; 
        foreach (session()->get('cart', []) as $key => $cartItem) {
            $subtotal += $cartItem['price']*$cartItem['quantity'];
            $subqty += $cartItem['quantity'];
        }
        $order = new Order;
        $order->code =substr(date('Y'), -2).'-'.rand(100000, 999999);
        $order->qty = $subqty;
        $order->amount = $subtotal;

        if ($order->save()) {
            foreach (session()->get('cart', []) as $key => $cartItem) {
                $order_detail = new OrderDetail;
                $order_detail->order_id  =$order->id;
                $order_detail->product_name = $cartItem['name'];
                $order_detail->qty = $cartItem['quantity'];
                $order_detail->price = $cartItem['price'] * $cartItem['quantity'];
                $order_detail->save();
            }
            // $order = $order->toArray();
            // return $order;
            // $order = Order::where('id',$order->id)->first();
            $array['view'] = 'invoice';
            $array['subject'] = 'Order Placed - ' . $order->code;
            $array['from'] = env('MAIL_USERNAME');
            $array['content'] = $order->code;

            //sends email to customer with the invoice
            try {
                Mail::to(Auth::user()->email)->send(new InvoiceEmailManager(
                    [
                        'view' => $array['view'],
                        'subject' => $array['subject'],
                        'from' => 'admin@example.com',
                        'content' => $array['content'],
                    ]
                ));
            } catch (\Exception $e) {
                // dd('failed');
                // return $e->getMessage();
            }
            session()->forget('cart');
            return 0;
        }
        return 1;
    }
    public function place()
    {
        return view('order_invoice_show');
    }
}
