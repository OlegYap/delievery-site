<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\CartProduct;
use Illuminate\Support\Facades\Auth;

class CartService
{
    public function getOrCreateCart($userId)
    {
        $cart = Cart::where('user_id', $userId)->first();
        if (!$cart) {
            $cart = new Cart(['user_id' => $userId]);
            $cart->save();
        }
        return $cart;
    }

    public function addProductToCart($cartId, $productId, $quantity)
    {
        $cartProduct = new CartProduct([
            'cart_id' => $cartId,
            'product_id' => $productId,
            'quantity' => $quantity
        ]);
        $cartProduct->save();
    }

    public function getCartProducts($cartId)
    {
        return CartProduct::where('cart_id', $cartId)->with('product')->get();
    }

    public function calculateTotalPrice($cartProducts)
    {
        $totalPrice = 0;
        foreach ($cartProducts as $cartProduct) {
            $totalPrice += $cartProduct->product->price * $cartProduct->quantity;
        }
        return $totalPrice;
    }

    public function updateCartProduct($cartId, $productId, $quantity)
    {
        if ($quantity < 1) {
            return ['error' => 'Invalid quantity'];
        }

        $cartProduct = CartProduct::where('cart_id', $cartId)->where('product_id', $productId)->first();

        if ($cartProduct) {
            if ($quantity == 0) {
                $cartProduct->delete();
            } else {
                $cartProduct->quantity = $quantity;
                $cartProduct->save();
            }
        } else {
            if ($quantity > 0) {
                CartProduct::create([
                    'cart_id' => $cartId,
                    'product_id' => $productId,
                    'quantity' => $quantity,
                ]);
            }
        }

        $cartCount = CartProduct::where('cart_id', $cartId)->sum('quantity');
        return ['success' => 'Cart updated successfully', 'cartCount' => $cartCount];
    }

    public function editCartProductQuantity($cartId, $productId, $quantity)
    {
        $cartProduct = CartProduct::where('cart_id', $cartId)->where('product_id', $productId)->first();
        if ($cartProduct) {
            $cartProduct->quantity = $quantity;
            $cartProduct->save();
        }
    }

    public function clearCart($cartId)
    {
        CartProduct::where('cart_id', $cartId)->delete();
    }
}
