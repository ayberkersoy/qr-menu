<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();
        return view('basket.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                $request->product_id => [
                    "name" => $product->name,
                    "quantity" => $request->quantity,
                    "price" => $product->price
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Sepete eklendi.');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$request->product_id])) {
            $cart[$request->product_id]['quantity'] += $request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Sepete eklendi.');

        }

        // if item not exist in cart then add to cart with quantity
        $cart[$request->product_id] = [
            "name" => $product->name,
            "quantity" => $request->quantity,
            "price" => $product->price
        ];
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Sepete eklendi.');
    }

    public function update(Request $request)
    {
        if($request->product_id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->product_id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Sepetiniz güncellendi.');
    }

    public function destroy(Request $request)
    {
        if($request->product_id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->product_id])) {
                unset($cart[$request->product_id]);
                session()->put('cart', $cart);
            }
        }
        return back()->with('success', 'Sepetiniz güncellendi.');
    }
}
