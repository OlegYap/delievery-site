<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function createOrder(OrderRequest $request)
    {
        $order = Order::create($request->validated());
        return redirect()->route('viewOrderProduct', ['id' => $order->id]);
    }

    public function viewOrderForm()
    {
        return view('order');
    }

    public function viewOrder($id)
    {
        $order = Order::findOrFail($id);
        $totalPrice = 0;

        foreach ($order->products as $product) {
            $totalPrice += $product->price * $product->pivot->quantity;
        }

        return view('viewOrderProduct', compact('order', 'totalPrice'));
    }

    public function test()
    {
        return view('test');
    }
}
