<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\DTO\CartDTO;
use App\Models\Product\Product;
use App\Models\User;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|integer',
            'data' => 'required',
        ]);

        $data['data'] = json_encode($data['data']);

        $cartDTO = new CartDTO($data['user_id'], $data['data']);

        $cart = new Cart([
            'user_id' => $cartDTO->user_id,
            'data' => $cartDTO->data,
        ]);
        $cart->save();

        return response()->json(['message' => 'Товар добавлен в корзину']);
    }

    public function removeFromCart($product_id, Request $request)
    {
        $product = Product::find($product_id);
        $user = User::getByToken($request->bearerToken());

        // теперь нужно найти корзину пользователя и удалить из массива id продукта
    }
}
