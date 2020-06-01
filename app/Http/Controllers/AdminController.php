<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', Order::New)->orderBy('created_at', 'desc')->take(5)->get();
        return view('admin.home', compact('orders'));
    }
}
