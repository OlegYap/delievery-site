<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function createOrder(OrderRequest $request)
    {
        $order = Order::create($request->validated());
        return redirect()->back()->with('success', 'Order created successfully.');
    }

    public function viewOrderForm()
    {
        return view('order');
    }
}
