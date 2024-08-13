<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\CartProduct;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function createOrder(OrderRequest $request)
    {
        // Создание нового заказа
/*        $order = Order::create($request->validated());

        $cartProducts = CartProduct::where('cart_id', session('cart_id'))->get(); // Мы не должны брать из сессий cart_id и вообще из сессий, а должны аутентификаций пользователя
        dd($cartProducts);/// Ничего не передается
        foreach ($cartProducts as $cartProduct) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $cartProduct->product_id,
                'quantity' => $cartProduct->quantity,
                'price' => $cartProduct->product->price,
            ]);
        }

        CartProduct::where('cart_id', session('cart_id'))->delete();
        session()->forget('cart_id');

        return redirect()->route('viewOrderProduct', ['id' => $order->id]);*/

        $data = $request->validated();

        // Создание нового заказа и связывание его с текущим пользователем
        $order = Order::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'user_id' => Auth::id(), // Присваиваем текущего пользователя
        ]);

        // Получение продуктов из корзины текущего пользователя
        $cartProducts = CartProduct::where('user_id', Auth::id())->get();

        foreach ($cartProducts as $cartProduct) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $cartProduct->product_id,
                'quantity' => $cartProduct->quantity,
                'price' => $cartProduct->product->price,
            ]);
        }

        // Очистка корзины
        CartProduct::where('user_id', Auth::id())->delete();

        // Перенаправление на страницу просмотра заказа
        return redirect()->route('viewOrderProduct', ['id' => $order->id]);
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

    public function test()
    {
        return view('test');
    }
}
