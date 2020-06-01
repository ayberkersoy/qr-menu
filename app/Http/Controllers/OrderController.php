<?php

namespace App\Http\Controllers;

use App\Order;
use App\Basket;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $order = Order::create([
            'table_no' => $request->table_no,
            'status' => Order::New,
            'total' => $request->total
        ]);

        $cart = session('cart');
        foreach($cart as $id => $details) {
            Basket::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $details['quantity']
            ]);
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('home')->with('success', 'Siparişiniz alınmıştır.');
    }

    public function index(Request $request)
    {
        $orders = Order::where('status', $request->status)->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    public function update(Order $order, Request $request)
    {
        $order->update([
            'status' => Order::Sent
        ]);

        return back()->with('success', 'Sipariş güncellendi.');
    }
}
