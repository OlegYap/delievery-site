<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\CartProduct;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function createOrder(OrderRequest $request, OrderService $orderService)
    {
        $user = auth()->user();
        $cart = $user->cart;

        if (!$cart) {
            return redirect()->back()->withErrors(['cart' => 'Your cart is empty.']);
        }

        $validatedData = $request->validated();

        try {
            $order = $orderService->createOrder($user, $validatedData, $cart);

            return redirect()->route('viewOrderProduct', ['id' => $order->id]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while creating the order.']);
        }
    }

    public function viewOrderForm()
    {
        return view('order');
    }

    public function viewOrder($id)
    {
        $order = Order::findOrFail($id);
        $orderProducts = OrderProduct::where('order_id', $id)->get();

        $totalPrice = 0;

        foreach ($orderProducts as $orderProduct) {
            $totalPrice += $orderProduct->price * $orderProduct->quantity;
        }

        return view('orderProduct', compact('order', 'orderProducts', 'totalPrice'));
    }

    public function viewOrders()
    {
        $user = auth()->user();
        $orders = $user->orders;

        return view('orders', compact('orders'));
    }

    public function test()
    {
        return view('test');
    }
}
