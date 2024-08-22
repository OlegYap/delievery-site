<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService) {
        $this->cartService = $cartService;
    }


    public function addCart(Request $request)
    {
        $user = Auth::id();
        $cart = $this->cartService->getOrCreateCart($user);

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $this->cartService->addProductToCart($cart->id, $productId, $quantity);

        return redirect()->back();
    }

    public function viewCart(Request $request)
    {
        $user = Auth::id();
        $cart = $this->cartService->getOrCreateCart($user);

        $cartProducts = $this->cartService->getCartProducts($cart->id);
        $totalPrice = $this->cartService->calculateTotalPrice($cartProducts);

        return view('cart', compact('cartProducts', 'totalPrice'));
    }

    public function updateCart(Request $request)
    {
        $user = Auth::id();
        $cart = $this->cartService->getOrCreateCart($user);

        $productId = $request->input('product_id');
        $quantity = (int) $request->input('quantity');

        $result = $this->cartService->updateCartProduct($cart->id, $productId, $quantity);

        if (isset($result['error'])) {
            return response()->json(['error' => $result['error']], 400);
        }

        return response()->json($result);
    }

    public function editQuantity(Request $request)
    {
        $user = Auth::id();
        $cart = $this->cartService->getOrCreateCart($user);

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $this->cartService->editCartProductQuantity($cart->id, $productId, $quantity);

        return redirect()->back();
    }

    public function clearCart()
    {
        $user = Auth::id();
        $cart = $this->cartService->getOrCreateCart($user);

        $this->cartService->clearCart($cart->id);

        return redirect()->route('cartView');
    }
}
