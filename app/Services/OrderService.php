<?php

namespace App\Services;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderService
{
    public function createOrder($user, $validatedData, $cart)
    {
        DB::beginTransaction();
        try {
            $order = $user->orders()->create($validatedData);

            $cartProducts = $cart->cartProducts;

            foreach ($cartProducts as $cartProduct) {
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $cartProduct->product_id,
                    'quantity' => $cartProduct->quantity,
                    'price' => $cartProduct->product->price,
                ]);
            }

            $cart->cartProducts()->delete();
            $cart->delete();
            DB::commit();

            return $order;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Order creation failed: ' . $e->getMessage());
            throw $e;
        }
    }
}
