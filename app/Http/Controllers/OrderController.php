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
}
