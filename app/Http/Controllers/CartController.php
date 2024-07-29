<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addCart(Request $request)
    {
        $user = auth()->id();
        $cart = Cart::where('user_id', $user)->first();
        if (!$cart) {
            $cart = new Cart(['user_id' => $user]);
            $cart->save();
        }

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $cartProduct = new CartProduct([
            'cart_id' => $cart->id,
            'product_id' => $productId,
            'quantity' => $quantity
        ]);
        $cartProduct->save();

        return redirect()->back();
    }

    public function viewCart(Request $request)
    {
        $user = auth()->id();

        $cart = Cart::where('user_id', $user)->first();
        if (!$cart) {
            $cart = new Cart(['user_id' => $user]);
            $cart->save();
        }

        $cartProducts = CartProduct::where('cart_id', $cart->id)->with('product')->get();

        $totalPrice = 0;
        foreach ($cartProducts as $cartProduct) {
            $totalPrice += $cartProduct->product->price * $cartProduct->quantity;
        }

        return view('cart', compact('cartProducts', 'totalPrice'));
    }

    public function editQuantity(Request $request)
    {
        $user = auth()->id();
        $cart = Cart::where('user_id', $user)->first();
        if (!$cart) {
            return redirect('/main');
        }
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $cartProduct = CartProduct::where('cart_id', $cart->id)->where('product_id', $productId)->first();
        if ($cartProduct) {
            $cartProduct->quantity = $quantity;
            $cartProduct->save();
        }
        return redirect()->back();
    }

    public function removeCartProduct(Request $request)
    {
        $user = auth()->id();
        $cart = Cart::where('user_id', $user)->first();
        if (!$cart) {
            return redirect()->back()->withErrors(['error' => 'Cart not found']);
        }

        $productId = $request->input('product_id');
        $cartProduct = CartProduct::where('cart_id', $cart->id)->where('product_id', $productId)->first();
        if ($cartProduct) {
            $cartProduct->delete();
        }

        return redirect()->back();
    }
}
